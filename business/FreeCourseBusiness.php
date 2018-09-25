<?php

include_once '../data/FreeCourseData.php';

/**
 * Description of FreeCourseBusiness
 *
 * @author luis
 */
class FreeCourseBusiness
{

    private $data;

    public function FreeCourseBusiness()
    {
        return $this->data = new FreeCourseData();
    }

    public function insert($course)
    {
        return $this->data->insert($course);
    }

    public function update($course)
    {
        return $this->data->update($course);
    }

    public function delete($id)
    {
        return $this->data->delete($id);
    }

    public function getAll()
    {
        return $this->data->getAll();
    }

    public function getCourseById($id)
    {
        return $this->data->getCourseById($id);
    }

    public function getCourseByArea($area)
    {
        return $this->data->getCourseByArea($area);
    }

    public function confirmCode($code)
    {
        return $this->data->confirmCode($code);
    }

}
