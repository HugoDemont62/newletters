<?php
include "db.php";

if (isset($_POST['submit'])){
    $email = trim($_POST['email']);
    if ($email != '') {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $pdo->prepare('INSERT INTO `Newletters` (email,date) VALUES (:email,NOW())');
            $stmt->execute(array('email' => $email));
        }else{
            header('Location: index.php');
             echo"<script language=\"javascript\"> alert('Mail incorrect'); </script> ";

        }
    }
    header('Location: index.php');
    echo"<script language=\"javascript\"> alert('Mail incorrect'); </script> ";
}


