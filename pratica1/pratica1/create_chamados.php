<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id_colaborador = $_POST["colaborador"];
    $id_cliente = $_POST["cliente"];
    $problema = $_POST["problema"];
    $criticidade = $_POST["criticidade"];
    $status_chamado = $_POST["status"];
    $data_abertura = $_POST["data_abertura"];

    $sql = "INSERT INTO chamados (problema, criticidade, status_chamado, data_abertura, id_cliente , id_colaborador) VALUES 
    ('$problema' , '$criticidade' , '$status_chamado' , '$data_abertura', $id_cliente, $id_colaborador)";

    if ($conn->query($sql) === true) {
        echo "Novo registro adiocionado";
    } else {
        echo "Erro" . $slq . "<br>" . $conn->error;
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
    <title>Cadastro</title>
</head>

<body>
    <div>
        <p>Create de chamados</p>
        <form method="POST">
            <label for="problema">Problema</label>
            <input type="text" name="problema">
            <label for="criticidade">Criticidade</label>
            <select name="criticidade">
                <option>Escolha uma criticidade</option>
                <option value="alta">Alta</option>
                <option value="media">Media</option>
                <option value="baixa">Baixa</option>
            </select>
            <label for="status">Status</label>
            <select name="status">
                <option>Escolha um status</option>
                <option value="aberto">Aberto</option>
                <option value="andamento">Em Andamento</option>
                <option value="fechado">Fechado</option>
            </select>
            <label for="data_abertura">data</label>
            <input type="date" name="data_abertura">
            <label for="colaborador">Colaborador</label>
            <select name="colaborador">
                <option>Selecione um Colaborador</option>
                <option value="<?php echo $row_colaborador['id_colaborador'] ?>"><?php while ($row_colaborador = $query_colaborador->fetch_assoc()) {
                       echo $row_colaborador['nome'];
                   } ?></option>
            </select>
            <label for="cliente">Cliente</label>
            <select name="cliente">
                <option>Selecione um cliente</option>
                <option value="<?php echo $row_cliente['id_cliente'] ?>"><?php while ($row_cliente = $query_cliente->fetch_assoc()) {
                       echo $row_cliente['nome'];
                   } ?></option>
            </select>
            <button>Enviar</button>
        </form>
    </div>
</body>

</html>