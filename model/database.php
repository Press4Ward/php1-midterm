<?php
    $dsn = 'mysql:host=press4wardgroupcom.ipagemysql.com;dbname=mgs_2351';
    $username = 'mgs_admin';
    $password = 'Exuma18';

//$dsn = 'mysql:host=localhost;dbname=mgs_2351';
//$username = 'mgs_user';
//$password = 'pa55word';
    

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>