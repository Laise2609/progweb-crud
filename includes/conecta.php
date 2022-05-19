<?php
    //Parâmetros do servidor de BD
    $servidor = "localhost"; //endereço do banco de dados
    $usuario = "root";
    $senha = ""; 
    $banco = "vendas_laise"; //nome do banco de dados

    //Conectando ao servidor
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

    //Habilitando o suporte ao charset utf8
    mysqli_set_charset($conexao, "utf8");

    //teste
    /* if($conexao){
        echo "tudo ok";
    } */