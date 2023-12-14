<?php
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']); // Use md5 apenas para fins de exemplo; é recomendado usar funções de hash mais seguras.

    $connect = mysqli_connect('localhost', 'root', '', 'carteirinha');

    if (mysqli_connect_errno()) {
        die("Erro na conexão ao banco de dados: " . mysqli_connect_error());
    }

    $query_select = "SELECT email FROM usuario WHERE email = '$email'";
    $select = mysqli_query($connect, $query_select);
    $row = mysqli_fetch_assoc($select);

    if ($email == "" || $email == null) {
        echo "<script language='javascript' type='text/javascript'>
            alert('O campo email deve ser preenchido!!');
            window.location.href='cadastro.html';
        </script>";
    } else {
        if ($row) {
            echo "<script language='javascript' type='text/javascript'>
                alert('Esse email já existe!');
                window.location.href='cadastro.html';
            </script>";
        } else {
            $query = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";
            $insert = mysqli_query($connect, $query);

            if ($insert) {
                echo "<script language='javascript' type='text/javascript'>
                    alert('Usuário cadastrado com sucesso!');
                    window.location.href='login.html';
                </script>";
            } else {
                echo "<script language='javascript' type='text/javascript'>
                    alert('Não foi possível cadastrar esse usuário');
                    window.location.href='cadastro.html';
                </script>";
            } 
        }
    }

    mysqli_close($connect);
?>
