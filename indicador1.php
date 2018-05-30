<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.city {display:none}
</style>

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}

body {font-family: Arial, Helvetica, sans-serif;}

input[type=numeric], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=date], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}


input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}


</style>
	
<body>
<?php
include('cnx.php'); 

	if (!$con) {
    echo "Error: No se pudo conectar a MySQL ." . PHP_EOL;
    echo "errno de depuracin: " . mysqli_connect_errno() . PHP_EOL;
    exit;
	}
	

?>
<div class="w3-container">
<h2>Certificados Bancarios Públicos</h2>
<p>Mantenimiento de Tasas</p>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Agregar, Modificar y Consultar</button>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>Mantenimiento de Certificados Bancarios Públicos</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Consultar')">Consultar</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Agregar')">Agregar</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Modificar')">Modificar</button>
  </div>

  <div id="Consultar" class="w3-container city">
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por fecha.." title="Digite la fecha">

<table id="myTable">
  <tr class="header">
    <th style="width:30%;">Fecha</th>
	 <th style="width:40%;">Banco (Público / Estatal)</th>
    <th style="width:10%;">Plazo (meses)</th>
    <th style="width:10%;">Moneda</th>
	<th style="width:10%;">Tasa (anual)</th>
	
  </tr>
  <?php
  $query = "SELECT 
DATE_FORMAT(INV.fec_registro_rend, '%M %d %Y') as Fecha,
B.des_banco as Banco, 
P.num_meses as Plazo_meses, 
M.des_tipo_moneda as Moneda,
format(INV.num_rendimiento,2) as Rendimiento
 FROM inv_bancos INV
INNER JOIN sis_tipos_monedas M ON M.cod_tipo_moneda = INV.cod_moneda
INNER JOIN sis_plazos P ON P.cod_plazo = INV.cod_plazo
INNER JOIN sis_bancos B ON B.cod_banco = INV.cod_banco
order by INV.fec_registro_rend desc";
   $result = mysqli_query($con , $query) or die("Error en: $query " . mysql_error());
   
   while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
	echo '<tr>';
	echo "<td>".$row['Fecha']."</td>";
	echo "<td>".$row['Banco']."</td>";
	echo "<td>".$row['Plazo_meses']."</td>";
	echo "<td>".$row['Moneda']."</td>";
	echo "<td>".$row['Rendimiento']." %</td>";
	echo '</tr>';
   }
  ?>
  
</table>

  </div>

  <div id="Agregar" class="w3-container city">
   <form action="panel.php" method="get">
    <label class="header" for="fname">Fecha</label>
    <input type="date" tabindex="1" id="fecha" name="fecha" required="required" placeholder="ingrese la fecha..">

	<label class="header" for="country">Banco (Público / Estatal)</label>
    <select id="cboBanco" tabindex="2" name="cboBanco" required="required">
							<option value='0'>-- Seleccione el Banco --</option>
							
								<?php
				$SQLBanco = "SELECT cod_banco,des_banco  FROM sis_bancos WHERE ind_tipo_banco = 'E' ORDER BY des_banco asc";

				$QUERYBanco = mysqli_query($con , $SQLBanco) or die("Error en: $SQLBanco " . mysql_error());
				
				    while ($resultBanco = mysqli_fetch_array($QUERYBanco, MYSQL_ASSOC)){
					
					$codigo = $resultBanco['cod_banco'];
					$descripcion = $resultBanco['des_banco'];
          echo "<option value='".$codigo."'> ".$descripcion."</option>";

    }
  

?>						 </select>

<label class="header" for="country">Plazo</label>
    <select id="cboPlazo" tabindex="3" name="cboPlazo" required="required">
							<option value='0'>-- Seleccione el Plazo (meses) --</option>
							
								<?php
				$SQLPlazo = "SELECT cod_plazo,num_meses  FROM sis_plazos ORDER BY num_meses asc";

				$QUERYPlazo = mysqli_query($con , $SQLPlazo) or die("Error en: $SQLPlazo " . mysql_error());
				
				    while ($resultPlazo = mysqli_fetch_array($QUERYPlazo, MYSQL_ASSOC)){
					
					$codigo = $resultPlazo['cod_plazo'];
					$descripcion = $resultPlazo['num_meses'];
          echo "<option value='".$codigo."'> ".$descripcion."</option>";

    }
  

?>						 </select>

<label class="header" for="country">Moneda</label>
    <select id="cboMoneda" tabindex="4" name="cboMoneda" required="required">
							<option value='0'>-- Seleccione la moneda --</option>
							
								<?php
				$SQLMoneda = "SELECT cod_tipo_moneda,des_nombre  FROM sis_tipos_monedas ORDER BY cod_tipo_moneda asc";

				$QUERYMoneda = mysqli_query($con , $SQLMoneda) or die("Error en: $SQLMoneda " . mysql_error());
				
				    while ($resultMoneda = mysqli_fetch_array($QUERYMoneda, MYSQL_ASSOC)){
					
					$codigo = $resultMoneda['cod_tipo_moneda'];
					$descripcion = $resultMoneda['des_nombre'];
					//$facial_min = $resultMoneda["mon_facial_minima"];
          echo "<option value='".$codigo."'> ".$descripcion."</option>";

    }
	?>
	</select>

    <label class="header" for="lname">Tasa (anual)</label>
    <input type="numeric" tabindex="5" id="tasa" name="tasa" placeholder="Ingrese el porcentaje. Ej: (5.21)" required="required">

    

    <input tabindex="6" name="agregar" type="submit" value="Agregar">
  </form>
  </div>

  <div id="Modificar" class="w3-container city">
   <h1>Modificar</h1>
   <p>Modificar is the capital of Japan.</p><br>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Cerrar</button>
  </div>
 </div>
</div>

</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
 
</body>
</html> 
