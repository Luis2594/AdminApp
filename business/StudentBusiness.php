<?php

include_once __DIR__.'/../data/StudentData.php';

class StudentBusiness
{

    private $studentData;

    public function StudentBusiness()
    {
        return $this->studentData = new StudentData();
    }

    public function insertStudentWithCredentials($student, $pass)
    {
        return $this->studentData->insertStudentWithCredentials($student, $pass);
    }

    public function update($student)
    {
        return $this->studentData->update($student);
    }

    public function delete($id)
    {
        return $this->studentData->delete($id);
    }

    public function getAll()
    {
        return $this->studentData->getAll();
    }

    public function getStudentId($id)
    {
        return $this->studentData->getStudentId($id);
    }

    public function getStudentByProfessor($id)
    {
        return $this->studentData->getStudentByProfessor($id);
    }

    public function getLastId()
    {
        return $this->studentData->getLastId();
    }

    /**
     * Captura los estudiantes de un grupo para un año y periodo dados.
     *
     * dni:   cédula del estudiante
     * name:  nombre completo del estudiante
     * phone: teléfono del estudiante
     *
     */
    public function getStudentByGroupByFilter($group, $period, $year)
    {
        return $this->studentData->getStudentByGroupByFilter($group, $period, $year);
    }

}
