<?php
  include "db.php";
  $sql = "SELECT * FROM chamados";

  $query = $conn->query($sql);
 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>id chamado</td>
            <td>Colaborador</td>
            <td>Cliente</td>
            <td>Status</td>
            <td>Criticidade</td>
            <td>Ferramentas</td>
        </tr>
        <?php while ($row = $query -> fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['id_chamados']?></td>
            <td><?php echo $row['id_colaborador']?></td>
            <td><?php echo $row['id_cliente']?></td>
            <td><?php echo $row['criticidade']?></td>
            <td><?php echo $row['status_chamado']?></td>
            <td>
                <a href="/update_chamado.php?id_chamados=<?php echo $row['id_chamados']?>">Editar</a>
            </td>
        </tr>
        <?php }?>
    </table>
</body>
</html>