<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	var $table = 'kategori';

	public function get_categories(){
		return $this->db->get($this->table)->result();
	}	

	public function add_category($data){
		return $this->db->insert($this->table, $data);
	}

	public function find_by_id($id){
		return $this->db->from($this->table)
				->where('id_kategori', $id)
				->get()
				->row();
	}

	public function update($id,$data){
		return $this->db->where('id_kategori', $id)
			->update($this->table, $data);
	}

	public function delete($id){
		return $this->db->where('id_kategori', $id)
					->delete($this->table);
	}
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */