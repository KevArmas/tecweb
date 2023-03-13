<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registro de productos</title>
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
    <script src="validacion.js"></script>
  </head>

  <body>
    <h1>Registro de productos</h1>

    <form onsubmit="return validacion()" action="http://localhost/tecnologiasweb/tecweb/practicas/p06/set_producto_v2.php" method="post">

    <h2>Modificacion del producto</h2>

      <fieldset>

        <ul>
          <li><label for="nombre">Nombre de producto:</label> <input type="text" name="nombre" value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"></li>
          <label for="marca">Selecciona la marca:</label>

          <select name="marca" id="marca" value="<?= !empty($_POST['marca'])?$_POST['marca']:$_GET['marca'] ?>">
            <option value="Rolex">Rolex</option>
            <option value="Patek Philipp">Patek Philipp</option>
            <option value="Richard Mille">Richard Mille</option>
            <option value="Jacob & Co">Jacob & Co</option>
            <option value="Vacheron Constantin">Vacheron Constantin</option>
            <option value="Jaquet Droz">Jaquet Droz</option>
            <option value="Audemars Piguet">Audemars Piguet</option>
            <option value="Greubel Forsey">Greubel Forsey</option>
          </select>
          <li><label for="modelo">Modelo:</label> <input type="text" name="modelo" id="modelo" value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>"></li>
          <li><label for="precio">Precio:</label> <input type="number" name="precio" id="precio" value="<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"></li>
          <li><label for="unidades">Unidades:</label> <input type="number" name="unidades" id="unidades" value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"></li>
          <li><label for="imagen">Imagen:</label> <input type="text" name="imagen" id="imagen" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>"></li>
          <li> Detalles: <br><textarea name="detalles" rows="3" cols="50" id="detalles" value="<?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?>"></textarea> </li>
          
        </ul>
      </fieldset>

      <p>
        <input type="submit" value="Guardar">
      </p>

    </form>
  </body>
</html>
      <?php
 
        
        
        /** SE CREA EL OBJETO DE CONEXION */
        @$link = new mysqli('localhost', 'root', '1983270828040110', 'marketzone');	
        
        /** comprobar la conexión */
        if ($link->connect_errno) 
        {
            die('Falló la conexión: '.$link->connect_error.'<br/>');
            /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
        }
        
        $id = $_POST['id'];

        $nombre = $_POST['nombre'];
        $marca  = $_POST['marca']; 
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen= $_POST['imagen'];

        $sql = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = $precio, detalles = '$detalles', unidades = $unidades, imagen = '$imagen' WHERE id = $id";
        if ($link->query($sql) === TRUE) {
            echo "Product updated successfully";
          } else {
            echo "Error updating product: " . $link->error;
          }
          
        $link->close();
        
        ?>