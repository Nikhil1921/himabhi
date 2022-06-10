<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Ingredient_model extends MY_Model
{
	public $table = "ingredients i";
	public $select_column = ['i.id', 'i.i_title', 'i.image'];
	public $search_column = ['i.i_title'];
    public $order_column = [null, 'i.i_title', null, null];
	public $order = ['i.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('i.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('i.id')
		         ->from($this->table)
				 ->where('i.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}
}