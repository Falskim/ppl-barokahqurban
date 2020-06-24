<?php
class M_livestock extends CI_Model{
 
    function get_all() {
        $query = $this->db->get('livestocks');
        return $query->result();
    }

    // function get_livestocks() {
    //     $query = $this->db->get_where('livestocks', array('role' => 'user'));
    //     return $query->result();
    // }

    // function get_admins() {
    //     $query = $this->db->get_where('livestocks', array('role' => 'admin'));
    //     return $query->result();
    // }

    function get_by_id($id) {
        $query = $this->db->get_where('livestocks', array('id' => $id));
        return $query->row();
    }

    function get_last_row_id() {
        return $this->db->insert_id();
    }

    function insert() {    
        $data = array(
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'available'=> $this->input->post('available'),
            'image' => md5($this->input->post('image')),
        );
        return $this->db->insert('livestocks', $data);
    }


    public function update($id) {
        $data = array(
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
            'available'=> $this->input->post('available'),
            'image' => md5($this->input->post('image')),
        );
        
        if($id==0){
            return $this->db->insert('livestocks', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('livestocks', $data);
        }        
    }

    function delete($id) {
        return $this->db->delete('livestocks', array('id' => $id));
    }
}