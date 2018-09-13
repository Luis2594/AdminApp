<?php

include_once '../data/GroupData.php';

/**
 * Description of GroupBusiness
 *
 * @author Kevin Esquivel Marín <kevinesquivel21@gmail.com>
 */
class GroupBusiness
{
    private $groupData;

    public function GroupBusiness()
    {
        return $this->groupData = new GroupData();
    }

    /**GROUP */
    public function insertGroup($number)
    {
        return $this->groupData->insertGroup($number);
    }

    public function updateGroup($id, $number)
    {
        return $this->groupData->updateGroup($id, $number);
    }

    public function deleteGroup($id)
    {
        return $this->groupData->deleteGroup($id);
    }

    public function getAll()
    {
        return $this->groupData->getAll();
    }

    /**STUDENT GROUP */
    public function insertStudentGroup($idGroup, $idStudent, $priority)
    {
        return $this->groupData->insertStudentGroup($idGroup, $idStudent, $priority);
    }

    public function delete($idPerson, $group)
    {
        return $this->groupData->delete($idPerson, $group);
    }

    public function getGroupByStudent($id)
    {
        return $this->groupData->getGroupByStudent($id);
    }

    public function getGroupByPerson($id)
    {
        return $this->groupData->getGroupByPerson($id);
    }

}
