  <div class="row col-sm-6">

    <div class="form-group">
      <div class="col-sm-2">

      </div>
    </div>

	<?php
	echo "
	
	<form class='form-horizontal' method='post' action='content/page/area1/core/finalizaCadastro.php' id='validaAcesso' enctype='multipart/form-data'>

    <div class='form-group'>
      <label for='inputEmail3' class='col-sm-2 control-label'>Nome</label>
      <div class='col-sm-10'>
        <input type='text' name='nome' class='form-control' id='inputEmail3' placeholder='Primeiro nome' required>
      </div>
    </div>

   <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>E-mail</label>
    <div class='col-sm-10'>
      <input type='email' name='email' class='form-control' id='inputPassword3' placeholder='E-mail para contato' required>
    </div>
  </div>
   <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'></label>
    <div class='col-sm-10'>
      <input type='email' name='email' class='form-control' id='inputPassword3' placeholder='Digite o E-mail novamente' required>
    </div>
  </div>



<div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'>Nivel</label>
  <div class='col-sm-10'>
  <select name='nivel' class='form-control' required>
    <option value='0' required>Usuario</option>
    <option value='1' required>Moderador</option>
    <option value='2' required>Administrador</option>
  </select>
</div>
</div>



  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <button type='submit' name='BTEnvia' class='btn btn-default'>Cadastrar</button>
    </div>
  </div>


</form> ";

?>

  </div>
