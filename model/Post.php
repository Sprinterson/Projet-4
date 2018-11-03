<?php
class Post
{
  private $_id;
  private $_title;
  private $_content;
  private $_creation_date;

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
  public function title() { return $this->_title; }
  public function content() { return $this->_content; }
  public function creation_date() { return $this->_creation_date; }

  public function setId($id)
  {
    // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
    $this->_id = (int) $id;
  }
        
  public function setTitle($title)
  {
   
  }

  public function setContent($content)
  {
   
  }

  public function setCreationDate($creation_date)
  {
   
  }
}