<?php
include "../incs/header.php";

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
<main class="containerF my-5" style="width: 540px;">

    <h2>Cadastro</h2>

    <p><?= $msg ?></p>

    <form class="login" method="POST" enctype="multipart/form-data" action="cadastro_usuario.php">

        <div class="" id="image-container">
            <img id="imgImage" class="icone" width="100px" height="100px" src="../img/logoPadrao.png" />
            <input type="file" class="mb-5" id="FileUpload1" name="imagem" onChange="mostraImagem(this)" />
        </div>

        <div>
            <label class="form-lable mb-2" for="nameid">Nome</label>
            <input type="text" value="<?= $nomeUsuario ?>" class="form-control mb-3 formP corp" name="nomeUsuario" id="nameid">
        </div>

        <div>
            <label class="form-lable mb-2" for="nameid">CPF</label>
            <input type="text" value="<?= $nomeUsuario ?>" class="form-control mb-3 formP corp" name="cpf" id="nameid">
        </div>

        <label class="form-lable mb-2" for="dataid">Data de nascimento</label>
        <input type="date" class="form-control mb-3 formP corp" name="dataNascimento" id="dataid">

        <label class="form-lable mb-2" for="emailid">Email</label>
        <input type="email" class="form-control mb-3 formP corp" name="email" id="emailid">

        <label class="form-lable mb-2" for="senhaid">Senha</label>
        <input class="form-control mb-3 formP corp" type="password" name="senha" id="senhaid">

        <label class="form-lable mb-2" for="senhaConfirmaid">Confirmar senha</label>
        <input class="form-control formP corp" type="password" name="confirmarSenha" id="senhaConfirmaid">

        <div class="mt-3">
            <button type="submit" class="btn-bo btn-cadastro">Cadastrar</button>
        </div>
    </form>

</main>
<?php
include "../incs/footer.php";
