<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Carteirinha de Vacinação Virtual</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Roboto Condensed', sans-serif;
            background: linear-gradient(to left, #008080, #00CED1);
        }

        header {
            background-color: #008B8B;
            color: #fff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .image {
            background: transparent;
        }

        .logo {
            width: 400px;
            height: auto;
            background: transparent;
        }

        nav {
            display: flex;
            justify-content: flex-end;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            padding: 10px 20px;
            border: 1px solid #fff;
            border-radius: 20px;
            background-color: #20B2AA;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #483D8B;
            color: #fff;
        }

        .container {
            flex: 1;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-success {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            padding: 10px 20px;
            border: 1px solid #fff;
            border-radius: 20px;
            background-color: #20B2AA;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #ff0676;
        }
    </style>
</head>

<body>
    <header>
        <div class="image">
            <img class="logo" src="logo.png" alt="Logo">
        </div>
        <nav>
            <a href="incluir.html">Inclua uma carteirinha</a>
            <a href="usuarios.php">Consulte sua carteirinha</a>
            <a href="equipe.html"> Sobre a Equipe </a>
            <a href="home.html">Home </a>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                  include("config.php");
                  $sql = "SELECT * FROM tbvacina WHERE id=".$_REQUEST["id"];
                  $res = $conn->query($sql) or die($conn->error);
                  $row = $res->fetch_object();
                ?>
                <form action="salvar.php" method="POST">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="id" value="<?php print $row->id; ?>">
                    <div class="form-group">
                        <label>Dose</label>
                        <input type="text" name="dose" class="form-control" value="<?php print $row->dose; ?>">
                        
                    </div>
                    <div class="form-group">
                        <label>Data</label>
                        <input type="date" name="dataVac" class="form-control" value="<?php print $row->dataVac; ?>">
                    </div>
                    <div class="form-group">
                        <label>Local</label>
                        <input type="text" name="localVac" class="form-control" value="<?php print $row->localVac; ?>">
                    </div>
                    <div class="form-group">
                        <label>Vacina</label>
                        <input type="text" name="vacinaTipo" class="form-control" value="<?php print $row->vacinaTipo; ?>">
                        
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>