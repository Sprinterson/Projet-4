<?php
class User
{
    private $_id;
    private $_pseudo;

    public function __construct($db){
        function hydrate(array $donnees){
            foreach ($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                
                if (method_exists($this, $method)){
                    $this->$method($value);
                };
            }
        }
    }

    public function id(){ 
        return $this->_id; 
    }

    public function pseudo(){ 
        return $this->_pseudo; 
    }

    public function setId($id){
        $this->_id = (int) $id;
    }
        
    public function setPseudo($pseudo){
        if (is_string($pseudo) && strlen($pseudo) <= 30){
            $this->_pseudo = $pseudo;
        }
    }
}