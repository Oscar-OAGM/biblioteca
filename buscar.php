<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  margin-bottom: 13px;
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
  padding: 8px;
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
    color: white;
}
</style>
</head>
<body>
<div class="background"></div><br>
    <?php        
    if (isset($_REQUEST['busqueda1'])) {
    $busqueda1=$_REQUEST['busqueda1']; 
    if (empty($busqueda1)) {
        header("location:  mostrarclientes.php?cl"); 
    }
    {?>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#contact">Contact</a>
  <div class="search-container">
    <form action="buscar.php" method="GET">
      <input type="text" placeholder="Buscar.." name="busqueda1" value="<?php echo $busqueda1 ?>">
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
  <h3>Registro</h3>
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
        $query="SELECT * FROM cliente 
        WHERE (cliente_id like '%$busqueda1%' or isbn_libro  like '%$busqueda1%' or nombre like '%$busqueda1%' or telefono like '%$busqueda1%' or direccion like '%$busqueda1%' or correo_electronico like '%$busqueda1%' or descrpcion like '%$busqueda1%')";
        $resultados=mysqli_query($conn, $query);
        while($row=mysqli_fetch_array($resultados)) {?>
         <tr>
            <td><?php
                echo $row['cliente_id'] ;
            ?></td>

        <td><?php
                echo utf8_decode ($row['isbn_libro']) ;
            ?></td>
        
        <td><?php
                echo utf8_decode ( $row['nombre']) ;
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

  </td>
  </tr>
  </table>
    </div>
    <?php } } 
        ?>

<?php   
if (isset($_REQUEST['busqueda2'])) {
  $busqueda2=$_REQUEST['busqueda2']; 
if (empty($busqueda2)) {
    header("location: mostrarclientes.php?cll"); 
}
{?>

<div class="topnav">
<a class="active" href="#home">Home</a>
<a href="#about">About</a>
<a href="#contact">Contact</a>
<div class="search-container">
<form action="buscar.php" method="GET">
  <input type="text" placeholder="Buscar.." name="busqueda2" value="<?php echo $busqueda2 ?>">
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
    <th>Cantidad_unidades</th>
    <?php
    include("bd.php");
    $query1="SELECT * FROM cliente_libro
    WHERE (cliente_id like '%$busqueda2%' or isbn_libro  like '%$busqueda2%' or cantidad_unidades like '%$busqueda2%')";
    $resultados1=mysqli_query($conn, $query1);
    while($row1=mysqli_fetch_array($resultados1)) {?>
     
     <tr>
        <td><?php
            echo $row1['cliente_id'] ;
        ?></td>

    <td><?php
            echo utf8_decode ($row1['isbn_libro']) ;
        ?></td>
    
    <td><?php
            echo utf8_decode ( $row1['cantidad_unidades']) ;
        ?></td>

        <td>
            <a href="eliminar.php?id1=<?php echo $row1['cliente_id']?>">
             <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id1=<?php echo $row1['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    
    <?php }  
    ?>
    </table>
</div>
</td>
</tr> 

<?php } } 
    ?>

<?php   
if (isset($_REQUEST['busqueda3'])) {
  $busqueda3=$_REQUEST['busqueda3']; 
if (empty($busqueda3)) {
    header("location: mostrarclientes.php?li"); 
}
{?>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
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
  <h2>Registro</h2>
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
    $query3="SELECT * FROM libreria 
    WHERE (cliente_id like '%$busqueda3%' or encargado  like '%$busqueda3%' or descuento like '%$busqueda3%' or nif like '%$busqueda3%' or dueño like '%$busqueda3%')";
    
    $resultados3=mysqli_query($conn, $query3);
    while($row3=mysqli_fetch_array($resultados3)){?>
    <tr>
        <td><?php
            echo $row3['cliente_id'] ;
        ?></td>

    <td><?php
            echo $row3['encargado'] ;
        ?></td>
    
    <td><?php
            echo $row3['descuento'] ;
        ?></td>

    <td><?php
            echo $row3['nif'] ;
        ?></td>

    <td> <?php
            echo $row3['dueño'] ;
        ?> </td>
         
    
        <td>
            <a href="eliminar.php?id2=<?php echo $row3['cliente_id']?>">
            <img src="img/eliminar.png" width="30px"></a>
        
            <a href="actualizar.php?id2=<?php echo $row3['cliente_id']?>">
             <img src="img/actualizar.png" width="30px"></a>
        </td>
    </tr>
    <?php }  
    ?>
</div>
</td>
</tr>
</table>

<?php } } 
    ?>


<?php   
if (isset($_REQUEST['busqueda4'])) {
  $busqueda4=$_REQUEST['busqueda4']; 
if (empty($busqueda4)) {
    header("location: mostrarclientes.php?lb"); 
}
{?>

<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="#about">About</a>
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
  <h3>Registro</h3>
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
    $query3="SELECT * FROM libro
    WHERE (isbn_libro like '%$busqueda4%' or nombre like '%$busqueda4%' or pvp like '%$busqueda4%' or ano_edicion like '%$busqueda4%' or paginas like '%$busqueda4%' or codigo_barra like '%$busqueda4%' or descripcion like '%$busqueda4%')";
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


<?php } } 
    ?>


w



<?php   
if (isset($_REQUEST['busqueda5'])) {
  $busqueda5=$_REQUEST['busqueda5']; 
if (empty($busqueda5)) {
    header("location: mostrarclientes.php?pa"); 
}
{?>
<table border="1" width="100%">
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="#about">About</a>
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
  <h3>Registro</h3>
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
    $query4="SELECT * FROM particular 
     WHERE (cliente_id like '%$busqueda5%' or apellidos like '%$busqueda5%' or dni like '%$busqueda5%')";
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
if (isset($_REQUEST['busqueda6'])) {
  $busqueda6=$_REQUEST['busqueda6']; 
if (empty($busqueda6)) {
    header("location: mostrarclientes.php?pe"); 
}
{?>
<div class="topnav">
  <a class="active" href="menu.php">Menu</a>
  <a href="#about">About</a>
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
  <h3>Registro</h3>
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
    $query6="SELECT * FROM pedidos
    WHERE (pedido_id like '%$busqueda6%' or cliente_id like '%$busqueda6%' or isbn_libro like '%$busqueda6%' or importe like '%$busqueda6%' or objeto_adjunto like '%$busqueda6%' or forma_pago like '%$busqueda6%' or fecha_entrada like '%$busqueda6%' or fecha_envio like '%$busqueda6%' or fecha_entrega like '%$busqueda6%' or fecha_pago like '%$busqueda6%')";
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