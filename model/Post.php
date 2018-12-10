<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_creation_date_fr;

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

    public function title(){ 
        return $this->_title; 
    }

    public function content(){ 
        return $this->_content; 
    }

    public function creation_date_fr(){ 
        return $this->_creation_date_fr; 
    }

 // Setters

    public function setId($id){
        $this->_id = (int) $id;
    }
        
    public function setTitle($title){
        if (is_string($title)){
            $this->_title = $title;
        }
    }

    public function setContent($content){
        if (is_string($content)){
            $this->_content = $content;
        }
    }

    public function setCreationDateFr($creation_date_fr){
        //if (checkdate($creation_date)){
            $this->_creation_date_fr = $creation_date_fr;
        //}  
    }
}