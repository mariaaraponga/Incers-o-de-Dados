<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alunoscursos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS alunos (
    id_aluno INT(6) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    curso VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de alunos criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela de alunos: " . $conn->error . "<br>";
}

$sql = "CREATE TABLE IF NOT EXISTS cursos (
    id_curso INT(6) PRIMARY KEY AUTO_INCREMENT,
    nome_curso VARCHAR(255) NOT NULL,
    instrutor VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de cursos criada com sucesso<br>";
} else {
    echo "Erro ao criar tabela de cursos: " . $conn->error . "<br>";
}

$sql = "INSERT INTO alunos (nome, curso) 
        VALUES ('Daniele Ramos', 'Desenvolvimento de Sistemas')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos na tabela de alunos com sucesso<br>";
} else {
    echo "Erro ao inserir dados na tabela de alunos: " . $conn->error . "<br>";
}

$sql = "INSERT INTO cursos (nome_curso, instrutor) 
        VALUES ('Desenvolvimento de Sistemas', 'Lenon Yuri')";

if ($conn->query($sql) === TRUE) {
    echo "Dados inseridos na tabela de cursos com sucesso<br>";
} else {
    echo "Erro ao inserir dados na tabela de cursos: " . $conn->error . "<br>";
}

$conn->close();
?>