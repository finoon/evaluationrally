<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
        $this->load->library('session');
		$this->load->model('user_m');
	}

    public function index(){
		if( ! $this->session->userdata('idUser')){
			$this->load->view('frontoffice/login');
		}else{
		
		redirect('user/acceuil');
		}

	}


	public function acceuil(){
		
		/*if($this->session->userdata('session_user')!=null){
			$id_utilisateur = $this->session->userdata('session_user');
			$data['fortickets'] = $this->Parking->getParkingByUser($id_utilisateur);
			$data['amendes'] = $this->Parking->getAmendesByUser($id_utilisateur);
		}else{
			$data['fortickets'] = null;
			$data['amendes'] = null;
			$data['nblibre'] = 0;
			$data['nboccupe'] = 0;
			$data['nbinfraction']= 0;
		}
		
		$data['places'] = $this->Place->getPlaces();*/

		if($this->session->userdata('idUser')){
			$this->load->model('Fonction_m');  
			$res = $this->Fonction_m->getuser($this->session->userdata('idUser'));
			$name = $res['name'];
			$data['name'] = $name;
			$data['email'] = $this->Fonction_m->getuseremail($this->session->userdata('idUser'));
			$data['surname'] = $res['surname'];
			$this->load->view('frontoffice/header',$data);
			$this->load->view('frontoffice/body',$data);
			$this->load->view('frontoffice/footer',$data);
		}else{
			$this->load->view('frontoffice/login');
		}

	}


	public function auth()
	{
			if($this->input->post('email'))
			{
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				
				$que=$this->db->query("select * from users where email='$email' and password=md5('$password')");
				$row = $que->num_rows();
				if($row>0)
				{
					$que=$this->db->query("select * from users where email='$email' and password=md5('$password')");
					
					$row = $que->result();

					$this->session->set_userdata('idUser',$row[0]->id);
					$this->session->set_userdata('emailUser',$row[0]->email);
					$this->session->set_userdata('nameUser',$row[0]->name);
					$this->session->set_userdata('surnameUser',$row[0]->surname);
					
					redirect('user/accueil');
				}
				else
				{
					
				}
			}
			$this->session->set_flashdata('error_msg', 'Identifiant et/ou mot de passe erroné(s)');
			$this->load->view('user/accueil');
	}


	public function login(){
		$this->form_validation->set_rules('email','','required');
		$this->form_validation->set_rules('password','','required');

		if($this->form_validation->run() == FALSE){
			$error['error'] = null;
			$this->load->view('frontoffice/login');
		}else{
			$login = $this->input->post('email');
			$pass = $this->input->post('password');
			if($this->User_m->login($login,$pass) != null){
				$utilisateur = $this->User_m->login($login,$pass);	
				$this->session->set_userdata('idUser',$utilisateur->id);
                
                redirect('user/acceuil');

			}else{
				$error['error'] = 'misy';
				$this->load->view('frontoffice/login',$error);
			}
		}
	}
}