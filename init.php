<?php

try {
    $bdd= new PDO("mysql:host=localhost;dbname=meubles","root","",[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]);
} catch (Exception $e) {
    die("ERREUX CONNEXION BDD : " . $e ->getMessage());
}

function debug($value){
    echo"<pre>";
    print_r($value);
    echo"</pre>";
}

$successmessage="";
$errormessage="";