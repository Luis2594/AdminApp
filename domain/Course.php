<?php

class Course
{
    private $courseId;
    private $courseCode;
    private $courseName;
    private $courseCredits;
    private $courseLesson;
    private $coursePdf;
    private $courseSpeciality;
    private $courseType;
    private $specialityname;
    private $period;
    private $token;

    public function Course($courseId, $courseCode, $courseName, $courseCredits, $courseLesson, $coursePdf, $courseSpeciality, $courseType)
    {
        $this->courseId = $courseId;
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->courseCredits = $courseCredits;
        $this->courseLesson = $courseLesson;
        $this->coursePdf = $coursePdf;
        $this->courseSpeciality = $courseSpeciality;
        $this->courseType = $courseType;
    }

    public function getCourseId()
    {
        return $this->courseId;
    }

    public function getCourseCode()
    {
        return $this->courseCode;
    }

    public function getCourseName()
    {
        return $this->courseName;
    }

    public function getCourseCredits()
    {
        return $this->courseCredits;
    }

    public function getCourseLesson()
    {
        return $this->courseLesson;
    }

    public function getCoursePdf()
    {
        return $this->coursePdf;
    }

    public function getCourseSpeciality()
    {
        return $this->courseSpeciality;
    }

    public function getCourseType()
    {
        return $this->courseType;
    }

    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    }

    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;
    }

    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
    }

    public function setCourseCredits($courseCredits)
    {
        $this->courseCredits = $courseCredits;
    }

    public function setCourseLesson($courseLesson)
    {
        $this->courseLesson = $courseLesson;
    }

    public function setCoursePdf($coursePdf)
    {
        $this->coursePdf = $coursePdf;
    }

    public function setCourseSpeciality($courseSpeciality)
    {
        $this->courseSpeciality = $courseSpeciality;
    }

    public function setCourseType($courseType)
    {
        $this->courseType = $courseType;
    }

    public function getSpecialityname()
    {
        return $this->specialityname;
    }

    public function setSpecialityname($specialityname)
    {
        $this->specialityname = $specialityname;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function getPeriod()
    {
        return $this->period;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

}
