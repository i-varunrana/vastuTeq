<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('dashboard');
	}

	public function propertyInfo()
	{
		$data['clients'] = $this->MainModel->selectAllFromTableOrderBy('clientdetails', 'name', 'ASC');
		$data['category'] = $this->MainModel->selectAllFromTableOrderBy('property_category', 'category', 'ASC');

		$this->load->view('propertyInfo', $data);
	}

	public function getType()
	{
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$data = $this->MainModel->selectAllFromTableOrderBy('property_type', 'type', 'ASC', array('categoryId' => $_POST['id']));
			echo json_encode($data);
		} else {
			echo (json_encode(array('error' => 'No data found contact to IT')));
		}
	}

	public function addClient()
	{

		$validate = $this->MainModel->selectAllFromWhere("clientdetails", array("email" => $_POST['cEmail']));

		if ($validate) {
			$this->session->set_flashdata("error", "Client Already Exist");
			redirect(base_url('Main/propertyInfo'));
		} else {
			$insertData = array(
				'name'	=> validateInput($_POST['cName']),
				'mobileNo' => validateInput($_POST['mNumber']),
				'email'	=> validateInput($_POST['cEmail']),
				'address' => validateInput($_POST['cAddress']),
			);
			$insertData['cId'] =   $this->MainModel->getNewIDorNo("C-", 'clientdetails');
			$result = $this->MainModel->insertInto('clientdetails', $insertData);
			if ($result) {
				$this->session->set_flashdata("success", "Client successfully added");
				redirect(base_url('Main/propertyInfo'));
			} else {
				$this->session->set_flashdata("error", "Something went wrong contact to IT");
				redirect(base_url('Main/propertyInfo'));
			}
			// redirect(base_url('Main/propertyInfo'));
		}
	}

	public function addProperty(){
		if(!empty($_POST['client']) && !empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['type']) && !empty($_POST['address']))
		{
		$insertData = array(
			'clientId'	=> validateInput($_POST['client']),
			'name' => validateInput($_POST['name']),
			'category'	=> validateInput($_POST['category']),
			'type' => validateInput($_POST['type']),
			'address' => validateInput($_POST['address']),
		);
		
		$result = $this->MainModel->insertInto('propertydetails', $insertData);
		if ($result) {
			$this->session->set_flashdata("success", "Client successfully added");
			redirect(base_url('Main/draw'));
		} else {
			$this->session->set_flashdata("error", "Something went wrong contact to IT");
			redirect(base_url('Main/propertyInfo'));
		}
	}else{
		$this->session->set_flashdata("error", "All fields are required");
			redirect(base_url('Main/propertyInfo'));
	}
	}

	public function draw(){

		$this->load->view('draw');
	}

	public function devtas(){

		$this->load->view('devtas');
	}

	public function ayadhi(){
		
		$this->load->view('ayadi');
	}

	public function logout()
	{

		//	$this->session->sess_destroy();
		$this->session->unset_userdata('userInfo');
		redirect(base_url("Login"));
	}
}
