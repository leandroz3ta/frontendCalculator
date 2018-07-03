<?php
ini_set('display_errors',0);
ini_set('display_startup_erros',0);
error_reporting(E_ALL);

$mensagem = "";
if(isset($_POST["valorDoBem"])){
	$valor1=trim($_POST["valorDoBem"]);
	if(empty($valor1)){
		$mensagem = "valor do Bem nao informado.</br>";
	}else{
		$dados = "valor do bem informado: <h9>".$valor1."</h9></br>";
	}
}
else{
	$mensagem .= $mensagem." valor do Bem nao informado.</br>";
}

if(isset($_POST['tempo'])){
	$valor2=trim($_POST['tempo']);
		if(empty($valor2)){
		$mensagem .= $mensagem." tempo nao informado.</br>";
	}else{
		$dados .= "Tempo informado: <b>".$valor2."</b></br>";
	}
}
else{
	$mensagem .= $mensagen." Tempo nao informado.</br>";
}
if(isset($_POST['taxa'])){
	$valor3=trim($_POST['taxa']);
			if(empty($valor3)){
		$mensagem .= $mensagem." taxa nao informada.</br>";
	}else{
		$dados .= "Taxa informada: <b>".$valor3."</b></br>";
	}
}
else{
	$mensagem .= $mensagen." Taxa nao informada.</br>";
}

if(isset($_POST['entrada'])){
	$valor4=trim($_POST['entrada']);
			if(empty($valor4)){
		$mensagem .= $mensagem." Entrada nao informada.</br>";
	}else{
		$dados .= "Entrada informada: <b>".$valor4."</b></br>";
	}
}
else{
	$mensagem .= $mensagen." Entrada nao informada.</br>";
}

	 $url = 'http://80.241.208.115:32768/financiamento/entrada';

		//Initiate cURL.
		$ch = curl_init($url);

		//The JSON data.
		$jsonData = array(
		'valorBem' => $valor1,
		'tempo' => $valor2,
		'taxa' => $valor3,
		'entrada' => $valor4,
		);

		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($jsonData);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		//Execute the request
		//print "Valor da taxa: ";
		//$result =curl_exec($ch);
		
 if($mensagem==""){
		//print $dados;
		//print "Valor da taxa: ";
		//$result =curl_exec($ch);
print "<div class=\"alert alert-success\">
  <strong>Dados enviados!</strong></br>".$dados."
  </br>Valor da parcela:
</div>";
$result =curl_exec($ch);
 }else{
	 print "<div class=\"alert alert-danger\">
  <strong>Erro dados não enviados!</strong></br>".$mensagem."
</div>";
 }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-center" id="navbar3SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Cálculo de financiamento</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5 w-50 h-50">
    <div class="container">
      <div class="row w-75">
        <div class="col-md-12">
          <form class="" action="financiamento.php" method="post">
            <div class="form-group">
              <label class="">Valor do bem</label>
              <input type="text" class="form-control" name="valorDoBem" placeholder="Informe o valor"> </div>
            <div class="form-group">
              <label>Taxa</label>
              <input type="text" class="form-control" name="taxa" placeholder="Informe a taxa"> </div>
            <div class="form-group">
              <label>Tempo (meses)</label>
              <input type="text" class="form-control" name="tempo" placeholder="Informe a quantidade de meses"> </div>
			<div class="form-group">
              <label>Entrada</label>
              <input type="text" class="form-control" name="entrada" placeholder="Informe o valor da entrada"> </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
			<button type="button" class="btn btn-primary" onClick="limpa()">Limpar</button>
			<a class="ml-3 btn navbar-btn btn-primary" href="opcoes.html">Voltar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:180px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
    <script>
function limpa() {
if(document.getElementById('capital').value!="") {
document.getElementById('taxa').value="";
document.getElementById('mes').value="";
}
}
</script>
</body>

</html>