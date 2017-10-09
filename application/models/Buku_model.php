<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	var $table = 'buku';

	public function get_books(){
		return $this->db->from('buku')
			->join('kategori', 'buku.id_kategori = kategori.id_kategori', 'left')
			->get()
			->result_array();
	}


	function add_book($data){
		return $this->db->insert($this->table, $data);
	}


	public function find_by_id($id){
		return $this->db->from($this->table)
				->where('id', $id)
				->get()
				->row();
	}

	public function update($id,$data){
		return $this->db->where('id', $id)
			->update($this->table, $data);
	}

	public function delete($id){
		return $this->db->where('id', $id)
					->delete($this->table);
	}


}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */