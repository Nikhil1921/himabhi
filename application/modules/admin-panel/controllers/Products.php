<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_controller  {

    public function __construct()
	{
		parent::__construct();
		$this->path = $this->config->item('products');
	}

	protected $table = 'products';
	protected $redirect = 'products';
	protected $title = 'Product';
	protected $name = 'products';
	
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
        $this->load->model('Products_model', 'data');
        
        $fetch_data = $this->data->make_datatables();
        $sr = $this->input->get('start') + 1;
        $data = [];

        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $sr;
            $sub_array[] = $row->t_title;
            $sub_array[] = $row->price;
            $sub_array[] = $row->quantity;

            $action = '<div class="dropdown">
                          <button type="button" class="btn btn-round btn-outline-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                          </button>
                          <div class="dropdown-menu" style="will-change: transform;">';

            $action .= anchor($this->redirect."/add-update/".e_id($row->id), '<i class="fa fa-edit"></i> Edit</a>', 'class="dropdown-item"');
            $action .= anchor($this->redirect."/images/".e_id($row->id), '<i class="fa fa-image"></i> Images</a>', 'class="dropdown-item"');

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
        $data['image'] = true;
        $data['select'] = true;

        if($id !== 0){
            $data['data'] = $this->main->get($this->table, 't_title, slug, price, quantity, description, image, t_sub_title, short_description, packing, quote, features, feature_title, sub_description', ['id' => d_id($id)]);
            $data['data']['ingredients'] = $this->main->getAll('product_ingredients', 'i_id', ['p_id' => d_id($id)]);
            $data['data']['prod_features'] = $this->main->getAll('product_features', 'f_id', ['p_id' => d_id($id)]);
        }

        $data['features'] = $this->main->getAll('features', 'id, f_title', ['is_deleted' => 0]);
        $data['ingredients'] = $this->main->getAll('ingredients', 'id, i_title', ['is_deleted' => 0]);
        
        if ($this->form_validation->run() == FALSE)
        {
            return $this->template->load('template', "$this->redirect/form", $data);
        }else{
            $post = [
                't_title'           => $this->input->post('t_title'),
                'slug'              => $this->input->post('slug'),
                'price'             => $this->input->post('price'),
                'quantity'          => $this->input->post('quantity'),
                't_sub_title'       => $this->input->post('t_sub_title'),
                'packing'           => $this->input->post('packing'),
                'short_description' => $this->input->post('short_description'),
                'quote'             => $this->input->post('quote'),
                'description'       => $this->input->post('description'),
                'feature_title'     => $this->input->post('feature_title'),
                'sub_description'   => $this->input->post('sub_description'),
            ];

            if($id === 0) $post['image'] = json_encode([
                'main' => '', 'desription' => '',
                'images' => ['img1' => '', 'img2' => '', 'img3' => '', 'img4' => '', 'img5' => '']
            ]);

            $this->load->model('products_model');

            $uid = $this->products_model->add_update($post, d_id($id));
            
            $uid = ($id === 0) ? $this->main->add($post, $this->table) : $this->main->update(['id' => d_id($id)], $post, $this->table);

            $msg = ($id === 0) ? 'added' : 'updated';

            flashMsg($uid, "$this->title $msg.", "$this->title not $msg. Try again.", $this->redirect);
        }
	}

    public function images($id)
	{
        $prod = $this->main->get($this->table, 't_title, image', ['id' => d_id($id)]);

        if($prod){
            $prod['image'] = json_decode($prod['image']);
            $data['data'] = $prod;
            $data['title'] = $this->title;
            $data['name'] = $this->name;
            $data['operation'] = "Upload images";
            $data['url'] = $this->redirect;
            
            $this->form_validation->set_rules('image', 'Image name', 'required', ['required' => '%s is required.']);

            if ($this->form_validation->run() === FALSE)
                return $this->template->load('template', "$this->redirect/images", $data);
            else{
                $image = $this->uploadImage('image');
                if($image['error']) flashMsg(0, "", $image['message'], "$this->redirect/images/$id");
                
                $imgs = (array) $prod['image'];

                switch ($this->input->post('image')) {
                    case 'main':
                    case 'desription':
                        $unlink = $imgs[$this->input->post('image')];
                        $imgs[$this->input->post('image')] = $image['message'];

                        break;

                    default:
                        $imgs['images'] = (array) $imgs['images'];
                        $unlink = $imgs['images'][$this->input->post('image')];
                        $imgs['images'][$this->input->post('image')] = $image['message'];

                        break;
                }
                
                $uid = $this->main->update(['id' => d_id($id)], ['image' => json_encode($imgs)], $this->table);
                
                if($uid && is_file($this->path.$unlink)) unlink($this->path.$unlink);

                if(!$uid && is_file($this->path.$image['message'])) unlink($this->path.$image['message']);

                flashMsg($uid, "$this->title updated.", "$this->title not updated. Try again.", "$this->redirect/images/$id");
            }
        }else
            return $this->error_404();
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
            'field' => 't_title',
            'label' => 'Title',
            'rules' => 'required|max_length[150]|alpha_numeric_spaces|trim',
            'errors' => [
                'required' => "%s is required",
                'alpha_numeric_spaces' => "%s is invalid",
                'max_length' => "Max 150 chars allowed",
            ],
        ],
        [
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'required|max_length[150]|alpha_dash|trim|callback_slug_check',
            'errors' => [
                'required' => "%s is required",
                'alpha_dash' => "Only characters are allowed.",
                'max_length' => "Max 150 chars allowed",
            ],
        ],
        [
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required|max_length[6]|is_natural|trim',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
                'max_length' => "Max 6 chars allowed",
            ],
        ],
        [
            'field' => 'quantity',
            'label' => 'Quantity',
            'rules' => 'required|max_length[6]|is_natural|trim',
            'errors' => [
                'required' => "%s is required",
                'is_natural' => "%s is invalid",
                'max_length' => "Max 6 chars allowed",
            ],
        ],
        [
            'field' => 't_sub_title',
            'label' => 'Sub Title',
            'rules' => 'required|max_length[150]|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 150 chars allowed",
            ],
        ],
        [
            'field' => 'short_description',
            'label' => 'Short description',
            'rules' => 'required|max_length[300]|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 300 chars allowed",
            ],
        ],
        [
            'field' => 'packing',
            'label' => 'Packing',
            'rules' => 'required|max_length[10]|alpha_numeric_spaces|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 10 chars allowed",
                'alpha_numeric_spaces' => "%s is invalid",
            ],
        ],
        [
            'field' => 'quote',
            'label' => 'Quote',
            'rules' => 'required|max_length[500]|trim',
            'errors' => [
                'required' => "%s is required",
                'max_length' => "Max 500 chars allowed",
            ],
        ],
        [
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required|trim',
            'errors' => [
                'required' => "%s is required",
            ],
        ]
    ];
}