<?php
class M_donate extends CI_Model
{

    function join_tables()
    {
        $this->db->from('users');
        $this->db->join('donations', 'users.id = donations.user_id');
        $this->db->join('livestocks', 'donations.livestock_id = livestocks.id');
        // $this->db->select('quantity');
    }

    function get_all()
    {
        $this->join_tables();
        $query = $this->db->get();
        return $query->result();
    }

    function get_by_id($id)
    {
        $this->join_tables();
        $this->db->where('donations.donate_id', $id);
        $query = $this->db->get();
        return $query->result()[0];
    }

    function get_user_donates($user)
    {
        $this->join_tables();
        $this->db->where('users.id', $user);
        $query = $this->db->get();
        return $query->result();
    }

    function insert()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'livestock_id' => $this->input->post('livestock_id'),
            'recipient' => $this->input->post('recipient'),
            'quantity' => $this->input->post('quantity'),
            'handled_by_seller' => $this->input->post('handled_by_seller'),
            'deliver_address' => $this->input->post('deliver_address'),
            'description' => $this->input->post('description'),
        );
        return $this->db->insert('donations', $data);
    }

    // public function update($id) {
    //     $data = array(
    //         'user_id' => $this->input->post('user_id'),
    //         'livestock_id' => $this->input->post('livestock_id'),
    //         'quantity' => $this->input->post('quantity'),
    //         'handled_by_seller'=> $this->input->post('handled_by_seller'),
    //         'deliver_address' => $this->input->post('deliver_address'),
    //         'description' => $this->input->post('description'),
    //     );

    //     if($id==0){
    //         return $this->db->insert('orders', $data);
    //     } else {
    //         $this->db->where('order_id', $id);
    //         return $this->db->update('orders', $data);
    //     }        
    // }

    public function mark_finished($id)
    {
        $data = array(
            'finished' => true,
        );

        if ($id == 0) {
            return $this->db->insert('donations', $data);
        } else {
            $this->db->where('donate_id', $id);
            return $this->db->update('donations', $data);
        }
    }

    public function change_state($id, $state) {
        $data = array(
            'status' => $state,
        );
        
        if($id==0){
            return $this->db->insert('donations', $data);
        } else {
            $this->db->where('donate_id', $id);
            return $this->db->update('donations', $data);
        }        
    }

    function delete($id)
    {
        return $this->db->delete('donations', array('donate_id' => $id));
    }
}
