<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_monitoring extends CI_Model
{
    public function get_all_monitoring() { 
        $this->db->select('*');
        $this->db->from('monitoring');
        $this->db->join('ruangan', 'ruangan_id = id_ruangan');
        $this->db->join('user_card', 'rfid_id = id_rfid');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_ruangan() { 
        $query = $this->db->get('ruangan');
        return $query->result_array();
    }

    public function add_ruangan($ruangan) {
        $this->db->set($ruangan);
        $this->db->insert('ruangan');
    }
    
    public function edit_ruangan($id, $data) {
        $this->db->where('id_ruangan', $id);
        $this->db->update('ruangan', $data);
    }
    public function delete_ruangan($id) { 
        $this->db->where('id_ruangan', $id);
        $this->db->delete('ruangan');
    }
    public function isDuplicateRuangan($id_ruangan, $nama_ruangan) {
        $this->db->where('id_ruangan !=', $id_ruangan);
        $this->db->where('nama_ruangan', $nama_ruangan);
        $query = $this->db->get('ruangan');
    
        return $query->num_rows() > 0;
    }
    
}

/* End of file ModelName.php */
