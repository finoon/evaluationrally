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

    public function insert_rallye($nomrally,$coefficient,$nbjour,$category){
        $data = array(
            'nomrally' => $nomrally,
            'coefficient' => $coefficient,
            'nbjour' => $nbjour,
            'idcategory' => $category,
            'date' => now()
        );
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