<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
 .input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
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
    </style>
</head>
<body>
<div class="background"></div><br>

<?php
 include("bd.php");
 if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $query="SELECT * FROM cliente WHERE cliente_id=$id";
  $result=mysqli_query($conn, $query);
  if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result);
    $cod=$row['cliente_id'];
    $isbn=$row['isbn_libro'];
    $nombre=$row['nombre'];
    $cel=$row['telefono'];
    $dir=$row['direccion'];
    $correo=$row['correo_electronico'];
    $des=$row['descrpcion'];
  }
 

 if (isset($_POST['actualizar'])) {
  $uno= $_POST['id'];
  $dos=$_POST['isbn'];
  $tres=$_POST['name'];
  $cuatro=$_POST['cel'];
  $cinco=$_POST['dir'];
  $seis=$_POST['mail'];
  $siete=$_POST['des'];

 
  $query="UPDATE cliente SET cliente_id='$uno', isbn_libro='$dos', nombre='$tres', telefono='$cuatro', direccion='$cinco', correo_electronico='$seis', descrpcion='$siete' WHERE cliente_id=$id";
  mysqli_query($conn, $query);
  header("location: mostrarclientes.php?cl");
 }
  {?>

<form  action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST" style="max-width:500px;margin:auto">
  <h1 style="color: white;">Actualizar datos</h1>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id" value="<?php echo $cod; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn" value="<?php echo $isbn; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="name" value="<?php echo $nombre; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="Telefono" name="cel" value="<?php echo $cel; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text" placeholder="Direccion" name="dir" value="<?php echo $dir; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Correo" name="mail" value="<?php echo $correo; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-folder icon"></i>
    <input class="input-field" type="text" placeholder="Descripcion" name="des" value="<?php echo $des; ?>" required>
  </div>

  <button type="submit" class="btn" name="actualizar">Actualizar</button>
</form>
<?php } } 
        ?>


<?php
if (isset($_GET['id1'])) {
  $id1=$_GET['id1'];
  $query1="SELECT * FROM cliente_libro WHERE cliente_id=$id1";
  $result1=mysqli_query($conn, $query1);
  if(mysqli_num_rows($result1)==1){
    $row1=mysqli_fetch_array($result1);
    $cod1=$row1['cliente_id'];
    $isbn1=$row1['isbn_libro'];
    $uni=$row1['cantidad_unidades'];
  }
 

 if (isset($_POST['actualizar1'])) {
  $uno1= $_POST['id1'];
  $dos1=$_POST['isbn1'];
  $tres1=$_POST['uni'];


 
  $query1="UPDATE cliente_libro SET cliente_id='$uno1', isbn_libro='$dos1', cantidad_unidades='$tres1' WHERE cliente_id=$id1";
  mysqli_query($conn, $query1);
  header("location: mostrarclientes.php?cll");
 }
  {?>

<form  action="actualizar.php?id1=<?php echo $_GET['id1']; ?>" method="POST" style="max-width:500px;margin:auto">
  <h1 style="color: white;">Actualizar datos</h1>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id1" value="<?php echo $cod1; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn1" value="<?php echo $isbn1; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="uni" value="<?php echo $uni; ?>" required>
  </div>


  <button type="submit" class="btn" name="actualizar1">Actualizar</button>
</form>
<?php } } 
        ?>

<?php
if (isset($_GET['id2'])) {
  $id2=$_GET['id2'];
  $query2="SELECT * FROM libreria WHERE cliente_id=$id2";
  $result2=mysqli_query($conn, $query2);
  if(mysqli_num_rows($result2)==1){
    $row2=mysqli_fetch_array($result2);
    $cod2=$row2['cliente_id'];
    $en=$row2['encargado'];
    $des=$row2['descuento'];
    $nif=$row2['nif'];
    $due=$row2['dueño'];
  }
 

 if (isset($_POST['actualizar2'])) {
  $uno2=$_POST['id2'];
  $dos2=$_POST['en'];
  $tres2=$_POST['des'];
  $cuatro2=$_POST['nif'];
  $cinco2=$_POST['due'];


 
  $query1="UPDATE libreria SET cliente_id='$uno2', encargado='$dos2', descuento='$tres2', nif='$cuatro2', dueño='$cinco2' WHERE cliente_id=$id2";
  mysqli_query($conn, $query1);
  header("location: mostrarclientes.php?li");
 }
  {?>

<form  action="actualizar.php?id2=<?php echo $_GET['id2']; ?>" method="POST" style="max-width:500px;margin:auto">
  <h1 style="color: white;">Actualizar datos</h1>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id2" value="<?php echo $cod2; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Encargado" name="en" value="<?php echo $en; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Descuento" name="des" value="<?php echo $des; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class="input-field" type="text" placeholder="NIF" name="nif" value="<?php echo $nif; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-home icon"></i>
    <input class="input-field" type="text" placeholder="Dueño" name="due" value="<?php echo $due; ?>" required>
  </div>


  <button type="submit" class="btn" name="actualizar2">Actualizar</button>
</form>
<?php } } 
        ?>


