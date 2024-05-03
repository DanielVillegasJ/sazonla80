<?php
session_start();
include("../settings/conexion.php");
$connect = conexion();
$id = $_GET['codigo_prod'];

$sql1 = "SELECT * FROM producto WHERE codigo_prod = $id";
$query1 = mysqli_query($connect, $sql1);
$row = mysqli_fetch_array($query1);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Sazón la 80</title>
		<link rel="stylesheet" href="styles.css"/>
		<script src="https://www.paypal.com/sdk/js?client-id=AaescKF7FIcFt6NEIVWFGvu6TeewDDecep6GdtbqaG_gp5rliq9W_wICaaTSyJs2R01DiI74FSeD3_3B&currency=USD" data-sdk-integration-source="button-factory"></script>
	</head>
	<body>
		<header>
			<img style="width: 100px;" src="../img/logo.png">
			
		</header>
		<br>
		<a href="../"><p> ← Volver</p></a>
		<br>
		<div class="container-title"><?= $row["nombre_producto"] ?></div>

		<main>
			<div class="container-img">
				<img
					src="data:image/jpeg;base64,<?= base64_encode($row['imagen']) ?>"
					alt="imagen-producto"
				/>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span><?= $row["precio"] ?>$ </span>
				</div>

				<div class="container-details-product">
					<div class="form-group">
						<label for="colour">Sopa</label>
						<select name="colour" id="colour">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="Pasta">Pasta</option>
							<option value="Frijoles">Frijoles</option>
							<option value="Sancocho">Sancocho</option>
						</select>
					</div>
					<div class="form-group">
						<label for="size">Gaseosa</label>
						<select name="size" id="size">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="Manzana">Manzana</option>
							<option value="Cocacola">Cocacola</option>
							<option value="Pepsi">Pepsi</option>
							<option value="Cuatro">Cuatro</option>
						</select>
					</div>
				</div>

				<div class="container-add-cart">
					<div id="smart-button-container">
						<div style="text-align: center;">
						<div id="paypal-button-container"></div>
						</div>
					</div>
					<script>
						function initPayPalButton() {
							paypal.Buttons({
								style: {
								shape: 'rect',
								color: 'gold',
								layout: 'vertical',
								label: 'pay',
								
							},

							createOrder: function(data, actions) {
								return actions.order.create({
									purchase_units: [{"description":"LA DESCRIPCION DE TU PRODUCTO","amount":{"currency_code":"USD","value":<?= $row["precio"] ?>}}]
								});
							},
							onApprove: function(data, actions) {
								return actions.order.capture().then(function(orderData) {
								// Full available details
									console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
									actions.redirect('LA URL DE TU PAGINA DE GRACIAS');
								});
							},

								onError: function(err) {
								console.log(err);
							}
							}).render('#paypal-button-container');
						}
						initPayPalButton();
					</script>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descripción</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-description">
						<p>
							<?= $row["descripcion"] ?>
						</p>
					</div>
				</div>

				<div class="container-social">
					<span>Compartir</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-solid fa-envelope"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-twitter"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
						<a href="#"><i class="fa-brands fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</main>
		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		<script src="index.js"></script>
	</body>
</html>
