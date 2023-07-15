<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    <style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: white;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
.container{
    color: white;
}
/* diseño tabla*/
table {
  width: 100%;
  border: 0px solid #ddd;
}

td {
  padding: 10px;
}

tr:nth-child(even) {
  background-color:  #00384d;
}
/*Diseño de formulario de insertar*/
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 12px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
.container{
    color:white;
}
.form2{
  width: 100%;
  height: 50%;
}
</style>
</head>
<body>
<div class="background"></div><br>

<?php
if (isset($_REQUEST['cl'])) {
{?>
<table border="1" width="100%">
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?1">PDF</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda1">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td>
<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
  <h3 style="color: white;">Registro</h3>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="name">
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Telefono" name="cel">
  </div>

  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text" placeholder="Direccion" name="dir">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Correo" name="mail">
  </div>

  <div class="input-container">
    <i class="fa fa-folder icon"></i>
    <input class="input-field" type="text" placeholder="Descripcion" name="des">
  </div>

  <button type="submit" class="btn" name="enviar">Registrar</button>
</form>
</td>

<td>
<div class="container">
  <table>  

        <th>Id_cliente</th>
        <th>isbn_libro </th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>Descripcion</th>
        <th>Acciones</th>
    
    <?php
    include("bd.php");
    $query="SELECT * FROM cliente";
    $resultados=mysqli_query($conn, $query);
    while($row=mysqli_fetch_array($resultados)){?>
    <tr>
        <td><?php
            echo $row['cliente_id'] ;
        ?></td>

    <td><?php
            echo $row['isbn_libro'] ;
        ?></td>
    
    <td><?php
            echo $row['nombre'] ;
        ?></td>

    <td><?php
            echo $row['telefono'] ;
        ?></td>

    <td> <?php
            echo $row['direccion'] ;
        ?> </td>
         
    <td><?php
            echo $row['correo_electronico'] ;
        ?></td>

    <td><?php
            echo $row['descrpcion'] ;
        ?></td>
        <td>
            <a href="eliminar.php?id=<?php echo $row['cliente_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id=<?php echo $row['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</div>
</td>
</tr>
</table>
<?php }}	?>


<?php
if (isset($_REQUEST['cll'])) {
{?>
<table border="1" width="100%">
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?2">PDF</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td>
<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
  <h3 style="color: white;">Registro</h3>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id1">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn1">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Unidades" name="uni">
  </div>

  <button type="submit" class="btn" name="enviar1">Registrar</button>
</form>
</td>

<td>
    <div class="container">
  <table>  

        <th>Id_cliente</th>
        <th>isbn_libro </th>
        <th>Unidades</th>
        <th>Acciones</th>
        
    
    <?php
    include("bd.php");
    $query="SELECT * FROM cliente_libro";
    $resultados=mysqli_query($conn, $query);
    while($row=mysqli_fetch_array($resultados)){?>
    <tr>
        <td><?php
            echo $row['cliente_id'] ;
        ?></td>

    <td><?php
            echo $row['isbn_libro'] ;
        ?></td>
    
    <td><?php
            echo $row['cantidad_unidades'] ;
        ?></td>

        <td>
            <a href="eliminar.php?id1=<?php echo $row['cliente_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id1=<?php echo $row['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</td>
</tr>
</table>
    </div>

<?php }}	?>

<?php
if (isset($_REQUEST['li'])) {
{?>
<table border="1" width="100%">
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?3">PDF</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda3">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td>
<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
  <h3 style="color: white;">Registro</h3>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id2">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Encargado" name="en">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Descuento" name="des">
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="NIF" name="nif">
  </div>

  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text" placeholder="Dueño" name="due">
  </div>

  <button type="submit" class="btn" name="enviar2">Registrar</button>
</form>
</td>

<td>
<div class="container">
  <table>  

        <th>Id_cliente</th>
        <th>Encargado</th>
        <th>Descuento</th>
        <th>NIF</th>
        <th>Dueño</th>
        <th>Acciones</th>
    
    <?php
    include("bd.php");
    $query2="SELECT * FROM libreria";
    $resultados2=mysqli_query($conn, $query2);
    while($row2=mysqli_fetch_array($resultados2)){?>
    <tr>
        <td><?php
            echo $row2['cliente_id'] ;
        ?></td>

    <td><?php
            echo $row2['encargado'] ;
        ?></td>
    
    <td><?php
            echo $row2['descuento'] ;
        ?></td>

    <td><?php
            echo $row2['nif'] ;
        ?></td>

    <td> <?php
            echo $row2['dueno'] ;
        ?> </td>
         
    
        <td>
            <a href="eliminar.php?id2=<?php echo $row2['cliente_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id2=<?php echo $row2['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</div>
</td>
</tr>
</table>
<?php }}	?>

<?php
if (isset($_REQUEST['lb'])) {
{?>
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?4">PDF</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda4">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td>
<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
  <h3 style="color: white;">Registro</h3>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn2">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="nom">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="pvp" name="pvp1">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Año edicion" name="año">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Paginas" name="pag">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Codigo de barras" name="codb">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Descripción" name="des2">
  </div>

  <button type="submit" class="btn" name="enviar3">Registrar</button>
</form>
</td>

<td>
    <div class="container">
  <table>  

        <th>ISBN libro</th>
        <th>Nombre</th>
        <th>PVP</th>
        <th>Año edicion</th>
        <th>Paginas</th>
        <th>Codigo de barras</th>
        <th>Descripcion</th>
        <th>Acciones</th>
        
    
    <?php
    include("bd.php");
    $query3="SELECT * FROM libro";
    $resultados3=mysqli_query($conn, $query3);
    while($row3=mysqli_fetch_array($resultados3)){?>
    <tr>
        <td><?php
            echo $row3['isbn_libro'] ;
        ?></td>

    <td><?php
            echo $row3['nombre'] ;
        ?></td>
    
    <td><?php
            echo $row3['pvp'] ;
        ?></td>

    <td><?php
            echo $row3['ano_edicion'] ;
        ?></td>

    <td><?php
            echo $row3['paginas'] ;
        ?></td>
    
    <td><?php
            echo $row3['codigo_barra'] ;
        ?></td>

    <td><?php
            echo $row3['descripcion'] ;
        ?></td>

        <td>
            <a href="eliminar.php?id3=<?php echo $row3['isbn_libro']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id3=<?php echo $row3['isbn_libro']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</td>
</tr>
</table>
    </div>



<?php }}	?>

<?php
if (isset($_REQUEST['pa'])) {
{?>
<table border="1" width="100%">
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?5">PDF</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda5">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td>
<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
  <h3 style="color: white;">Registro</h3>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id4">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Apellidos" name="ape">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="DNI" name="dni">
  </div>

  <button type="submit" class="btn" name="enviar4">Registrar</button>
</form>
</td>

<td>
    <div class="container">
  <table>  

        <th>ID_cliente</th>
        <th>Apellidos </th>
        <th>DNI</th>
        <th>Acciones</th>
        
    
    <?php
    include("bd.php");
    $query4="SELECT * FROM particular";
    $resultados4=mysqli_query($conn, $query4);
    while($row4=mysqli_fetch_array($resultados4)){?>
    <tr>
        <td><?php
            echo $row4['cliente_id'] ;
        ?></td>

    <td><?php
            echo $row4['apellidos'] ;
        ?></td>
    
    <td><?php
            echo $row4['dni'] ;
        ?></td>

        <td>
            <a href="eliminar.php?id4=<?php echo $row4['cliente_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id4=<?php echo $row4['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</td>
</tr>
</table>
    </div>

<?php }}	?>




<?php
if (isset($_REQUEST['pe'])) {
{?>
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="pdf.php?6">PDF</a>
    <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda6">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div style="padding-left:16px">

</div>
<br>
<table>
<tr>

<td> 

<form action="insertar.php" method="POST" style="max-width:500px;margin:auto">
 
<h3 style="color: white;">Registro</h3>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID Pedido" name="idped">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ID Cliente" name="idcl">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ISBN Libro" name="isbnl">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Importe" name="imp">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Forma de pago" name="fp">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Objeto adjunto" name="obj">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de entrada" name="feen">
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de envio" name="fev">
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de entrega" name="feet">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de pago" name="fepa">
  </div>

  <button type="submit" class="btn" name="enviar5">Registrar</button>
</form>
</td>

<td>
    <div class="container">
  <table>  

        <th>ID Pedido</th>
        <th>ID Cliente</th>
        <th>ISBN Libro</th>
        <th>Importe</th>
        <th>Forma de pago</th>
        <th>Objeto adjunto</th>
        <th>Fecha de entrada</th>
        <th>Fecha de envio</th>
        <th>Fecha de entrega</th>
        <th>Fecha de pago</th>
        <th>Acciones</th>
        
    
    <?php
    include("bd.php");
    $query6="SELECT * FROM pedidos";
    $resultados6=mysqli_query($conn, $query6);
    while($row6=mysqli_fetch_array($resultados6)){?>
    <tr>
        <td><?php
            echo $row6['pedido_id'] ;
        ?></td>

    <td><?php
            echo $row6['cliente_id'] ;
        ?></td>
    
    <td><?php
            echo $row6['isbn_libro'] ;
        ?></td>

    <td><?php
            echo $row6['importe'] ;
        ?></td>

    <td><?php
            echo $row6['forma_pago'] ;
        ?></td>
    
    <td><?php
            echo $row6['objeto_adjunto'] ;
        ?></td>

    <td><?php
            echo $row6['fecha_entrada'] ;
        ?></td>

    <td><?php
            echo $row6['fecha_envio'] ;
        ?></td>
    
    <td><?php
            echo $row6['fecha_entrega'] ;
        ?></td>

    <td><?php
            echo $row6['fecha_pago'] ;
        ?></td>


        <td>
            <a href="eliminar.php?id5=<?php echo $row6['pedido_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id5=<?php echo $row6['pedido_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</table>
</td>
</tr>
</table>
    </div>



<?php }}	?>

</body>
</html>