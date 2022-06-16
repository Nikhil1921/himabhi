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

    public function wishlist()
    {
        return $this->db->select('w.p_id, p.t_title, p.slug, p.image, p.price, p.packing')
                        ->where('u_id', $this->session->auth)
                        ->where('p.is_deleted', 0)
                        ->join('products p', 'p.id = w.p_id')
                        ->get('wish_list w')
                        ->result_array();
    }

    public function add_to_wish($p_id)
    {
        $prod = $this->main->get('products', 'id', ['id' => $p_id]);

        if($prod)
        {
            $this->db->trans_start();

            $wish = [
                'u_id' => $this->session->auth,
                'p_id' => $p_id
            ];
            
            $this->db->delete('wish_list', $wish);
            $this->db->insert('wish_list', $wish);

            $this->db->trans_complete();

            return $this->db->trans_status();
        }
        else
            return false;
    }

    public function saveOrder($post)
    {
        $order = [
            'u_id'          => $this->session->auth,
            'f_name'        => $post['f_name'],
            'l_name'        => $post['l_name'],
            'mobile'        => $post['mobile'],
            'email'         => $post['email'],
            'address'       => $post['address'],
            'notes'         => $post['notes'],
            'payment_type'  => $post['payment_type'],
            'created_at'    => time(),
            'update_at'     => time(),
            'total_price'   => $this->cart->total(),
            'payment_id'    => $post['payment_id']
        ];
        
        $this->db->trans_start();

        $this->db->insert('orders', $order);
        $order_id = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $prod = $this->main->get('products', 'id, quantity', ['id' => my_crypt($item['id'], 'd')]);

            $quantities[] = [
                'id'       => $prod['id'],
                'quantity' => $prod['quantity'] - $item['qty']
            ];

            $sub_orders[] = [
                'order_id'  => $order_id,
                'prod_id'   => $prod['id'],
                'quantity'  => $item['qty'],
                'price'     => $item['price'],
                'name'      => $item['name'],
                'slug'      => $item['options']['slug'],
                'image'     => $item['options']['image']
            ];
        }

        $this->db->update_batch('products', $quantities, 'id');
        $this->db->insert_batch('sub_orders', $sub_orders);
        
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) $this->cart->destroy();

        return $this->db->trans_status();
    }
}