<?php
    require "conecta.php";

    function lerProdutos($conexao){
    //    $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos ORDER BY nome";

        $sql = "SELECT produtos.id, produtos.nome AS produto, produtos.preco AS preco, produtos.quantidade AS quantidade, 
        produtos.descricao AS descricao, fabricantes.nome AS fabricante FROM produtos INNER JOIN fabricantes 
        ON produtos.fabricante_id = fabricantes.id ORDER BY produto";

       $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

       $produtos = [];

       while($produto = mysqli_fetch_assoc($resultado)){
           array_push($produtos, $produto);
       }

       return $produtos;
    }

    function inserirProduto($conexao, $nome, $preco, $quantidade, $descricao, $fabricanteId){
        $sql = "INSERT INTO produtos(nome, preco, quantidade, descricao, fabricante_id) VALUES('$nome', '$preco', '$quantidade', '$descricao', '$fabricanteId') ";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }

    function lerUmProduto($conexao, $id){
        //Montagem do comando SQL com parâmetro id
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricante_id FROM produtos WHERE id = $id";

        //Execução do comando e armazenamento do resultado
        $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        //Retornando para fora da função o resultado como array associativo
        return mysqli_fetch_assoc($resultado);
    }

    function atualizarProduto($conexao, $id, $nome){
        $sql = "UPDATE produto SET nome = '$nome' WHERE id = $id";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }

    function excluirProduto($conexao, $id){
        $sql = "DELETE FROM produtos WHERE id = $id";
        mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    }
 
