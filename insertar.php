<?php
    include ('bd.php');

    if (isset($_POST['enviar']) ) {
    $id=$_POST['id'];
    $isbn=$_POST['isbn'];
    $nombre=$_POST['name'];
    $cel=$_POST['cel'];
    $dir=$_POST['dir'];
    $correo=$_POST['mail'];
    $des=$_POST['des'];

    $query="INSERT INTO cliente(cliente_id , isbn_libro , nombre, telefono, direccion, correo_electronico, descrpcion) 
    VALUES ('$id','$isbn','$nombre',' $cel','$dir','$correo','$des')";
    $resultados=mysqli_query($conn, $query);

    if ($resultados) {
        echo '<script lenguage="javascript">';
        echo 'alert ("Datos enviados exitosamente")
        </script>';
        header("location: mostrarclientes.php?cl");
    }   
    else{
        echo 'Datos no enviados';
    }
    }

    else if (isset($_POST['enviar1']) ) {
        $id1=$_POST['id1'];
        $isbn1=$_POST['isbn1'];
        $uni=$_POST['uni'];
        
    
        $query1="INSERT INTO cliente_libro(cliente_id, isbn_libro, cantidad_unidades) 
        VALUES ('$id1','$isbn1','$uni')";
        $resultados1=mysqli_query($conn, $query1);
    
        if ($resultados1) {
            echo '<script lenguage="javascript">';
            echo 'alert ("Datos enviados exitosamente")
            </script>';
            header("location: mostrarclientes.php?cll");
        }
        else{
            echo 'Datos no enviados';
        }
        }


        else if (isset($_POST['enviar2']) ) {
            $id2=$_POST['id2'];
            $en=$_POST['en'];
            $des=$_POST['des'];
            $nif=$_POST['nif'];
            $due=$_POST['due'];
            
        
            $query2="INSERT INTO libreria(cliente_id, encargado, descuento, nif, dueno) 
            VALUES ('$id2','$en','$des','$nif','$due')";
            $resultados2=mysqli_query($conn, $query2);
        
            if ($resultados2) {
                echo '<script lenguage="javascript">';
                echo 'alert ("Datos enviados exitosamente")
                </script>';
                header("location: mostrarclientes.php?li");
            }
            else{
                echo 'Datos no enviados';
            }
            }




            else if (isset($_POST['enviar3']) ) {
                $isbn2=$_POST['isbn2'];
                $nom=$_POST['nom'];
                $pvp1=$_POST['pvp1'];
                $año=$_POST['año'];
                $pag=$_POST['pag'];
                $codb=$_POST['codb'];
                $des2=$_POST['des2'];
                
            
                $query3="INSERT INTO libro(isbn_libro, nombre, pvp, ano_edicion, paginas, codigo_barra, descripcion) 
                VALUES ('$isbn2','$nom','$pvp1','$año','$pag','$codb','$des2')";
                $resultados3=mysqli_query($conn, $query3);
            
                if ($resultados3) {
                    echo '<script lenguage="javascript">';
                    echo 'alert ("Datos enviados exitosamente")
                    </script>';
                    header("location: mostrarclientes.php?lb");
                }
                else{
                    echo 'Datos no enviados';
                }
                }


                
                else if (isset($_POST['enviar4']) ) {
                    $id4=$_POST['id4'];
                    $ape=$_POST['ape'];
                    $dni=$_POST['dni'];
                    
                
                    $query4="INSERT INTO particular(cliente_id, apellidos, dni) 
                    VALUES ('$id4','$ape','$dni')";
                    $resultados4=mysqli_query($conn, $query4);
                
                    if ($resultados4) {
                        echo '<script lenguage="javascript">';
                        echo 'alert ("Datos enviados exitosamente")
                        </script>';
                        header("location: mostrarclientes.php?pa");
                    }
                    else{
                        echo 'Datos no enviados';
                    }
                    }

                    else if (isset($_POST['enviar5']) ) {
                        $idped=$_POST['idped'];
                        $idcl=$_POST['idcl'];
                        $isbnl=$_POST['isbnl'];
                        $imp=$_POST['imp'];
                        $fp=$_POST['fp'];
                        $obj=$_POST['obj'];
                        $feen=$_POST['feen'];
                        $fev=$_POST['fev'];
                        $feet=$_POST['feet'];
                        $fepa=$_POST['fepa'];
                        
                    
                        $query5="INSERT INTO pedidos(pedido_id, cliente_id, isbn_libro, importe, forma_pago, objeto_adjunto, fecha_entrada, fecha_envio, fecha_entrega, fecha_pago) 
                        VALUES ('$idped','$idcl','$isbnl','$imp','$fp','$obj','$feen','$fev','$feet','$fepa')";
                        $resultados5=mysqli_query($conn, $query5);
                    
                        if ($resultados5) {
                            echo '<script lenguage="javascript">';
                            echo 'alert ("Datos enviados exitosamente")
                            </script>';
                            header("location: mostrarclientes.php?pe");
                        }
                        else{
                            echo 'Datos no enviados';
                        }
                        }


?>