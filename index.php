<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c5832dfd89.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Astronomia - Videoaula</title>
</head>
  <body>
   <header>
          <h1 class="logo cursor"> "Hoje em Dia Astronomia"</h1>
          <nav class="header-menu">  
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Aulas</a></li>
                <li><a href= "contatos.html">Contatos</a></li>
                <li><a href="Agendas.html">Agendas</a></li>
                <li><a href="#">Serviços<a></li>
            </ul>
            <div class="icones">
              <a href="#"><i class="fab-brands fa-facebook - fa"></i></a>
              <a href="#"><i class="fab-brands fa-whatsapp - fa"></i></a>
              <a href="#"><i class="fab-brands fa-instagram - fa"></i></a> 
            </div>   
            <!--<div class="estrela">-->
              <!--<img src="imagem/fotoEstrela.jpg">-->
            </div>
            <div id="container-estrelas">
              <div class="estrela"></div>
              <div class="estrela"></div>
            </div>
          </nav>
        </div>
   </header>
   <section>
    <iframe width="400" height="200" src="https://www.youtube.com/embed/a0K3XvSjH7c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    allowfullscreen>
    </iframe>
   </section>
  </body>
</html>
<?php
// Chave de API da NASA
$apiKey = 'bJhnhfoDGJP15PWUt8hfOZ1mqlMjOYkeQsG1atTG';

// Define a data de início e fim para a consulta
$start_date = '2015-09-07';
$end_date = '2015-09-08';

// Constrói a URL completa com a chave de API
$url = 'https://api.nasa.gov/neo/rest/v1/feed?start_date=' . $start_date . '&end_date=' . $end_date . '&api_key=' . $apiKey;

// Realiza a solicitação à API
$response = file_get_contents($url);

// Decodifica a resposta JSON em um array associativo
$data = json_decode($response, true);

// Verifica se a solicitação foi bem-sucedida
if ($data !== null && isset($data['near_earth_objects'])) {
    // Os dados estão disponíveis no array $data['near_earth_objects']
    // Faça o processamento dos dados conforme necessário
    $nearEarthObjects = $data['near_earth_objects'];

    // Exemplo: Imprime informações sobre os asteroides próximos
    foreach ($nearEarthObjects as $date => $asteroids) {
        echo "Data: " . $date . "<br>";
        foreach ($asteroids as $asteroid) {
            echo "Nome: " . $asteroid['name'] . "<br>";
            echo "Diâmetro mínimo: " . $asteroid['estimated_diameter']['kilometers']['estimated_diameter_min'] . " km" . "<br>";
            echo "Diâmetro máximo: " . $asteroid['estimated_diameter']['kilometers']['estimated_diameter_max'] . " km" . "<br>";
            echo "Distância da Terra: " . $asteroid['close_approach_data'][0]['miss_distance']['kilometers'] . " km" . "<br>";
            echo "-----------------------------------" . "<br>";
        }
        echo "<br>";
    }
} else {
    // A solicitação falhou ou os dados não estão disponíveis
    echo "Falha ao obter dados da API da NASA.";
}
?>