<?php

if (isset($_POST['submit'])) {

  //print_r($_POST['nome']);
  //print_r('<br>');
  //print_r($_POST['email']);
  //print_r('<br>');
  //print_r($_POST['servico']);
  //print_r('<br>');
  //print_r($_POST['sugestao']);

  include_once('conecta/conect.php'); //inclue a coneção com o bando de dados

  $nome2 = $_POST['nome']; // coloca os intens em suas variaveis usando o post(itens pegos pelo name do input)
  $email2 = $_POST['email'];
  $servico2 = $_POST['servico'];
  $sugestao2 = $_POST['sugestao'];

  $resultado = mysqli_query($conexao2, "INSERT INTO comentarios(nome,email,servico,sugestao) VALUES ('$nome2','$email2','$servico2','$sugestao2')");
  // inseri no bando de dados as variaveis em suas devidas posiçoes

  $sucesso = 'FeedBack enviado com sucesso'; // varieval criada para dizaer ao usuario se o form foi enviado
  
}


?>



<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="img/icon.png">
    <link rel="stylesheet" href=" style.css">
    <style>
        html{
            scroll-behavior: smooth;
        }
        .box {
            position: absolute;
            top: 30%;
            left: 40%;
            padding: 15px;
            border-radius: 15px;
            width: 20%;
            color: white;
        }
        fieldset{
            padding: 10px;
            border: solid 3px black;
        }
        .inputbox{
            position: relative;
        }
        .inputuser{
            border: none;
            border-bottom: 1px solid white;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .inputemail{
            border: none;
            border-bottom: 1px solid white;
            font-size: 20px;
            margin-bottom: 15px;
        }
        .inputsugestao{
            border: none;
            border-bottom: 1px solid white;
            font-size: 20px;
            margin-bottom: 15px;
            padding-bottom: 30px;
        }
        .enviar{
            margin-top: 20px;
        }
        .botao{
          border: none;
        }
        #rodape{
          margin-top: 650px;
        }
    </style>

    <title>Farmácias 24 Horas</title>
  </head>
  <body>
    <section id="nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
          <a class="navbar-brand font-weight-bold" href="#">Farm <span class="cor">24</span> Horas </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#textoNavbar" aria-controls="textoNavbar" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="textoNavbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Voltar</a>
              </li>
            </ul>
            <span class="navbar-text">
              Todas as Farmácias 24 Horas de Catanduva
            </span>
          </div>
        </nav>
    </section>

    <section id="cometario">
      <div class="container">
        <h2 class="text-center pt-5 pb-4 font-weight-bold">Nos de o seu <span class="text-info">Feedback</span></h2><br>
        <div class="box bg-info">
          
          <h6>Preencha com suas informações:</h6>
          <form action="comentario.php" id="coment" method="POST">
              <fieldset>
                  <div class="inputbox">
                      <input type="text" name="nome" id="nome" class="inputuser bg-info" required>
                      <label for="nome">Nome</label>
                  </div>

                  <div class="inputbox">
                      <input type="email" name="email" id="email" class="inputemail bg-info" required>
                      <label for="email">Email</label>
                  </div>
                  <br>
                  <p>Nosso serviço é:</p>
                  <input type="radio" id="bom" name="servico" value="bom">
                  <label for="bom">Bom</label>
                  <br>
                  <input type="radio" id="razoavel" name="servico" value="razoavel">
                  <label for="razoavel">Razoavel</label>
                  <br>
                  <input type="radio" id="ruim" name="servico" value="ruim">
                  <label for="ruim">Ruim</label>

                  <div class="inputbox">
                      <input type="text" name="sugestao" id="sugestao" class="inputsugestao bg-info" >
                      <label for="sugestao">Sugestões</label>
                  </div>

                  <input type="submit" name="submit" class="btn btn-primary enviar">
                  <?php
                        
                    if (isset($sucesso)){
                      print_r('<br>');
                      print_r($sucesso);
                    }
                          
                  ?>

        </div>
      </div>
    </section>


    <br>
    <footer id="rodape" class="bg-info ">
      <span class="navbar-text">
        Todas as Farmácias 24 Horas de Catanduva
      </span>
      
    </footer>
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>