<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomebanco = "provasatc";
$conn = mysqli_connect($servidor, $usuario, $senha, $nomebanco);

function validaEmail($email)
{
    $conta = "^[a-zA-Z0-9\._-]+@";
    $dominio = "[a-zA-Z0-9\._-]+.";
    $extensao = "([a-zA-Z]{2,4})$";
    $modelo = $conta . $dominio . $extensao;
    if (ereg($modelo, $email))
        return true;
    else
        return false;
}

if (isset($_POST['buscar'])) {
    $id = $_POST['id'];
    $sql = "SELECT email, nome, dataehora FROM emails where idemail=".$id;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $nome = $row["nome"];
            $email = $row["email"];
            $dataehora = $row["dataehora"];
        }
    } else {
        $msg = 'Não foi encontrado nenhum email com o código '.$id.'.';
        ?>
        <script type="text/javascript">
            var mensagem = "<?php echo $msg;?>";
            alert(mensagem);
            location.href = "alterar.html";
        </script>
        <?php
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alterar E-mail</title>
</head>
<body>
<a href="index.html">Voltar ao índice</a>
<h4>Alteração do e-mail de código <?php echo $id?></h4>
<form action="email.php" method="post" name="formalterar2">
    <input class="input" type="hidden" value="<?php echo $id; ?>" name="id">
    Nome:<br>
    <input class="input" type="text" value="<?php echo $nome; ?>" name="nome"><br><br>
    E-mail:<br>
    <input class="input" type="text" value="<?php echo $email; ?>" name="email"><br><br>
    Data e Hora:<br>
    <input class="input" type="text" value="<?php echo $dataehora; ?>" name="email" disabled> <br><br>
    <input type='submit' value='Aplicar Alterações' name="alterar"/>
</form>
</body>
</html>
