<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "funcionariodepartamento";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS funcionarios (
    id_funcionario INT(6) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    cargo DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de funcionários criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela de funcionários: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS departamentos (
    id_departamento INT(6) PRIMARY KEY AUTO_INCREMENT,
    nome_departamento VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de departamentos criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela de departamentos: " . $conn->error . "<br>";
}

$sql = "INSERT INTO funcionarios (nome, cargo) VALUES ('Maria Araponga', 222.0)";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos na tabela de funcionários com sucesso<br>";
} else {
    echo "Erro ao inserir dados na tabela de funcionários: " . $conn->error . "<br>";
}

$sql = "INSERT INTO departamentos (nome_departamento) VALUES ('RH')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos na tabela de departamentos com sucesso<br>";
} else {
    echo "Erro ao inserir dados na tabela de departamentos: " . $conn->error . "<br>";
}

$conn->close();
?>

