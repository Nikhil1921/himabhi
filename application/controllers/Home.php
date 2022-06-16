<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function index()
	{
		$data['title'] = "Home";
		$data['name'] = "Home";
		$data['banners'] = $this->main->getAll('banners', 'CONCAT("'.$this->config->item('banners').'", banner) banner', []);
		$this->load->model(admin('products_model'));
		$data['prods'] = array_map(function($prod){

			$prod['prod_features'] = $this->products_model->getFeatures($prod['id'], 1);
			
			return $prod;

		}, $this->main->getAll('products', 'id, t_title, slug, image, price, short_description', ['is_deleted' => 0]));

		return $this->template->load('template', "home", $data);
	}

	public function product($slug)
	{
		$prod = $this->main->get('products', 'id, t_title, slug, price, quantity, description, image, t_sub_title, short_description, packing, quote, features, feature_title, sub_description', ['slug' => $slug, 'is_deleted' => 0]);
		
		if($prod)
		{
			$this->load->model(admin('products_model'));
			$prod['prod_features'] = $this->products_model->getFeatures($prod['id'], 0);
			$prod['ingredients'] = $this->products_model->getIngredients($prod['id']);
			$prod['reviews'] = $this->main->getAll('reviews', 'r_name, description, created_at', ['p_id' => $prod['id'], 'is_deleted' => 0]);

			$data['title'] = $prod['t_title'];
			$data['name'] = 'product';
			$data['bread'] = ['OUR PRODUCTS', $prod['t_title']];
			$data['prod'] = $prod;
			
			return $this->template->load('template', 'product', $data);
		}else
			return $this->error_404();
	}

	public function about()
	{
		$data['title'] = 'About';
        $data['name'] = 'about';
        $data['bread'] = ['About', 'About'];
        
		return $this->template->load('template', 'about', $data);
	}

	public function cart()
	{
		$data['title'] = 'Cart';
        $data['name'] = 'cart';
        $data['bread'] = ['CART', 'Proceed to Shop'];
        
		return $this->template->load('template', 'cart', $data);
	}

	public function checkout()
	{
		$data['title'] = 'Checkout';
        $data['name'] = 'checkout';
        $data['bread'] = ['CHECKOUT', 'Check out'];
        $data['user'] = $this->main->get('users', 'f_name, l_name, mobile, email, address', ['id' => $this->session->auth]);
		
		foreach ($this->cart->contents() as $item) {
			$prod = $this->main->get('products', 'id, quantity', ['id' => my_crypt($item['id'], 'd'), 'quantity >= ' => $item['qty']]);
			
			if(! $prod) $this->cart->remove($item['rowid']);
			/* else{
				$quantities[] = [
						'id' => $prod['id'],
						'quantity' => $prod['quantity'] - $item['qty']
					];
			} */
		}

		// if(isset($quantities)) $this->main->updateQuantities($quantities);

		if(!$this->session->auth)
			flashMsg(0, "", "Login to continue.", 'login?redirect=checkout');
		else
			return $this->template->load('template', 'checkout', $data);
	}

	public function contact()
	{
		if ($this->form_validation->run('contact') === FALSE)
        {
            $data['title'] = 'GET IN TOUCH';
			$data['name'] = 'contact';
			$data['bread'] = ['GET IN TOUCH', 'Contact'];

			return $this->template->load('template', 'contact', $data);
        }else{
			$post = [
                'name'       => $this->input->post('name'),
                'phone'      => $this->input->post('phone'),
                'email'      => $this->input->post('email'),
                'address'    => $this->input->post('address'),
                'message'    => $this->input->post('message'),
            ];

			$id = $this->main->add($post, "contacts");
			
			flashMsg($id, "Your massage saved successfully. We will contact to you shortly.", "Your massage not saved. Try again.", 'contact#or-contact-form');
		}
	}

	public function shop()
	{
		$data['title'] = 'Shop';
        $data['name'] = 'shop';
        $data['bread'] = ['SHOP', 'Shop'];
        $data['prods'] = $this->main->getAll('products', 'id, t_title, slug, image, price', ['is_deleted' => 0]);

		return $this->template->load('template', 'shop', $data);
	}

	public function add_to_cart()
	{
		check_ajax();

		$post = $this->input->post();
		$prod = $this->main->get('products', 't_title, price, image, slug, packing', ['id' => my_crypt($post['p_id'], 'd'), 'quantity >= ' => $post['qty']]);
		
		if($prod)
		{
			$img = json_decode($prod['image']);

			$check = null;
			$msg = "Product added to your cart.";

			if($this->cart->contents())
				foreach ($this->cart->contents() as $k => $v)
					if($v['id'] === $post['p_id']){
						$msg = "Quantity updated in your cart.";
						$check = $k;
					}

			if($check){
				$data = [
					'rowid' => $check,
					'qty'   => $post['qty']
				];

				$this->cart->update($data);
			}else{
				$data = [
					'id'      => $post['p_id'],
					'qty'     => $post['qty'],
					'price'   => $prod['price'],
					'name'    => $prod['t_title'].' - '.$prod['packing'],
					'options' => ['image' => $img->main, 'slug' => $prod['slug']]
				];

				$this->cart->insert($data);
			}

			$response = [
				'error'   => false,
				'count'   => $this->cart->total_items(),
				'cart'    => strpos($this->input->server('HTTP_REFERER'), 'cart') !== -1 ? $this->load->view('cart-table', '', TRUE) : '',
				'message' => $msg
			];
		}else
			$response = [
				'error' => true,
				'message' => "Product not available at this moment."
			];
		
		die(json_encode($response));
	}

	public function delete_cart()
	{
		check_ajax();

		$this->cart->remove($this->input->post('rowid'));

		$response = [
			'error'   => false,
			'count'   => $this->cart->total_items(),
			'cart'    => $this->load->view('cart-table', '', TRUE),
			'message' => "Product removed from your cart."
		];

		die(json_encode($response));
	}

	public function checkout_post()
	{
		check_ajax();
		
		if($this->cart->total_items() > 0)
		{
			$validate = [
				[
					'field' => 'f_name',
					'label' => 'First name',
					'rules' => 'required|alpha|max_length[20]|trim',
					'errors' => [
						'required' => "%s is required",
						'alpha' => "%s is invalid",
						'max_length' => "Max 20 chars allowed",
					],
				],
				[
					'field' => 'l_name',
					'label' => 'Last name',
					'rules' => 'required|alpha|max_length[20]|trim',
					'errors' => [
						'required' => "%s is required",
						'alpha' => "%s is invalid",
						'max_length' => "Max 20 chars allowed",
					],
				],
				[
					'field' => 'mobile',
					'label' => 'Mobile',
					'rules' => 'required|is_natural|exact_length[10]|trim',
					'errors' => [
						'required' => "%s is required",
						'is_natural' => "%s is invalid",
						'exact_length' => "%s is invalid",
					],
				],
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|max_length[100]|valid_email|trim',
					'errors' => [
						'required' => "%s is required",
						'valid_email' => "%s is invalid",
						'max_length' => "Max 100 chars allowed"
					],
				],
				[
					'field' => 'address',
					'label' => 'Address',
					'rules' => 'required|max_length[150]|trim',
					'errors' => [
						'required' => "%s is required",
						'max_length' => "Max 150 chars allowed"
					],
				],
				[
					'field' => 'notes',
					'label' => 'Notes',
					'rules' => 'max_length[150]|alpha_numeric_spaces|trim',
					'errors' => [
						'alpha_numeric_spaces' => "Only alpha numeric and spaces are allowed.",
						'max_length' => "Max 150 chars allowed"
					],
				],
				[
					'field' => 'payment_type',
					'label' => 'Payment type',
					'rules' => 'required|in_list[Cash on delivery,Online payment]|trim',
					'errors' => [
						'required' => "%s is required",
						'in_list' => "%s is invalid",
					],
				]
			];
			
			$this->form_validation->set_rules($validate);
			
			if ($this->form_validation->run() === FALSE)
				$response = [
					'errors'   => $this->form_validation->error_array(),
					'error'   => true
				];
			else{
				if($this->input->post('payment_id')){

					$order_id = $this->main->saveOrder($this->input->post());

					$response = [
						'error'   => $order_id ? false : true,
						'message' => $order_id ? "Order success." : "Order not success. Try again.",
					];
				}else{
					$response = [
						'error'   => false,
						'message' => $this->cart->total() * 100
					];
				}
			}
		}else
			$response = [
				'error'   => true,
				'message' => "Cart is empty."
			];

		die(json_encode($response));
	}

	public function special_features()
	{
		$data['title'] = "Home";
		$data['name'] = "prods";
		$data['banners'] = $this->main->getAll('banners', 'CONCAT("'.$this->config->item('banners').'", banner) banner', []);
		$this->load->model(admin('products_model'));
		$data['prods'] = array_map(function($prod){

			$prod['prod_features'] = $this->products_model->getFeatures($prod['id'], 1);
			
			return $prod;

		}, $this->main->getAll('products', 'id, t_title, slug, image, price, short_description', ['is_deleted' => 0]));
		
		$data['bread'] = ['SPECIAL FEATURS OF PRODUCTS', 'Special Features'];

		return $this->template->load('template', "special_features", $data);
	}

	public function why_himabhi()
	{
		$data['title'] = 'WHY US';
        $data['name'] = 'why_himabhi';
        $data['bread'] = ['WHY US', 'Why Choose Himabhi'];

		return $this->template->load('template', 'why_himabhi', $data);
	}

	/* public function shipping_policy()
	{

	}

	public function terms_and_conditions()
	{

	} */

	/* public function update_quantities()
	{
		check_ajax();

		if($this->input->post('cart'))
			foreach ($this->input->post('cart') as $id => $qty) {
				$prod = $this->main->get('products', 'id, quantity', ['id' => my_crypt($id, 'd')]);
				
				$quantities[] = [
						'id' => $prod['id'],
						'quantity' => $prod['quantity'] + $qty
					];
			}
		
		if(isset($quantities)) $this->main->updateQuantities($quantities);
	} */

	public function login()
	{
		$data['redirect'] = $this->input->server('QUERY_STRING') ? 'login?'.$this->input->server('QUERY_STRING') : 'login';
		
		if ($this->form_validation->run('web-login') === FALSE) {
			$data['title'] = 'Login';
			$data['name'] = 'login';
	
			return $this->template->load('template', 'login', $data);
		}else{
			$post = [
				'email'    => $this->input->post('email'),
    			'password' => my_crypt($this->input->post('password'))
			];
			
			if($user = $this->main->check("users", $post, 'id'))
			{
				$this->session->set_userdata('auth', $user);
				$msg = "Login success.";
				$data['redirect'] = $this->input->get('redirect');
			}
			else
			{
				$msg = "Invalid credentials.";
			}

			flashMsg($user, $msg, $msg, $data['redirect']);
		}
	}

	public function register()
	{
		$data['redirect'] = $this->input->server('QUERY_STRING') ? 'register?'.$this->input->server('QUERY_STRING') : 'register';
		
		if ($this->form_validation->run('web-register') === FALSE) {
			$data['title'] = 'Register';
			$data['name'] = 'register';
	
			return $this->template->load('template', 'register', $data);
		}else{
			$post = [
				'f_name'    => $this->input->post('f_name'),
				'l_name'    => $this->input->post('l_name'),
				'mobile'    => $this->input->post('mobile'),
				'email'     => $this->input->post('email'),
				'address'   => $this->input->post('address'),
    			'password'  => my_crypt($this->input->post('password'))
			];
			
			if($user = $this->main->add($post, "users"))
			{
				$this->session->set_userdata('auth', $user);
				$msg = "Register success.";
				$data['redirect'] = $this->input->get('redirect');
			}
			else
				$msg = "Register not success. Try again.";

			flashMsg($user, $msg, $msg, $data['redirect']);
		}
	}

	public function error_404()
	{
		$data['title'] = 'Error 404';
        $data['name'] = 'Error 404';

		return $this->template->load('template', 'error_404', $data);
	}
}