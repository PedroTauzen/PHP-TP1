<?php
/**
 * Created by PhpStorm.
 * @author: pedrotauzen
 * @date: 01/12/2023
 */

class Student
{
    private string $name;
    private int $number;
    private string $email;
    private string $program;
    private array $subjectList;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setProgram($program)
    {
        $this->program = $program;
    }

    public function setSubjectList($subjectName, $subjectGrade)
    {
        $subjectStatus = ($subjectGrade < 9.5) ? 'Disapproved' : 'Approved';
        $this->subjectList[] = [
            "subjectName" => $subjectName,
            "subjectGrade" => $subjectGrade,
            "subjectStatus" => $subjectStatus
        ];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getProgram()
    {
        return $this->program;
    }

    public function getSubjectList()
    {
        return $this->subjectList;
    }

    public function printStudentSubjects($subjectList)
    {
        if (empty($subjectList)) {
            echo 'No subjects available in the list';
            return;
        }

        echo '<table border="1">';
        echo '<tr><th>Subject</th><th>Grade</th><th>Status</th></tr>';

        foreach ($subjectList as $subject) {
            echo '<tr>';
            echo '<td>' . $subject["subjectName"] . '</td>';
            echo '<td>' . $subject["subjectGrade"] . '</td>';
            echo '<td>' . $subject["subjectStatus"] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}

