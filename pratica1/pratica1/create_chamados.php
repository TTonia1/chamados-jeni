<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   
    $problema = $_POST["problema"];
    $criticidade = $_POST["criticidade"];
    $status_chamado =$_POST["status"];
    $data_abertura = $_POST["data_abertura"];
    $id_colaborador = $_POST["colaborador"];
    $id_cliente = $_POST["cliente"];

     
$sql = "INSERT INTO chamados (problema, criticidade, status_chamado, data_abertura, id_cliente, id_colaborador) 
VALUES ('$problema', '$criticidade', '$status_chamado', '$data_abertura', $id_cliente, $id_colaborador)";

    if ($conn->query($sql) === true) {
        echo "Novo registro adicionado com sucesso!";
    } else {
         echo "Erro ao inserir o registro: " . $conn->error;
    }
}



$query_colaborador = $conn->query("SELECT * FROM colaborador");
$query_cliente = $conn->query("SELECT * FROM cliente");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Chamados</title>
</head>
<body>
    <div>
        <h2>Criar Chamado</h2>
        <form method="POST">
            <label for="problema">Problema</label>
            <input type="text" name="problema" required>

            <label for="criticidade">Criticidade</label>
            <select name="criticidade" required>
                <option value="">Escolha uma criticidade</option>
                <option value="alta">Alta</option>
                <option value="media">Média</option>
                <option value="baixa">Baixa</option>
            </select>

            <label for="status">Status</label>
            <select name="status" required>
                <option value="">Escolha um status</option>
                <option value="aberto">Aberto</option>
                <option value="andamento">Em Andamento</option>
                <option value="fechado">Fechado</option>
            </select>

            <label for="data_abertura">Data de Abertura</label>
            <input type="date" name="data_abertura" required>

            <label for="colaborador">Colaborador</label>
            <select name="colaborador" required>
                <option value="">Selecione um Colaborador</option>
                <?php 
                while ($row_colaborador = $query_colaborador->fetch_assoc()) { 
                    echo "<option value='" . $row_colaborador['id_colaborador'] . "'>" . $row_colaborador['nome'] . "</option>";
                }
                ?>
            </select>

            <label for="cliente">Cliente</label>
            <select name="cliente" required>
                <option value="">Selecione um Cliente</option>
                <?php 
                while ($row_cliente = $query_cliente->fetch_assoc()) { 
                    echo "<option value='" . $row_cliente['id_cliente'] . "'>" . $row_cliente['nome'] . "</option>";
                }
                ?>
            </select>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
