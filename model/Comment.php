<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

class Comment
{
 // Propriétés
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date_fr;
    private $_signals;


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

    public function post_id(){ 
        return $this->_post_id; 
    }

    public function author(){ 
        return $this->_author; 
    }

    public function comment(){ 
        return $this->_comment; 
    }

    public function comment_date_fr(){ 
        return $this->_comment_date_fr;
    }

    public function signals(){ 
        return $this->_signals; 
    }


 // Setters
    public function setId($id){
        $this->_id = (int) $id;
    }
        
    public function setPostId($post_id){
        $this->_post_id = (int) $post_id;
    }
     
    public function setAuthor($author){
        if (is_string($author)){
            $this->_author = $author;
        }
    }

    public function setComment($comment){
        if (is_string($comment)){
            $this->_comment = $comment;
        }
    }

    public function setComment_Date_Fr($comment_date_fr){   
            $this->_comment_date_fr = $comment_date_fr;
    }

    public function setSignals($signals){
        $this->_signals = (int) $signals;
    }
        
}




