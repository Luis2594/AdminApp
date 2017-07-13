<?php

include '../data/CurriculumData.php';

/**
 * Description of CurriculumBusiness
 *
 * @author luisd
 */
class CurriculumBusiness {

    private $curriculumData;

    public function CurriculumBusiness() {
        return $this->curriculumData = new CurriculumData();
    }

    public function insert($curriculum) {
        return $this->curriculumData->insert($curriculum);
    }

    public function insertCurriculumCourse($idCurriculum, $idCourse) {
        return $this->curriculumData->insertCurriculumCourse($idCurriculum, $idCourse);
    }

    public function update($curriculum) {
        return $this->curriculumData->update($curriculum);
    }

    public function delete($id) {
        return $this->curriculumData->delete($id);
    }

    public function getAll() {
        return $this->curriculumData->getAll();
    }

    public function getCurriculumCourseOutCurriculum($id) {
        return $this->curriculumData->getCurriculumCourseOutCurriculum($id);
    }
   
    public function getCurriculumCourseByCurriculum($id) {
        return $this->curriculumData->getCurriculumCourseByCurriculum($id);
    }

    public function getCurriculumId($id) {
        return $this->curriculumData->getCurriculumId($id);
    }

}
