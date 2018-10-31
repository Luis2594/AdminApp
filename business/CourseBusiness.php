<?php

include_once __DIR__.'/../data/CourseData.php';

/**
 * Description of CourseBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
class CourseBusiness
{
    private $courseData;

    public function CourseBusiness()
    {
        return $this->courseData = new CourseData();
    }

    public function insert($course)
    {
        return $this->courseData->insert($course);
    }

    public function insertPeriod($course, $period)
    {
        return $this->courseData->insertPeriod($course, $period);
    }

    public function update($course)
    {
        return $this->courseData->update($course);
    }

    public function delete($id)
    {
        return $this->courseData->delete($id);
    }

    public function getAll()
    {
        return $this->courseData->getAll();
    }

    public function getAllJson()
    {
        return $this->courseData->getAllJson();
    }

    public function getCourseByStudent($id)
    {
        return $this->courseData->getCourseByStudent($id);
    }

    public function getCourseByStudentParsed($id)
    {
        return $this->courseData->getCourseByStudentParsed($id);
    }

    public function getAllParsed()
    {
        return $this->courseData->getAllParsed();
    }

    public function getCourseId($id)
    {
        return $this->courseData->getCourseId($id);
    }

    public function getCourseToAssignProfessor($id)
    {
        return $this->courseData->getCourseToAssignProfessor($id);
    }

    public function getCoursesAllProfessors()
    {
        return $this->courseData->getCoursesAllProfessors();
    }

    public function getCoursesAllProfessorsByFilters($period, $year)
    {
        return $this->courseData->getCoursesAllProfessorsByFilters($period, $year);
    }

    public function getCourseToAssignCurriculum($id)
    {
        return $this->courseData->getCourseToAssignCurriculum($id);
    }

    public function getCourseIdUpdate($id)
    {
        return $this->courseData->getCourseIdUpdate($id);
    }

    public function getType()
    {
        return $this->courseData->getType();
    }

    public function confirmCode($code)
    {
        return $this->courseData->confirmCode($code);
    }

    /**
     * CHECKED
     */
    public function getStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->getStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group);
    }    
    
    public function exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group){
        return $this->courseData->exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group);
    }
}
