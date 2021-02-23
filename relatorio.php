<?php 
	session_start();
	include"header.php"; 
	include_once 'conexao.php'; 
	if (isset($_SESSION['user'])) {
?>
<div id="portal-column-content" class="cell width-3:4 position-1:4">
	<a name="acontent" id="acontent" class="anchor">conteúdo</a>

	<div style="background-color: #19882c; color: white;"><center>Reagente</center></div>
	<br>
	<div>
		<?php  
			$sql = "SELECT count(*) AS qtd from reagente";
		    $result = mysqli_query($conn, $sql); 
		 	$cad = mysqli_fetch_assoc($result);
	    ?>
	    <p>- <?php echo $cad['qtd'];?> Reagente(s) cadastrado(s).</p>

	    <!--------------------------------------------------------------------------------------------------------------------------------->

		<?php
		 	$dataAtual = date("Y-m-d");

			$sql = "SELECT count(*) AS qtd from reagente AS R, EstoqueReag AS E WHERE DATEDIFF(E.validade, '$dataAtual') < 0 AND R.cas = E.cas AND R.lote = E.lote";
		    $result = mysqli_query($conn, $sql); 
		 	$vencido = mysqli_fetch_assoc($result);
	 	?>
		<p>- <?php echo $vencido['qtd'];?> Reagente(s) vencido(s).</p>

		<!--------------------------------------------------------------------------------------------------------------------------------->

		<?php  
			$sql = "SELECT count(*) AS qtd from reagente AS R, EstoqueReag AS E WHERE DATEDIFF(E.validade, '$dataAtual') > 10 AND R.cas = E.cas AND R.lote = E.lote";
		    $result = mysqli_query($conn, $sql); 
		 	$ok = mysqli_fetch_assoc($result);
		?>
		<p>- <?php echo $ok['qtd'];?> Reagente(s) OK.</p>

		<!--------------------------------------------------------------------------------------------------------------------------------->

		<?php  
			$sql = "SELECT count(*) AS qtd from reagente AS R, EstoqueReag AS E WHERE DATEDIFF(E.validade, '$dataAtual') > 0 AND DATEDIFF(E.validade, '$dataAtual') < 11 AND R.cas = E.cas AND R.lote = E.lote";
		    $result = mysqli_query($conn, $sql); 
		 	$quase = mysqli_fetch_assoc($result);
		?>
		<p>- <?php echo $quase['qtd'];?> Reagente(s) quase vencido(s).</p>

		<!--------------------------------------------------------------------------------------------------------------------------------->
		
		<?php  
			$sql = "SELECT count(*) AS qtd from reagente WHERE controlado = 'Sim'";
		    $result = mysqli_query($conn, $sql);
		 	$controlado = mysqli_fetch_assoc($result);
		?>
		<p>- <?php echo $controlado['qtd'];?> Reagente(s) controlado(s).</p>
		
	</div>
	
    <div id="piechart" style="margin:-30% 0% 0% 43%;"></div>
  
	<p><br></p>
	
	<div style="background-color: #19882c; color: white;"><center>Equipamento</center></div>
	<br>
	<?php  
		$sql = "SELECT count(*) AS qtd from equipamento";
	    $result = mysqli_query($conn, $sql);
	 	$exibir = mysqli_fetch_assoc($result);
    ?>
    <p>- <?php echo $exibir['qtd'];?> Equipamento(s) cadastrado(s).</p>
    <br>

	<div style="background-color: #19882c; color: white;"><center>Material</center></div>
	<br>
	<?php  
		$sql = "SELECT count(*) AS qtd from material";
	    $result = mysqli_query($conn, $sql);
	 	$exibir = mysqli_fetch_assoc($result);
    ?>
    <p>- <?php echo $exibir['qtd'];?> Material(is) cadastrado(s).</p>
</div>
<?php
  } else { //CASO NÃO ESTEJA AUTENTICADO
    echo '<div class="alert alert-warning" style="text-align:center;">Esta é uma área reservada, só usuários autorizados podem ter acesso. 
            <br/><a href="Index.php">Se identifique aqui</a></div>';
  }
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">google.charts.load('current', {'packages':['corechart']});google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Ok',   <?php echo $ok['qtd'];?>],
          ['Vencido',      <?php echo $vencido['qtd'];?>],
          ['Quase Vencido',  <?php echo $quase['qtd'];?>]
        ]);

        var options = {
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>

<?php include"footer.php"; ?>