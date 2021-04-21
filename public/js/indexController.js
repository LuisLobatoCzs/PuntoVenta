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
        else {
            return true;
        }
    }; 

    $scope.less = function (idProduct) {
        console.log("menos");
        console.log(idProduct);
        $scope.finder = false;
        var i = 0;
        while (i < $scope.articulos.length && $scope.finder === false) {
            if ($scope.articulos[i].codigoBarras === idProduct) {
                $scope.articulos[i].cantidad = $scope.articulos[i].cantidad - 1;
                $scope.articulos[i].importe = $scope.articulos[i].importe - $scope.articulos[i].precioUnitario
                $scope.total = $scope.total - $scope.articulos[i].precioUnitario;
                if ($scope.articulos[i].cantidad === 0) {
                    $scope.articulos.splice(i, 1);
                }
            }
            i++;
        }
    }
    $scope.plus = function (idProduct) {
        console.log("mas");
        console.log(idProduct);
        $scope.finder = false;
        var i = 0;
        while (i < $scope.articulos.length && $scope.finder === false) {
            if ($scope.articulos[i].codigoBarras === idProduct) {
                $scope.articulos[i].cantidad = $scope.articulos[i].cantidad + 1;
                $scope.articulos[i].importe = $scope.articulos[i].importe + parseFloat($scope.articulos[i].precioUnitario);
                $scope.total = $scope.total + parseFloat($scope.articulos[i].precioUnitario);       
            }
            i++;
        }
    }
    $scope.setArticulo = function () {
        var i = 0;
        if ($scope.codigoBarras === "") {
            console.log("No ingreso un código de barras");
            toastr.error("Debe ingresar un código de barras para continuar", "Ha ocurrido un error!");
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-left",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
        else {
            $scope.finder = false;
            var numberOfProductos = $scope.productos.length;
            var numberOfArticulos = $scope.articulos.length;
            i = 0;
            while (i < numberOfProductos && $scope.finder === false) {
                if ($scope.codigoBarras === $scope.productos[i].codigoBarras) {
                    console.log("Producto encontrado.");
                    $scope.finder = true;
                }
                i++;
            }
            if ($scope.finder == true) {
                $scope.nuevoArticulo.codigoBarras = $scope.codigoBarras;
                $scope.nuevoArticulo.producto = $scope.productos[i-1].nombre;
                $scope.nuevoArticulo.precioUnitario = $scope.productos[i-1].precioVenta;
                $scope.nuevoArticulo.cantidad = 1;
                $scope.nuevoArticulo.importe = $scope.nuevoArticulo.precioUnitario * $scope.nuevoArticulo.cantidad;
                $scope.total = $scope.total + $scope.nuevoArticulo.importe;
                              
                i = 0;
                $scope.finder = false;
                while (i < numberOfArticulos && $scope.finder === false) {
                    if ($scope.nuevoArticulo.codigoBarras === $scope.articulos[i].codigoBarras) {
                        console.log("Producto encontrado.");
                        $scope.finder = true;
                        $scope.articulos[i].cantidad = $scope.articulos[i].cantidad + 1;
                        $scope.articulos[i].importe = $scope.articulos[i].importe + parseFloat($scope.nuevoArticulo.precioUnitario);
                    }
                    i++;
                }
                if ($scope.finder === false) {
                    $scope.articulos.push($scope.nuevoArticulo);
                    $scope.nuevoArticulo = {};
                    $scope.carrito = "true";       
                }
                else {
                    
                }
            }
            else {
                console.log("No se encontró el código de barras");
                toastr.warning("Verifique que el producto se encuentre registrado en el inventario.", "Algo salió mal");
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-left",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        }
        $scope.codigoBarras = "";
    };
    $scope.registrarVenta = function () {
        console.log("Cargando venta");
        //$http.post('/sale', { articulos: $scope.articulos });
        $scope.total = $scope.formatoDecimal($scope.total);
        $http({
            method: 'POST',
            url: '/sale',
            params: {
                data: JSON.stringify($scope.articulos),
                total: $scope.total
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
                    Swal.fire({
                        html: '<h1>Venta realizada</h1>',
                    });    
                }
                $scope.registrarVenta();
                toastr.success("Venta realizada", "Listo!");
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-left",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                $scope.total = 0;
                $scope.articulos = [];
                $scope.pago = "";
            }
            else {
                console.log("El pago es menor al total");
                $scope.pago = "";
                toastr.error("El monto que ingresó no cubre el total del ticket", "Ha ocurrido un error!");
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-left",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
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

});