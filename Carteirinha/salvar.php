<?php
include("config.php");

switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        // Obtém os campos principais da primeira vacina
        $dose = $_POST["dose"];
        $dataVac = $_POST["dataVac"];
        $localVac = $_POST["localVac"];
        $vacinaTipo = $_POST["vacinaTipo"];

        // Insere a primeira vacina no banco de dados
        $sql = "INSERT INTO tbvacina (dose, dataVac, localVac, vacinaTipo) VALUES ('$dose', '$dataVac', '$localVac', '$vacinaTipo')";
        $res = $conn->query($sql) or die($conn->error);

        if ($res == true) {
            print "<script>alert('Vacina Cadastrada com sucesso!');</script>";
            print "<script>location.href='usuarios.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar.');</script>";
            print "<script>location.href='usuarios.php';</script>";
        }

        // Obtém os campos das vacinas adicionais e insere no banco de dados
        for ($i = 1; isset($_POST["dose$i"]); $i++) {
            $dose = $_POST["dose$i"];
            $dataVac = $_POST["dataVac$i"];
            $localVac = $_POST["localVac$i"];
            $vacinaTipo = $_POST["vacinaTipo$i"];

            $sql = "INSERT INTO tbvacina (dose, dataVac, localVac, vacinaTipo) VALUES ('$dose', '$dataVac', '$localVac', '$vacinaTipo')";
            $res = $conn->query($sql) or die($conn->error);
        }

        if ($res == true) {
            print "<script>alert('Vacinas adicionais cadastradas com sucesso!');</script>";
            print "<script>location.href='usuarios.php';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar as vacinas adicionais.');</script>";
            print "<script>location.href='usuarios.php';</script>";
        }

        break;

    case 'editar':
        // Verifica se o ID da vacina a ser editada foi fornecido
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $dose = $_POST["dose"];
            $dataVac = $_POST["dataVac"];
            $localVac = $_POST["localVac"];
            $vacinaTipo = $_POST["vacinaTipo"];

            // Atualiza a vacina no banco de dados com base no ID
            $sql = "UPDATE tbvacina SET
                        dose='$dose',
                        dataVac='$dataVac',
                        localVac='$localVac',
                        vacinaTipo='$vacinaTipo'
                    WHERE id=$id";

            $res = $conn->query($sql) or die($conn->error);

            if ($res == true) {
                print "<script>alert('Vacina editada com sucesso!');</script>";
                print "<script>location.href='usuarios.php';</script>";
            } else {
                print "<script>alert('Não foi possível editar a vacina.');</script>";
                print "<script>location.href='usuarios.php';</script>";
            }
        }

        break;

    case 'excluir':
        // Verifica se o ID da vacina a ser excluída foi fornecido
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];

            // Exclui a vacina no banco de dados com base no ID
            $sql = "DELETE FROM tbvacina WHERE id=$id";

            $res = $conn->query($sql) or die($conn->error);

            if ($res == true) {
                print "<script>alert('Vacina excluída com sucesso!');</script>";
                print "<script>location.href='usuarios.php';</script>";
            } else {
                print "<script>alert('Não foi possível excluir a vacina.');</script>";
                print "<script>location.href='usuarios.php';</script>";
            }
        }

        break;
}
?>
