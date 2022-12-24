<?php
    require_once "ConexaoBD.php";
    require_once "Funcoes.php";

    class ProdutoDAO{

        function consultarProdutos(){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT * FROM produto AS p, categoria AS e WHERE p.idcategoria = e.idcategoria";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarPorLimit($quantidade){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT * FROM produto AS p, categoria AS e WHERE p.idcategoria = e.idcategoria LIMIT $quantidade";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarPorCategoria($idCategoria){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT * FROM produto AS p, categoria AS c WHERE p.idcategoria = c.idcategoria AND p.idcategoria = '$idCategoria'";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarCategoria($idCategoria){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT categoria FROM categoria WHERE idcategoria = '$idCategoria'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }


        function consultarProdutosId($idProduto){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT * FROM produto AS p, categoria AS e WHERE p.idcategoria = e.idcategoria AND p.idproduto = '$idProduto'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function consultarTamanhoImagem($idProduto){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT LENGTH(imagem) as tam FROM produto WHERE idproduto = '$idProduto' ";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function consultarPorChave($key){
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT * FROM produto AS p, categoria AS e WHERE p.idcategoria = e.idcategoria AND (artista LIKE '%$key%' || titulo LIKE '%$key%' || categoria LIKE '%$key%')";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function cadastrarProduto($dados){
            $conexao = ConexaoBD::getConexao();

            $imagem = pegarImagem($_FILES);

            $sql = "INSERT INTO produto (titulo, artista, tamanho_imagem, valor, imagem, idcategoria, data_publi) VALUES ('{$dados['titulo']}','{$dados['artista']}','{$dados['tamanho_imagem']}','{$dados['valor']}','{$imagem}','{$dados['idcategoria']}','{$dados['data_publi']}')";

            $conexao->exec($sql);

            $this->iniciaTabelaView($conexao->lastInsertId());
        }

        function editarProduto($dados){
            $conexao = ConexaoBD::getConexao();

            $imagem = pegarImagem($_FILES);

            $sql = "UPDATE produto SET titulo = '{$dados['titulo']}', artista = '{$dados['artista']}', tamanho_imagem = '{$dados['tamanho_imagem']}', valor = '{$dados['valor']}', imagem = '{$imagem}', idcategoria = '{$dados['idcategoria']}', data_publi = '{$dados['data_publi']}' WHERE idproduto = '{$dados['idproduto']}'";

            $conexao->exec($sql);

            return $dados['idproduto'];
        }

        function removerProduto($idProduto, $idView){
            $conexao = ConexaoBD::getConexao();

            $sqlRemoveView = "DELETE FROM visualizacoes WHERE idvisualizacoes = '{$idView['idvisualizacoes']}'";

            $sql = "DELETE FROM produto WHERE idproduto='$idProduto'";

            $conexao->exec($sqlRemoveView);
            $conexao->exec($sql);
        }

        function consultarView($idProduto) {
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT view FROM visualizacoes WHERE idproduto = '$idProduto'";

            $resultado = $conexao->query($sql);

            $view = $resultado->fetch(PDO::FETCH_ASSOC);

            if($view){
                if(is_null($view['view'])){
                    return $view = 0;
                }else {
                    return $view['view'];
                }
            }
        }

        function consultaIdView($idProduto) {
            $conexao = ConexaoBD::getConexao();

            $sql = "SELECT idvisualizacoes FROM visualizacoes WHERE idproduto = '$idProduto'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function iniciaTabelaView($idProduto) {
            $conexao = ConexaoBD::getConexao();

            $sql = "INSERT INTO visualizacoes (view, idproduto) VALUES (0, $idProduto)";

            $conexao->exec($sql);

            $idView = $this->consultaIdView($idProduto);

            $sqlUpdate = "UPDATE produto SET idvisualizacoes = ({$idView['idvisualizacoes']}) WHERE idproduto = '$idProduto'";
            $conexao->exec($sqlUpdate);
        }

        function aumentarView($idProduto) {
            $conexao = ConexaoBD::getConexao();

            $view = $this->consultarView($idProduto);

            $sql = "UPDATE visualizacoes SET view = ($view + 1) WHERE idproduto = '$idProduto'";

            $conexao->exec($sql);
        }
    }