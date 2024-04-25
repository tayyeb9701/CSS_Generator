<?php
function spr()
{
    $lx = 0;
    $hx = 0;
    $fichier = glob("png/*.png");

    foreach($fichier as $taille)
    {
        $y = getimagesize($taille);
        if($y[1] > $lx)
        {
            $lx = $y[1];
        }
        if($y[0] > $hx)
        {
            $hx = $y[0];
        }
        
    }

    $background = imagecreate($hx * count($fichier), $lx);
    $orange = imagecolorallocate($background, 255, 0, 0);
    imagecolortransparent($background, $orange);

    $x = 0;
    foreach($fichier as $value)
    {
        $img = imagecreatefrompng($value);
        imagecopy($background, $img, $x, 0,0,0,$lx,$lx);
        $x += $hx;
    }
    imagepng($background, 'sprite.png');
    
}
spr();
?>