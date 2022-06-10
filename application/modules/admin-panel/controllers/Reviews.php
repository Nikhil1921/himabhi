<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends Admin_controller  {

	protected $table = 'reviews';
	protected $redirect = 'reviews';
	protected $title = 'Review';
	protected $name = 'reviews';
	
	public function index()
	{
        $data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['url'] = $this->redirect;
        $data['operation'] = "List";
        $data['datatable'] = "$this->redirect/get";
		
		return $this->template->load('template', "$this->redirect/home", $data);
	}

    public function get()
    {
        check_ajax();
        $this->load->model('Reviews_model', 'data');

        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];

        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->t_title;
            $sub_array[] = $row->r_name;
            $sub_array[] = $row->created_at;

            $action = '<div class="dropdown">
                          <button type="button" class="btn btn-round btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                          </button>
                          <div class="dropdown-menu" style="will-change: transform;">';
            
            $action .= anchor($this->redirect."/add-update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');

            $action .= form_open($this->redirect.'/delete', 'id="'.e_id($row->id).'"', ['id' => e_id($row->id)]).
                '<a class="dropdown-item" onclick="script.delete('.e_id($row->id).'); return false;" href=""><i class="fa fa-trash"></i> Delete</a>'.
                form_close();

            $action .= '</div></div>';
            
            $sub_array[] = $action;
            
            $data[] = $sub_array;  
            $sr++;
        }

        $output = [
            "draw"              => intval($this->input->get('draw')),  
            "recordsTotal"      => $this->data->count(),
            "recordsFiltered"   => $this->data->get_filtered_data(),
            "data"              => $data
        ];
        
        die(json_encode($output));
    }

    public function add_update($id=0)
	{
        $this->form_validation->set_rules($this->validate);

        $data['title'] = $this->title;
        $data['name'] = $this->name;
        $data['operation'] = $id === 0 ? "Add" : "Update";
        $data['url'] = $this->redirect;
        $data['prods'] = $this->main->getAll('products', 'id, t_title', ['is_deleted' => 0]);
        
        if($id !== 0) $data['data'] = $this->main->get($this->table, 'r_name, description, created_at, p_id', ['id' => d_id($id)]);
        
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                'r_name'      => $this->input->post('r_name'),
                'description' => $this->input->post('description'),
                'p_id'        => d_id($this->input->post('p_id')),
                'created_at'  => $this->input->post('created_at'),
            ];
            
            $uid = ($id === 0) ? $this->main->add($post, $this->table) : $this->main->update(['id' => d_id($id)], $post, $this->table);

            $msg = ($id === 0) ? 'added' : 'updated';

            $redirect = "$this->redirect/add-update";

            if ($id !== 0) $redirect = "$this->redirect/add-update/$id";

            flashMsg($uid, "$this->title $msg.", "$this->title not $msg. Try again.", $redirect);
        }
	}

    public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'required|is_natural');
        if ($this->form_validation->run() == FALSE)
            flashMsg(0, "", "Some required fields are missing.", $this->redirect);
        else{
            $id = $this->main->update(['id' => d_id($this->input->post('id'))], ['is_deleted' => 1],$this->table);
            flashMsg($id, "$this->title deleted.", "$this->title not deleted.", $this->redirect);
        }
    }

    protected $validate = [
        [
            'field' => 'r_name',
            'label' => 'Name',
            'rules' => 'required|max_length[50]|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 50 chars allowed",
            ],
        ],
        [
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|max_length[500]|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 500 chars allowed",
            ],
        ],
        [
            'field' => 'p_id',
            'label' => 'Product',
            'rules' => 'required|is_natural|trim',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
            ],
        ],
        [
            'field' => 'created_at',
            'label' => 'Date',
            'rules' => 'required|trim',
            'errors' => [
                'required' => "%s is required",
            ],
        ]
    ];
}