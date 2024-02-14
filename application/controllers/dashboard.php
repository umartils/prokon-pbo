<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('template/header.php', $data);
        $this->load->view('template/navbar.php', $data);
        $this->load->view('dashboard/index.php', $data);
        $this->load->view('template/footer.php');
    }
}
