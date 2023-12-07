<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CertificatController extends AbstractController
{
    #[Route('/certificat-generation', name: 'app_certificat')]
    public function index()
    {
        $img = imagecreatefrompng("demo.png");

        // (B) TEXT & FONT SETTINGS
        $txt = "BUBBLE TEA";
        $fontFile = "C:\Windows\Fonts\arial.ttf"; // CHANGE TO YOUR OWN!
        $fontSize = 24;
        $fontColor = imagecolorallocate($img, 255, 0, 0);
        $angle = 0;

        // (C) CALCULATE TEXT BOX POSITION
        // (C1) GET IMAGE DIMENSIONS
        $iWidth = imagesx($img);
        $iHeight = imagesy($img);

        // (C2) GET TEXT BOX DIMENSIONS
        $tSize = imagettfbbox($fontSize, $angle, $fontFile, $txt);
        $tWidth = max([$tSize[2], $tSize[4]]) - min([$tSize[0], $tSize[6]]);
        $tHeight = max([$tSize[5], $tSize[7]]) - min([$tSize[1], $tSize[3]]);

        // (C3) CENTER THE TEXT BLOCK
        $centerX = ceil(($iWidth - $tWidth) / 2);
        $centerX = $centerX<0 ? 0 : $centerX;
        $centerY = ceil(($iHeight - $tHeight) / 2);
        $centerY = $centerY<0 ? 0 : $centerY;

        // (D) DRAW TEXT ON IMAGE
        imagettftext($img, $fontSize, $angle, $centerX, $centerY, $fontColor, $fontFile, $txt);
        
        // (E) OUTPUT IMAGE
        header("Content-type: image/png");
        imagepng($img);
        imagedestroy($img);
    }
}
