<?php
include_once('PDF.php');
include_once('myDBC.php');
 
    $db = new myDBC();
 
    //Carpeta imágenes está un directorio arriba
    $directorioPadre = '../';
 
    $infoUsuario = $db->seleccionar_datos();
    $registros = $db->contar_registros(); //Total de registros obtenidos
 
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
    $pdf->SetFont('Arial','B',12); //Arial, negrita, 12 puntos
 
    //Nos ayuda a saber qué posición está haciendo
    //Posición 0 || 1 || 2 || 3
    $posicion = 0;
 
    for($i = 0; $i < $registros; $i++)
    {
        switch($posicion)
        {
            case 0:
                $pdf->designUp();
 
                //Imagen del usuario
                $pdf->Image($directorioPadre.$infoUsuario[$i]['ruta'], 19, 19, 23, 28 );
 
                //Nombre del usuario
                $pdf->setXY(50, 28);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Nombre']), 0);
 
                //Email del usuario
                $pdf->setXY(50, 53);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Direccion']), 0);
 
                //Edad del usuario
                $pdf->setXY(31, 53);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Telefono']), 0);
 
                $posicion++; //Aumenta posición
            break;
 
            case 1:
                $pdf->designUp(100);
 
                $pdf->setXY(150, 28);
                $pdf->Image($directorioPadre.$infoUsuario[$i]['ruta'], 119, 19, 23, 28 );
 
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['nombre']), 0);
 
                $pdf->setXY(150, 53);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['email']), 0);
 
                $pdf->setXY(131, 53);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['edad']), 0);
 
                $posicion++;
            break;
 
            case 2:
                $pdf->designDown();
 
                $pdf->Image($directorioPadre.$infoUsuario[$i]['ruta'], 19, 156, 23, 28 );
 
                $pdf->setXY(50, 168);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['nombre']), 0);
 
                $pdf->setXY(50, 193);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['email']), 0);
 
                $pdf->setXY(31, 193);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['edad']), 0);
 
                $posicion++;
            break;
 
            case 3:
                //Setear la posición a cero de nuevo
                $posicion = 0;
 
                $pdf->designDown(100);
 
                $pdf->Image($directorioPadre.$infoUsuario[$i]['ruta'], 119, 156, 23, 28 );
 
                $pdf->setXY(150, 168);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Nombre']), 0);
 
                $pdf->setXY(150, 193);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Direccion']), 0);
 
                $pdf->setXY(131, 193);
                $pdf->Cell(40, 7, utf8_decode($infoUsuario[$i]['Telefono']), 0);
 
                //Esta condición asegura que se agregue una hoja necesaria
                //para seguir con los registros
                if($i != ($registros - 1))
                {
                    $pdf->AddPage('P', 'Letter');
                }
 
            break;
        }
    }
 
    $pdf->Output(); //Salida al navegador del pdf
?>