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
			$data['vehicule'] = $this->Fonction_m->getcarcategory();
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

	public function point($id){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			$data['pointetrally'] = $this->Fonction_m->getPointEtRally();
			$point=12;
			$this->Fonction_m->modifpoint($id,$point);
            $this->load->view('admin/header',$data);
			$this->load->view('admin/modifpoint',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function lienclass(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');  
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			$data['pointetrally'] = $this->Fonction_m->getPointEtRally();
            $this->load->view('admin/header',$data);
			$this->load->view('admin/pagepoint',$data);
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

	public function abandon(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			$data['pointetrally'] = $this->Fonction_m->getPointEtRally();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/abandon',$data);
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

	public function gestPoint4RM(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			$data['listeClassement4RM']=$this->Fonction_m->getClassement4RM();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/point4RM',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function gestPoint2RM(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			//$data['listeClassement2RM']=$this->Fonction_m->getClassement2RM();
			$data['modpointrally'] = $this->Fonction_m->getNomRally();
			$data['cat'] = $this->Fonction_m->getCategory();
			$this->load->view('admin/header',$data);
			$this->load->view('admin/point2RM',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}
	}

	public function getrecherche(){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			//$data['listeClassement2RM']=$this->Fonction_m->getClassement2RM();
			$data['modrally2'] = $this->Fonction_m->getsearchnom($this->input->post('mod'),$this->input->post('jo'),$this->input->post('cat'));
			$data['day']=$this->input->post('jo');
			$data['cate']=$this->input->post('cat');
			$data['ral']=$this->input->post('mod');
			$data['coef']=$this->input->post('mod');
			$data['nbjour']=$this->input->post('mod');
			$this->load->view('admin/header',$data);
			$this->load->view('admin/point2',$data);
			$this->load->view('admin/footer');
		}else{
			$this->load->view('admin/login');
		}

	}

	public function ajoutpoint($id,$rang,$rally){
		if($this->session->userdata('email')){
			$this->load->model('Fonction_m');
			$data['email'] = $this->Fonction_m->getadminemail($this->session->userdata('id'));
			$this->load->model('Fonction_m');  
			//$data['pointrally'] = $this->Fonction_m->getPointRally();
			//$data['listeClassement2RM']=$this->Fonction_m->getClassement2RM();

			$coef=$this->Fonction_m->getcoef($rally);
			if ($rang==1){
				$point = 10*$coef;
			}elseif($rang==2){
				$point = 6*$coef;
			}elseif($rang==3){
				$point = 4*$coef;
			}elseif($rang==4){
				$point = 2*$coef;
			}elseif($rang==5){
				$point = 1*$coef;
			}else{
				$point=0;
			}
			$this->Fonction_m->modifpoint($id,$point);
			
			$this->load->view('admin/header',$data);
			$this->load->view('admin/attributpoint',$data);
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
		$this->Fonction_m->getcarcategory($id);
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
		/*$this->load->library('form_validation');

		$this->form_validation->set_rules("modrally","Mode de rally","required");
		$this->form_validation->set_rules("coefficient","Coefficient","required|numeric");
		$this->form_validation->set_rules("journ","Jour","required");

		if($this->form_validation->run()==true){

		}*/
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