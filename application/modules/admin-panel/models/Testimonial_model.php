<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Testimonial_model extends MY_Model
{
	public $table = "testimonials t";
	public $select_column = ['t.id', 't.t_name', 't.t_title'];
	public $search_column = ['t.t_name', 't.t_title'];
    public $order_column = [null, 't.t_name', 't.t_title', null];
	public $order = ['t.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('t.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('t.id')
		         ->from($this->table)
				 ->where('t.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}