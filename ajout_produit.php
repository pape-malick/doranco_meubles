<?php

require_once"init.php";


if (!empty($_POST)) {    
    debug($_POST);
    debug($_FILES);

    if (!empty($_FILES['photo']['name'])) {
        copy($_FILES['photo']['tmp_name'],'photo/'.time().'-'.$_FILES['photo']['name']);
    }

    $requete = $bdd->prepare("INSERT INTO produit VALUES(NULL, :titre, :prix, :description, :photo)");
    $success= $requete ->execute([
        ":titre" =>$_POST["titre"],
        ":prix" =>$_POST["prix"],
        ":description" =>$_POST["description"],
        ":photo" =>time().'-'.$_FILES['photo']['name']
    ]);

    if($success){
        $successmessage= "youhou";
    }else{
        $errormessage= "no";
    }

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>



<body>
    <h1 class="text-center mt-3">Ajout de produit</h1>

    <?php
    if (!empty($successmessage)) {
        
        echo'<div class="alert alert-success col-md-6 mx-auto text-center">';
        echo $successmessage;
        echo'</div>';
    }
    
        if (!empty($errormessage)) {
        
        echo'<div class="alert alert-danger col-md-6 mx-auto text-center">';
        echo $errormessage;
        echo'</div>';

    }


    ?>


    <form class="col-md-6 mx-auto" action="" method="post" enctype="multipart/form-data">

    <label class="form-label" for="titre">Titre</label>
    <input class="form-control" type="text" name="titre" id="titre">
    
    <label class="form-label" for="prix">Prix</label>
    <input class="form-control" type="number" name="prix" id="prix" step=".1">
    
    <label class="form-label" for="description">Description</label>
    <textarea class="form-control"  name="description" id="description" cols="30" rows="10"></textarea> 
    
    <label class="form-label" for="photo">Photo</label>
    <input class="form-control" type="file" name="photo" id="photo">

    <button class="btn btn-primary d-block mx-auto mt-3">Ajouter</button>

    

</form>













<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>