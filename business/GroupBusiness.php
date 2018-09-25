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

    /**
     * Guarda un registro de grupo.
     */
    public function insertGroup($number)
    {
        return $this->groupData->insertGroup($number);
    }

    /**
     * Actualiza la descripción de un grupo.
     */
    public function updateGroup($id, $number)
    {
        return $this->groupData->updateGroup($id, $number);
    }

    /**
     * Obtiene un grupo de base de datos.
     */
    public function getGroup($id)
    {
        return $this->groupData->getGroup($id);
    }

    /**
     * Elimina tupla de tabla groups
     */
    public function deleteGroup($id)
    {
        return $this->groupData->deleteGroup($id);
    }

    /**
     * Captura los registros de grupos.
     *
     * groupid->     id
     * groupnumber-> number
     */
    public function getAll()
    {
        return $this->groupData->getAll();
    }

    /**
     * Captura los registros de grupos para los cuales hay estudiantes
     * matriculados, en el periodo y año actuales.
     *
     * groupid:     id del grupo
     * groupnumber: descripción del grupo
     * period:      periodo actual
     * year:        año actual
     */
    public function getAllGroups()
    {
        return $this->groupData->getAllGroups();
    }

    /**
     * Captura los registros de grupos para los cuales hay estudiantes
     * matriculados, en el periodo y año ingresados.
     *
     * groupid:     id del grupo
     * groupnumber: descripción del grupo
     * period:      periodo actual
     * year:        año actual
     */
    public function getAllGroupsByFilters($period, $year)
    {
        return $this->groupData->getAllGroupsByFilters($period, $year);
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
