<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('cart');
		if(!$this->session->auth) return redirect('login');
	}

    public function index()
    {
        $data['title'] = "My orders";
        $data['name'] = "my_orders";
        $data['orders'] = $this->main->getAll('orders', 'CONCAT("HIMABHI-", id) AS order_id, id, payment_type, payment_id, created_at, update_at, status, total_price', ['u_id' => $this->session->auth]);
        
        return $this->template->load('template', "user/orders", $data);
    }

    public function view_order($id)
    {
        $data['title'] = "View order";
        $data['name'] = "view_order";
        $data['order'] = $this->main->get('orders', 'CONCAT("HIMABHI-", id) AS order_id, f_name, l_name, mobile, email, address, notes, payment_type, payment_id, created_at, update_at, status, total_price', ['u_id' => $this->session->auth, 'id' => d_id($id)]);
        if($data['order'])
            $data['order']['sub_orders'] = $this->main->getAll('sub_orders', 'CONCAT("'.$this->config->item('products').'", image) AS image, quantity, price, name, slug', ['order_id' => d_id($id)]);
        
        return $this->template->load('template', "user/view_order", $data);
    }

    public function wishlist()
    {
        $data['title'] = "My Wishlist";
        $data['name'] = "wishlist";
        $data['wishlist'] = $this->main->wishlist();
        
        return $this->template->load('template', "user/wishlist", $data);
    }

    public function delete_wish()
    {
        check_ajax();

        $wish = [
            'u_id' => $this->session->auth,
            'p_id' => my_crypt($this->input->post('p_id'), 'd')
        ];

        $delete = $this->main->delete('wish_list', $wish);

        $data['wishlist'] = $this->main->wishlist();

        $response = [
            'error'   => !$delete,
            'wish'   => $this->load->view('wish-table', $data, true),
            'message' => $delete ? "Product removed from your wishlist." : "Product not removed from wishlist. Try again."
        ];

		die(json_encode($response));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('login');
    }
}