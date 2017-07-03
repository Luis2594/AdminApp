<?php

include '../data/UserData.php';

/**
 * Description of UserBusiness
 *
 * @author luisd
 */
class UserBusiness {
    
    private $userData;

    public function UserBusiness() {
        return $this->userData = new UserData();
    }
    
     public function insert($user) {
       return $this->userData->insert($user);
    }
    
     public function insertProfessorWithCredentials($user) {
       return $this->userData->insertProfessorWithCredentials($user);
    }
    
    public function update($user) {
       return $this->userData->update($user);
    }
    
    public function delete($id) {
      return $this->userData->delete($id);
    }
    
    public function getAll() {
      return $this->userData->getAll();
    }
    
    public function getUserId($id) {
     return $this->userData->getUserId($id);
    }
    
    public function getLastId() {
        return $this->userData->getLastId();
    }
    
}
