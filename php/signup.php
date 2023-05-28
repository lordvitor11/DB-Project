<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo(a)</title>
    <link rel="stylesheet" href="style.css">
    <script src="../source/script.js"></script>
    <style>
        #error {
            color: white;
            background-color: #FF6B6B;
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="header">
            <h1>Database Project</h1>

            <div class="navbar">
                <a href="../index.php"><button>Início</button></a>
                <a href="signup.php"><button>Cadastrar</button></a>
                <a href="login.php"><button>Entrar</button></a>
            </div>
        </div>
        <div class="container">
            <div class="main">
                <div class="info">
                    <div class="imgCenter">
                        <img src="../source/database-icon.webp" alt="imagem referente a um banco de dados"> <br>
                        <span>Projeto desenvolvido por <a href="https://github.com/lordvitor11" target="_blank">Vitor Cesar</a> a fim de aplicar o uso de banco de dados na prática.</span>
                    </div>
                </div>

                <div class="content">
                    <div class="center">
                        <?php
                            require_once 'connect.php';

                            // Get form data
                            $name = isset($_POST['name']) ? $_POST['name'] : "";
                            $email = isset($_POST['email']) ? $_POST['email'] : "";
                            $pass = isset($_POST['password']) ? $_POST['password'] : "";
                        

                            if (!empty($name) && !empty($email) && !empty($pass)) {
                                echo "<div id='error'>";

                                $result = mysqli_query($conn, "SELECT * FROM data WHERE email = '$email'");

                                if (mysqli_num_rows($result) > 0) {
                                    echo "Email já cadastrado!";
                                } else {
                                    $sql = "INSERT INTO data (name, email, pass) VALUES ('$name', '$email', '$pass')";

                                    $result = mysqli_query($conn, $sql);
                                    if ($result == 1) {
                                        // header("location: login.php");
                                        echo '<script>location.href="login.php";</script>';
                                    } else {
                                        echo mysqli_errno($conn);
                                    }
                                }
                                
                                $conn->close();
                                echo "</div>";
                            }
                        ?>
                        <p id="title">Cadastre-se</p>
                        <!-- <form action="javascript:redirect();" autocomplete="off" method="post"> -->
                        <form action="./signup.php" autocomplete="off" method="post">
                            <label for="name">Nome:</label> <br>
                            <input type="text" name="name" id="name" placeholder="Nome sobrenome" required> <br>

                            <label for="email">E-mail:</label> <br>
                            <input type="email" name="email" id="email" placeholder="nome@email.com" required> <br>

                            <label for="password">Senha:</label> <br>
                            <input type="password" name="password" id="password" placeholder="Digite sua senha" oninput="signupVerify();" required> <br>

                            <label for="cPassword">Confirme sua senha:</label> <br>
                            <input type="password" name="cPassword" id="cPassword" oninput="signupVerify();" placeholder="Confirme sua senha" required> <br>
                            <p id="loginLink">Já tem conta? <a href="./login.php">Entre aqui</a></p>

                            <input class="disabled" type="submit" value="Cadastrar" id="submit" disabled>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>