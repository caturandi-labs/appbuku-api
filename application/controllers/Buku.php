<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Buku extends CI_Controller {

	public function index(){
		$books = $this->Buku_model->get_books();
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_status_header('200')
			->set_output(json_encode($books, JSON_PRETTY_PRINT));
	}

	public function find($id){
		$book = $this->Buku_model->find_by_id($id);
		if(!$book){
			$this->output->set_content_type('application/json')
			->set_output(json_encode(["message" => "Buku yang Anda cari tidak ada", "status" => false]));
		}else{
			$this->output->set_content_type('application/json','utf-8')
				->set_status_header('200')
				->set_output(json_encode($book, JSON_PRETTY_PRINT));	
		}
	}

	public function add()
	{
		$data = $this->input->post();
		$result = $this->Buku_model->add_book($data);

		if($result != true){
			$data = ['message' => 'Data Buku gagal disimpan','status' => false]; 
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));

		}else{
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}
	}

	public function update($id){
		$request = $this->input->post();
		$result = $this->Buku_model->update($id,$request);

		if($result != true){
			$data = ['message' => 'Data Buku gagal disimpan', 'status' => false]; 
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}else{
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($request, JSON_PRETTY_PRINT));
		}
	}

	public function delete($id){		
		$result = $this->Buku_model->delete($id);
		if($result != true){
			$data = ['message' => 'Data Buku Gagal Dihapus', 'status' => false];
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}else{
			$data = ['message' => 'Data Buku berhasil dihapus'];
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */