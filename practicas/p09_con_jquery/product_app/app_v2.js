$(document).ready(function(){

    $('#search').keyup(function(e) {
        let search = $('#search').val();

    
        $.ajax({
            url:'backend/product-search.php',
            type: 'GET',
            data: {search},
            success: function (response) {
                let productos = JSON.parse(response);
                let template = '';
                let template_bus = '';

                productos.forEach(producto => {
                    template += `<li>
                        ${producto.nombre}
                        </li>`
                })
            }
        })

        $('#container').html(template);
        $('#product-result').show();
        productos.forEach(producto => {
            template_bus += `
                <tr productId="${producto.id}">
                    <td>${producto.id}</td>
                    <td>
                    <a href="#" class="product-item">${producto.nombre}</a>
                    </td>
                    <td>${producto.marca}</td>
                    <td>${producto.modelo}</td>
                    <td>$${producto.precio}</td>
                    <td>${producto.detalles}</td>
                    <td>${producto.unidades}</td>
                    <td>
                        <button class="product-delete btn btn-danger">
                            Eliminar
                        </button>    
                    </td>
                </tr>
            `
        });
        $('#products').html(template_bus);

    })
});

        $('product-form').submit(function (e) {
            let datos = JSON.parse($('#description').val());
            const posData = {
                nombre: $('#name').val(),
                precio: datos["precio"],
                unidades: datos["unidades"],
                modelo: datos["modelo"],
                marca: datos["marca"],
                detalles: datos["detalles"],
                imagen: datos["imagen"],
                id: $('#product_Id').val()
            };

        console.log(postData);

        let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit/php';

        productoJsonString = Json.stringify(postData, null, 2);
        console.log(productoJsonString);

        $.post(url, productoJsonString, function (response) {
            console.log(response);
            let res = JSON.parse(response);
            fetchProducts();
            let mensaje = res.message;
        });
        e.preventDefault();
        });

        function fetchProducts() {
            $.ajax( {
                url:'backend/product-list.php',
                type: 'GET',
                success: function (response) {
                    let products = JSON.parse (response);
                    let template = '';

                    productos.forEach(producto => {
                        template += `
                            <tr productId="${producto.id}">
                            <td>{$producto.id}</td>
                            <td>
                            <a href="#" class="product-item">${producto.nombre}</a>
                            </td>
                            <td>${producto.marca}</td>
                            <td>${producto.modelo}</td>
                            <td>${producto.precio}</td>
                            <td>${producto.detalles}</td>
                            <td>${producto.unidades}</td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                            </tr>    
                            `
                    });
                    $('#products').html(template);
                }
            });
        }
    
//Parte de app no modificiada
// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}

