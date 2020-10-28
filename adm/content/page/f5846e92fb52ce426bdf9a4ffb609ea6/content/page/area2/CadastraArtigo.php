  <div class="row col-sm-12">



	<form class="form-horizontal" method="post" action="content/page/area2/core/scriptAcao.php?acao=cadastra" id="validaAcesso" enctype="multipart/form-data">

    <div class='form-group'>
      <div class='col-sm-12'>
        <input type='text' name='titulo' class='form-control' id='inputEmail3' placeholder='Digite o titulo do artigo' required>
      </div>
    </div>

    <div class='form-group'>
      <div class='col-sm-12'>
        <textarea name='descricao' class='form-control textarea1' id='inputEmail3' required>Digite a descrição do artigo aqui, com no maximo 255 caracteres</textarea>
      </div>
    </div>



    <div class='col-sm-5'>
        <input type='text' name='endereco' class='form-control' id='inputEmail3' placeholder='Nome da rua' required>
    </div>

    <div class='col-sm-2'>
        <input type='text' name='endnum' class='form-control' id='inputEmail3' placeholder='N°' required>
    </div>

    <div class='col-sm-3'>
        <input type='text' name='regiao' class='form-control' id='inputEmail3' placeholder='Regiao da residencia' required>
    </div>

    <div class='col-sm-2'>
        <input type='text' name='cep' class='form-control' id='inputEmail3' placeholder='CEP' required>
    </div>

<br><br><br>


      <div class='col-sm-2'>
        <input type='text' name='valor' class='form-control' id='inputEmail3' placeholder='Valor de venda' required>
      </div>

      <div class='col-sm-3'>
        <input type='text' name='ndisponivel' class='form-control' id='inputEmail3' placeholder='Numero diponiveis' required>
      </div>


          <?php
          $resultado = mysqli_query($conecta, "SELECT * FROM categoria") or die (mysqli_error());
          if (@mysqli_num_rows($resultado) == 0){
          echo "<p>nada</p>";
          }else{
          echo "<div class='col-sm-3'>
          <select class='form-control' name='id_cat' id='cat' required>
          <option disabled selected value >Selecione a Categoria</option>";
          while($dados = mysqli_fetch_array($resultado))
          {
          echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
          }
          echo "</select>
          </div>";}
          ?>


          <?php
          $resultado = mysqli_query($conecta, "SELECT * FROM corretor") or die (mysqli_error());
          if (@mysqli_num_rows($resultado) == 0){
          echo "<p>nada</p>";
          }else{
          echo "
          <div class='col-sm-4'>
          <select  class='form-control' name='id_corre' id='cat' required>
            <option disabled selected value >Selecione o corretor</option>";
          while($dados = mysqli_fetch_array($resultado))
          {
          echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
          }
          echo "</select>
          </div>";}
          ?>

<div class="clear"></div>

<br>



    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img1" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required></img>
    <img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img2" type="file" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])"></img>
    <img id="blah2" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img3" type="file" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])"></img>
    <img id="blah3" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img4" type="file" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])"></img>
    <img id="blah4" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img5" type="file" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0])"></img>
    <img id="blah5" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="caixa-foto-upload">
    <span class="caixa-foto">
    <input class='foto' name="img6" type="file" onchange="document.getElementById('blah6').src = window.URL.createObjectURL(this.files[0])"></img>
    <img id="blah6" class="caixa-foto-botao" alt="" width="100" height="100" src='../../img/menu/image.png'>
    </span>

    </div>

    <div class="clear"></div>

    <div class='col-sm-4'>
    <select  class='form-control' name='destaque' required>
    <option disabled selected value >Em destaque?</option>
    <option value='n'>Não</option>
    <option value='s'>Sim</option>
    </select>
    </div>

    <div class='col-sm-4'>
    <select  class='form-control' name='destaqueluxo' required>
    <option disabled selected value >destaque de luxo?</option>
    <option value='n'>Não</option>
    <option value='s'>Sim</option>
    </select>
    </div>

    <div class='col-sm-4'>
    <select  class='form-control' name='financia' required>
    <option disabled selected value >Financia?</option>
    <option value='n'>Não</option>
    <option value='s'>Sim</option>
    </select>
    </div>

	<div class="clear"></div>
    <br>
	
	<div class='col-sm-6'>
    <select  class='form-control' name='fase' required>
    <option disabled selected value >Fase do projeto</option>
    <option value='Na Planta'>Na Planta</option>
	<option value='Em projeto'>Em projeto</option>
    <option value='Finalizando'>Finalizando</option>
	<option value='Pronto'>Pronto</option>
    </select>
    </div>

    <div class='col-sm-6'>
    <select  class='form-control' name='decorado' required>
    <option disabled selected value >Decorado?</option>
    <option value='n'>Não</option>
    <option value='s'>Sim</option>
    </select>
    </div>

    

    <div class="clear"></div>
    <br>

	      <div class='col-sm-12'>
            <input type='text' name='maps' class='form-control' id='inputEmail3' placeholder='Iframe da localização do google maps'>
          </div>
		  
		  <div class="clear"></div>
          <br>
	
          <div class='col-sm-11'>
            <input type='text' name='video' class='form-control' id='inputEmail3' placeholder='Coloque aqui o link do video do youtube caso aja um, nao é obrigatorio'>
          </div>

          <button type="button" class="btn btn-default btn-md col-sm-1">
            <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
          </button>

          <div class="clear"></div>
          <br>

          <div class='form-group'>
          <div class='col-sm-12'>
            <textarea name='artigo' class='form-control textarea2' id='inputEmail3' required>Digite aqui o artigo a ser publicado, caso precise, edite o texto usando o editor de texto ou usando codigo html</textarea>
          </div></div>

      <div class='col-sm-12'>
        <input type='text' name='chaves' class='form-control' id='inputEmail3' placeholder='Digite chaves de pesquisa separando cada chave por uma virgula, maximo 6 chaves' required>
      </div>


    <br><br>
    <div class="col-sm-10">
      <button type="submit" name="BTEnvia" class="btn btn-default">Cadastrar</button>
    </div>



</form>



  </div>
