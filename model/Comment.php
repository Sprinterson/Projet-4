<?php
class Comment
{
  private $_id;
  private $_post_id;
  private $_author;
  private $_comment;
  private $_comment_date;

  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {

    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);
        
      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  public function id() { return $this->_id; }
  public function post_id() { return $this->_post_id; }
  public function author() { return $this->_author; }
  public function comment() { return $this->_comment; }
  public function comment_date() { return $this->_comment_date; }

  public function setId($id)
  {
    // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setPostId($post_id)
  {
   
  }

  public function setAuthor($author)
  {
   
  }

  public function setComment($comment)
  {
   
  }

  public function setComment($comment_date)
  {
   
  }
}