<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ASDASDASDASD
class Employee extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('Employee_model');  
  		$this->employee = new Employee_model;
	}

	public function index()
	{
		$data['name'] = "ERROL";
		$data['title'] = "Employee Page";

	/*	$this->load->view('employee/index',$data);*/

		$data['employee'] = $this->employee->getEmployee();

		$this->load->view('employee/index',$data);
	}

	public function create_employee()
	{
		$firstname = $this->input->post('firstname');
		$lastname  = $this->input->post('lastname');

		$data = array("firstname" => $firstname,
					  "lastname" => $lastname);

		$result = $this->employee->createEmployee($data);

		echo json_encode($result);
	}

	public function upload(){

		$filename = $this->input->post('filename');

		move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$filename);
	}
}
