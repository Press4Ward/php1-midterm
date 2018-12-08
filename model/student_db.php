<?php
// functions to access data

// Get Student ID
function get_student() {  // array to select students by studentID from table
    global $db;                                  // PDO variable
    $query = 'SELECT * FROM students';
    $statement = $db->prepare($query);      //prepare statement
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_students_by_name($name) {    // get all students from table by name
    global $db;
    $queryStudents = 'SELECT * FROM students
              WHERE student_name = :name
              ORDER BY student_name';
    $statement = $db->prepare($queryStudents);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function delete_student($studentID) {
    global $db;
    $query = 'DELETE FROM students
              WHERE studentID = :studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(':studentID', $studentID);
    $statement->execute();
    $statement->closeCursor();
}

function get_alpha_letter($grade) {  // convert numeric grades to letter grades
    
    if ($grade >= 90) {
            $alpha = 'A'; // if grade is an A
            //echo "$grade equals A";
        } else if ($grade  >= 80 ) {
            $alpha = 'B'; // if grade is an B
            //echo "$grade equals B";
        } else if ($grade  >= 70 ) {
            $alpha = 'C'; // if grade is an C
            //echo "$grade equals C";
        } else if ($grade  >= 60 ) {
            $alpha = 'D'; // if grade is an D
            //echo "$grade equals D";
        } else if ($grade  < 60) {
            $alpha = 'F'; // if grade is an F
            //echo "$grade equals F";
        }
        
        return $alpha; // return letter grade based on entered numerical grade
}

function add_student($name, $grade) {  // insert students into table
    global $db;
    $query = 'INSERT INTO students
                 ( student_name, student_grade)
              VALUES
                 ( :name, :grade)';
    $statement = $db->prepare($query);
    $statement->bindValue( ':name', $name );
    $statement->bindValue( ':grade', $grade);
    $statement->execute();
    $statement->closeCursor();
}
?>
