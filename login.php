<?php
include "incs/header.php";
?>
    <main class="containerF my-5" style="width: 550px;">

        <h2 class="mb-3">Login</h2>

        <form class="login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
                <input type="email" class="formP me-2 corp" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Nunca compartilaremos seu endereço de Email.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="formP me-2 corp" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <a href="cadastro.php" class="navegacaoLinkLogin">Se cadastrar</a>

                <button type="submit" class="btn-bo">Entrar</button>
            </div>
        </form>

    </main>
<?php
include "incs/footer.php";