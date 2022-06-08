<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return redirect(admin());
		/* if($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD') === "POST"):
			$post = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('phone'),
				'company' => $this->input->post('company'),
				'requirements' => $this->input->post('requirements'),
			];

			$id = $this->main->add($post, 'inquiry');

			$response = [
				'error' => $id ? false : true,
				'message' => $id ? "Thank you for showing interest. Your request is saved. we will get back to you shortly." : "Your request is not saved. Try again.",
			];

			die(json_encode($response));
		else:
			$data['title'] = "Home";
			$data['banners'] = $this->main->getAll('banners', 'CONCAT("'.$this->config->item('banners').'", banner) banner', []);
			
			$data['validate'] = true;
			$data['owl'] = true;
			
			return $this->template->load('template', "home", $data);
		endif; */
	}
}