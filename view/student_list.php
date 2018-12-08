<?php include ('header.php'); ?>

<main>
    <h1>Student Names and Grades</h1>

        <!-- display a table of student names and grades -->
    <section>
<!--        <h2><?php echo $studentID; ?></h2>-->
        <table>
            <tr>
                <th>Student Name</th>
                <th>Grade</th>
                <th>Letter Grade</th>
                <th>&nbsp;</th>
            </tr>

            <!--display student name, numerical grade and letter grade columns and delete button -->
        <?php foreach ($students as $student) : ?>
        <tr>
            <td><?php echo $student [ 'student_name' ]; ?></td>
            <td><?php echo $student [ 'student_grade' ]; ?></td>
            <td><?php $alpha = get_alpha_letter($student [ 'student_grade' ]);
            echo $alpha; ?> </td>
            <td><form action="index.php" method="post">
                    <input type ="hidden" name="action" value="delete_student">
                    <input type="hidden" name="studentID" value="<?php echo $student['studentID']; ?>">
                <input type="submit" value="Delete">
             </form></td>
        </tr>
     <?php endforeach; ?>
                </table>
        <p><a href="model/add_student.php">Add Student</a></p>
    </section>
</main>
<?php include ('footer.php'); ?>