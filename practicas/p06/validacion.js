function validacion() {
    var name = document.getElementById ("nombre").value;
    var brand = document.getElementById ("marca").value;
    var model = document.getElementById ("modelo").value;
    var price = document.getElementById ("precio").value;
    var unit = document.getElementById ("unidades").value;
    var img = document.getElementById ("imagen").value;
    var details = document.getElementById ("detalles").value;

    if (name === "" || brand === "" || model === "" || price === "" || unit === "" || img === "" || details === "") {
        alert("Campo vacio, por favor verifica que todo este correctamente llenado");
        return false;
    }

        var nameRegex = /^[a-zA-Z0-9\s]+$/;  
        var brandRegex = /^[a-zA-Z\s]+$/;    
        var modelRegex = /^[a-zA-Z0-9\s]+$/; 
        var priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
        var unitRegex = /^[0-9]+$/;          
        var maxDetailsLength = 300;       
      
        if (!nameRegex.test(name)) {
          alert("El nombre de producto solo puede contener letras, números y espacios.");
          return false;
        }
      
        if (!brandRegex.test(brand)) {
          alert("La marca solo puede contener letras y espacios.");
          return false;
        }
      
        if (!modelRegex.test(model)) {
          alert("El modelo solo puede contener letras, números y espacios.");
          return false;
        }
      
        if (!priceRegex.test(price)) {
          alert("El precio debe ser un número con hasta 2 decimales (por ejemplo, 10.99).");
          return false;
        }
      
        if (!unitRegex.test(unit)) {
          alert("Las unidades deben ser un número entero positivo.");
          return false;
        }
      
        if (details.length > maxDetailsLength) {
          alert("Los detalles no pueden ser más largos de " + maxDetailsLength + " caracteres");
         return false;
        }

        return true;
}
