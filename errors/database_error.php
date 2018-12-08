<?php include '../view/header.php'; ?>
        <div id="main">
            <h1>Database Error</h1>
            <p>There was an error connecting to the students database.</p>
            <p>The database must be installed and MySQL must be running.</p>
            <p>Error Message: <?php echo $error_message; ?></p>
        </div><!--end main -->
<?php include '../view/footer.php'; ?>