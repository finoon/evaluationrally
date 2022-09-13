<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {


	public $id;
	public $name;
	public $surname;
	public $email;
	public $password;

	/*public function login($post)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$post['email']);
		$this->db->where('password',md5($post['password']));
		$query = $this->db->get();
		return $query;
	}*/

	public function get($id = null)
	{
		$this->db->from('users');
		if($id != null) {
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	/*public function add($post)
	{
		$params['name'] = $post['nom'];
		$params['email'] = $post['email'];
		$params['password'] = sha1($post['mdp']);
		$this->db->insert('users',$params);
	}*/

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of surname
	 */ 
	public function getSurname()
	{
		return $this->surname;
	}

	/**
	 * Set the value of surname
	 *
	 * @return  self
	 */ 
	public function setSurname($surname)
	{
		$this->surname = $surname;

		return $this;
	}


	/**
	 * Get the value of password
	 */ 
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 *
	 * @return  self
	 */ 
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	public function login($username,$password){
		$query = $this->db->get_where('users',array('email'=>$username,'password'=>md5($password)));
		$res = $query->row_array();
		if($res!=null){
			$utilisateur = new User_m();
			$utilisateur->setId($res['id']);
            $utilisateur->setName($res['name']);
			$utilisateur->setSurname($res['surname']);
			$utilisateur->setEmail($res['email']);
			$utilisateur->setPassword($res['password']);
			return $utilisateur;
		}else{
			return null;
		}
	}
}
