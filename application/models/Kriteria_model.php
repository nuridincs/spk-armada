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

        public function getDtlKriteria()
        {
            $query = "select *, nilai_kriteria.id as id_kriteria, armada.id as id_armada
                    from armada
                    inner join nilai_kriteria on nilai_kriteria.id_armada = armada.id";
            $result = $query->result();
            return $result;
        }

	}