<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtocategoria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE produtos (
    id_produto INT(6) PRIMARY KEY,
    nome_produto VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE categorias (
    id_categoria INT(6) PRIMARY KEY,
    nome_categoria VARCHAR(255) NOT NULL
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tabelas criadas com sucesso";
} else {
    echo "Erro ao criar tabelas: " . $conn->error;
}

while ($conn->next_result()) {
    $conn->store_result();
}

$sql = "INSERT INTO produtos (id_produto, nome_produto, preco) 
        VALUES ('4002', 'tênis', 89.99);

INSERT INTO categorias (id_categoria, nome_categoria)
        VALUES (7482, 'sapatos');";

if ($conn->multi_query($sql) === TRUE) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$conn->close();
?>
