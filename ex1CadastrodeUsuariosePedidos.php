<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insercaodeDados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE usuarios (
    id_usuario INT(6) PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE pedidos (
    id_pedido INT(6) PRIMARY KEY,
    id_usuario INT(6) UNSIGNED,
    produto VARCHAR(255) NOT NULL,
    quantidade VARCHAR(255) NOT NULL
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tabelas criadas com sucesso";
} else {
    echo "Erro ao criar tabelas: " . $conn->error;
}

while ($conn->next_result()) {
    $conn->store_result();
}

$sql = "INSERT INTO usuarios (nome, email) 
        VALUES ('Daniele Ramos', '18');

INSERT INTO pedidos (id_pedido, id_usuario, produto, quantidade)
        VALUES ('3562', '972', 'sapato', '4');";

if ($conn->multi_query($sql) === TRUE) {
    echo "Dados inseridos";
} else {
    echo "Erro ao inserir dados" . $conn->error;
}

$conn->close();
?>


