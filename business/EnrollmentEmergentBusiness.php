<?php

include_once '../data/EnrollmentEmergentData.php';

/**
 * Description of EnrollmentEmergentBusiness
 *
 * @author luis
 */
class EnrollmentEmergentBusiness
{
    private $data;

    public function EnrollmentEmergentBusiness()
    {
        return $this->data = new EnrollmentEmergentData();
    }

    public function insert($enrollment)
    {
        return $this->data->insert($enrollment);
    }

    public function update($enrollment)
    {
        return $this->data->update($enrollment);
    }

    public function delete($id)
    {
        return $this->data->delete($id);
    }

    public function enrollmentByPk($id)
    {
        return $this->data->enrollmentByPk($id);
    }

    public function enrollmentByPerson($idStudent)
    {
        return $this->data->enrollmentByPerson($idStudent);
    }

    public function enrollmentCourseByPerson($idStudent)
    {
        return $this->data->enrollmentCourseByPerson($idStudent);
    }

}
