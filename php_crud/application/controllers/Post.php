<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Post Controller
 */
class Post extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');
		$this->load->library('session');
		
	}

	 function index()
	{
		$data['data'] = $this->crud->get_records(' employeepeninc1');
		$this->load->view('post/list', $data);
		//    pagination settings
		   $config['base_url'] = site_url('pagination/index');
		   $config['total_rows'] = $this->db->count_all(' employeepeninc1');
		   $config['per_page'] = "3";
		   $config["uri_segment"] = 3;
		   $choice = $config["total_rows"]/$config["per_page"];
		   $config["num_links"] = floor($choice);
   
		   // integrate bootstrap pagination
		   $config['full_tag_open'] = '<ul class="pagination">';
		   $config['full_tag_close'] = '</ul>';
		   $config['first_link'] = false;
		   $config['last_link'] = false;
		   $config['first_tag_open'] = '<li>';
		   $config['first_tag_close'] = '</li>';
		   $config['prev_link'] = '«';
		   $config['prev_tag_open'] = '<li class="prev">';
		   $config['prev_tag_close'] = '</li>';
		   $config['next_link'] = '»';
		   $config['next_tag_open'] = '<li>';
		   $config['next_tag_close'] = '</li>';
		   $config['last_tag_open'] = '<li>';
		   $config['last_tag_close'] = '</li>';
		   $config['cur_tag_open'] = '<li class="active"><a href="#">';
		   $config['cur_tag_close'] = '</a></li>';
		   $config['num_tag_open'] = '<li>';
		   $config['num_tag_close'] = '</li>';
		   $this->pagination->initialize($config);
   
		   $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		   
		   // get books list
		   $data['data'] = $this->crud->get_pen($config["per_page"], $data['page'], NULL);
		   
		   $data['pagination'] = $this->pagination->create_links();
		   
		   // load view
		//    $this->load->view('post/list',$data);
	   }
	//    function search()
	//    {
	// 	   // get search string
	// 	   $search = ($this->input->post("id"))? $this->input->post("id") : "NIL";
   
	// 	   $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
   
	// 	   // pagination settings
	// 	   $config = array();
	// 	   $config['base_url'] = site_url("post/search/$search");
	// 	   $config['total_rows'] = $this->crud->get_tyre_count($search);
	// 	   $config['per_page'] = "5";
	// 	   $config["uri_segment"] = 4;
	// 	   $choice = $config["total_rows"]/$config["per_page"];
	// 	   $config["num_links"] = floor($choice);
   
	// 	   // integrate bootstrap pagination
	// 	   $config['full_tag_open'] = '<ul class="pagination">';
	// 	   $config['full_tag_close'] = '</ul>';
	// 	   $config['first_link'] = false;
	// 	   $config['last_link'] = false;
	// 	   $config['first_tag_open'] = '<li>';
	// 	   $config['first_tag_close'] = '</li>';
	// 	   $config['prev_link'] = 'Prev';
	// 	   $config['prev_tag_open'] = '<li class="prev">';
	// 	   $config['prev_tag_close'] = '</li>';
	// 	   $config['next_link'] = 'Next';
	// 	   $config['next_tag_open'] = '<li>';
	// 	   $config['next_tag_close'] = '</li>';
	// 	   $config['last_tag_open'] = '<li>';
	// 	   $config['last_tag_close'] = '</li>';
	// 	   $config['cur_tag_open'] = '<li class="active"><a href="#">';
	// 	   $config['cur_tag_close'] = '</a></li>';
	// 	   $config['num_tag_open'] = '<li>';
	// 	   $config['num_tag_close'] = '</li>';
	// 	   $this->pagination->initialize($config);
   
	// 	   $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	// 	   // get books list
	// 	   $data['data'] = $this->crud->get_tyre($config['per_page'], $data['page'], $search);
   
	// 	   $data['pagination'] = $this->pagination->create_links();
   
	// 	   //load view
	// 	   $this->load->view('post/list',$data);
	//    }


	public function create()
	{
		$this->load->view('post/create');
	}


	public function store()
	{  
		
		// $data['PenInc_No'] = $this->input->post('PenInc_No');
		$data['EId'] = $this->input->post('EId');
		$data['PenIncDate'] = $this->input->post('PenIncDate');
		$data['Penyear'] = $this->input->post('Penyear');
		$data['Penmonth'] = $this->input->post('Penmonth');
		$data['Type'] = $this->input->post('Type');
		$data['Amount'] = $this->input->post('Amount');
		$data['Reason'] = $this->input->post('Reason');
		$data['ReportingPerson'] = $this->input->post('ReportingPerson');
		$data['Remark'] = $this->input->post('Remark');
		$data['ApproveAmount'] = $this->input->post('ApproveAmount');
		$data['EmpStatus'] = $this->input->post('EmpStatus');
		// print_r($data);
		// exit();
		

		$this->crud->insert('employeepeninc1', $data);
		//return redirect()->to(base_url())->with('message','add');
	
		$this->session->set_flashdata('message','<h5>Penalty has been added successfully <span>&#128077;</span></h5>');
		redirect(base_url());
		// $this->load->view('post/list');
		
	}

	public function edit($PenInc_No)
	{
		$data['data'] = $this->crud->find_record_by_id(' employeepeninc1', $PenInc_No);
		$this->load->view('post/edit', $data);
	}

	public function update($PenInc_No)
	{
		

		// if ($this->crud->is_peninc_exists($PenInc_No)) {
        //     // PenInc record already exists, display alert message
        //     echo json_encode(['status' => 'error', 'message' => 'PenInc record already exists']);
        //     return;
        // }else
		// {
		$data['EId'] = $this->input->post('EId');
		$data['PenIncDate'] = $this->input->post('PenIncDate');
		$data['Penyear'] = $this->input->post('Penyear');
		$data['Penmonth'] = $this->input->post('Penmonth');
		$data['Type'] = $this->input->post('Type');
		$data['Amount'] = $this->input->post('Amount');
		$data['Reason'] = $this->input->post('Reason');
		$data['ReportingPerson'] = $this->input->post('ReportingPerson');
		$data['Remark'] = $this->input->post('Remark');
		$data['ApproveAmount'] = $this->input->post('ApproveAmount');
		$data['EmpStatus'] = $this->input->post('EmpStatus');

		$this->crud->update('employeepeninc1', $data, $PenInc_No);
		//return redirect()->to(base_url())->with('message','add');
		
	
		$this->session->set_flashdata('message', '<h5>Penalty has been updated successfully <span>&#128077;</span></h5>');
		redirect(base_url());
	 }

	public function delete($PenInc_No)
	{
		$result = $this->crud->soft_delete($PenInc_No);
		if ($result >=0)
		{
			$this->session->set_flashdata('message', '<h5>Penalty has been deleted successfully <span>&#128077;</span></h5>');
			redirect(base_url());
		}
		else{
			$this->load->view('post/list', $result);
		
		//$this->crud->delete('employeepeninc1',$PenInc_No);
		
		
		}
	}

	public function search()
	{
		$PenInc = $this->input->post('PenInc');  

        $data['data'] = $this->crud->search($PenInc);

        $this->load->view('post/list', $data);
		
		// $data['data'] = $this->crud->search_record_by_id(' employeepeninc1', $PenInc_No);
		// $this->load->view('post/list', $data);
	}

	public function searchByEId()
{
        $eid = $this->input->post('eid');  

        $data['data'] = $this->crud->searchByEId($eid);

        $this->load->view('post/list', $data);
		
}

public function autocompleteEId()
{
    $term = $this->input->get('term'); // Get the search term from the client

    $suggestions = $this->Crud->getEIdSuggestions($term);
	$timestamp = $this->your_model->getLatestTimestamp();
	

    // Convert the suggestions to a simple array
    $suggestionsArray = array_column($suggestions, 'EId');

    // In your autocompleteEId method
	$timestamp = $this->Crud->getLatestTimestamp(); // Implement this method in your model
	$response = array(
        'timestamp' => $timestamp,
        'suggestions' => $suggestionsArray
    );

    echo json_encode($response);

}
}

	
	