<?php
if (isset($_GET['id3'])) {
  $id3=$_GET['id3'];
  $query3="SELECT * FROM libro WHERE isbn_libro=$id3";
  $result3=mysqli_query($conn, $query3);
  if(mysqli_num_rows($result3)==1){
    $row3=mysqli_fetch_array($result3);
    $isbn2=$row3['isbn_libro'];
    $nom=$row3['nombre'];
    $pvp1=$row3['pvp'];
    $año=$row3['ano_edicion'];
    $pag=$row3['paginas'];
    $codb=$row3['codigo_barra'];
    $des2=$row3['descripcion'];
  }
 

 if (isset($_POST['actualizar3'])) {
  $uno3=$_POST['isbn2'];
  $dos3=$_POST['nom'];
  $tres3=$_POST['pvp1'];
  $cuatro3=$_POST['año'];
  $cinco3=$_POST['pag'];
  $seis3=$_POST['codb'];
  $siete3=$_POST['des2'];


 
  $query3="UPDATE libro SET isbn_libro='$uno3', nombre='$dos3', pvp='$tres3', ano_edicion='$cuatro3', paginas='$cinco3' , codigo_barra='$seis3', descripcion='$siete3' WHERE isbn_libro=$id3";
  mysqli_query($conn, $query3);
  header("location: mostrarclientes.php?lb");
 }
  {?>
  <form action="actualizar.php?id3=<?php echo $_GET['id3']; ?>" method="POST" style="max-width:500px;margin:auto">

  <h1 style="color: white;">Actualizar datos</h1>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="isbn2" value="<?php echo $isbn2; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="nom" value="<?php echo $nom; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="pvp" name="pvp1" value="<?php echo $pvp1; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Año edicion" name="año" value="<?php echo $año; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Paginas" name="pag" value="<?php echo $pag; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Codigo de barras" name="codb" value="<?php echo $codb; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Descripción" name="des2" value="<?php echo $des2; ?>" required>
  </div>

  <button type="submit" class="btn" name="actualizar3">Actualizar</button>
</form>
<?php } } 
        ?>



<?php
if (isset($_GET['id4'])) {
  $id4=$_GET['id4'];
  $query4="SELECT * FROM particular WHERE cliente_id=$id4";
  $result4=mysqli_query($conn, $query4);
  if(mysqli_num_rows($result4)==1){
    $row4=mysqli_fetch_array($result4);
    $cod3=$row4['cliente_id'];
    $ape=$row4['apellidos'];
    $dni=$row4['dni'];
  }
 

 if (isset($_POST['actualizar4'])) {
  $uno4= $_POST['id4'];
  $dos4=$_POST['ape'];
  $tres4=$_POST['dni'];


 
  $query4="UPDATE particular SET cliente_id='$uno4', apellidos='$dos4', dni='$tres4' WHERE cliente_id=$id4";
  mysqli_query($conn, $query4);
  header("location: mostrarclientes.php?pa");
 }
  {?>

<form  action="actualizar.php?id4=<?php echo $_GET['id4']; ?>" method="POST" style="max-width:500px;margin:auto">
  <h1 style="color: white;">Actualizar datos</h1>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID cliente" name="id4" value="<?php echo $cod3; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ISBN libro" name="ape" value="<?php echo $ape; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Nombre" name="dni" value="<?php echo $dni; ?>" required>
  </div>


  <button type="submit" class="btn" name="actualizar4">Actualizar</button>
</form>
<?php } } 
        ?>

        
<?php
if (isset($_GET['id5'])) {
  $id5=$_GET['id5'];
  $query5="SELECT * FROM pedidos WHERE pedido_id =$id5";
  $result5=mysqli_query($conn, $query5);
  if(mysqli_num_rows($result5)==1){
    $row5=mysqli_fetch_array($result5);
    $pedi=$row5['pedido_id'];
    $cli=$row5['cliente_id'];
    $isbnl=$row5['isbn_libro'];
    $imp=$row5['importe'];
    $fpag=$row5['forma_pago'];
    $obad=$row5['objeto_adjunto'];
    $feen=$row5['fecha_entrada'];
    $feev=$row5['fecha_envio'];
    $feet=$row5['fecha_entrega'];
    $fepa=$row5['fecha_pago'];
  }
 

 if (isset($_POST['actualizar5'])) {
  $uno5=$_POST['idped'];
  $dos5=$_POST['idcl'];
  $tres5=$_POST['isbnl'];
  $cuatro5=$_POST['imp'];
  $cinco5=$_POST['fp'];
  $seis5=$_POST['obj'];
  $siete5=$_POST['feen'];
  $ocho5=$_POST['fev'];
  $nueve5=$_POST['feet'];
  $diez5=$_POST['fepa'];


 
  $query5="UPDATE pedidos SET pedido_id='$uno5', cliente_id='$dos5', isbn_libro='$tres5', importe='$cuatro5', forma_pago='$cinco5' , objeto_adjunto='$seis5', fecha_entrada='$siete5', fecha_envio='$ocho5', fecha_entrega='$nueve5', fecha_pago='$diez5' WHERE pedido_id=$id5";
  mysqli_query($conn, $query5);
  header("location: mostrarclientes.php?pe");
 }
  {?>
  <form action="actualizar.php?id5=<?php echo $_GET['id5']; ?>" method="POST" style="max-width:500px;margin:auto">

  <h1 style="color: white;">Actualizar datos</h1>
 
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ID Pedido" name="idped" value="<?php echo $pedi; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="ID Cliente" name="idcl" value="<?php echo $cli; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="ISBN Libro" name="isbnl" value="<?php echo $isbnl; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Importe" name="imp" value="<?php echo $imp; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="text" placeholder="Forma de pago" name="fp" value="<?php echo $fpag; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Objeto adjunto" name="obj" value="<?php echo $obad; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de entrada" name="feen" value="<?php echo $feen; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-book icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de envio" name="fev" value="<?php echo $feev; ?>" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de entrega" name="feet" value="<?php echo $feet; ?>" required>
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="date" placeholder="Fecha de pago" name="fepa" value="<?php echo $fepa; ?>" required>
  </div>

  <button type="submit" class="btn" name="actualizar5">Actualizar</button>
</form>
<?php } } 
        ?>
</body>
</html>