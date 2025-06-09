<?php 
header('Content-Type: application/json');

$conn = new mysql ("localhost", "root", "panificadora");
if($conn->connect_error){
    die(json_encode(["erro" => "Erro ao conectar"]));
}

$sql = "SELECT id, nome, quantidade, preco FROM produtos";
$resultado = $conn -> query($sql);

$produtos = [];

while($linhan= $resultadon -> fetch_assoc()){
    $produtos [] = $linha;
}

echo json_encode ($produtos);