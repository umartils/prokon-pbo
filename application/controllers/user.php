<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// model
		$this->load->model('M_User');
		date_default_timezone_set('Asia/Jakarta');
	}
	public function usercard()
	{
		// $this->load->model('Model_user');
		$data['title'] = 'User Card';
		$data['user_card'] = $this->M_User->get_user_card();
		$rfid['rfid'] = $this->input->post('rfid');
		// Load views with data
		$this->load->view('template/header.php', $data);
		$this->load->view('template/navbar.php', $data);
		$this->load->view('user/usercard.php', $data, $rfid);
		$this->load->view('template/footer.php');
	}
	public function addCard(){
		$status = htmlspecialchars($this->input->post('status'));
		$rfid = $this->input->post('rfid');
		if ($status == 'on') {
			$status = 1;
		}else {
			$status = 0;
		}
		$data = array(
			'id_rfid' 		=> htmlspecialchars($rfid),
			'nama' 			=> htmlspecialchars($this->input->post('nama')),
			'identitas' 	=> htmlspecialchars($this->input->post('identitas')),
			'status' 		=> $status,
			'create_date' 	=> date('Y-m-d H:i:s'),
		);
		// var_dump($data);
		// die;
		$this->M_User->add_Card($data,$rfid);
		redirect('user/usercard');
	}

	public function editCard(){
		$id = htmlspecialchars($this->input->post('id'));
		$status = htmlspecialchars($this->input->post('status'));

		if ($status == 'on') {
			$status = 1;
		}else {
			$status = 0;
		}

		$data = array(
			'id_rfid' => htmlspecialchars($this->input->post('id_rfid')),
			'nama' => htmlspecialchars($this->input->post('nama')),
			'identitas' => htmlspecialchars($this->input->post('identitas')),
			// 'edit_by' => htmlspecialchars($this->input->post('edit_by')),
			'status' => $status,
			'edit_date' => date('Y-m-d H:i:s'),
		);
		
		$this->M_User->edit_Card($id, $data);
		redirect('user/usercard');
	}

	public function deleteCard(){
		$id = $this->input->get('id');
		$this->M_User->delete_card($id);
		redirect('user/usercard');
	}
}
