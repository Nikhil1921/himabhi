<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Order_model extends MY_Model
{
	public $table = "orders o";
	public $select_column = ['o.id', 'CONCAT(o.f_name, " ", o.l_name) AS name', 'o.mobile', 'o.address', 'o.notes', 'o.payment_type', 'o.payment_id', 'o.total_price', 'o.status'];
	public $search_column = ['o.f_name', 'o.l_name', 'o.mobile', 'o.address', 'o.notes', 'o.payment_type', 'o.payment_id', 'o.total_price', 'o.status'];
    public $order_column = [null, 'o.f_name', 'o.mobile', 'o.address', 'o.notes', 'o.payment_type', 'o.payment_id', 'o.total_price', 'o.status', null];
	public $order = ['o.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('o.id')
		         ->from($this->table);
		            	
		return $this->db->get()->num_rows();
	}
}