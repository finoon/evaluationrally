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

    public function getClass(){
        $sql = "select * from jour join pointrally on jour.idpointrally=pointrally.id join participant on participant.id=pointrally.copilote join rally on rally.id=pointrally.idrally";
        $query = $this->db->query($sql);
        return $query->result();
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

    public function getParticipantById($id){
        $query = $this->db->get_where('participant', array('id' => $id));
        $data = array();
        $res  = $query->result();
        foreach($res as $row){
            $data = $row;
        }
        echo json_encode($data);
    }
    
}