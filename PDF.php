<?php
include_once('../libFPDF/fpdf.php');
class PDF extends FPDF{
 
    function designUp($espejo = 0){
        $this->Rect( (13 + $espejo), 13, 90, 100); //Marco exterior
        $this->Rect( (18 + $espejo), 18, 25, 30); //Marco foto
 
        //Nombre y su recuadro
        $this->setXY((50 + $espejo), 20);
        $this->Cell(29, 7, 'Nombre');
 
        $this->setXY((50 + $espejo), 28);
        $this->Cell(50, 7, '', 1);
 
        //Mail y su recuadro
        $this->setXY((50 + $espejo), 45);
        $this->Cell(29, 7, 'Mail');
 
        $this->setXY((50 + $espejo), 53);
        $this->Cell(50, 7, '', 1);
 
        //Edad y su recuadro
        $this->setXY( (18 + $espejo), 53);
        $this->Cell(13, 7, 'Edad');
 
        $this->setXY((31 + $espejo), 53);
        $this->Cell(12, 7, '', 1);
 
        //Imagen de expo
        $this->Image('../images/expo.jpg', (18 + $espejo), 65, 80 ,45);
 
    }
 
    function designDown($espejo = 0){
        $this->Rect((13 + $espejo), 150, 90, 100); //Marco exterior
        $this->Rect( (18 + $espejo), 155 , 25, 30); //Marco foto
 
        //Nombre
        $this->setXY((50 + $espejo), 160);
        $this->Cell(29, 7, 'Nombre');
 
        $this->setXY((50 + $espejo), 168);
        $this->Cell(50, 7, '', 1);
 
        //Mail
        $this->setXY((50 + $espejo), 185);
        $this->Cell(29, 7, 'Mail');
 
        $this->setXY((50 + $espejo), 193);
        $this->Cell(50, 7, '', 1);
 
        //Edad
        $this->setXY((18 + $espejo), 193);
        $this->Cell(13, 7, 'Edad');
 
        $this->setXY((31 + $espejo), 193);
        $this->Cell(12, 7, '', 1);
 
        //Imagen de expo
        $this->Image('../images/expo.jpg', (18 + $espejo), 203, 80 ,45);
 
    }
}//fin clase PDF
?>