<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

class User
{
 // Propriétés
    private $_id;
    private $_pseudo;
    private $_password;


 // Hydratation
    public function __construct(array $data){
            foreach ($data as $key => $value){
                $method = 'set'.ucfirst($key);
                
                if (method_exists($this, $method)){
                    $this->$method($value);
                }
            }
    }


 // Getters
    public function id(){ 
        return $this->_id; 
    }

    public function pseudo(){ 
        return $this->_pseudo; 
    }

    public function password(){ 
        return $this->_password; 
    }


 // Setters
    public function setId($id){
        $this->_id = (int) $id;
    }
        
    public function setPseudo($pseudo){
        if (is_string($pseudo)){
            $this->_pseudo = $pseudo;
        }
    }

    public function setPassword($password){
        if (is_string($password)){
            $this->_password = $password;
        }
    }
}