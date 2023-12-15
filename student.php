<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $program = $_POST["program"];

    $subjectList = array();

    for ($i = 1; $i <= 3; $i++) {
        $subjectName = $_POST["subjectName$i"];
        $subjectGrade = $_POST["subjectGrade$i"];

        if (!empty($subjectName) && !empty($subjectGrade)) {
            $subjectList[] = array(
                "subjectName" => $subjectName,
                "subjectGrade" => $subjectGrade,
                "subjectStatus" => ($subjectGrade >= 9.5) ? "Pass" : "Fail"
            );
        }
    }

    include "student_class.php";
    $student = new student_class();

    $student->setName($name);
    $student->setNumber($number);
    $student->setEmail($email);
    $student->setProgram($program);
    $student ->setSubjectList($subjectList);


    echo '<h1>Student Information</h1>';
    echo '<p><strong>Name:</strong> ' . $student->getName() . '</p>';
    echo '<p><strong>Number:</strong> ' . $student->getNumber() . '</p>';
    echo '<p><strong>Email:</strong> ' . $student->getEmail() . '</p>';
    echo '<p><strong>Program:</strong> ' . $student->getProgram() . '</p>';

    $student->printStudentSubjects();

    $average = $student->subjectGradesAverage($subjectList);
    echo '<p><strong>Average Grade:</strong> ' . $average . '</p>';
} else {
    echo 'Form not send!';
}