<?php

include('protect.php');

if(!empty($_GET['id'])){
    include('../conecta/conect.php');


    $id = $_GET['id'];

    $sql_select_ = "SELECT * FROM comentarios WHERE id = $id";

    $result_ = $conexao2->query($sql_select_);

    if ($result_->num_rows > 0){
        $sqlDelete = "DELETE FROM comentarios WHERE id = $id";
        $result_Delete = $conexao2->query($sqlDelete);
    }

}
header('Location: adm.php');
?>