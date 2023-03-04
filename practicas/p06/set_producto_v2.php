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
    <?php
            $nombre = 'nombre_producto';
            $marca  = 'marca_producto';
            $modelo = 'modelo_producto';
            $precio = 1.0;
            $detalles = 'detalles_producto';
            $unidades = 1;
            $imagen   = 'img/imagen.png';
            $eliminado = 0;

            /** SE CREA EL OBJETO DE CONEXION */
            $link = new mysqli('localhost', 'root', '1983270828040110', 'marketzone');	

            /** comprobar la conexión */
            if ($link->connect_errno) 
            {
                die('Falló la conexión: '.$link->connect_error.'<br/>');
                /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
            }
            //Revisa que el formulario haya sido enviado y cacha marca y modelo con el metodo $_POST
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];

            //Selecciona las marcas y modelos enviados del formulario
            $sql = "SELECT * from productos WHERE marca = '$marca' AND modelo = '$modelo' ";
            $result = $link->query($sql);

            //Revisa si el resultado ya se encuentra en la tabla
            if($result !== false && $result->num_rows > 0) {
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

            $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('$nombre', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen')"; 
            
            //Manda mensaje que la insercion fue correcta y el id del producto insertado
            if ($link->query($sql) === TRUE) {
                echo 'Producto insertado con ID: '.$link->insert_id;
            } 
            else {
                echo "Error al añadir el producto" .$link->error;
            }
            }

            $link->close();
        }
            ?>

		<p>
		    <a href="http://validator.w3.org/check?uri=referer"><img
		      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
		</p>

        
	</body>
</html>