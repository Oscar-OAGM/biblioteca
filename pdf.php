<?php
if (isset($_REQUEST['1'])){
require('pdff/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(150);
    // Título
    $this->Cell(40,10,'Clientes',1,0,'C');
    // Salto de línea
    $this->Ln(40);

    $this->cell(30,10, 'cliente_id',1,0, 'C', 0);
    $this->cell(55,10, 'isbn_libro',1,0, 'C', 0);
    $this->cell(55,10, 'nombre',1,0, 'C', 0);
    $this->cell(40,10, 'telefono',1,0, 'C', 0);
    $this->cell(40,10, 'direccion',1,0, 'C', 0);
    $this->cell(80,10, 'correo_electronico', 1,0, 'C', 0);
    $this->cell(45,10, 'descrpcion',1,0, 'C', 0);
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Requerimiento de la base de datos
require 'bd.php';
$consulta="SELECT * FROM cliente";
$resultado = $conn -> query($consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf -> addpage ('landscape', 'legal');
$pdf->AliasNbPages();
$pdf->SetFont('Times','',12);

while($row=$resultado->fetch_assoc()){
    $pdf -> cell(30,10, $row['cliente_id'], 1,0,'C',0);
    $pdf -> cell(55,10, $row['isbn_libro'], 1,0,'C',0);
    $pdf -> cell(55,10, $row['nombre'], 1,0,'C',0);
    $pdf -> cell(40,10, $row['telefono'], 1,0,'C',0);
    $pdf -> cell(40,10, $row['direccion'], 1,0,'C',0);
    $pdf -> cell(80,10, $row['correo_electronico'], 1,0,'C',0);
    $pdf -> cell(45,10, $row['descrpcion'], 1,0,'C',0);
    $pdf->Ln(10);
}

$pdf->Output();
}



if (isset($_REQUEST['2'])){
    require('pdff/fpdf.php');
    
    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(150);
        // Título
        $this->Cell(40,10,'Cliente libro',1,0,'C');
        // Salto de línea
        $this->Ln(40);
    
        $this->Cell(80);
        $this->cell(70,10, 'cliente_id',1,0, 'C', 0);
        $this->cell(70,10, 'isbn_libro',1,0, 'C', 0);
        $this->cell(70,10, 'cantidad_unidades',1,0, 'C', 0);
        $this->Ln(10);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    //Requerimiento de la base de datos
    require 'bd.php';
    $consulta1="SELECT * FROM cliente_libro";
    $resultado1 = $conn -> query($consulta1);
    // Creación del objeto de la clase heredada
    $pdf1 = new PDF();
    $pdf1 -> addpage ('landscape', 'legal');
    $pdf1->AliasNbPages();
    $pdf1->SetFont('Times','',12);
    
    while($row1=$resultado1->fetch_assoc()){
        $pdf1->Cell(80);
        $pdf1 -> cell(70,10, $row1['cliente_id'], 1,0,'C',0);
        $pdf1 -> cell(70,10, $row1['isbn_libro'], 1,0,'C',0);
        $pdf1 -> cell(70,10, $row1['cantidad_unidades'], 1,0,'C',0);
        $pdf1 -> Ln(10);
    }
    
    $pdf1->Output();
    }




    if (isset($_REQUEST['4'])){
    require('pdff/fpdf.php');
    
    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(150);
        // Título
        $this->Cell(40,10,'Libro',1,0,'C');
        // Salto de línea
        $this->Ln(40);
    
        $this->Cell(30);
        $this->cell(30,10, 'isbn_libro',1,0, 'C', 0);
        $this->cell(50,10, 'nombre',1,0, 'C', 0);
        $this->cell(30,10, 'nif',1,0, 'C', 0);
        $this->cell(50,10, 'ano_edicion',1,0, 'C', 0);
        $this->cell(30,10, 'paginas',1,0, 'C', 0);
        $this->cell(50,10, 'codigo_barra',1,0, 'C', 0);
        $this->cell(60,10, 'descripcion',1,0, 'C', 0);
        $this->Ln(10);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    //Requerimiento de la base de datos
    require 'bd.php';
    $consulta3="SELECT * FROM libro";
    $resultado3 = $conn -> query($consulta3);
    // Creación del objeto de la clase heredada
    $pdf3 = new PDF();
    $pdf3 -> addpage ('landscape', 'legal');
    $pdf3->AliasNbPages();
    $pdf3->SetFont('Times','',12);
    
    while($row3=$resultado3->fetch_assoc()){
        $pdf3->Cell(30);
        $pdf3 -> cell(30,10, $row3['isbn_libro'], 1,0,'C',0);
        $pdf3 -> cell(50,10, $row3['nombre'], 1,0,'C',0);
        $pdf3 -> cell(30,10, $row3['pvp'], 1,0,'C',0);
        $pdf3 -> cell(50,10, $row3['ano_edicion'], 1,0,'C',0);
        $pdf3 -> cell(30,10, $row3['paginas'], 1,0,'C',0);
        $pdf3 -> cell(50,10, $row3['codigo_barra'], 1,0,'C',0);
        $pdf3 -> cell(60,10, $row3['descripcion'], 1,0,'C',0);
        $pdf3 -> Ln(10);
    }
    
    $pdf3->Output();
    }



    if (isset($_REQUEST['3'])){
        require('pdff/fpdf.php');
        
        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            // Logo
            
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(150);
            // Título
            $this->Cell(40,10,'libreria',1,0,'C');
            // Salto de línea
            $this->Ln(40);
        
            $this->Cell(1);
            $this->cell(70,10, 'cliente_id',1,0, 'C', 0);
            $this->cell(70,10, 'encargado',1,0, 'C', 0);
            $this->cell(70,10, 'descuento',1,0, 'C', 0);
            $this->cell(70,10, 'nif',1,0, 'C', 0);
            $this->cell(70,10, 'Dueno',1,0, 'C', 0);
            $this->Ln(10);
        }
        
        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        }
        //Requerimiento de la base de datos
        require 'bd.php';
        $consulta2="SELECT * FROM libreria";
        $resultado2 = $conn -> query($consulta2);
        // Creación del objeto de la clase heredada
        $pdf2 = new PDF();
        $pdf2 -> addpage ('landscape', 'legal');
        $pdf2->AliasNbPages();
        $pdf2->SetFont('Times','',12);
        
        while($row2=$resultado2->fetch_assoc()){
            $pdf2->Cell(1);
            $pdf2 -> cell(70,10, $row2['cliente_id'], 1,0,'C',0);
            $pdf2 -> cell(70,10, $row2['encargado'], 1,0,'C',0);
            $pdf2 -> cell(70,10, $row2['descuento'], 1,0,'C',0);
            $pdf2 -> cell(70,10, $row2['nif'], 1,0,'C',0);
            $pdf2 -> cell(70,10, $row2['dueno'], 1,0,'C',0);
            $pdf2 -> Ln(10);
        }
        
        $pdf2->Output();
        }

        if (isset($_REQUEST['3'])){
            require('pdff/fpdf.php');
            
            class PDF extends FPDF
            {
            // Cabecera de página
            function Header()
            {
                // Logo
                
                // Arial bold 15
                $this->SetFont('Arial','B',15);
                // Movernos a la derecha
                $this->Cell(150);
                // Título
                $this->Cell(40,10,'libreria',1,0,'C');
                // Salto de línea
                $this->Ln(40);
            
                $this->Cell(1);
                $this->cell(70,10, 'cliente_id',1,0, 'C', 0);
                $this->cell(70,10, 'encargado',1,0, 'C', 0);
                $this->cell(70,10, 'descuento',1,0, 'C', 0);
                $this->cell(70,10, 'nif',1,0, 'C', 0);
                $this->cell(70,10, 'Dueno',1,0, 'C', 0);
                $this->Ln(10);
            }
            
            // Pie de página
            function Footer()
            {
                // Posición: a 1,5 cm del final
                $this->SetY(-15);
                // Arial italic 8
                $this->SetFont('Arial','I',8);
                // Número de página
                $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            }
            }
            //Requerimiento de la base de datos
            require 'bd.php';
            $consulta2="SELECT * FROM libreria";
            $resultado2 = $conn -> query($consulta2);
            // Creación del objeto de la clase heredada
            $pdf2 = new PDF();
            $pdf2 -> addpage ('landscape', 'legal');
            $pdf2->AliasNbPages();
            $pdf2->SetFont('Times','',12);
            
            while($row2=$resultado2->fetch_assoc()){
                $pdf2->Cell(1);
                $pdf2 -> cell(70,10, $row2['cliente_id'], 1,0,'C',0);
                $pdf2 -> cell(70,10, $row2['encargado'], 1,0,'C',0);
                $pdf2 -> cell(70,10, $row2['descuento'], 1,0,'C',0);
                $pdf2 -> cell(70,10, $row2['nif'], 1,0,'C',0);
                $pdf2 -> cell(70,10, $row2['dueno'], 1,0,'C',0);
                $pdf2 -> Ln(10);
            }
            
            $pdf2->Output();
            }



            if (isset($_REQUEST['5'])){
                require('pdff/fpdf.php');
                
                class PDF extends FPDF
                {
                // Cabecera de página
                function Header()
                {
                    // Logo
                    
                    // Arial bold 15
                    $this->SetFont('Arial','B',15);
                    // Movernos a la derecha
                    $this->Cell(150);
                    // Título
                    $this->Cell(40,10,'Particular',1,0,'C');
                    // Salto de línea
                    $this->Ln(40);
                
                    $this->Cell(80);
                    $this->cell(70,10, 'cliente_id',1,0, 'C', 0);
                    $this->cell(70,10, 'apellidos',1,0, 'C', 0);
                    $this->cell(70,10, 'dni',1,0, 'C', 0);
                    $this->Ln(10);
                }
                
                // Pie de página
                function Footer()
                {
                    // Posición: a 1,5 cm del final
                    $this->SetY(-15);
                    // Arial italic 8
                    $this->SetFont('Arial','I',8);
                    // Número de página
                    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                }
                }
                //Requerimiento de la base de datos
                require 'bd.php';
                $consulta4="SELECT * FROM particular";
                $resultado4 = $conn -> query($consulta4);
                // Creación del objeto de la clase heredada
                $pdf4 = new PDF();
                $pdf4 -> addpage ('landscape', 'legal');
                $pdf4->AliasNbPages();
                $pdf4->SetFont('Times','',12);
                
                while($row4=$resultado4->fetch_assoc()){
                    $pdf4->Cell(80);
                    $pdf4 -> cell(70,10, $row4['cliente_id'], 1,0,'C',0);
                    $pdf4 -> cell(70,10, $row4['apellidos'], 1,0,'C',0);
                    $pdf4 -> cell(70,10, $row4['dni'], 1,0,'C',0);
                    $pdf4 -> Ln(10);
                }
                
                $pdf4->Output();
                }

                if (isset($_REQUEST['6'])){
                    require('pdff/fpdf.php');
                    
                    class PDF extends FPDF
                    {
                    // Cabecera de página
                    function Header()
                    {
                        // Logo
                        
                        // Arial bold 15
                        $this->SetFont('Arial','B',15);
                        // Movernos a la derecha
                        $this->Cell(150);
                        // Título
                        $this->Cell(40,10,'Pedidos',1,0,'C');
                        // Salto de línea
                        $this->Ln(40);
                    
                        $this->Cell(-10);
                        $this->cell(30,10, 'pedido_id',1,0, 'C', 0);
                        $this->cell(30,10, 'cliente_id',1,0, 'C', 0);
                        $this->cell(30,10, 'isbn_libro',1,0, 'C', 0);
                        $this->cell(30,10, 'importe',1,0, 'C', 0);
                        $this->cell(40,10, 'forma_pago',1,0, 'C', 0);
                        $this->cell(40,10, 'objeto_adjunto',1,0, 'C', 0);
                        $this->cell(40,10, 'fecha_entrada',1,0, 'C', 0);
                        $this->cell(40,10, 'fecha_envio',1,0, 'C', 0);
                        $this->cell(40,10, 'fecha_entrega',1,0, 'C', 0);
                        $this->cell(40,10, 'fecha_pago',1,0, 'C', 0);
                        $this->Ln(10);
                    }
                    
                    // Pie de página
                    function Footer()
                    {
                        // Posición: a 1,5 cm del final
                        $this->SetY(-15);
                        // Arial italic 8
                        $this->SetFont('Arial','I',8);
                        // Número de página
                        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
                    }
                    }
                    //Requerimiento de la base de datos
                    require 'bd.php';
                    $consulta5="SELECT * FROM pedidos";
                    $resultado5 = $conn -> query($consulta5);
                    // Creación del objeto de la clase heredada
                    $pdf5 = new PDF();
                    $pdf5 -> addpage ('landscape', 'legal');
                    $pdf5->AliasNbPages();
                    $pdf5->SetFont('Times','',12);
                    
                    while($row5=$resultado5->fetch_assoc()){
                        $pdf5->Cell(-10);
                        $pdf5 -> cell(30,10, $row5['pedido_id'], 1,0,'C',0);
                        $pdf5 -> cell(30,10, $row5['cliente_id'], 1,0,'C',0);
                        $pdf5 -> cell(30,10, $row5['isbn_libro'], 1,0,'C',0);
                        $pdf5 -> cell(30,10, $row5['importe'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['forma_pago'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['objeto_adjunto'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['fecha_entrada'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['fecha_envio'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['fecha_entrega'], 1,0,'C',0);
                        $pdf5 -> cell(40,10, $row5['fecha_pago'], 1,0,'C',0);
                        $pdf5 -> Ln(10);
                    }
                    
                    $pdf5->Output();
                    }
?>