<?php  
    $db = 'oroiht';
    $user = 'root';
    $password = '';
    try{
        $bdd = new PDO('mysql:host=localhost;dbname='.$db,$user,$password);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }