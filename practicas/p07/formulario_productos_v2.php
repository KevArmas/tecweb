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

    <form onsubmit="return validacion()" action="http://localhost/tecnologiasweb/tecweb/practicas/p07/update_producto.php" method="post">
    <h2>Modificacion del producto</h2>

      <fieldset>

        <ul>
        <label for="id">ID:</label><input type="text" name="id" value="<?=$_GET['id']?>" readonly>
        <br/>
          <li><label for="nombre">Nombre de producto:</label> <input type="text" name="nombre" value="<?= !empty($_GET['nombre'])?$_GET['nombre']:$_GET['nombre'] ?>"></li>
          <label for="marca">Selecciona la marca:</label>

          <select name="marca" id="marca" value="<?= !empty($_GET['marca'])?$_GET['marca']:$_GET['marca'] ?>">
            <option value="Rolex">Rolex</option>
            <option value="Patek Philipp">Patek Philipp</option>
            <option value="Richard Mille">Richard Mille</option>
            <option value="Jacob & Co">Jacob & Co</option>
            <option value="Vacheron Constantin">Vacheron Constantin</option>
            <option value="Jaquet Droz">Jaquet Droz</option>
            <option value="Audemars Piguet">Audemars Piguet</option>
            <option value="Greubel Forsey">Greubel Forsey</option>
          </select>
          <li><label for="modelo">Modelo:</label> <input type="text" name="modelo" id="modelo" value="<?= !empty($_GET['modelo'])?$_GET['modelo']:$_GET['modelo'] ?>"></li>
          <li><label for="precio">Precio:</label> <input type="number" name="precio" id="precio" value="<?= !empty($_GET['precio'])?$_GET['precio']:$_GET['precio'] ?>"></li>
          <li><label for="unidades">Unidades:</label> <input type="number" name="unidades" id="unidades" value="<?= !empty($_GET['unidades'])?$_GET['unidades']:$_GET['unidades'] ?>"></li>
          <li><label for="imagen">Imagen:</label> <input type="text" name="imagen" id="imagen" value="<?= !empty($_GET['imagen'])?$_GET['imagen']:$_GET['imagen'] ?>"></li>
          <li> Detalles: <br><textarea name="detalles" rows="3" cols="50" id="detalles" value="<?= !empty($_GET['detalles'])?$_GET['detalles']:$_GET['detalles'] ?>"></textarea> </li>
          
        </ul>
      </fieldset>

      <p>
        <input type="submit" value="Guardar">
      </p>

    </form>
      <?php
  
          
          
          /** SE CREA EL OBJETO DE CONEXION */
          @$link = new mysqli('localhost', 'root', '1983270828040110', 'marketzone');	
          
          /** comprobar la conexión */
          if ($link->connect_errno) 
          {
              die('Falló la conexión: '.$link->connect_error.'<br/>');
              /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
          }
          
          $id = $_GET['id'];

          $nombre = $_GET['nombre'];
          $marca  = $_GET['marca']; 
          $modelo = $_GET['modelo'];
          $precio = $_GET['precio'];
          $detalles = $_GET['detalles'];
          $unidades = $_GET['unidades'];
          $imagen= $_GET['imagen'];

          $sql = "UPDATE productos SET nombre = '$nombre', marca = '$marca', modelo = '$modelo', precio = $precio, detalles = '$detalles', unidades = $unidades, imagen = '$imagen' WHERE id = $id";
          if ($link->query($sql) === TRUE) {
              echo "Product updated successfully";
            } else {
              echo "Error updating product: " . $link->error;
            }
            
          $link->close();
          
          ?>
  </body>
</html>
     