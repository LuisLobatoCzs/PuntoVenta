var app = angular.module("tiendita", [])
.controller('controllerTiendita', function($scope,$http){
    // Crea JSON con todos los productos de la base de datos
    $scope.productos = [];
    $scope.consultar = function () {
        $http.get('/productsJSON')
            .then(function (response) { $scope.productos = response.data.productos });
    }
    $scope.consultar();
    /////////////////////////////////////////////////////////
    
    $scope.total = 0;
    $scope.codigoBarras = "";
    $scope.num = 0;
    $scope.nuevoArticulo = {};
    $scope.articulos = [];
    
    $scope.carrito = "false";
    
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

    $scope.pago = "";
    $scope.cambio = 0; 
    $scope.setPago = function () {
        if ($scope.total != 0) {
            if ($scope.pago >= $scope.total) {
                if ($scope.pago > $scope.total) {
                    $scope.cambio = $scope.pago - $scope.total;
                    alert("Cambio: $" + $scope.cambio);
                }
                $scope.total = 0;
                $scope.articulos = [];
                $scope.pago = "";

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
});