<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomebanco = "provasatc";
$conn = mysqli_connect($servidor, $usuario, $senha, $nomebanco);
date_default_timezone_set("America/Sao_Paulo");

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

function scriptMsg($msg, $local)
{
    ?>
    <script type="text/javascript">
        var local = "<?php echo $local; ?>";
        var mensagem = "<?php echo $msg;?>";
        alert(mensagem);
        location.href = local;
    </script>
    <?php
}

if (isset($_POST['incluir'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dataehora = date('d/m/Y H:i:s ');
    $sql = "INSERT INTO emails (nome, email, dataehora)
    VALUES ('$nome', '$email', '$dataehora')";
    if (!validaEmail($email)) {
        scriptMsg('E-mail inválido', 'incluir.html');
    } else {
        if ($conn->query($sql) === TRUE) {
            scriptMsg('E-mail inserido com sucesso.', 'incluir.html');
        } else {
            scriptMsg('Erro ao inserir e-mail', 'incluir.html');
        }
    }
}

if (isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM emails WHERE idemail=" . $id;
    if ($conn->query($sql) === TRUE) {
        scriptMsg('E-mail deletado com sucesso.', 'excluir.html');
    } else {
        scriptMsg('Erro ao deletar e-mail.', 'excluir.html');
    }
}

if (isset($_POST['alterar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $sql = "UPDATE emails SET nome='$nome',email='$email' WHERE idemail = " . $id;
    if (!validaEmail($email)) {
        scriptMsg('E-mail inválido', 'alterar.html');
    } else {
        if ($conn->query($sql) === TRUE) {
            $msg = 'E-mail alterado com sucesso.';
            scriptMsg('E-mail alterado com sucesso.', 'alterar.html');
        } else {
            scriptMsg('Erro ao alterar o e-mail', 'alterar.html');
        }
    }
}

?>