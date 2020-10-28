<br>
<div class='container'>
<div class='row col-md-3 pull-right'>

  <div class="list-group">
    <a href="#" class="list-group-item active">
      <h4 class="list-group-item-heading">Recuperar sua senha</h4>
    </a>
    <a href="#" class="list-group-item">

 <p class="list-group-item-text">Digite seu E-mail cadastrado no sistema para que receba uma mensagem em seu email
 para recuperar sua senha.</p>
<br>

<?php 
     echo " <form method='post' action='content/core/email/Emailpass.php' id='validaAcesso'>


        <div class='form-group'>
          <div class='col-sm-16'>
            <input type='email' name='email'  class='form-control' id='inputEmail3' placeholder='Digite Seu email' required>
          </div>

          <div class='col-xl-16'>
            <button type='submit' class='btn btn-success btn-success-login col-md-12'>Recuperar senha</button>
          </div>
        </div>


        </form> ";
		
		?>
<div class="clear"></div>
        </a>
  </div>

                          </div>
                          </div>
