<?php

include('protect.php');//inclui a proteção

if(!empty($_GET['id'])){//se há o id no link do site (o id aparece no link quando o usuario aperta em deletar)
    include('../conecta/config.php');//inclui o banco de dados

    $id = $_GET['id']; //pega o id no link do site

    $sql_select_ = "SELECT * FROM usuarios WHERE id = $id";

    $result_ = $conexao->query($sql_select_);

    if ($result_->num_rows > 0){
        $sqlDelete = "DELETE FROM usuarios WHERE id = $id";
        $result_Delete = $conexao->query($sqlDelete);
    }

}
header('Location: adm.php');
?>