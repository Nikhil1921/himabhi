<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Products_model extends MY_Model
{
	public $table = "products p";
	public $select_column = ['p.id', 'p.t_title', 'p.price', 'p.quantity'];
	public $search_column = ['p.t_title', 'p.price', 'p.quantity'];
    public $order_column = [null, 'p.t_title', 'p.price', 'p.quantity', null];
	public $order = ['p.id' => 'DESC'];

	public function make_query()
	{
		$this->db->select($this->select_column)
            	 ->from($this->table)
				 ->where('p.is_deleted', 0);

        $this->datatable();
	}

	public function count()
	{
		$this->db->select('p.id')
		         ->from($this->table)
				 ->where('p.is_deleted', 0);
		            	
		return $this->db->get()->num_rows();
	}

	public function add_update($post, $id)
	{
		$this->db->trans_start();

		if($id === 0){
			$this->db->insert('products', $post);
			$id = $this->db->insert_id();
		}else{
			$this->db->update('products', $post, ["id" => $id]);
			$this->db->delete('product_features', ['p_id' => $id]);
			$this->db->delete('product_ingredients', ['p_id' => $id]);
		}

		if($this->input->post('ingredients')){

			$ins = array_map(function($i) use ($id) {
				return ['i_id' => d_id($i), 'p_id' => $id];
			}, $this->input->post('ingredients'));

			$this->db->insert_batch('product_ingredients', $ins);
		}

		if($this->input->post('features')){

			$fets = array_map(function($f) use ($id) {
				return ['f_id' => d_id($f), 'p_id' => $id];
			}, $this->input->post('features'));

			$this->db->insert_batch('product_features', $fets);
		}

		$this->db->trans_complete();

		return $this->db->trans_status();
	}

	public function getFeatures($p_id, $home=null)
	{
		$this->db->select('f.f_title, f.description, CONCAT("'.$this->config->item('features').'", f.image) image')
						->from('product_features pf')
						->where('pf.p_id', $p_id);

		if($home !== null) $this->db->where('f.f_for', $home);
		
		return 	$this->db->join('features f', 'pf.f_id = f.id')->get()->result_array();
	}

	public function getIngredients($p_id)
	{
		return $this->db->select('i.i_title, CONCAT("'.$this->config->item('ingredients').'", i.image) image')
						->from('product_ingredients pi')
						->where('pi.p_id', $p_id)
						->join('ingredients i', 'pi.i_id = i.id')
						->get()->result_array();
	}
}