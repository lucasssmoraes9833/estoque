<?php 
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $conn = new mysql ("localhost", "root", "panificadora");
if($conn->connect_error){
    die(json_encode(["erro" => "Erro ao conectar"]));
}

$nome = $conn -> real_escape_string ($_POST['nome']);
$quantidade = (int) $_POST ['quantidade'];
$preco = (float) $_POST ['preco'];

$sql = "INSERT INTO produtos (nome, quantidade, preco) VALUES
         ('$nome', $quantidade, $preco)";
if($conn -> query($sql)){
    echo json_encode(["sucesso" =>true, "mensagem" =>
                                            "Produto inserido com  sucesso!"]);

} else {
    }    echo json_encode(["sucesso" => "Erro ao inserir produto."]);

$conn->close();
} else {
echo json_encode(["erro" => "Requisição inválida."]);
}



