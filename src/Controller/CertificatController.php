<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CertificatController extends AbstractController
{
    #[Route('/certificat-generation', name: 'app_certificat')]
    public function index()
    {
        $img = imagecreatefrompng($this->getParameter('kernel.project_dir') . "/public/images/certificat.png");

        // (B) TEXT & FONT SETTINGS
        $txtUserName = "";
        $date = date('d-m-Y');
        $fontFile = "C:\Windows\Fonts\arial.ttf"; // CHANGE TO YOUR OWN!
        $fontSize = 100;
        $fontColor = imagecolorallocate($img, 70, 70, 70);
        $angle = 0;

        // (C) CALCULATE TEXT BOX POSITION
        // (C1) GET IMAGE DIMENSIONS
        $iWidth = imagesx($img);
        $iHeight = imagesy($img);
        
        // (C2) GET TEXT BOX DIMENSIONS
        $tSize = imagettfbbox($fontSize, $angle, $fontFile, $txtUserName);
        $dSize = imagettfbbox($fontSize, $angle, $fontFile, $date);
        $tWidth = max([$tSize[2], $tSize[4]]) - min([$tSize[0], $tSize[6]]);
        $tHeight = max([$tSize[5], $tSize[7]]) - min([$tSize[1], $tSize[3]]);
        $dWidth = max([$dSize[2], $dSize[4]]) - min([$dSize[0], $dSize[6]]);
        $dHeight = max([$dSize[5], $dSize[7]]) - min([$dSize[1], $dSize[3]]);
        
        // (C3) CENTER THE TEXT BLOCK
        $centerX = ceil(($iWidth - $tWidth) / 2);
        $centerX = $centerX<0 ? 0 : $centerX;
        $centerY = ceil(($iHeight - $tHeight) / 2);
        $centerY = $centerY<0 ? 0 : $centerY;

        // (C3) CENTER THE TEXT BLOCK
        $dcenterX = ceil(($iWidth - $tWidth) / 2);
        $dcenterX = $centerX<0 ? 0 : $centerX;
        $dcenterY = ceil(($iHeight - $tHeight) / 2);
        $dcenterY = $centerY<0 ? 0 : $centerY;
        
        // (D) DRAW TEXT ON IMAGE
        imagettftext($img, $fontSize, $angle, $centerX, $centerY, $fontColor, $fontFile, $txtUserName);
        imagettftext($img, $fontSize, $angle, $dcenterX, $dcenterY, $fontColor, $fontFile, $date);
        
        // (E) OUTPUT IMAGE
        header("Content-type: image/png");
        imagepng($img);
        dd("toto");
        imagedestroy($img);
    }
}
