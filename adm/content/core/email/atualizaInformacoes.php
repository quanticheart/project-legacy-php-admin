
<?php
include "content/core/connect/conexao.php";

$codigo = $_GET['codigo'];
$acao = $_GET['acao'];



 if( $codigo == null ){
 session_start();
 $_SESSION['msg_danger'] = "Nenhum codigo informado";
 header("Location: index.php");
 exit;//fim
 }

switch ($acao) {

case senha:

$codigo_seleciona = mysqli_query($conecta, "SELECT * FROM codigo_email WHERE codigo = '$codigo' AND data >= NOW() AND tipo = 'senha' ")or die (mysqli_error());

if (mysqli_num_rows($codigo_seleciona) == 1){

$recebeEmail = base64_decode($codigo);

$consultaInformacoes = mysqli_query($conecta, "SELECT * FROM usuario WHERE email = '$recebeEmail' AND ativo = 's'") or die (mysqli_error());
$verificaInformacoes = mysqli_num_rows($consultaInformacoes);

if($verificaInformacoes == 1){

  while ($linha=mysqli_fetch_array($consultaInformacoes)) {
    $nome = $linha["nome"];

echo "

<div class='container'>
<div class='row col-sm-3 pull-right'>

                <form method='post' action='content/core/email/atualizaDados.php?acao=senha&email=$recebeEmail'>
                <input type='hidden' name='codigo' value='$codigo'>

				<div class='form-group'>
                            <div class='col-sm-12'>
                              $nome, Digite sua nova senha abaixo.
                            </div>
                          </div>
						  
                          <div class='form-group'>
                            <div class='col-sm-12'>
                              <input type='password' name='senha'  class='form-control' id='inputEmail3' placeholder='Digite sua nova senha' required>
                            </div>
                          </div>

                            <div class='form-group'>
                              <div class='col-sm-12'>
                                <button type='submit' class='btn btn-success btn-success-login col-sm-12'>Salvar nova senha</button>
                              </div>
                            </div>

                          </form>
                          </div>
                          </div>


";

}
}

}else{
  session_start();
  $_SESSION['msg_danger'] = "A recuperação de senha <strong>expirou!</strong>";
  header("Location: inicio");
  exit;//fim
}

break;

case ativa:

$recebeEmail = base64_decode($codigo);

$codigo_seleciona = mysqli_query($conecta, "SELECT * FROM codigo_email WHERE codigo = '$codigo' AND data >= NOW() AND tipo = 'ativa' ")or die (mysqli_error());

if (mysqli_num_rows($codigo_seleciona) == 1){

if (empty($recebeEmail)) {
session_start();
$_SESSION['msg_danger'] = "Nenhum E-mail informado";
header("Location: index.php");
exit;//fim
} else {

$consultaInformacoes = mysqli_query($conecta, "SELECT * FROM usuario WHERE email = '$recebeEmail' AND ativo = 'n'") or die (mysqli_error());
$verificaInformacoes = mysqli_num_rows($consultaInformacoes);

//Aqui vou verificar se houve resultado positivo na pesquisa
if($verificaInformacoes == 1){



echo "

<div class='container'>
<div class='row col-sm-4'>
<form class='form-horizontal' method='post' action='content/core/email/atualizaDados.php?acao=ativa&email=$recebeEmail' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>Nome</label>
    <div class='col-sm-10'>
      <input type='text' name='nome' class='form-control' id='inputEmail3' placeholder='Primeiro nome' required>
    </div>
  </div>

  <input type='hidden' name='codigo' value='$codigo'>

  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Sobrenome</label>
    <div class='col-sm-10'>
      <input type='text' name='snome' class='form-control' id='inputPassword3' placeholder='Nome secundario' required>
    </div>
  </div>

  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'>Foto</label>
  <div class='col-sm-10'>
    <input type='file' name='fotouser' id='exampleInputFile' required>
    </div>
  </div>


  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Usuario</label>
    <div class='col-sm-10'>
      <input type='text' name='nomeUsuario' class='form-control' id='inputPassword3' placeholder='ID para login' required>
    </div>
  </div>
   <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Senha</label>
    <div class='col-sm-10'>
      <input type='password' name='senha' class='form-control' id='inputPassword3' placeholder='Password' required>
    </div>
  </div>


<input type='hidden' name='emailControle' value='$recebeEmail' />
  <div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <button type='submit' name='BTEnvia' class='btn btn-default'>Cadastrar</button>
    </div>
  </div>
</form>
</div>
</div>
";

}else{

  session_start();
  $_SESSION['msg_warning'] = "Usuario ja <strong>ativado!</strong>";
  header("Location: index.php");
}
}
}else{
  session_start();
  $_SESSION['msg_danger'] = "A Ativação do usuario <strong>expirou!</strong>";
  header("Location: index.php");
  exit;//fim
  }

break;

}
?>
