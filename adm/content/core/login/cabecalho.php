  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="inicio">Area administrativa</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right ">



        <li class="dropdown ">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>


          <ul class="dropdown-menu">
		  
		  <?php
             echo "<form method='post' action='content/core/login/validaAcesso.php'>
                  <div class='form-group'>

                    <div class='col-sm-12'>
                      <input type='text' name='nomeUsuario' class='form-control' id='inputEmail3' placeholder='Digite o usuario'>
                    </div>
                  </div>
                  <div class='form-group'>

                    <div class='col-sm-12'>
                      <input type='password'  name='senha' class='form-control' id='inputPassword3' placeholder='Password'>
                    </div>
                  </div>
                  <div class='form-group'>

                    <div class='form-group'>
                      <div class='col-sm-12'>
                        <button type='submit' name='entrar' class='btn btn-success btn-success-login col-sm-12'>Entrar</button>
                      </div>
                    </div>

                    <div class=' col-sm-12 '>
                      <div class='checkbox'>
                        <label>
                          <input  type='checkbox' name='remember' value='remember'>manter ativo
                        </label>

                        <label>
                         <a class='col-sm-10 pull-right' href='recuperar' title='Receba um email, com as instruçoes de recuperação de senha'><span class='label label-warning'>Recuperar senha!</span></a>

                        </label>
                      </div>
                    </div>

                  </div>

                </form>";


?>


          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
