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
			$data["kriteria_harga_beli"] = $this->Kriteria_model->getData('kriteria_harga_beli');
			$data["kriteria_pajak_tahunan"] = $this->Kriteria_model->getData('kriteria_pajak_tahunan');
			$data["kriteria_biaya_perawatan"] = $this->Kriteria_model->getData('kriteria_biaya_perawatan');
			$data["kriteria_banyak_sewa"] = $this->Kriteria_model->getData('kriteria_banyak_sewa');
			$data["kriteria_harga_sewa"] = $this->Kriteria_model->getData('kriteria_harga_sewa');
			$data["kriteria_tonase"] = $this->Kriteria_model->getData('kriteria_tonase');
			$data["kriteria_harga_jual"] = $this->Kriteria_model->getData('kriteria_harga_jual');
			$data["nilai_kriteria"] = $this->Kriteria_model->getData('nilai_kriteria');
			$this->load->view('header');
			$this->load->view('nilai', $data);
			$this->load->view('footer');
		} 
	}

	public function add() {
		$data_harga_beli = $this->input->post('kriteria_harga_beli');
		$explode = explode("~", $data_harga_beli);
		$harga_beli = $explode[1];
		$kriteria_harga_beli = $explode[0];

		$dataArmada = Array(
			'type_armada' => $this->input->post('type_armada'),
			'harga_beli' => $harga_beli,
			'biaya_pajak_tahunan' => $this->input->post('pajak_tahunan'),
			'biaya_perawatan' => $this->input->post('biaya_perawatan'),
			'banyak_sewa' => $this->input->post('banyak_sewa'),
			'harga_sewa' => $this->input->post('harga_sewa'),
			'tonase' => $this->input->post('tonase'),
			'harga_jual' => $this->input->post('harga_jual'),
		);

		$this->db->insert('armada', $dataArmada);
		$id_armada = $this->db->insert_id();

		$dataNilai = Array(
			'id_armada' => $id_armada,
			'c1' => $kriteria_harga_beli,
			'c2' => $this->input->post('kriteria_pajak_tahunan'),
			'c3' => $this->input->post('kriteria_biaya_perawatan'),
			'c4' => $this->input->post('kriteria_banyak_sewa'),
			'c5' => $this->input->post('kriteria_harga_sewa'),
			'c6' => $this->input->post('kriteria_tonase'),
			'c7' => $this->input->post('kriteria_harga_jual'),
		);

		$this->db->insert('nilai_kriteria', $dataNilai);
	}

	public function getDtlData() {
		$id = $this->input->post('id');

		$result = array(
			'armada' => $this->Kriteria_model->getDtlData('armada', $id),
			'nilai_kriteria' => $this->Kriteria_model->getDtlData('nilai_kriteria', $id)
		);

		echo json_encode($result);
	}
}
