
<?php
include "db.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $problema = $_POST["problema"];
    $criticidade = $_POST["criticidade"];
    $status_chamado = $_POST["status_chamado"];
    $data_abertura = $_POST["data_abertura"];
    $sql = "INSERT INTO chamados (problema, criticidade, status_chamado, data_abertura, id_colaborador , id_cliente) Values ('$problema' , '$criticidade' , '$status_chamado' , '$data_abertura', '$id_colaborador','$id_cliente')";
    if($conn -> query($sql) === true){
        echo"Novo registro adiocionado";
    }else{
        echo"Erro". $slq ."<br>".$conn -> error;
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
            <label for="">Problema<input type="text" name="problema"></label>
            <select name="criticidade">
                <option>Escolha uma criticidade</option>
                <option>Alta</option>
                <option>Media</option>
                <option>Baixa</option>
            </select>
           <select name="status_chamado">
                <option>Escolha um status</option>
                <option>Aberto</option>
                <option>Em Andamento</option>
                <option>Fechado</option>
           </select>
            <label for="">data<input type="date" name="data_abertura"></label>
            <select>
                <option>Selecione um Colaborador</option>
                <option value="<?php echo $row_colaborador['id_colaborador']?>"><?php while($row_colaborador = $query_colaborador->fetch_assoc()){
                    echo $row_colaborador['nome'];
                }?></option>
            </select>
            <select>
                <option>Selecione um cliente</option>
                <option value="<?php echo $row_colaborador['id_colaborador']?>"><?php while($row_cliente = $query_cliente->fetch_assoc()){
                    echo $row_cliente['nome'];
                }?></option>
            </select>
            <button>Enviar</button>
        </form>
    </div>
</body>
</html>
