<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotulaii</title>
</head>
<body>
    <h1>RotulaI</h1>
    <form action="">
        <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca']; ?>" placeholder="ingrediente" type="text">
        <button type="submit">Pesquisar</button>
    </form> 
    <br>
    <table width="900px" border="1">
        <tr>
            <th>ID</th>
            <th>nome</th>
            <th>proteinas</th>
            <th>carboidratos</th>
            <th>gorduras totais</th>
            <th>gorduras trans</th>
            <th>gorduras saturadas</th>
            <th>fibra alimentar</th>
            <th>sodio</th>
        </tr>

        <?php
        if(!isset($_GET['busca'])) {
            ?>
        <tr>
            <td colspan="9">Digite algo para pesquisar</td>
        </tr>
        <?php
        } else{
            $pesquisa = $conn->real_escape_string($_GET['busca']);
            $sql_code = "SELECT *
                FROM tb_ingredientes 
                WHERE nome LIKE '%$pesquisa%'";
            $sql_query = $conn->query($sql_code) or die("erro ao consultar" . $conn->error);

            if($sql_query->num_rows == 0) {   
        ?>

        <tr>
            <td colspan="9">Nenhum resultado encontrado</td>
        </tr>
        <?php 
        } else {
            while($dados = $sql_query->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?php echo $dados['id']; ?></td>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo $dados['proteinas']; ?></td>
                    <td><?php echo $dados['carboidratos']; ?></td>
                    <td><?php echo $dados['gordurastrans']; ?></td>
                    <td><?php echo $dados['gordurastotais']; ?></td>
                    <td><?php echo $dados['gordurassaturadas']; ?></td>
                    <td><?php echo $dados['sodio']; ?></td>
                    <td><?php echo $dados['fibra']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    <?php
    } ?>

</table>
    
</body>
</html>