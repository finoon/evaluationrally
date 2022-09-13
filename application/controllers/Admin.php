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
            $this->load->view('admin/header',$data);
			$this->load->view('admin/ajoutvehicule',$data);
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
			$this->Fonction_m->insert_vehicule($this->input->post('rally'),$this->input->post('jour'),$this->input->post('participant1'),$this->input->post('participant2'),$this->input->post('numero'));
			redirect('admin/tarif');
		}else{
			$this->load->view('admin/login');
		}
	}

}