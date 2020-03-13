<?php
    include_once('mysql.php');
    $db=new BaseDeDonnees();
    function getCopyrigtedImage($idp) {
        global $db;

        header("Content-type: image.png");
        $produitImage=$db->getProduit($idp)["img"];
        // $img=imagecreatefrompng($produitImage);
        $mime=mime_content_type ('../img/'.$produitImage);
        switch ($mime) {
            case 'image/png':
                $copyrigtedImage=imagecreatefrompng('../img/'.$produitImage);
                break;
            
            case 'image/jpeg':
                $copyrigtedImage=imagecreatefromjpeg('../img/'.$produitImage);
                break;
            default:
                return;
        }
        imagepng($copyrigtedImage);
    }

    if(isset($_GET["idp"]))getCopyrigtedImage($_GET["idp"]);
    getCopyrigtedImage();
    



    // Définir la variable d'environnement pour GD
    // putenv('GDFONTPATH=' . realpath('.'));

    // Nommez la police à utiliser (Notez l'absence de l'extension .ttf)
    $font = '../font/Admiration_Pains.ttf';
    $violet = imagecolorallocate($copyrigtedImage, 250,0,128);

    // Ajout d'ombres au texte
    imagettftext($im, 20, 0, 11, 21, $grey, $font, 'MyPhpSjop');

    // Ajout du texte
    imagettftext($im, 20, 0, 10, 20, $black, $font, 'MyPhpSjop');

    // Utiliser imagepng() donnera un texte plus claire,
    // comparé à l'utilisation de la fonction imagejpeg()
    imagetttext($$copyrigtedImage,30,0,10,50,$violet,$font,'MyPhpShop')
    imagepng($copyrigtedImage);
    imagedestroy($copyrigtedImage);


?>