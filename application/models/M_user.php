<?php
class M_user extends CI_Model{
    
    function validate($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('users', 1);
        return $result;
    }
 
    function get_all() {
        $query = $this->db->get('users');
        return $query->result();
    }

    function get_users() {
        $query = $this->db->get_where('users', array('role' => 'user'));
        return $query->result();
    }

    function get_admins() {
        $query = $this->db->get_where('users', array('role' => 'admin'));
        return $query->result();
    }

    function get_by_id($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    function get_last_row_id() {
        return $this->db->insert_id();
    }

    function insert() {    
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address'=> $this->input->post('address'),
            'password' => md5($this->input->post('password')),
            'role' => $this->input->post('role'),
            // 'photo' => $this->input->post('photo')
        );
        if (!isset($data['role'])) 
            $data['role'] = 'user';
        return $this->db->insert('users', $data);
    }


    public function update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address'=> $this->input->post('address'),
            'photo' => $this->input->post('photo')
        );
        
        if($id==0){
            return $this->db->insert('users', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }        
    }

    function delete($id) {
        return $this->db->delete('users', array('id' => $id));
    }
}