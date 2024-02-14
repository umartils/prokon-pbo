<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('M_monitoring');
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
		$data['title'] = 'Monitoring';
		$data['card_monitoring'] = $this->M_monitoring->get_all_monitoring();

		$this->load->view('template/header.php', $data);
		$this->load->view('template/navbar.php', $data);
		$this->load->view('monitoring/monitoring.php', $data);
		$this->load->view('template/footer.php');
	}
	
	public function editMonitoring(){
		$id = htmlspecialchars($this->input->post('id'));

		$data = array(
			'ruangan_id' => Htmlspecialchars($this->input->post('ruangan_id')),
		);

		$this->M_monitoring->edit_monitoring($id, $data);
		redirect('monitoring/ruangan');
	}

	public function ruangan()
	{
		$data['title'] = 'Ruangan';
		$data['ruang'] = $this->M_monitoring->get_ruangan();

		$this->load->view('template/header.php', $data);
		$this->load->view('template/navbar.php', $data);
		$this->load->view('monitoring/ruangan.php', $data);
		$this->load->view('template/footer.php');
	}

	public function addRuangan(){
		$data = array(
			'id_ruangan' => htmlspecialchars($this->input->post('id_ruangan')),
			'nama_ruangan' => htmlspecialchars($this->input->post('nama_ruangan')),
		);
		
		$this->M_monitoring->add_ruangan($data);
		redirect('monitoring/ruangan');
	}

	public function editRuangan(){
		$id = htmlspecialchars($this->input->post('id'));

		$data = array(
			'id_ruangan' => Htmlspecialchars($this->input->post('id_ruangan')),
			'nama_ruangan' => htmlspecialchars($this->input->post('nama_ruangan')),
		);

		$this->M_monitoring->edit_ruangan($id, $data);
		redirect('monitoring/ruangan');
	}

	public function deleteRuangan(){
		$id_ruangan = $this->input->get('id_ruangan');
		$this->M_monitoring->delete_ruangan($id_ruangan);
		redirect('monitoring/ruangan');
	}

	public function getStatus() {
		$this->load->database(); 
		$rfid = $this->input->get('rfid');
		$relayStatus = $this->getStatusFromDatabase($rfid);
		// var_dump($rfid);
		// var_dump($relayStatus);	
		// die;
		echo $relayStatus; 
	}
	
    private function getStatusFromDatabase($rfid)
    {
        $query = $this->db->query("SELECT * FROM user_card WHERE id_rfid = '$rfid'");
        if ($query->num_rows() > 0) {
            $status = $query->row()->status;
            $id = $query->row()->id_rfid;
			
			if ($status == 1) {
				$this->db->set('date_request', date('Y-m-d'));
				$this->db->set('time_request', date('H:i:s'));
				$this->db->where('rfid_id', $id);
				$this->db->update('monitoring');
				return "1";
			} else {
				return "0";
			}
    	}else{
			return "0";
		}
	}
}