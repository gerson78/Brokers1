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
<h2>Indicador #1</h2>
<p>Mantenimiento del indicador #1.</p>

<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Rendimiento X, fuente www.fuente.com </button>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>Mantenimiento ABC</h2>
  </header>

  <div class="w3-bar w3-border-bottom">
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Consultar')">Consultar</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Agregar')">Agregar</button>
   <button class="tablink w3-bar-item w3-button" onclick="openCity(event, 'Modificar')">Modificar</button>
  </div>

  <div id="Consultar" class="w3-container city">
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Fecha</th>
    <th style="width:40%;">Valor (%)</th>
	
  </tr>
  <?php
  $query = "SELECT `fec_registro`,`cod_tipo_indicador` , `val_indicador` FROM `sis_indicador_abc` where `cod_tipo_indicador` = 1";
   $result = mysqli_query($con , $query) or die("Error en: $query " . mysql_error());
   
   while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){
	echo '<tr>';
	echo "<td>".$row['fec_registro']."</td>";
	echo "<td>".$row['val_indicador']."</td>";
	echo '</tr>';
   }
  ?>
  
</table>

  </div>

  <div id="Agregar" class="w3-container city">
   <h1>Agregar</h1>
   <p>Agregar is the capital of France.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  </div>

  <div id="Modificar" class="w3-container city">
   <h1>Modificar</h1>
   <p>Modificar is the capital of Japan.</p><br>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-button w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
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
