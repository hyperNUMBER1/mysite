<?php
function conectar() {
    $mysqli = new mysqli("localhost", "root", "", "lojaindustrial");    
    if ($mysqli->connect_error) {
        die("Falha: ".$mysqli->connect_error);
    }    
    return $mysqli;
}
function inserirCategoria($nome, $descricao) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_categorias 
        (nome, descricao) 
        VALUES (?, ?)
    ");
    $stmt->bind_param("ss", $nome, $descricao);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}
function inserirImagem($link, $id_produto) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_imagens 
        (link, id_produto) 
        VALUES (?, ?)
    ");
    $stmt->bind_param("sd", $link, $id_produto);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}
function inserirProdutos($nome, $descricao, $preco, $categoria) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
        INSERT INTO tb_produtos 
        (nome, descricao, preco, id_categoria) 
        VALUES (?, ?, ?, ?)
    ");
    $stmt->bind_param("ssdd", $nome, $descricao, $preco, $categoria);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}

function excluirCategoria($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_categorias WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}
function excluirImagem($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_imagens WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}
function excluirProduto($id) {
    $mysqli = conectar();
    $stmt = $mysqli->prepare("
    DELETE FROM tb_produtos WHERE id = ?");
    $stmt->bind_param("i", $id);    
    $stmt->execute();   
    $stmt->close();
    $mysqli->close();
}

function listarCategorias() {
    $mysqli = conectar();
    $sql = "SELECT id, nome, descricao 
    FROM tb_categorias";
    $result = $mysqli->query($sql);
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $mysqli->close();
    return $categorias;
}
function listarImagens() {
    $mysqli = conectar();
    $sql = "SELECT id, link, id_produto 
    FROM tb_imagens";
    $result = $mysqli->query($sql);
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $mysqli->close();
    return $categorias;
}
function listarProdutos() {
    $mysqli = conectar();
    $sql = "SELECT id, nome, descricao, preco, id_categoria
    FROM tb_produtos";
    $result = $mysqli->query($sql);
    $categorias = [];
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
    $mysqli->close();
    return $categorias;
}

?>
