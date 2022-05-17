<?php
    require "conecta.php";

    function lerFabricantes($conexao){
        // 1) montar a string do comando SQL
        $sql = "SELECT id, nome FROM fabricantes";

        // 2) Executar o comando
        $resultado = mysqli_query($conexao, $sql);

        // 3) Criar uma array vazia para receber os resultados
        $fabricantes = [];

        // 4) Loop inteirando em cada resultado, e a cada fabricante que for localizado, ele é acrescentado ao array fabricantes
        while ($fabricante = mysqli_fetch_assoc($resultado)){
            //array_push(nome do array principal, nome do array individual)
            array_push($fabricantes, $fabricante);
        }

        // 5) Retornando para fora da função od fabricantes localizados 
        return $fabricantes; //lista de fabricantes
    }

    // var_dump(lerFabricantes($conexao)); //teste

    function inserirFabricante($conexao, $nome){
        $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }
 
