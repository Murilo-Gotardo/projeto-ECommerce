<?php
include "topo.php";

if (isset($_GET['nomeUsuario'])) {
    $nomeUsuario = $_GET['nomeUsuario'];
}else {
    $nomeUsuario = "";
}

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}else {
    $msg = "";
}
?>

<h3 class="mb-3">Casdastro de usuario</h3>

<div class="mb-2"><?=$msg?></div>

<form method="POST" action="cadastro_usuario_admin.php">
    
    <div class="mb-3">
        <label for="InputEmail1" class="form-label">Nome do usuario</label>
        <input type="namespace" class="form-control" value="<?=$nomeUsuario?>" id="InputEmail1" name="nomeUsuario" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="InputPassword1" class="form-label">Senha</label>
        <input type="password" class="form-control" name="senha" id="InputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="InputPassword1" class="form-label">Confirme a senha</label>
        <input type="password" class="form-control" name="senha2" id="InputPassword2" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
include "rodape.php";
?>