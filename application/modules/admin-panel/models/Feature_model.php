<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Feature_model extends MY_Model
{
	public $table = "features f";
	public $select_column = ['f.id', 'f.f_title', 'f.f_for', 'f.image'];
	public $search_column = ['f.f_title', 'f.f_for'];
    public $order_column = [null, 'f.f_title', 'f.f_for', null, null];
	public $order = ['f.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('f.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('f.id')
		         ->from($this->table)
				 ->where('f.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}