<?php
class Comment
{
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;

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

    public function post_id(){ 
        return $this->_post_id; 
    }

    public function author(){ 
        return $this->_author; 
    }

    public function comment(){ 
        return $this->_comment; 
    }

    public function comment_date(){ 
        return $this->_comment_date; 
    }

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

    public function setComment($comment_date){
        if (){
            $this->_comment_date = $comment_date;
        }  
    }
}