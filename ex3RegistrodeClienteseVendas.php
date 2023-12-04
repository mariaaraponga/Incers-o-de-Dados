<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientesvendas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE clientes (
    id_cliente INT(6) PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE vendas (
    id_venda INT(6) PRIMARY KEY,
    id_cliente INT(6) UNSIGNED,
    produto_vendido VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tabelas criadas com sucesso";
} else {
    echo "Erro ao criar tabelas: " . $conn->error;
}

while ($conn->next_result()) {
    $conn->store_result();
}

$sql = "INSERT INTO clientes (id_cliente, nome, email) 
        VALUES (972, 'Daniele Ramos', 'danieleramos7000@gmail.com');

INSERT INTO vendas (id_venda, id_cliente, produto_vendido, valor)
        VALUES (356, 972, 'sapato', 4.00);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Dados inseridos com sucesso";
} else {
    echo "Erro ao inserir dados: " . $conn->error;
}

$conn->close();
?>