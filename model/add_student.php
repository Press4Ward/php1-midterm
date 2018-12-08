<?php include '../view/header.php'; ?>


<main>
    <h1>Add New Student</h1>
    <form action="../index.php" method="post" id="add_student_form">
        <input type="hidden" name="action" value="add_student">
        
        <label>Name:</label>
        <input type="text" name="name"  />
        <br>
        
         <label>Grade:</label>
        <input type="text" name="grade"  />
        <br>
        
                 
        <input type="submit" name="add_student" value="Add Student" />
        <br>
    </form>
    
    
</main>
<?php include '../view/footer.php'; ?>