<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Envio exitoso</title>
		<style type="text/css">
			body {margin: 20px; 
			background-color: #C4DF9B;
			font-family: Verdana, Helvetica, sans-serif;
			font-size: 90%;}
			h1 {color: #005825;
			border-bottom: 1px solid #005825;}
			h2 {font-size: 1.2em;
			color: #4A0048;}
		</style>
	</head>
	<body>
		<h1>Producto añadido correctamente</h1>

		<h2>Producto:</h2>
		<ul>
			<li><strong>Nombre:</strong> <em><?php echo $_POST['nombre']; ?></em></li>
			<li><strong>Marca:</strong> <em><?php echo $_POST['marca']; ?></em></li>
			<li><strong>Modelo:</strong> <em><?php echo $_POST['modelo']; ?></em></li>
            <li><strong>Precio:</strong> <em><?php echo $_POST['precio']; ?></em></li>
            <li><strong>Unidades:</strong> <em><?php echo $_POST['unidades']; ?></em></li>
            <li><strong>Detalles:</strong> <em><?php echo $_POST['detalles']; ?></em></li>
            <li><strong>Imagen:</strong> <em><?php echo $_POST['imagen']; ?></em></li>
		</ul>
		<p>
		    <a href="http://validator.w3.org/check?uri=referer"><img
		      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
		</p>


        <?php
$nombre = 'nombre_producto';
$marca  = 'marca_producto';
$modelo = 'modelo_producto';
$precio = 1.0;
$detalles = 'detalles_producto';
$unidades = 1;
$imagen   = 'img/imagen.png';

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', '1983270828040110', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}

//Selecciona las marcas y modelos enviados del formulario
$sql = "SELECT * from productos WHERE brand = '$marca' AND model = '$modelo' ";
$result = $link->query($sql);

//Revisa si el resultado ya se encuentra en la tabla
if($result->num_rows > 0) {
    echo "La marca y modelo ya existen";
}
else { //Si no hay registros de la marca y el modelo entonces envia los datos a la base de datos
    $nombre = $_POST["nombre"];
    $marca  = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $precio = $_POST["precio"];
    $detalles = $_POST["detalles"];
    $unidades = $_POST["unidades"];
    $imagen   = $_POST["imagen"];

 $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$unidades', '$detalles', '$imagen')"; 
 
 if ($link->query($sql) === TRUE) {
    echo 'Producto insertado con ID: '.$link->insert_id;
 } 
 else {
    echo "Error al añadir el producto" .$link->error;
 }
}

$link->close();
?>
	</body>
</html>