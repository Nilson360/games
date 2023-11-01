<h1>Cadastrar novo usuario</h1>
<form action="user-new.php" method="POST">
    <table>
        <tr><td>Usuario <input type="text" name="usuario" id="usuario" size="10" maxlength="10">
        <tr><td>Nome <input type="text" name="nome" id="nome" size="30" maxlength="30">
        <tr><td>Tipo <select name="tipo" id="tipo">
                    <option value="admin">Administrador</option>
                    <option value="editor">Editor</option>
                </select>
        <tr><td>Senha <input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Senha <input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="validar"></td></tr>

    </table>
</form>
