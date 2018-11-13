<?php
class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date;

    public function hydrate(array $donnees){

        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
            $this->$method($value);
            }
        }
    }

    /*public function __construct($db){
        function hydrate(array $donnees){

            foreach ($donnees as $key => $value){
                $method = 'set'.ucfirst($key);

                if (method_exists($this, $method)){
                $this->$method($value);
                }
            }
        }
    }*/


    public function id(){ 
        return $this->_id; 
    }

    public function title(){ 
        return $this->_title; 
    }

    public function content(){ 
        return $this->_content; 
    }

    public function creation_date(){ 
        return $this->_creation_date; 
    }

    public function setId($id){
        $this->_id = (int) $id;
    }
        
    public function setTitle($title){
        if (is_string($author)){
            $this->_author = $author;
        }
    }

    public function setContent($content){
        if (is_string($author)){
            $this->_author = $author;
        }
    }

    public function setCreationDate($creation_date){

    }
}