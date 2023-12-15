<?php
/**
 * Created by PhpStorm.
 * @author: pedrotauzen
 * @date: 01/12/2023
 */

class student_class
{
    private string $name;
    private int $number;
    private string $email;
    private string $program;
    private array $subjectList;

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setProgram($program): void
    {
        $this->program = $program;
    }

    public function setSubjectList(array $subjectList): void
    {
        $this->subjectList = $subjectList;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getProgram(): string
    {
        return $this->program;
    }

    public function getSubjectList(): array
    {
        return $this->subjectList;
    }

    public function printStudentSubjects(): void
    {
        if (empty($this->subjectList)) {
            echo 'No subjects available in the list';
            return;
        }

        echo '<table>';
        echo '<tr><th>Subject</th><th>Grade</th><th>Status</th></tr>';

        foreach ($this->subjectList as $subject) {
            echo '<tr>';
            echo '<td>' . $subject["subjectName"] . '</td>';
            echo '<td>' . $subject["subjectGrade"] . '</td>';
            echo '<td>' . $subject["subjectStatus"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public function subjectGradesAverage($subjectGrade): float|int
    {
        if (empty($subjectGrade)) {
            return 0;
        }

        $totalGrades = 0;
        foreach ($subjectGrade as $grade) {
            if ($grade >= 9.5) {
                $totalGrades += $grade['subjectGrade'];
            }
        }
        $average = $totalGrades / count($subjectGrade);
        return round($average, 2);
    }
}
