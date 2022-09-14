<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct()
	{
		parent::__construct();
		//$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('admin_m');
	} 

    public function index()
	{
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			$data['participants'] = $this->Fonction_m->getParticipant();
			$data['rally'] = $this->Fonction_m->getNomRally();
			$data['vehicule'] = $this->Fonction_m->getVehicule();
            $this->load->view('admin/header',$data);
			$this->load->view('admin/ajoutvehicule',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function rally(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			$data['category'] = $this->Fonction_m->getCategory();
            $this->load->view('admin/header',$data);
			$this->load->view('admin/ajoutrally',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function tempsfin(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			$data['pointetrally'] = $this->Fonction_m->getPointEtRally();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/ajouttempsfin',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function gestPoint(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			$data['listeClassement']=$this->Fonction_m->getClass();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/point',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

    
    public function login(){
		$this->load->view('admin/login');
	}

    public function auth()
	{
			if($this->input->post('emailadmin'))
			{
				$email=$this->input->post('emailadmin');
				$password=$this->input->post('passwordadmin');
				
				$que=$this->db->query("select * from admin where email='$email' and password=md5('$password')");
				$row = $que->num_rows();
				if($row>0)
				{
					$que=$this->db->query("select * from admin where email='$email' and password=md5('$password')");
					
					$row = $que->result();

					$this->session->set_userdata('id',$row[0]->id);
					$this->session->set_userdata('email',$row[0]->email);
					
					redirect('admin/index');
				}
				else
				{
					
				}
			}
			$this->session->set_flashdata('error_msg', 'Identifiant et/ou mot de passe erroné(s)');
			$this->load->view('admin/login');
	}

	public function getData($id){
		$this->load->model('Fonction_m');  
		$this->Fonction_m->getParticipant($id);
	}

	public function getRally($id){
		$this->load->model('Fonction_m');  
		$this->Fonction_m->getNomRally($id);
	}

	public function getVehicules($id){
		$this->load->model('Fonction_m');
		$this->Fonction_m->getVehicule($id);
	}

	public function getCategorys($id){
		$this->load->model('Fonction_m');
		$this->Fonction_m->getCategory($id);
	}

	public function getPointRallys($id){
		$this->load->model('Fonction_m');
		$this->Fonction_m->getPointRally($id);
	}

    public function logout(){
		if($this->session->userdata('name')){
			$this->session->unset_userdata('id'); 
			$this->session->unset_userdata('email'); 
			$this->session->unset_userdata('name');

			$this->load->view('admin/login');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function addvehicule(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$this->Fonction_m->insert_vehicule($this->input->post('rally'),$this->input->post('participant1'),$this->input->post('participant2'),$this->input->post('numero'));
			echo "<script>alert('Nouvelle equipe cree');</script>";
		}
			echo "<script>window.location='".site_url('admin/index')."';</script>";
		
	}

	public function addrally(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$this->Fonction_m->insert_rallye($this->input->post('modrally'),$this->input->post('coefficient'),$this->input->post('journ'),$this->input->post('idcategory'),$this->input->post('ladate'));
			echo "<script>alert('Nouveau rallye cree');</script>";
		}
			echo "<script>window.location='".site_url('admin/index')."';</script>";
		
	}

	public function addTempsFin(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$this->Fonction_m->insert_temps_fin($this->input->post('nummod'),$this->input->post('temps'),$this->input->post('jour'));
			echo "<script>alert('Nouveau temps cree');</script>";
		}
			echo "<script>window.location='".site_url('admin/index')."';</script>";
		
	}
}