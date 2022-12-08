<?php

include('../conecta/conexaoadm.php');



if (isset($_POST['senha']) || isset($_POST['usuario'])){

  
  if(strlen($_POST['usuario']) == 0){
    $preUser = 'Preencha seu usuario';
  }
  else if(strlen($_POST['senha']) == 0){
    $preSenha = 'Preencha sua senha';
  }else{

    $usuario = $mysqli->real_escape_string($_POST['usuario']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    
    $sql_code = "SELECT * FROM usuarios WHERE senha = '$senha' AND usuario = '$usuario'";
    $sql_query = $mysqli->query($sql_code);

    $qtd = $sql_query->num_rows;

    if ($qtd == 1){
      $user = $sql_query->fetch_assoc();
      
      if(!isset($_SESSION)){
        session_start();
        $_SESSION['user'] = $user['usuario'];

        header("Location: adm.php");
      }
    }else{
      $erros = 'Usuario ou senha incorretos!';
    }
  } 
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
    <link rel="stylesheet" href="../estilos/style.css">
    <style>
                #contato h2{
            font-weight: bold;
        }
        .box {
            position: absolute;
            top: 30%;
            left: 41%;
            padding: 15px;
            border-radius: 15px;
            width: 19%;
            color: white;
        }
        fieldset{
            padding: 10px;
            border: solid 3px white;
        }
        .inputbox{
            position: relative;
            
        }
        .inputuser{
            border: none;
            border-bottom: 1px solid white;
            margin-bottom: 15px;
        }
        .inputsenha{
            border: none;
            border-bottom: 1px solid white;
            margin-bottom: 15px;
        }
      
        .enviar{
            margin-top: 20px;
        }
        .botao{
          border: none;
        }
        #rodape{
          margin-top: 550px;
        }
        p{
          color: red; 
          margin-bottom: 10px;
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
              <a class="nav-link" href="../index.html">Home</a>
            </li>
          </ul>
          <span class="navbar-text">
            Todas as Farmácias 24 Horas de Catanduva
          </span>
        </div>
      </nav>
  </section>

  <section id="login">

    <div class="container">
        <h2 class="text-center text-info pt-5 pb-4">Login</h2><br>
        <div class="box bg-info">
          <h6>Coloque sua senha:</h6>
            <form action="" method="POST" id="form">
                <fieldset>
                    <div class="inputbox">
                        <input type="text" name="usuario" id="usuario" class="inputuser bg-info">
                        <label for="usuario">Usuário</label>
                    </div>
                    <?php if (isset($preUser)){
                      print_r('<p>'. $preUser .'</p>');
                    }?>

                    <div class="inputbox">
                        <input type="password" name="senha" id="senha" class="inputsenha bg-info">
                        <label for="senha">Senha</label>
                    </div>
                    <?php if (isset($preSenha)){
                        
                          print_r('<p>'. $preSenha .'</p>');
                          
                        }?>
                    <input type="submit" name="submit" class="btn btn-primary enviar">
                    <?php if (isset($erros)){
                      print_r('<br>');
                      print_r('<p>'. $erros .'</p>');
                    }?>
                   
                </fieldset>
            </form>
        </div>
        
    </div>

  </section>

  
 


  
  <footer id="rodape" class="bg-info " >
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