<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	public function index()
	{ 
		if ($this->Admin_model->verifyUser()) {
			$this->load->view('header');
			$this->load->view('dashboard');
			$this->load->view('footer');
		} 
	}

	public function welcome()
	{ 
		if ($this->Admin_model->verifyUser()) {
			$this->load->view('header');
			$this->load->view('welcome_message');
			$this->load->view('footer');
		} 
	}

	public function nilai()
	{ 
		if ($this->Admin_model->verifyUser()) {
			$data["kriteria"] = $this->Kriteria_model->getData('kriteria');
			$data["armada"] = $this->Kriteria_model->getData('armada');
			$data["nilai_kriteria"] = $this->Kriteria_model->getData('nilai_kriteria');
			$this->load->view('header');
			$this->load->view('nilai', $data);
			$this->load->view('footer');
		} 
	}
}
