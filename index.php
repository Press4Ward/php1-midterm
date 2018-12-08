<?php
require('model/database.php');
require('model/student_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
     $action = 'student_list';
     }
}

if ($action == 'student_list') {    // list students from table 
    $students = get_student();
    include('view/student_list.php');
    
} else if ($action == 'delete_student') {    // validate student names and grades and throw error if not valid
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    if ($studentID == NULL || $studentID == FALSE ) {
            $error = "Student name or grade is missing.";
            include('errors/error.php'); 
        } else {
            delete_student($studentID);
            header("Location: ."); //goes to a white screen, but has correct url
            
        }
    
} else if ($action == 'add_student') {                // else if to validate numerical student grade
    $name_form = filter_input(INPUT_POST, 'name');
    $name = htmlspecialchars($name_form);       // XSS injection security 
    $grade = filter_input(INPUT_POST, 'grade', FILTER_VALIDATE_INT);
    if ($grade > 100 || $grade < 0 || $grade == NULL || $grade == FALSE) {
        $error = "Please enter valid grade between 0 and 100.";
        include('/errors/error.php');
    } else {
        add_student($name, $grade);
        header("Location: ."); 
    }
}   

?>