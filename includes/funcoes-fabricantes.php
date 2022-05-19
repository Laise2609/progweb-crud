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

    function inserirFabricante($conexao, $nome){
        $sql = "INSERT INTO fabricantes(nome) VALUES('$nome')";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }

    function lerUmFabricante($conexao, $id){
        //Montagem do comando SQL com parâmetro id
        $sql = "SELECT id, nome FROM fabricantes WHERE id = $id";

        //Execução do comando e armazenamento do resultado
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        //Retornando para fora da função o resultado como array associativo
        return mysqli_fetch_assoc($resultado);
    }

    function atualizarFabricante($conexao, $id, $nome){
        $sql = "UPDATE fabricantes SET nome = '$nome' WHERE id = $id";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }

    function excluirFabricante($conexao, $id){
        $sql = "DELETE FROM fabricantes WHERE id = $id";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }
 
