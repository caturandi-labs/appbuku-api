<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Kategori extends CI_Controller {

	public function index(){
		$data = $this->Kategori_model->get_categories();
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT));
	}

	public function find($id)
	{
		$kategori = $this->Kategori_model->find_by_id($id);

		if($kategori){
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($kategori, JSON_PRETTY_PRINT));
		}else{
			$data = ['message' => 'Data kategori tidak ada', 'status' => false];
			$this->output->set_content_type('application/json')->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}	
	}

	public function add()
	{
		$data = $this->input->post();
		$result = $this->Kategori_model->add_category($data);

		if($result != true){
			$data = ['message' => 'Data Kategori gagal disimpan', 'status' => false]; 
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
		$result = $this->Kategori_model->update($id,$request);

		if($result != true){
			$data = ['message' => 'Data Kategori gagal disimpan', 'status' => false]; 
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
		$result = $this->Kategori_model->delete($id);
		if($result != true){
			$data = ['message' => 'Data Kategori gagal dihapus', 'status' => false];
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}else{
			$data = ['message' => 'Data kategori berhasil dihapus'];
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data, JSON_PRETTY_PRINT));
		}
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */