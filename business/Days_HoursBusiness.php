<?php

include_once __DIR__.'/../data/Days_HoursData.php';

/**
 * Description of Days_HoursBusiness
 *
 * @author Kevin ESquivel Marín <kevinesquivel21@gmail.com>
 */
class Days_HoursBusiness
{
    private $data;

    public function Days_HoursBusiness()
    {
        return $this->data = new Days_HoursData();
    }

    public function getDays()
    {
        return $this->data->getDays();
    }

    public function getHours()
    {
        return $this->data->getHours();
    }

}
