<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Configura credenciais
MercadoPago\SDK::setAccessToken('APP_USR-3736676234331869-072213-030b4a6c813b61e00a08c822ce83c3f9-688984359');

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Meu produto';
$item->quantity = 1;
$item->unit_price = 10.00;
$preference->items = array($item);
$preference->external_reference = 'Pedido 1';

$preference->save();
// echo $preference->id;
?>

<!DOCTYPE html>

	<html>

	<head>
		<title>Pagar</title>
	</head>

	<body>
		<div class="cho-container"/>
			<script src="https://sdk.mercadopago.com/js/v2"></script>
			<script>
				// Adicione as credenciais do SDK
				const mp = new MercadoPago('APP_USR-9c606bed-e792-4c67-bf87-48f6d85ce88f', {
					locale: 'pt-BR'
				});

				// Inicialize o checkout
				mp.checkout({
					preference: {
						id: "<?php echo $preference->id; ?>"
					},
					render: {
						container: '.cho-container', 
						label: 'Pagar', // Muda o texto do botão de pagamento (opcional)
					}
									
				});

			</script>
	</body>

	</html>