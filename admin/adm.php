<?php

include_once('../conecta/config.php');
include_once('../conecta/conect.php');
include('protect.php');

//if (isset($conexao)) {
//echo ('ok');
//}

// ================================ Parte de pesquisa ===========================
if(!empty($_GET['search'])){
  $data = $_GET['search'];
  $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
  $sql2 = "SELECT * FROM comentarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' or servico LIKE '%$data%' ORDER BY id DESC";
}else{

// ================================ Parte de mostrar as tabelas ===========================

  $sql = "SELECT * FROM usuarios ORDER BY id DESC";
  $sql2 = "SELECT * FROM comentarios ORDER BY id DESC";
}



$result = $conexao->query($sql);
$result2 = $conexao2->query($sql2);

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
      #rodape{
          margin-top: 15%;
      }
      #contato h2{
        padding-top: 30px;
        font-weight: bold;
      }
      #comentario h2{
        padding-top: 90px;
        font-weight: bold;
      }
      .boxpesquisa{
        display: flex;
        justify-content: center;
        gap: .2%;
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
            <li class="nav-item active">
                <a class="nav-link" href="#contato">Contato</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#comentario">FeedBack</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
          <span class="navbar-text">
            Administração
          </span>
        </div>
      </nav>
  </section>

  <section id="contato">
   <div class="contaner">
    <h2 class="text-center">Lista de Contatos:</h2>
    <br>


    <div class="boxpesquisa">
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
      <button onclick="fazerpesquisa()" type="button" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>

    
    <br>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Cidade</th>
          <th scope="col">...</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
            while($userdata = mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<th scope='row'>". $userdata['id']. "</th>";
              echo "<td>". $userdata['nome']. "</td>";
              echo "<td>". $userdata['email']. "</td>";
              echo "<td>". $userdata['cidade']. "</td>";
              echo "<td>
              <a href='delete.php?id=$userdata[id]' class='text-danger' ><i class='fa-solid fa-trash'></i></a>
              </td>";
              echo "<tr>";
            }
          ?>
      </tbody>
    </table>


   </div>
  </section>


  <section id="comentario">
   <div class="contaner">
    <h2 class="text-center">Lista de Comentarios:</h2>
    <br>
    <br>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Serviço</th>
          <th scope="col">Sugestão</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody>
      <?php
            while($userdata2 = mysqli_fetch_assoc($result2)){
              echo "<tr>";
              echo "<th scope='row'>". $userdata2['id']. "</th>";
              echo "<td>". $userdata2['nome']. "</td>";
              echo "<td>". $userdata2['email']. "</td>";
              echo "<td>". $userdata2['servico']. "</td>";
              echo "<td>". $userdata2['sugestao']. "</td>";
              echo "<td>
              <a href='deletecoment.php?id=$userdata2[id]' class='text-danger' ><i class='fa-solid fa-trash'></i></a>
              </td>";
              echo "<tr>";
            }
          ?>
      </tbody>
    </table>


   </div>
  </section>

  
  


  
  <footer id="rodape" class="bg-info " >
    <span class="navbar-text">
      Todas as Farmácias 24 Horas de Catanduva
    </span>
    
  </footer>

    <script>
      var pesquisar = document.getElementById("pesquisar");

      pesquisar.addEventListener("keydown", function(e){
        if (e.key === "Enter"){
          fazerpesquisa();
        }
      });
      
      function fazerpesquisa() {
        window.location = 'adm.php?search='+pesquisar.value;
      }
    </script>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://kit.fontawesome.com/98283e91bc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>