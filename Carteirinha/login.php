<?php
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$entrar = $_POST['entrar'];

$connect = mysqli_connect('localhost', 'root', '', 'carteirinha');

if (isset($entrar)) {
    $query = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $verifica = mysqli_query($connect, $query) or die("Erro ao selecionar");
    
    if (mysqli_num_rows($verifica) <= 0) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='login.html';
        </script>";
        die();
    } else {
        setcookie("email", $email);
        header("Location: home.html");
    }
}
?>
