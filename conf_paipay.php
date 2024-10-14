<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener el total desde el carrito
$importeTotal = isset($_GET['total']) ? floatval($_GET['total']) : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pasarela de pago</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/paipay.css"> <!-- Asegúrate de agregar tu CSS -->
</head>
<body>
    <div class="py-4 container">
        <div class="alert alert-info">
            hola, Estimado Cliente
            <b>El monto a pagar es de s/. <?php echo number_format($importeTotal, 2, ","); ?></b>
        </div>
        <div class="text-center p-3">
            <div id="paypal-botton-container" class="col-xl-6 col-lg-6 col-md-8 col-12"></div>
        </div>
    </div>

    <script src="https://sandbox.paypal.com/sdk/js?client-id=ATtChGHNp-io5JRXmXuA_rBLUOapn0wL_5GifywOI_vZOMraTsBoJuc75XCevqTGiGkqTQVDC4l2dwqt"></script>
    <script>
        var Total = <?php echo number_format($importeTotal, 2, '.', ''); ?>; // Sin comillas
        paypal.Buttons({
            style: {
                layout: 'vertical',
                color: 'gold',
                shape: 'pill',
                label: 'paypal',
                height: 38,
                disableMaxWidth: true
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: Total
                        }
                    }]
                });
            },
            oncancel: function(data_cancel) {
                console.log(data_cancel);
            },
            onApprove: function(data, actions) {
                actions.order.capture().then(function(detalle_compra) {
                    if (detalle_compra.status === 'COMPLETED') {
                        location.href = "completado.php";
                    }
                });
            }
        }).render('#paypal-botton-container');
    </script>
</body>
</html>
