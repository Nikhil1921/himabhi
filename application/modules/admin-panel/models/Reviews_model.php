<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Reviews_model extends MY_Model
{
	public $table = "reviews r";
	public $select_column = ['r.id', 'p.t_title', 'r.r_name', 'DATE_FORMAT(created_at, "%d-%m-%Y") AS created_at'];
	public $search_column = ['p.t_title', 'r.r_name', 'r.created_at'];
    public $order_column = [null, 'p.t_title', 'r.r_name', 'r.created_at', null];
	public $order = ['r.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('r.is_deleted', 0)
				 ->join('products p', 'p.id = r.p_id');

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('r.id')
		         ->from($this->table)
				 ->where('r.is_deleted', 0)
				 ->join('products p', 'p.id = r.p_id');
		            	
		return $this->db->get()->num_rows();
	}
}