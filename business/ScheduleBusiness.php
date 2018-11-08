<?php

include_once __DIR__.'/../data/ScheduleData.php';

class ScheduleBusiness
{

    private $scheduleData;

    public function ScheduleBusiness()
    {
        return $this->scheduleData = new ScheduleData();
    }

    public function insert($schedule)
    {
        return $this->scheduleData->insert($schedule);
    }

    public function getScheduleBYGroup($group)
    {
        return $this->scheduleData->getScheduleBYGroup($group);
    }

    public function getScheduleByProfessor($id)
    {
        return $this->scheduleData->getScheduleByProfessor($id);
    }

    public function getScheduleByStudent($id)
    {
        return $this->scheduleData->getScheduleByStudent($id);
    }

    public function deleteScheduleByGroup($group)
    {
        return $this->scheduleData->deleteScheduleByGroup($group);
    }

    public function deleteSchedule($id)
    {
        return $this->scheduleData->deleteSchedule($id);
    }

}
