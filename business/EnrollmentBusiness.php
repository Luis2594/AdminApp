<?php

include_once __DIR__.'/../data/EnrollmentData.php';

/**
 * Description of EnrollmentBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
class EnrollmentBusiness
{
    private $enrollmentData;

    public function EnrollmentBusiness()
    {
        return $this->enrollmentData = new EnrollmentData();
    }

    public function insertEnrollment($enrollment)
    {
        return $this->enrollmentData->insertEnrollment($enrollment);
    }

    public function update($idEnrollment, $status)
    {
        return $this->enrollmentData->update($idEnrollment, $status);
    }

    public function delete($id)
    {
        return $this->enrollmentData->delete($id);
    }

    public function getCoursesAllEnrollmentByStudent($idStudent)
    {
        return $this->enrollmentData->getCoursesAllEnrollmentByStudent($idStudent);
    }

    public function getCoursesEnrollmentByStudent($idStudent)
    {
        return $this->enrollmentData->getCoursesEnrollmentByStudent($idStudent);
    }

    public function getCoursesApprovedByStudent($idStudent)
    {
        return $this->enrollmentData->getCoursesApprovedByStudent($idStudent);
    }

    public function getCoursesReprobateByStudent($idStudent)
    {
        return $this->enrollmentData->getCoursesReprobateByStudent($idStudent);
    }

    public function enrollmentActions($id, $value)
    {
        return $this->enrollmentData->enrollmentActions($id, $value);
    }

    public function getTotalEnrrollment()
    {
        return $this->enrollmentData->getTotalEnrrollment();
    }

    public function getTotalStudents()
    {
        return $this->enrollmentData->getTotalStudents();
    }

    public function getAllStudentEnrollmented()
    {
        return $this->enrollmentData->getAllStudentEnrollmented();
    }

    public function getAllParcialStudentsEnrollment($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getAllParcialStudentsEnrollment($dateStart, $dateEnd);
    }

    public function getTotalStudentsSecondLevel($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsSecondLevel($dateStart, $dateEnd);
    }

    public function getTotalStudentsSecondLevelWoman($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsSecondLevelWoman($dateStart, $dateEnd);
    }

    public function getTotalStudentsSecondLevelMan($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsSecondLevelMan($dateStart, $dateEnd);
    }

    public function getTotalStudentsThirdLevel($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsThirdLevel($dateStart, $dateEnd);
    }

    public function getTotalStudentsThirdLevelWoman($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsThirdLevelWoman($dateStart, $dateEnd);
    }

    public function getTotalStudentsThirdLevelMan($dateStart, $dateEnd)
    {
        return $this->enrollmentData->getTotalStudentsThirdLevelMan($dateStart, $dateEnd);
    }

}
