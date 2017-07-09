<?php

include '../data/GroupData.php';

/**
 * Description of GroupBusiness
 *
 * @author luis
 */
class GroupBusiness {
    
    private $groupData;
    
    public function GroupBusiness() {
        return $this->groupData = new GroupData();
    }
    
    public function insert($number) {
         return $this->groupData->insert($number);
    }
    
    public function insertStudentGroup($idGroup, $idStudent, $priority) {
        return $this->groupData->insertStudentGroup($idGroup, $idStudent, $priority);
    }

    public function delete($id) {
      return $this->groupData->delete($id);
    }

    public function getAll() {
     return $this->groupData->getAll();
    }
    
}
