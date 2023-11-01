<?php
    $q = "SELECT usuario, nome, senha, tipo from usuarios where usuario ='".$_SESSION['user']."'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
    ?>

<h1>Alteraçao de dados</h1>
<form action="user-edit.php" method="POST">
    <table>
        <tr>
            <td>Usuario <input type="text" value="<?php echo $reg->usuario; ?>" name="usuario" id="usuario" max="30" size="30">
        </tr>
        <tr>
            <td> Nome <input type="text" value="<?php echo $reg->nome; ?> "name="nome" id="nome" maxlength="30" size="30">
        </tr>
        <tr>
            <td> Tipo <input type="text" name="tipo" id="tipo" readonly value="<?php echo $reg->tipo; ?>">
        </tr>
        <tr>
            <td> Senha  <input type="password" name="senha1" id="senha1" maxlength="10" size="10">
        </tr>
        <tr>
            <td>Confirmar senha <input type="password" name="senha2" id="senha2" maxlength="10" size="10">
        </tr>
        <tr>
            <td><input type="submit" value="Salvar" name="salvar" id="salvar">
        </tr>
    </table>
</form>