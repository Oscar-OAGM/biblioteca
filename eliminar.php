<?php
include('bd.php');

if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $query="DELETE FROM cliente WHERE cliente_id=$id";
    $resul=mysqli_query($conn, $query);
    if (!$resul) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?cl");
}
else if (isset($_GET['id1'])) {
    $id1=$_GET['id1'];
    $query1="DELETE FROM cliente_libro WHERE cliente_id=$id1";
    $resul1=mysqli_query($conn, $query1);
    if (!$resul1) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?cll");
}
else if (isset($_GET['id2'])) {
    $id2=$_GET['id2'];
    $query2="DELETE FROM libreria WHERE cliente_id=$id2";
    $resul2=mysqli_query($conn, $query2);
    if (!$resul2) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?li");
}
else if (isset($_GET['id3'])) {
    $id3=$_GET['id3'];
    $query3="DELETE FROM libro WHERE isbn_libro=$id3";
    $resul3=mysqli_query($conn, $query3);
    if (!$resul3) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?lb");
}

else if (isset($_GET['id4'])) {
    $id4=$_GET['id4'];
    $query4="DELETE FROM particular WHERE cliente_id=$id4";
    $resul4=mysqli_query($conn, $query4);
    if (!$resul4) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?pa");
}

else if (isset($_GET['id5'])) {
    $id5=$_GET['id5'];
    $query5="DELETE FROM pedidos WHERE pedido_id=$id5";
    $resul5=mysqli_query($conn, $query5);
    if (!$resul5) {
        die("Error al Eliminar");
    }
    header("location: mostrarclientes.php?pe");
}




?>