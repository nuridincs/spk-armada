<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kriteria_model extends CI_Model {

        public function __construct()
        {
             parent::__construct();
        }

        public function getData($table)
        {
    		$this->db->select('*');
			$this->db->from($table);

			$data = $this->db->get();

			return $data->result();
        }

	}