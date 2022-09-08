<?php
include 'db.php';

if (isset($_POST['submit'])){
    $sql = "SELECT DISTINCT * FROM `Newletters`";
    $query = $pdo->prepare($sql);
    $query->execute();
    while($lines = $query->fetch()){

        $imagefond = "";
        $time = date('r');
        $mail = $lines['email'];
        $message = $_POST["message"];


        $to = "contact@hugodemont.fr";
        $subject = "Mail From website";
        $headers = "From: contact@hugodemont.fr" . "\r\n";
        if($mail!=NULL){
            mail($mail ."\r\n", "Vous vous êtes abonné à notre New Letters"."\r\n", "$message \r\nCe message est automatique ne pas répondre \n\r\n\r\n\r\n Si vous n'êtes pas à l'origine de ce message n'en prenez pas compte. \n\r Hugo Demont service de communnication de hugodemont.fr ",$headers);
        }
    }
    header("Location:index.php");
}


