<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = "Home";
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
		re($this->input->server('HTTP_REFERER'));
	}

	/* public function shipping_policy()
	{

	}

	public function terms_and_conditions()
	{

	} */

	public function special_features()
	{
		$data['title'] = "Home";
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

	public function error_404()
	{
		$data['title'] = 'Error 404';
        $data['name'] = 'Error 404';
        $data['bread'] = ['Error 404', 'Error 404'];

		return $this->template->load('template', 'error_404', $data);
	}
}