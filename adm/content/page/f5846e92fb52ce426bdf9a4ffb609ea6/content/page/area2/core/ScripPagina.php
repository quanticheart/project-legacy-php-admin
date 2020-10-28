<?php
include "../../core/connect/conexao.php";

$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

	case bloquear:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Bloquear Usuario</h3>
				<p>Bloqueando o usuário impedira que este coloque artigos, editar funções, ou utilize qualquer outra função permanentemente.
				</p>
<br>
				<p>Deseja bloquear <strong>$nome</strong> ?</p>
<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$id&acao=bloquear' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button'  onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
</div>";

  break;


	case ativar:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Ativar usuário</h3>
				<p>
Ativar este usuário o dará novamente acesso ao sistema e suas funções, de acordo com seu nível de acesso. </p>
	<br>
				<p>Deseja Ativar <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$id&acao=ativar' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;


	case excluir:

	$sql = mysqli_query($conecta, "SELECT titulo FROM artigo WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$titulo = $campo ['titulo'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
	<h3>$titulo </h3>
					<p>
Deletar um artigo ira excluir permanentemente do site, caso não aja mais necessidade de ter este artigo no site, e recomendado a exclusão, mas do contrário, e recomendado que somente desative o artigo para futuras alterações e ser ativado novamente.
</p>
	<br>
				<p>Deseja Excluir <strong>$titulo</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area2/core/scriptAcao.php?id=$id&acao=excluir' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;

case corretor:

	$sql = mysqli_query($conecta, "SELECT titulo , id_corre FROM artigo WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$titulo = $campo ['titulo'];
	$corre  = $campo ['id_corre'];
	
	$sql2 = mysqli_query($conecta, "SELECT nome FROM corretor WHERE id ='$corre'")or die (mysqli_error());
	$campoc = mysqli_fetch_array ($sql2);
	$nomecorre = $campoc ['nome'];
	
	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Alterar Corretor Chefe</h3>
				<p>
Alterar o corretor chefe resultara na troca de dados do contato no anuncio.

</p>	<br>
				<p>O artigo <strong>$titulo</strong> ?</p>
				<p>Esta com o corretor</p>
				<p><strong>$nomecorre</strong></p>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=corretor&id=$id' id='validaAcesso' enctype='multipart/form-data'>

	";
	
	$resultado = mysqli_query($conecta, 'SELECT * FROM corretor') or die (mysqli_error());
	          if (@mysqli_num_rows($resultado) == 0){
	          echo '<p>nada</p>';
	          }else{
	          echo "
	          <select class='form-control' name='id_corre' id='cat'>
	          ";
	          while($dados = mysqli_fetch_array($resultado))
	          {
	          echo "<option value='$dados[id]'>$dados[nome]</option>";
	          }
	          echo "</select>
	          ";}
				
	
	echo"
	<br>
				<p>

				<input value='Alterar' class='btn btn-primary' type='submit' role='button'>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
				</form>

			</div>
		</div>

	</div>
	</div>";
	

				
				
			  




	break;

	
	case categoria:

	$sql = mysqli_query($conecta, "SELECT titulo , id_cat FROM artigo WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$titulo     = $campo ['titulo'];
	$categoria  = $campo ['id_cat'];
	
	$sql2 = mysqli_query($conecta, "SELECT nome FROM categoria WHERE id ='$categoria'")or die (mysqli_error());
	$campoc = mysqli_fetch_array ($sql2);
	$nomecat = $campoc ['nome'];
	
	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Alterar Categoria</h3>
				<p>
Alterar a categoria irá resultar na ocultação do artigo na categoria atual.

</p>	<br>
				<p>O artigo <strong>$titulo</strong> ?</p>
				<p>Esta cadastrado na categoria</p>
				<p><strong>$nomecat</strong></p>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=categoria&id=$id' id='validaAcesso' enctype='multipart/form-data'>

	";
	
	$resultado = mysqli_query($conecta, 'SELECT * FROM categoria') or die (mysqli_error());
	          if (@mysqli_num_rows($resultado) == 0){
	          echo '<p>nada</p>';
	          }else{
	          echo "
	          <select class='form-control' name='id_cat' id='cat'>
	          ";
	          while($dados = mysqli_fetch_array($resultado))
	          {
	          echo "<option value='$dados[id]'>$dados[nome]</option>";
	          }
	          echo "</select>
	          ";}
				
	
	echo"
	<br>
				<p>

				<input value='Alterar' class='btn btn-primary' type='submit' role='button'>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
				</form>

			</div>
		</div>

	</div>
	</div>";
	

				
				
			  




	break;
	
	
	
		case foto:

		

		break;


	case alterar:

	$sql = mysqli_query($conecta, "SELECT * FROM artigo WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);

	$id_cat         = $campo ['id_cat'];
	$id_corre       = $campo ['id_corre'];

	$titulo         = $campo ['titulo'];

	$descricao      = $campo ['descricao'];
	$endereco       = $campo ['endereco'];
	$endnum         = $campo ['endnun'];
	$cep            = $campo ['cep'];
	$valor          = $campo ['valor'];
	$ndisponivel    = $campo ['ndisponivel'];
	$regiao         = $campo ['regiao'];



	$destaque       = $campo ['destaque'];
	$destaqueluxo   = $campo ['destaqueluxo'];
	$financia       = $campo ['financia'];

	$video          = $campo ['video'];
	$artigo         = $campo ['artigo'];
	$chaves         = $campo ['chaves'];


	echo "  <div class='row col-sm-12'>



	<form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=alterar&id=$id' id='validaAcesso' enctype='multipart/form-data'>

    <div class='form-group'>
      <div class='col-sm-12'>
        <input type='text' name='titulo' class='form-control' id='inputEmail3' value='$titulo' placeholder='Digite o titulo do artigo' required>
      </div>
    </div>

    <div class='form-group'>
      <div class='col-sm-12'>
        <textarea name='descricao' class='form-control textarea1' id='inputEmail3' value='$descricao' required >$descricao</textarea>
      </div>
    </div>



    <div class='col-sm-5'>
        <input type='text' name='endereco' class='form-control' id='inputEmail3' value='$endereco' placeholder='Nome da rua' required>
    </div>

    <div class='col-sm-2'>
        <input type='text' name='endnum' class='form-control' id='inputEmail3' value='$endnum' placeholder='N°' required>
    </div>

    <div class='col-sm-3'>
        <input type='text' name='regiao' class='form-control' id='inputEmail3' value='$regiao' placeholder='Regiao da residencia' required>
    </div>

    <div class='col-sm-2'>
        <input type='text' name='cep' class='form-control' id='inputEmail3' value='$cep' placeholder='CEP' required>
    </div>

<br><br><br>


      <div class='col-sm-2'>
        <input type='text' name='valor' class='form-control' id='inputEmail3' value='$valor' placeholder='Valor de venda' required>
      </div>

      <div class='col-sm-3'>
        <input type='text' name='ndisponivel' class='form-control' id='inputEmail3' value='$ndisponivel' placeholder='Numero diponiveis' required>
      </div>";



echo"

<br><br><br>


          <div class='col-sm-11'>
            <input type='text' name='video' class='form-control' id='inputEmail3' value='$video' placeholder='Coloque aqui o link do video do youtube caso aja um, nao é obrigatorio'>
          </div>

          <button type='button' class='btn btn-default btn-md col-sm-1'>
            <span class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>
          </button>

          <div class='clear'></div>
          <br>

          <div class='form-group'>
          <div class='col-sm-12'>
            <textarea name='artigo' class='form-control textarea2' id='inputEmail3' value='$artigo' required>$artigo</textarea>
          </div></div>

      <div class='col-sm-12'>
        <input type='text' name='chaves' class='form-control' id='inputEmail3' value='$chaves' placeholder='Digite chaves de pesquisa separando cada chave por uma virgula, maximo 6 chaves' required>
      </div>


    <br><br>
    <div class='col-sm-10'>
      <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>



</form>



  </div>
";

$sql = mysqli_query($conecta, "SELECT * FROM artigo WHERE id ='$id'")or die (mysqli_error());
		$campo = mysqli_fetch_array ($sql);
		$codigo         =  $campo["codigoanuncio"];
		$img1           =  $campo["img1"];
		
		$img2           =  $campo["img2"];
		if($img2 == "n"){
			$src2 = "../../img/menu/image.png";			
		}else{
			$src2 = "../../img/artigo/$codigo/$img2";
		}
				
		$img3           =  $campo["img3"];
		if($img3 == "n"){
			$src3 = "../../img/menu/image.png";			
		}else{
			$src3 = "../../img/artigo/$codigo/$img3";
		}
		
		$img4           =  $campo["img4"];
		if($img4 == "n"){
			$src4 = "../../img/menu/image.png";			
		}else{
			$src4 = "../../img/artigo/$codigo/$img4";
		}
		
		$img5           =  $campo["img5"];
		if($img5 == "n"){
			$src5 = "../../img/menu/image.png";			
		}else{
			$src5 = "../../img/artigo/$codigo/$img5";
		}
		
		$img6           =  $campo["img6"];
        if($img6 == "n"){
			$src6 = "../../img/menu/image.png";			
		}else{
			$src6 = "../../img/artigo/$codigo/$img6";
		}

		echo "
		
		
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto1&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../img/artigo/$codigo/$img1'></label>
  <div class='col-sm-8'>
  <input type='file' name='img1' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  </div>
  </div>
  </form>
		
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto2&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$src2'></label>
  <div class='col-sm-8'>
  <input type='file' name='img2' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  <a href='content/page/area2/core/scriptAcao.php?acao=deletafoto2&id=$id' name='BTEnvia' class='btn btn-default'>Deletar</a>
  </div>
  </div>
  </form>
  
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto3&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$src3'></label>
  <div class='col-sm-8'>
  <input type='file' name='img3' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  <a href='content/page/area2/core/scriptAcao.php?acao=deletafoto3&id=$id' name='BTEnvia' class='btn btn-default'>Deletar</a>
  </div>
  </div>
  </form>
  
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto4&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$src4'></label>
  <div class='col-sm-8'>
  <input type='file' name='img4' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  <a href='content/page/area2/core/scriptAcao.php?acao=deletafoto4&id=$id' name='BTEnvia' class='btn btn-default'>Deletar</a>
  </div>
  </div>
  </form>
  
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto5&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$src5'></label>
  <div class='col-sm-8'>
  <input type='file' name='img5' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  <a href='content/page/area2/core/scriptAcao.php?acao=deletafoto5&id=$id' name='BTEnvia' class='btn btn-default'>Deletar</a>
  </div>
  </div>
  </form>
  
  <form class='form-horizontal' method='post' action='content/page/area2/core/scriptAcao.php?acao=foto6&id=$id' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$src6'></label>
  <div class='col-sm-8'>
  <input type='file' name='img6' id='exampleInputFile' required>
  <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
  <a href='content/page/area2/core/scriptAcao.php?acao=deletafoto6&id=$id' name='BTEnvia' class='btn btn-default'>Deletar</a>
  </div>
  </div>
  </form>

";
			
			


	break;




}


?>
