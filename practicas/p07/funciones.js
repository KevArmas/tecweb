function show() {
    // se obtiene el id de la fila donde está el botón presinado
    var rowId = event.target.parentNode.parentNode.id;

    // se obtienen los datos de la fila en forma de arreglo
    var data = document.getElementById(rowId).querySelectorAll(".row-data");
    /**
    querySelectorAll() devuelve una lista de elementos (NodeList) que 
    coinciden con el grupo de selectores CSS indicados.
    (ver: https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Selectors)

    En este caso se obtienen todos los datos de la fila con el id encontrado
    y que pertenecen a la clase "row-data".
    */

    var id = data[0].innerHTML;
    var nombre = data[1].innerHTML;
    var marca = data[2].innerHTML;
    var modelo = data[3].innerHTML;
    var precio = data[4].innerHTML;
    var unidades = data[5].innerHTML;
    var detalles = data[6].innerHTML;
    var imagen = data[7].firstChild.getAttribute('src');

    alert("Actualizacion de producto: \nid: " + id + "\nNombre: " + nombre + "\nMarca" +marca + "\nModelo" +modelo);
        var url = "formulario_productos_v2.php";
    window.open(url+"?id="+id+"&nombre="+nombre+"&marca"+marca+"&modelo="+modelo+"&precio="+precio+"&unidades="+unidades+"&detalles="+detalles+"&imagen="+imagen);
}

function send2form(nombre, marca, modelo, precio, unidades, detalles, imagen) {
    var form = document.createElement("form");

    var nombreIn = document.createElement("input");
    nombreIn.type = 'text';
    nombreIn.name = 'nombre';
    nombreIn.value = nombre;
    form.appendChild(nombreIn);

    
    var marcaIn = document.createElement("select");
    marcaIn.name='marca';
    marcaIn.type='option';
    marcaIn.value = marca;
    form.appendChild(marcaIn);
    

    var modeloIn = document.createElement("input");
    modeloIn.type = 'text';
    modeloIn.name = 'modelo';
    modeloIn.value = modelo;
    form.appendChild(modeloIn);

    var precioIn = document.createElement("input");
    precioIn.type = 'number';
    precioIn.name = 'precio';
    precioIn.value = precio;
    form.appendChild(precioIn);

    var unidadesIn = document.createElement("input");
    unidadesIn.type = 'number';
    unidadesIn.name = 'unidades';
    unidadesIn.value = unidades;
    form.appendChild(unidadesIn);

    var detallesIn = document.createElement("textarea");
    
    detallesIn.name = 'detalles';
    detallesIn.value = detalles;
    form.appendChild(detallesIn);
    

    console.log(form);

    form.method = 'POST';
    form.action = 'http://localhost/tecnologiasweb/tecweb/practicas/p07/formulario_productos_v2.php';  

    document.body.appendChild(form);
    form.submit();
}