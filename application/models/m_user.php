<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    public function get_user_card() { 
        // $this->db->select('*')->from('user_card');
        $query = $this->db->get('user_card');
        return $query->result_array();
    }
    public function add_card($data, $rfid) {
        $this->db->set($data);
        $this->db->insert('user_card');
        $this->db->set('rfid_id', $rfid);
        $this->db->insert('user_card');
    }
    public function edit_card($id, $data) {
        $this->db->where('id_rfid', $id);
        $this->db->update('user_card', $data);
    }
    public function delete_card($id) { 
        $this->db->where('id', $id);
        $this->db->delete('user_card');
    }
}


