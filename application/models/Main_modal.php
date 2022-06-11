<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
    public function updateQuantities($data)
    {
        return $this->db->update_batch('products', $data, 'id');
    }
}