<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="favicon-16x16.png">

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

        h1 {
            color: #000; /* Black text color */
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            color: #1E1A3E;
        }

        .table th,
        .table td {
            border: 1px solid #008B8B; /* Match header color */
        }

        .table th {
            background-color: #008B8B; /* Match header color */
            color: #fff;
        }

        .table td {
            background-color: #fff; /* White background */
        }

        .btn-success,
        .btn-danger {
            border: 1px solid #008B8B; /* Match table border color */
            color: #fff; /* White text color */
        }

        .btn-success:hover,
        .btn-danger:hover {
            background-color: #1E1A3E;
            color: #fff;
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
            <a href="equipe.html">Sobre a Equipe</a>
            <a href="home.html">Home</a>
        </nav>
    </header>

    <center>
        <h1>Carteirinha de Vacinação Virtual</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                include("config.php");
                $sql = "SELECT * FROM tbvacina";
                $res = $conn->query($sql) or die($conn->error);
                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    print "<table class='table table-striped table-hover'>";
                    print "<tr>";
                    print "<th>Dose</th>";
                    print "<th>Data</th>";
                    print "<th>Local</th>";
                    print "<th>Vacina</th>";
                    print "<th>Ações</th>";
                    print "</tr>";
                    while ($row = $res->fetch_object()) {
                        print "<tr>";
                        print "<td>" . $row->dose . "</td>";
                        print "<td>" . $row->dataVac . "</td>";
                        print "<td>" . $row->localVac . "</td>";
                        print "<td>" . $row->vacinaTipo . "</td>";

                        print "<td>
                                     <button class='btn btn-success' onclick=\"location.href='editar.php?id=" . $row->id . "';\">Editar</button>
                                     <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='salvar.php?acao=excluir&id=" . $row->id . "';}else{false;}\">Excluir</button>
                                   </td>";
                        print "</tr>";
                    }
                    print "</table>";
                } else {
                    print "<p>Nenhum resultado encontrado</p>";
                }
                ?>
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
