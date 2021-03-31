<?php

/*
Script Php pour stocker une image dans un dossier.
*/


//Vérification : si image existe et qu'il n'y a pas d'erreur
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {



    // Variable error
    $error = 1;

    //Condition pour gérer la taille de l'image
    if ($_FILES['image']['size'] <= 3000000) {
        //Extension : 
        // On récupère les infos du tableau
        $infoImage      = pathinfo($_FILES['image']['name']);
        // On récupère l'extension
        $extensionImage = $infoImage['extension'];
        //Création d'un tableau d'extension valabe
        $extensionArray = array('png', 'gif', 'jpg', 'jpeg');

        //On controle son extension et on renomme avec la date d'aujourd'hui et un chiffre aléatoire
        if (in_array($extensionImage, $extensionArray)) {
            //Chemin de stockage 
            $uriImage = './asset' . time() . rand() . '.' . $extensionImage;
            move_uploaded_file($_FILES['image']['tmp_name'],  $uriImage);
            $error = 0;
        }
    } else {
        echo "Votre Image est beaucoup trop lourde, max 3Mo.";
    }
};


if (isset($error) && $error == 0) {
    echo '<div id = "containerImage">
    <img style="max-width:100px" src="' . $uriImage . '"id ="image"/>
    </div>' . '<a href="./index.html">
    <button>Retour</button>
</a>';
}
