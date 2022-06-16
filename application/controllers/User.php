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
        $data['orders'] = $this->main->getAll('orders', 'CONCAT("HIMABHI-", id) AS id, f_name, l_name, mobile, email, address, notes, payment_type, payment_id, created_at, update_at, status, total_price', ['u_id' => 0]);
        
        return $this->template->load('template', "user/orders", $data);
    }
}