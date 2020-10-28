<nav role="complementary" class="menucolor col-md-2 ">
<div class="row">
<div class="list-group">

<a href="home.php?link=35" class="list-group-item active cor2">Posts do usuario<span class="badge "><?php echo mysqli_num_rows($itensUsuario); ?></span></a>
<a href="#" class="list-group-item">Lista de posts<span class="badge"><?php echo mysqli_num_rows($numeroArtigos); ?></span></a>
<a href="home.php?link=32" class="list-group-item">Adcionar Post</a>
<a href="home.php?link=11" class="list-group-item active cor2">Lista de categorias</a>
<form action="content/page/area3/core/scriptAcao.php?acao=cadastra" method="post" name="form1">
<div class="input-group ">

  <input type="text" name="nome" class="form-control form-control-new" placeholder="nome" value="Criar categoria" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Criar categoria';}" required="">
  <span class="input-group-btn">
    <button class="btn btn-default btn-default-new borderradius" type="submit">Go!</button>
  </span>

</div></form><!-- /input-group -->

<?php
include "../../core/connect/conexao.php";
$resultado2 = mysqli_query($conecta, "SELECT * FROM categoria WHERE ativo = 's' ") or die (mysqli_error());
if (@mysqli_num_rows($resultado2) == 0){
echo "<a href='home.php?link=12' class='list-group-item'>Nenhuma categoria</a>";}

while ($reg = mysqli_fetch_array($resultado2)){
$id = $reg['id'];
$nome = $reg['nome'];
echo "
<a href='home.php?link=14&id=$id&nome=$nome' class='list-group-item'>$nome<span class='badge'>";
$nunitemscategoria = mysqli_query($conecta,"SELECT id FROM artigo WHERE id_cat = '$id' AND ativo = 's'");
if (!$nunitemscategoria) {
echo 'Could not run query: ' . mysqli_error();
exit;
}
echo mysqli_num_rows($nunitemscategoria);
echo "</span></a>";
}
 ?>


</div>
</div>
</nav>
