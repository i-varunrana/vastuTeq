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
			echo json_encode(array("error", "Client Already Exist"));
			
		} else {
			$insertData = array(
				'userId' => $_SESSION['userInfo']['userId'],
				'name'	=> validateInput($_POST['cName']),
				'mobileNo' => validateInput($_POST['mNumber']),
				'email'	=> validateInput($_POST['cEmail']),
				'address' => validateInput($_POST['cAddress']),
			);
			$insertData['cId'] =   $this->MainModel->getNewIDorNo("C-", 'clientdetails');
			$result = $this->MainModel->insertInto('clientdetails', $insertData);
			if ($result) {
				echo json_encode(array("success", "Client successfully added",$insertData['cId'],$_POST['cName']));
				// $this->session->set_flashdata("success", "Client successfully added");
				// redirect(base_url('Main/propertyInfo'));
			} else {
				echo json_encode(array("error", "Something went wrong contact to IT"));
				// $this->session->set_flashdata("error", "Something went wrong contact to IT");
				// redirect(base_url('Main/propertyInfo'));
			}
			
		}
	}

	public function addProperty()
	{
		if (!empty($_POST['client']) && !empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['type']) && !empty($_POST['address'])) {
			$insertData = array(
				'userId' => $_SESSION['userInfo']['userId'],
				'clientId'	=> validateInput($_POST['client']),
				'name' => validateInput($_POST['name']),
				'category'	=> validateInput($_POST['category']),
				'type' => validateInput($_POST['type']),
				'address' => validateInput($_POST['address']),
			);
			$insertData['propertyId'] =   $this->MainModel->getNewIDorNo("P-", 'clientdetails');
			$result = $this->MainModel->insertInto('propertydetails', $insertData);
			if ($result) {
				$this->session->set_flashdata("success", "Client successfully added");
				redirect(base_url('Main/draw/'). base64_encode($insertData['propertyId']));
			} else {
				$this->session->set_flashdata("error", "Something went wrong contact to IT");
				redirect(base_url('Main/propertyInfo'));
			}
		} else {
			$this->session->set_flashdata("error", "All fields are required");
			redirect(base_url('Main/propertyInfo'));
		}
	}

	public function draw()
	{
		// $data['propertId'] = base64_decode($id);
		// print_r($data);die;
		$this->load->view('draw');
	}

	public function devtas()
	{

		$this->load->view('devtas');
	}

	public function ayadhi()
	{

		$this->load->view('ayadi');
	}

	public function admin()
	{

		$this->load->view('admin');
	}

	public function addUser()
	{
		$validate = $this->MainModel->selectAllFromWhere("login", array("email" => $_POST['email']));

		if ($validate) {
			$this->session->set_flashdata("error", "Client Already Exist");
			redirect(base_url('Main/admin'));
		} else {
			$insertData = array(
				'password' => validateInput($_POST['password']),
				'isAdmin' => 0,
				'name'	=> validateInput($_POST['name']),
				'mobileNo' => validateInput($_POST['mNumber']),
				'email'	=> validateInput($_POST['email']),
				'address' => validateInput($_POST['address']),
			);
			$insertData['userId'] =   $this->MainModel->getNewIDorNo("usr-", 'login');
			$result = $this->MainModel->insertInto('login', $insertData);
			if ($result) {
				$this->session->set_flashdata("success", "Client successfully added");
				redirect(base_url('Main/admin'));
			} else {
				$this->session->set_flashdata("error", "Something went wrong contact to IT");
				redirect(base_url('Main/admin'));
			}
			
		}
	}

	public function addhouseMaps(){
		if(isset($_POST) && !empty($_POST)){
			$insertData = array(
				'mapId'	=> validateInput($_POST['id']),
				'propertId'	=> validateInput($_POST['propertyId']),
				'centroid' => validateInput($_POST['centroid']),
				'complete' => validateInput($_POST['complete']),	
				'customBoundariesCoords' => validateInput($_POST['customBoundariesCoords']),
				'dimenision' => validateInput($_POST['dimension']),
				'faceCoords' => validateInput($_POST['faceCoords']),	
				'imageData' => validateInput($_POST['imageData']),
				'stage' => validateInput($_POST['stage']),
				'type' => validateInput($_POST['type']),
				'vedicBoundariesCoords' => validateInput($_POST['vedicBoundariesCoords']),				
			);
			
			$result = $this->MainModel->insertInto('housemaps', $insertData);
			if ($result) {
				echo json_encode(array("success","Details Saved"));
			} else {
				echo json_encode(array("error", "Details are not saved contact to IT"));
			}

		}else{
			echo json_encode(array("error", "Something went wrong contact to IT"));
		}
	}


	public function updatehouseMaps(){
		if(isset($_POST) && !empty($_POST)){
			$insertData = array(								
				'centroid' => validateInput($_POST['centroid']),
				'complete' => validateInput($_POST['complete']),	
				'customBoundariesCoords' => validateInput($_POST['customBoundariesCoords']),
				'dimenision' => validateInput($_POST['dimension']),
				'faceCoords' => validateInput($_POST['faceCoords']),	
				'imageData' => validateInput($_POST['imageData']),
				'stage' => validateInput($_POST['stage']),
				'type' => validateInput($_POST['type']),
				'vedicBoundariesCoords' => validateInput($_POST['vedicBoundariesCoords']),				
			);
			
			$result = $this->MainModel->updateWhere('housemaps',$insertData,array('mapId'	=> validateInput($_POST['id'])));
			if ($result) {
				echo json_encode(array("success","Details Saved"));
			} else {
				echo json_encode(array("error", "Details are not saved contact to IT"));
			}

		}else{
			echo json_encode(array("error", "Something went wrong contact to IT"));
		}
	}

	public function logout()
	{

		//	$this->session->sess_destroy();
		$this->session->unset_userdata('userInfo');
		redirect(base_url("Login"));
	}
}
