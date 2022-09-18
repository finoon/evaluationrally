<?php
class Fonction_m extends CI_Model{


    public function getuser($id){
        $sql = "select name,surname from users where id =".$id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getuseremail($emailadmin){
        $sql = "select email from users where id =".$emailadmin;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getadmin($nomadmin){
        $sql = "select username from admin where id =".$nomadmin;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getadminemail($email){
        $sql = "select email from admin where id =".$email;
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function participantById($id){
        $query = $this->db->get_where('participant', array('id' => $id));
        $data = array();
        $res  = $query->result();
        foreach($res as $row){
            $data = $row;
        }
        return $data;
    }
    public function getParticipant(){
        
        $query = $this->db->get('participant');
        return $query->result();
    }

    public function getNomRally(){
        $query = $this->db->get('rally');
        return $query->result();
    }

    public function getsearchnom($idnomrally,$idjour,$category){
        //$query = $this->db->query("SELECT jour.idjour,rally.nomrally,category.category,jour.jour,pointrally.pilote,pointrally.copilote,vehicule.numero,jour.temps,rally.coefficientrally,jour.point from pointrally join vehicule on vehicule.numero=pointrally.numerovehicule join category on category.id=vehicule.idcategory join rally on rally.id=pointrally.idrally join participant on participant.id=pointrally.copilote join jour on pointrally.id=jour.idpointrally  WHERE rally.id=".$idnomrally."AND jour.jour=".$idjour."AND category.id=".$category."order by temps asc");
        $query = $this->db->query("SELECT rank() over (order by temps asc) as rang,jour.idjour,rally.id as idral,rally.nomrally,category.category,jour.jour,pointrally.pilote,pointrally.copilote,vehicule.numero,jour.temps,rally.coefficientrally,jour.point from pointrally join vehicule on vehicule.numero=pointrally.numerovehicule join category on category.id=vehicule.idcategory join rally on rally.id=pointrally.idrally join participant on participant.id=pointrally.copilote join jour on pointrally.id=jour.idpointrally  WHERE rally.id=".$idnomrally."AND jour.jour=".$idjour."AND category.id=".$category);
        $result = $query->result_array();
        return $result;
    }

    public function checkjour($num,$rally,$category){
        $sql = $this->db->query("SELECT jour.idjour,rally.nbjour,rally.nomrally,category.category,jour.jour,pointrally.pilote,pointrally.copilote,vehicule.numero,jour.temps,rally.coefficientrally,jour.point from pointrally join vehicule on vehicule.numero=pointrally.numerovehicule join category on category.id=vehicule.idcategory join rally on rally.id=pointrally.idrally join participant on participant.id=pointrally.copilote join jour on pointrally.id=jour.idpointrally where pointrally.numerovehicule=".$num." and rally.id=".$rally." and category.id=".$category);
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getcoef($id){
        $query = $this->db->query("SELECT coefficientrally FROM rally WHERE id=".$id);
        $result = $query->row_array();
        $pseudo = $result['coefficientrally'];
        return $pseudo;
    }

    public function getnbjour($id){
        $query = $this->db->query("SELECT nbjour FROM rally WHERE id=".$id);
        $result = $query->row_array();
        $pseudo = $result['nbjour'];
        return $pseudo;
    }

    public function getVehicule(){
        $query = $this->db->get('vehicule');
        return $query->result();
    }

    public function getCategory(){
        $query = $this->db->get('category');
        return $query->result();
    }

    public function getPointRally(){
        $query = $this->db->get('pointrally');
        return $query->result();
    }

    public function getPointEtRally(){
        $sql = "select * from rally left join pointrally on rally.id=pointrally.idrally";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getcarcategory(){
        $sql = "select * from vehicule left join category on vehicule.idcategory=category.id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getrallyt(){
        $sql = "select * from rally join category on rally.idcategory=category.id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function classtemps(){
        $sql = "Select * from jour order by temps asc";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getClass(){
        $sql = "select * from jour join pointrally on jour.idpointrally=pointrally.id join participant on participant.id=pointrally.copilote join rally on rally.id=pointrally.idrally join category on category.id=rally.idcategory";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getClassement4RM(){
        $sql = "select category.category,rally.nomrally,jour.jour,pointrally.numerovehicule,pointrally.pilote,pointrally.copilote,jour.temps,jour.point from jour join pointrally on jour.idpointrally=pointrally.id join participant on participant.id=pointrally.copilote join rally on rally.id=pointrally.idrally join category on category.id=rally.idcategory where category='4RM'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getClassement2RM(){
        $sql = "select rally.nomrally,jour.jour from pointrally join rally on rally.id=pointrally.idrally join jour on pointrally.id=jour.idpointrally group by rally.nomrally,jour.jour";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getPseudoParticipant($id){
        $query = $this->db->query("SELECT pseudo FROM participant WHERE id=".$id);
        $result = $query->row_array();
        $pseudo = $result['pseudo'];
        return $pseudo;
    }

    public function insert_temps_fin($pointrally,$temps,$jour){
        $data = array(
            'idpointrally' => $pointrally,
            'temps' => $temps,
            'jour' => $jour,
            'point' => 0,
        );
        $this->db->insert('jour', $data);

    }

    public function modifpoint($id,$point){
        $data = array(
            'point'=>$point
        );
        $this->db->where('idjour', $id);
        $this->db->update('jour', $data);
    }

    public function insert_rallye($nomrally,$coefficient,$nbjour,$category,$date){
        $data = array(
            'nomrally' => $nomrally,
            'coefficientrally' => $coefficient,
            'nbjour' => $nbjour,
            'idcategory' => $category,
            'daty' => $date
        );
        $this->db->insert('rally', $data);
    }

    public function insert_vehicule($rally,$pilote,$copilote,$numero){
        $data = array (
            'idrally' => $rally,
            'pilote' => $pilote,
            'copilote' => $copilote,
            'numerovehicule' => $numero
        );
        $this->db->insert('pointrally', $data);
    }

    public function getdesignation(){
        $sql = "select * from participant";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getjour($jour){
        $sql = "select jour from jour where jour=".$jour;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getParticipantById($id){
        $query = $this->db->get_where('participant', array('id' => $id));
        $data = array();
        $res  = $query->result();
        foreach($res as $row){
            $data = $row;
        }
        echo json_encode($data);
    }

    public function getcate($id){
        $query = $this->db->query("SELECT category FROM category WHERE id=".$id);
        $result = $query->row_array();
        $pseudo = $result['category'];
        return $pseudo;
    }

    public function getral($id){
        $query = $this->db->query("SELECT nomrally FROM rally WHERE id=".$id);
        $result = $query->row_array();
        $pseudo = $result['nomrally'];
        return $pseudo;
    }
    
}