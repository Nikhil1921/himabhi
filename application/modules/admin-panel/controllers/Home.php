<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_controller  {

	protected $table = 'admins';
	protected $redirect = 'dashboard';
	
	public function index()
	{
        $data['title'] = 'dashboard';
        $data['name'] = 'dashboard';
        $data['url'] = $this->redirect;
        $data['datatable'] = admin("getOrders");
        
        return $this->template->load('template', 'home', $data);
	}

	public function getOrders()
    {
        check_ajax();

        $this->load->model('Order_model', 'data');
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];

        foreach($fetch_data as $sr => $row)
        {
            $sub_array = [];
            $sub_array[] = $sr + 1;
            $sub_array[] = $row->name;
            $sub_array[] = $row->mobile;
            $sub_array[] = $row->address;
            $sub_array[] = $row->notes ? $row->notes : "NA";
            $sub_array[] = $row->payment_type;
            $sub_array[] = $row->payment_id;
            $sub_array[] = "₹ $row->total_price";

            $sub_array[] = '<span class="badge badge-pill badge-'.($row->status === 'Pending' ? 'primary' : ($row->status === 'Accepted' ? 'warning' : ($row->status === 'Shipped' ? 'danger' : 'success'))).'">'.$row->status.'</span>';
            
            $action = '<div class="dropdown">
                          <button type="button" class="btn btn-round btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                          </button>
                          <div class="dropdown-menu" style="will-change: transform;">';

            $action .= '<a class="dropdown-item" onclick="script.viewOrder('.e_id($row->id).'); return false;" href="javascript:;"><i class="fa fa-eye"></i> View Order</a>';

            switch ($row->status) {
                case 'Accepted':
                    $status = "Shipped";
                    $icon = "truck";
                    break;

                case 'Shipped':
                case 'Delivered':
                    $status = "Delivered";
                    $icon = "truck";
                    break;
                
                default:
                    $status = "Accepted";
                    $icon = "thumbs-up";
                    break;
            }

            $action .= $row->status !== 'Delivered' ? form_open(admin('status-update'), 'id="'.e_id($row->id).'"', ['id' => e_id($row->id), 'status' => $status]).
                '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-'.$icon.'"></i> '.$status.'</a>'.
                form_close() : '<a class="dropdown-item" href="javascript:;"><i class="fa fa-'.$icon.'"></i> '.$status.'</a>';

            $action .= '</div></div>';
            
            $sub_array[] = $action;

            $data[] = $sub_array;
        }

        $output = [
            "draw"              => intval($this->input->get('draw')),  
            "recordsTotal"      => $this->data->count(),
            "recordsFiltered"   => $this->data->get_filtered_data(),
            "data"              => $data
        ];
        
        die(json_encode($output));
    }

	public function status_update()
    {
        $this->form_validation->set_rules('id', 'id', 'required|is_natural');
        $this->form_validation->set_rules('status', 'status', 'required|in_list[Accepted,Shipped,Delivered]');

        if ($this->form_validation->run() === FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['status' => $this->input->post('status'), 'update_at' => time()], "orders");
            flashMsg($id, "Status updated.", "Status not updated.", $this->redirect);
        }
    }

	public function getOrder($id)
    {
        $data['sub_orders'] = $this->main->getAll('sub_orders', 'CONCAT("'.$this->config->item('products').'", image) AS image, quantity, price, name, slug', ['order_id' => d_id($id)]);;
        die($this->load->view('get-order', $data, true));
    }

	public function profile()
    {
        if ($this->form_validation->run('profile') == FALSE)
        {
            $data['title'] = 'Profile';
            $data['name'] = 'profile';
            $data['operation'] = 'Update';
            $data['url'] = $this->redirect;

            return $this->template->load('template', 'profile', $data);
        }
        else
        {
            $post = [
    			'mobile'   	 => $this->input->post('mobile'),
    			'email'   	 => $this->input->post('email'),
    			'name'   	 => $this->input->post('name')
    		];

            if ($this->input->post('password'))
                $post['password'] = my_crypt($this->input->post('password'));

            $id = $this->main->update(['id' => $this->session->auth], $post, $this->table);

            flashMsg($id, "Profile updated.", "Profile not updated. Try again.", admin("profile"));
        }
    }

	public function logout()
    {
        $this->session->sess_destroy();
        return redirect(admin('login'));
    }

	public function backup()
    {
        // Load the DB utility class
        $this->load->dbutil();
        
        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(APP_NAME.'.zip', $backup);
        return redirect(admin());
    }
}