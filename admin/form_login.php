<?php

if (isset($_GET['nomeUsuario'])) {
    $nomeUsuario = $_GET['nomeUsuario'];
} else {
    $nomeUsuario = "";
}

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="cssAdmin/style.css">
    <link rel="stylesheet" href="cssAdmin/menuStyle.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/bae5127ccf.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <main class="container mt-5">
        <h3 class="mb-3">Login</h3>

        <div class="mb-2"><?=$msg?></div>

        <form method="POST" action="login.php">

            <div class="mb-3">
                <label for="InputEmail1" class="form-label">Nome do usuário</label>
                <input type="namespace" class="form-control" value="<?=$nomeUsuario?>" id="InputEmail1" name="nomeUsuario" required>
            </div>
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="InputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary">Entar</button>
        </form>

    </main>

</body>

</html>