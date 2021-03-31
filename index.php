<?php


if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($_FILES['image']['size'] <= 3000000) {
        $infoImage      = pathinfo($_FILES['image']['name']);
        $extensionImage = $infoImage['extension'];
        $extensionArray = array('png', 'gif', 'jpg', 'jpeg');


        if (in_array($extensionImage, $extensionArray)) {
            move_uploaded_file($_FILES['image']['tmp_name'], './asset' . time() . rand());
            
        }
    }else{
        echo "Votre Image est beaucoup trop lourde, max 3Mo."
    }
}
