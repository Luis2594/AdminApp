<?php

require_once '../data/ScheduleData.php';

class ScheduleBusiness {

    private $scheduleData;
    
    function ScheduleBusiness() {
        return $this->scheduleData = new ScheduleData();
    }
    
    public function insert($schedule) {
        return $this->scheduleData->insert($schedule);
    }
    
    public function getScheduleBYGroup($group) {
        return $this->scheduleData->getScheduleBYGroup($group);
    }
    
    public function deleteScheduleByGroup($group) {
        return $this->scheduleData->deleteScheduleByGroup($group);
    }
    
    public function deleteSchedule($id) {
        return $this->scheduleData->deleteSchedule($id);
    }

}