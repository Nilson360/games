<?php
    //session_start();
    $cod= $_GET['cod']?? 0;
    $q = "SELECT cod, nome, genero, produtora, descricao, nota, capa FROM jogos where cod =$cod";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>
<form action="film-edit.php" method="POST">
      <table>
          <tr><td>Id : <input type="number" value="<?php echo $reg->cod ?>" readonly></tr>
          <tr><td> Nome : <input type="text" value="<?php echo $reg->nome ?>" name="nome" id="nome" size="30" maxlength="30"></td></tr>
          <tr><td>Genero : <input type="number" value="<?php echo $reg->genero ?>" name="genero" id="genero" size="30" maxlength="11" placeholder="o genero deve ser um numero inteiro"></td></tr>
          <tr><td>Productora : <input type="number" value="<?php echo $reg->produtora ?>" name="produtora" id="produtora" size="30" maxlength="11" placeholder="A produtora deve ser um numero inteiro"></td></tr>
          <tr><td>Descriçao : <input type="text" value="<?php echo $reg->descricao ?>" name="descricao" id="descricao" size="40" maxlength="150"></td></tr>
          <tr><td>Nota <input type="number" value="<?php echo $reg->nota ?>" name="nota" id="nota" size="10" max="11"></td></tr>
          <tr><td>Capa : <input type="text" value="<?php echo $reg->capa ?>" size="30" maxlength="40" placeholder="exemple : capa.png"></td></tr>
          <tr><td><input type="submit" value="validar"></td></tr>
      </table>
</form>