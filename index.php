<?php 

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");



 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title>Nomina</title>
</head>
<body>
<!-- ################  PRESIDENCIA  ################ -->
	<table>
		<tr>
			<td class="tabEnca">Departamento</td>
			<td class="tabEnca">Puesto</td>
			<td class="tabEnca">TipoContrato</td>
			<td class="tabEnca">NombreReceptor</td>
			<td class="tabEnca">SubTotal</td>
			<td class="tabEnca">TotalDesc</td>
			<td class="tabEnca">TotalISR</td>
			<td class="tabEnca">Total</td>
			<td class="tabEnca">FormaDePago</td>
			<td class="tabEnca">FechaIniPago</td>
			<td class="tabEnca">FechaFinPago</td>
		</tr>
		<?php 

			$con = new SQLite3("baseNomina.db") or die("Problemas para Conectar");
			$cs = $con -> query("SELECT * FROM nomina WHERE Departamento = 'PRESIDENCIA MUNICIPAL' ORDER BY ROUND(Total) DESC");
			while ($resul = $cs -> fetchArray()) {
				$Departamento = $resul[0];
				$Puesto = $resul[1];
				$TipoContrato = $resul[2];
				$NombreReceptor = $resul[3];
				$SubTotal = $resul[4];
				$TotalDescuentos = $resul[5];
				$TotalRetencionesFederales = $resul[6];
				$Total = $resul[7];
				$FormaDePago = $resul[8];
				$FechaFinalPago = $resul[9];
				$FechaInicialPago = $resul[10];


				echo '

		<tr>
			<td>'.$Departamento.'</td>
			<td>'.$Puesto.'</td>
			<td>'.$TipoContrato.'</td>
			<td>'.$NombreReceptor.'</td>
			<td>'.$SubTotal.'</td>
			<td>'.$TotalDescuentos.'</td>
			<td>'.$TotalRetencionesFederales.'</td>
			<td>'.$Total.'</td>
			<td>'.$FormaDePago.'</td>
			<td>'.$FechaInicialPago.'</td>
			<td>'.$FechaFinalPago.'</td>
		</tr>
				';
			}

		 ?>
	</table>
</body>
</html>