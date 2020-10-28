<?php


include "conexao.php";?>

<div class="row col-sm-6">

<form class="form-horizontal" method="post" action="admin/enviar_noticia1.php" id="validaAcesso" enctype="multipart/form-data">


<div class="form-group">
  <div class="col-sm-12">

   <?php
      session_start();
      if($_SESSION['msg'] != false )

    echo "<div class='alert alert-warning' role='alert'>$_SESSION[msg]</div>";

      unset($_SESSION['msg']);?>

  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
  <div class="col-sm-10">
    <input type="text" name="titulo" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>

<div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Descrição</label>
  <div class="col-sm-10">
    <textarea type="text" name="descricao" class="form-control" id="inputPassword3" placeholder="Nome secundario"></textarea>
  </div>
</div>

<?php
$resultado = mysqli_query($conecta, "SELECT * FROM categoria") or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Categoria</label>
<div class='col-sm-10'>
<select name='id_cat' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
}
echo "</select>    </div>
</div>";}
?>

<?php
$resultado = mysqli_query($conecta, "SELECT * FROM corretor") or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Corretor</label>
<div class='col-sm-10'>
<select name='id_corre' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
}
echo "</select>    </div>
</div>";}
?>

<div class="form-group">
<div class="row col-sm-12">


  <label for="inputPassword3" class="col-sm-2 control-label">Fotos</label>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img1" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img2" type="file" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah2" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img3" type="file" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah3" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>


<div class="form-group">
<div class="row col-sm-12">


  <label for="inputPassword3" class="col-sm-2 control-label"></label>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img4" type="file" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah4" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img5" type="file" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah5" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img6" type="file" onchange="document.getElementById('blah6').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah6" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Endereço</label>
  <div class="col-sm-10">
    <input type="text" name="endereco" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">numero</label>
  <div class="col-sm-10">
    <input type="text" name="endnum" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">regiao</label>
  <div class="col-sm-10">
    <input type="text" name="regiao" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">valor</label>
  <div class="col-sm-10">
    <input type="text" name="valor" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">numero disponivel</label>
  <div class="col-sm-10">
    <input type="text" name="ndisponivel" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>



<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="BTEnvia" class="btn btn-default">Cadastrar</button>
  </div>
</div>
</form>



</div>
