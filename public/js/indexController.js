var app = angular.module("tiendita", [])
.controller('controllerTiendita', function($scope,$http){
    // Crea JSON con todos los productos de la base de datos
    $scope.productos = [];
    $scope.export = function () {
        $http.get('/productsJSON')
            .then(function (response) { $scope.productos = response.data.productos });
        console.log("Productos exportados");
    }
    /////////////////////////////////////////////////////////
    
    $scope.total = 0;
    $scope.formatoDecimal = function(valor) {
        return isNaN(valor) ? valor : parseFloat(valor).toFixed(2);
    }
    
    var ip;
    $scope.enlace = function (ip) {
        Swal.fire({
            html: '<h1>http://'+ip+'</h1>',
            showDenyButton: true,
            denyButtonText: 'Apagar servidor',
        })
        .then((result) => {
            if (result.isDenied) {
                Swal.fire({
                    icon: 'info',
                    text: 'Esto cerrará el sistema y apagará el servidor, desea continuar?',
                    showCancelButton: true,
                    denyButtonText: 'Cancelar',
                    confirmButtonText: 'Continuar y apagar',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/shutdown";
                    }
                })
            }
        })
    }

    $scope.showArray = [false];
    $scope.detail = function (id) {
        if($scope.showArray[id] === true){
            $scope.showArray[id] = false;
        }
        else{
            $scope.showArray[id] = true;
        }
    }

    $scope.codigoBarras = "";
    $scope.num = 0;
    $scope.nuevoArticulo = {};
    $scope.articulos = [];
    
    $scope.carrito = "false";
    $scope.pass = false;
    $scope.tipo = "Retiro";
    $scope.gasto = function () {
        if ($scope.tipo == "Retiro") {
            return false;
        }
        else if ($scope.tipo == "Depósito") {
            return false;
        }
        else {
            return true;
        }
    }; 

    $scope.less = function (idProduct) {
        console.log("- "+idProduct);

        $scope.finder = false;
        var i = 0;
        while (i < $scope.articulos.length && $scope.finder === false) {
            if ($scope.articulos[i].codigoBarras === idProduct) {
                $scope.finder = true;

                $scope.articulos[i].cantidad = $scope.articulos[i].cantidad - 1;
                
                //$scope.articulos[i].importe = $scope.articulos[i].importe - $scope.articulos[i].precioUnitario
                //$scope.total = $scope.total - $scope.articulos[i].precioUnitario;

                // Aplica precio mayoreo
                if($scope.articulos[i].minimoMayoreo > 1    &&   $scope.articulos[i].cantidad >= $scope.articulos[i].minimoMayoreo){
                    $scope.articulos[i].precioUnitario = $scope.articulos[i].precioMayoreo;
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioMayoreo;
                }
                // Aplica precio medio mayoreo
                else if($scope.articulos[i].minimoMedio > 1    &&   $scope.articulos[i].cantidad >= $scope.articulos[i].minimoMedio){
                    $scope.articulos[i].precioUnitario = $scope.articulos[i].precioMedio;
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioMedio;
                }
                // Aplica precio menudeo
                else{
                    $scope.articulos[i].precioUnitario = $scope.articulos[i].precioMenudeo;
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioUnitario;
                }
                // Ajusta el total
                j=0;
                $scope.total = 0;
                while(j<$scope.articulos.length){
                    $scope.total = $scope.total + parseFloat($scope.articulos[j].importe);
                    j++;
                }
                
                // Si la cantidad total de este articulo es 0 se elimina de la lista de compras
                if ($scope.articulos[i].cantidad === 0) {
                    $scope.articulos.splice(i, 1);
                }
            }
            i++;
        }
    }
    $scope.plus = function (idProduct) {
        console.log("+ "+idProduct);
        $scope.finder = false;
        var i = 0;
        while (i < $scope.articulos.length && $scope.finder === false) {
            if ($scope.articulos[i].codigoBarras === idProduct) {
                $scope.finder = true;

                $scope.articulos[i].cantidad = $scope.articulos[i].cantidad + 1;

                // Aplica precio mayoreo
                if($scope.articulos[i].minimoMayoreo > 1    &&   $scope.articulos[i].cantidad >= $scope.articulos[i].minimoMayoreo){
                    $scope.articulos[i].precioUnitario = $scope.articulos[i].precioMayoreo;
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioMayoreo;
                }
                // Aplica precio medio mayoreo
                else if($scope.articulos[i].minimoMedio > 1    &&   $scope.articulos[i].cantidad >= $scope.articulos[i].minimoMedio){
                    $scope.articulos[i].precioUnitario = $scope.articulos[i].precioMedio;
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioMedio;
                }
                // Aplica precio menudeo
                else{
                    $scope.articulos[i].importe = $scope.articulos[i].cantidad * $scope.articulos[i].precioUnitario;
                }

                j=0;
                $scope.total = 0;
                while(j<$scope.articulos.length){
                    $scope.total = $scope.total + parseFloat($scope.articulos[j].importe);
                    j++;
                }
            }
            i++;
        }
    }
    $scope.setArticulo = function () {
        var i = 0;
        var j = 0;
        $scope.finder = false;

        if ($scope.codigoBarras === "") {
            console.log("No ingreso un código de barras");
        }

        else {
            // Número de productos en la base de datos
            var numberOfProductos = $scope.productos.length;
            // Número de productos en la lista de compras
            var numberOfArticulos = $scope.articulos.length;

            // Busca código de barras
            i=0;
            while (i < numberOfProductos && $scope.finder === false) {
                if ($scope.codigoBarras === $scope.productos[i].codigoBarras) {
                    console.log("Producto encontrado.");
                    $scope.finder = true;

                    // Si se encuentra el código se asignan las propiedades que tiene el producto en la base
                    // de datos a un objeto nuevoArticulo  que se agregará al arreglo articulos[]
                    $scope.nuevoArticulo.codigoBarras = $scope.codigoBarras;
                    $scope.nuevoArticulo.producto = $scope.productos[i].nombre;
                    $scope.nuevoArticulo.precioUnitario = $scope.productos[i].precioVenta;
                    $scope.nuevoArticulo.precioMenudeo = $scope.productos[i].precioVenta;
                    $scope.nuevoArticulo.precioMedio = $scope.productos[i].precioMedio;
                    $scope.nuevoArticulo.minimoMedio = $scope.productos[i].minimoMedio;
                    $scope.nuevoArticulo.precioMayoreo = $scope.productos[i].precioMayoreo;
                    $scope.nuevoArticulo.minimoMayoreo = $scope.productos[i].minimoMayoreo;
                    $scope.nuevoArticulo.cantidad = 1;
                    $scope.nuevoArticulo.importe = $scope.productos[i].precioVenta;

                    // Busca el código de barras en la lista de compras
                    $scope.finder2 = false;
                    j=0;
                    while (j < numberOfArticulos && $scope.finder2 === false) {
                        if ($scope.nuevoArticulo.codigoBarras === $scope.articulos[j].codigoBarras) {
                            console.log("Ya está en lista");
                            $scope.finder2 = true;
                            $scope.articulos[j].cantidad = $scope.articulos[j].cantidad + 1;
                            $scope.nuevoArticulo.cantidad = $scope.articulos[j].cantidad;

                            // Aplica precio mayoreo
                            if($scope.articulos[j].minimoMayoreo > 1    &&   $scope.articulos[j].cantidad >= $scope.articulos[j].minimoMayoreo){
                                $scope.articulos[j].precioUnitario = $scope.nuevoArticulo.precioMayoreo;
                                $scope.nuevoArticulo.precioUnitario = $scope.nuevoArticulo.precioMayoreo;
                                $scope.articulos[j].importe = $scope.articulos[j].cantidad * $scope.nuevoArticulo.precioMayoreo;
                            }
                            // Aplica precio medio mayoreo
                            else if($scope.articulos[j].minimoMedio > 1    &&   $scope.articulos[j].cantidad >= $scope.articulos[j].minimoMedio){
                                $scope.articulos[j].precioUnitario = $scope.nuevoArticulo.precioMedio;
                                $scope.nuevoArticulo.precioUnitario = $scope.nuevoArticulo.precioMedio;
                                $scope.articulos[j].importe = $scope.articulos[j].cantidad * $scope.nuevoArticulo.precioMedio;
                            }
                            // Aplica precio menudeo
                            else{
                                $scope.articulos[j].importe = $scope.articulos[j].cantidad * $scope.nuevoArticulo.precioUnitario;
                            }
                            
                            $scope.nuevoArticulo.importe = $scope.articulos[j].importe; 
                        }
                        j++;
                    }

                   //$scope.nuevoArticulo.importe = $scope.nuevoArticulo.precioUnitario * $scope.nuevoArticulo.cantidad;
                   //$scope.total = $scope.total + $scope.nuevoArticulo.importe;

                    // Calcula total
                    j=0;
                    $scope.total = 0;
                    while(j<$scope.articulos.length){
                        $scope.total = $scope.total + parseFloat($scope.articulos[j].importe);
                        j++;
                    }
                    // Si el producto no se encuentra ya en la lista de compras anexa un nuevo articulo
                    if ($scope.finder2 === false) {
                        console.log("No está en lista");
                        $scope.articulos.push($scope.nuevoArticulo);
                        //Actualiza total
                        $scope.total = $scope.total + parseFloat($scope.nuevoArticulo.importe);
                        // Eliminamos propiedades del nuevoArticulo
                        $scope.nuevoArticulo = {};
                        $scope.carrito = "true";       
                    }          
                }
                i++;
            }
            // Cuando no se encuentra el código de barras
            if($scope.finder === false){
                console.log("No se encontró el código de barras");
            }
        }
        // Limpia el código de barras
        $scope.codigoBarras = "";
    };

    $scope.registrarVenta = function () {
        console.log("Cargando venta");
        //$http.post('/sale', { articulos: $scope.articulos });
        $scope.total = $scope.formatoDecimal($scope.total);
        $scope.pago = $scope.formatoDecimal($scope.pago);
        $scope.cambio = $scope.formatoDecimal($scope.cambio);
        $http({
            method: 'POST',
            url: '/sale',
            params: {
                data: JSON.stringify($scope.articulos),
                total: $scope.total,
                pago: $scope.pago,
                cambio: $scope.cambio
            }
          });
    };

    $scope.pago = "";
    $scope.cambio = 0; 
    $scope.setPago = function () {
        if ($scope.total != 0) {
            if ($scope.pago >= $scope.total) {
                if ($scope.pago > $scope.total) {
                    $scope.cambio = $scope.pago - $scope.total;
                    $scope.cambio = $scope.formatoDecimal($scope.cambio);
                    Swal.fire({
                        html: '<h2>Total: $' + $scope.formatoDecimal($scope.total) + '</h2>---------------------------------------------------------<br><h1>Cambio: $' + $scope.cambio + '</h1>',
                    });
                }
                else if($scope.pago == $scope.total){
                    $scope.cambio = 0;
                    $scope.cambio = $scope.formatoDecimal($scope.cambio);
                    Swal.fire({
                        html: '<h1>Venta realizada</h1>',
                    });    
                }
                $scope.registrarVenta();
                
                $scope.total = 0;
                $scope.articulos = [];
                $scope.pago = "";
            }
            else {
                console.log("El pago es menor al total");
                $scope.pago = "";
                
            }
        }
        else {
            $scope.pago = "";
        }
    };

    $scope.importeGasto;
    $scope.saldo = 0;
    $scope.buttonE = true;
    $scope.setSaldo = function (s) {
        $scope.saldo = s;
    }
    $scope.expensesButton = function () {
        if($scope.saldo >= $scope.importeGasto){
            $scope.buttonE = false;
        }
        else{
            $scope.buttonE = true;
        }
    }
    $scope.deleteAll = function () {
        Swal.fire({
            html: '<h2>¿Quieres eliminar todos los registros? </h2><br> <a href="/delete"><button class="btn btn-secondary col-12">Borrar todo</button></a><br><a href="/reports"><button class="btn btn-success col-12">Cancelar</button></a>',
            showCancelButton: false,
            showConfirmButton: false
        });      
    };

    $scope.corte = function () {
        Swal.fire({
            html: '<h2>Registrar corte de caja</h2><br> <a href="/cashCut"><button class="btn btn-secondary col-12">Hacer corte</button></a><br><a href="/reports"><button class="btn btn-success col-12">Cancelar</button></a>',
            showCancelButton: false,
            showConfirmButton: false
        });
    }

    $scope.articulo = {};
    $scope.coincidencias = [];
    $scope.cadena = "";
    $scope.cadena2 = "";
    $scope.buscador = function (admin) {
        var i = 0;
        var j = 0;
        if ($scope.barcode === "") {
            console.log("No ingreso un código de barras");
        }
        else {
            $scope.finder = false;
            var numberOfProductos = $scope.productos.length;
            i = 0;
            while (i < numberOfProductos && $scope.finder === false) {
                if ($scope.barcode === $scope.productos[i].codigoBarras) {
                    console.log("Producto encontrado.");
                    $scope.finder = true;
                }
                i++;
            }
            if ($scope.finder == true) {
                $scope.articulo.nombre = $scope.productos[i-1].nombre;
                $scope.articulo.precioUnitario = $scope.formatoDecimal($scope.productos[i-1].precioVenta);
                $scope.articulo.stock = $scope.productos[i-1].stock;

                Swal.fire({
                    icon: 'success',
                    html: '<h2>'+$scope.articulo.nombre+'</h2><br><h4>Unidades disponibles:  '+$scope.articulo.stock+'</h4><br><h4>Precio de venta: $'+$scope.articulo.precioUnitario+'</h4>',
                    showCancelButton: false,
                    showConfirmButton: true
                });   
            }
            else {
                $scope.finder = false;
                var numberOfProductos = $scope.productos.length;
                console.log("No se encontró el codigo de barras");
                i = 0;
                while (i < numberOfProductos) {
                    if ($scope.barcode === $scope.productos[i].nombre || $scope.productos[i].nombre.toLowerCase().indexOf($scope.barcode.toLowerCase()) !== -1 ) {
                        console.log("Producto encontrado.");
                        $scope.finder = true;

                        $scope.articulo.nombre = $scope.productos[i].nombre;
                        $scope.articulo.precioUnitario = $scope.formatoDecimal($scope.productos[i].precioVenta);
                        $scope.articulo.precioCompra = $scope.formatoDecimal($scope.productos[i].precioCompra);
                        $scope.articulo.stock = $scope.productos[i].stock;
                        $scope.articulo.barcode = $scope.productos[i].codigoBarras;
                        $scope.articulo.id = $scope.productos[i].id_producto;

                        $scope.coincidencias[j] = $scope.articulo;

                        $scope.cadena = $scope.cadena+'<h2>'+$scope.articulo.nombre+'</h2><br>'
                        +'<h4>Unidades disponibles:  '+$scope.articulo.stock+'</h4><br>'
                        +'<h4>Código: '+$scope.articulo.barcode+'</h4><br>'
                        +'<h4>Precio de venta: $'+$scope.articulo.precioUnitario+'</h4><br><br>';

                        $scope.cadena2 = $scope.cadena2+'<h2>'+$scope.articulo.nombre+'</h2><br>'
                        +'<h4>Unidades disponibles:  '+$scope.articulo.stock+'</h4><br>'
                        +'<h4>Código: '+$scope.articulo.barcode+'</h4><br>'
                        +'<h4>Precio de compra: $'+$scope.articulo.precioCompra+'</h4><br>'
                        +'<h4>Precio de venta: $'+$scope.articulo.precioUnitario+'</h4><br><br>';
                        j++;
                    }
                    i++;
                }
                if ($scope.finder == true) {
                    if(admin === 1){
                        //Swal.fire({
                        //    icon: 'success',
                        //    html: '<h2>'+$scope.articulo.nombre+'</h2><br><h4>Unidades disponibles:  '+$scope.articulo.stock+'</h4><br><h4>Código: '+$scope.articulo.barcode+'</h4>'+'</h4><br><h4>Precio de venta: $'+$scope.articulo.precioUnitario+'</h4><br><br>'+'<a href="/modifyP?id='+$scope.articulo.id+'"><button class="btn btn-secondary col-12">Editar</button></a><br>',
                        //    showCancelButton: false,
                        //    showConfirmButton: true
                        //});  
                        Swal.fire({
                            icon: 'success',
                            html: $scope.cadena2,
                            showCancelButton: false,
                            showConfirmButton: true
                        });
                        $scope.cadena2 = "";
                    }
                    else{
                        Swal.fire({
                            icon: 'success',
                            html: $scope.cadena,
                            showCancelButton: false,
                            showConfirmButton: true
                        });
                        $scope.cadena = "";
                    }

                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El producto que busca no está en el inventario.',
                    });  
                    console.log("No se encontró el producto");
                }
            }
        }
        $scope.barcode = "";
    }

    $scope.catBebidas = false;
    $scope.catEmbutidos = false;
    $scope.catLacteos = false;
    $scope.catDulceria = false;
    $scope.catSemillas = false;
    $scope.catDetergentes = false;
    $scope.catFarmacia = false;
    $scope.catMascotas = false;
    $scope.catAbarrotes = true;

    $scope.setCategoria = function (categoria) {
        switch (categoria){
            case 1:
                $scope.catBebidas = true;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 2:
                $scope.catBebidas = false;
                $scope.catEmbutidos = true;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 3:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = true;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 4:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = true;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 5:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = true;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 6:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = true;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;
            case 7:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = true;
                $scope.catMascotas = false;
                $scope.catAbarrotes = false;
                break;  
            case 8:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = true;
                $scope.catAbarrotes = false;
                break;  
            case 9:
                $scope.catBebidas = false;
                $scope.catEmbutidos = false;
                $scope.catLacteos = false;
                $scope.catDulceria = false;
                $scope.catSemillas = false;
                $scope.catDetergentes = false;
                $scope.catFarmacia = false;
                $scope.catMascotas = false;
                $scope.catAbarrotes = true;
                break;
        }
    }

    $scope.barcodeSize = 75;
    $scope.barcodeSizeFactor = 1;
    $scope.barcodeOrientation = "horizontal";
    $scope.barcodeName = true;
});