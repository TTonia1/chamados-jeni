

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <div>
        <p>Cadastro de colaborador</p>
        <form method="POST">
            <label for="nome">Nome<input type="text" name="nome"></label>
            <label for="email">email<input type="email" name="email"></label>
            <label for="telefone">telefone<input type="text" name="telefone"></label>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>

<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $sql = "INSERT INTO colaborador (nome, email, telefone) Values ('$nome' , '$email' , '$telefone')";
    if($conn -> query($sql) === true){
        echo"Novo registro adiocionado";
    }else{
        echo"Erro". $slq ."<br>".$conn -> error;
    }
}

?>