<?php
class UsersManager
{
    public function __construct($db){
        $this->setDb($db);
    }

    public function add(User $user){
        $q = $this->_db->prepare('INSERT INTO users(pseudo) VALUES(:pseudo)');

        $q->bindValue(':pseudo', $pseudo->nom());
        $q->execute();
    }

    public function delete(User $user){
        $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
    }

    public function get($id){
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, pseudo FROM users WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new User($donnees);
    }

    public function getList(){
        $pseudos = [];

        $q = $this->_db->query('SELECT id, pseudo FROM users ORDER BY pseudo');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
        $pseudos[] = new User($donnees);
        }

        return $pseudos;
    }

    public function setDb(PDO $db){
        $this->_db = $db;
    }
}