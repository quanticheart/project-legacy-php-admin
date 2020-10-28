<?php
session_start();//aqui verifica se o usuario esta logado , se nao estiver logado , redimenciona para o index login
 if(!$_SESSION["logado"]){
 session_destroy();
 header("Location: ../../../index.php");
 exit;//fim
 }

//pega os dados para guardar nas sessoes e usar posteriormente
include_once "../../core/connect/conexao.php";
$NomeUsuario = $_SESSION["nomeUsuario"];
$resultado = mysqli_query($conecta, "SELECT * FROM usuario WHERE userlogin = '$NomeUsuario' AND ativo = 's'") or die (mysqli_error());

while ($listagem = mysqli_fetch_array($resultado)){

$nomeUsuario            = $listagem ["nome"];
$idUsuario              = $listagem ["id_usuario"];
$fotoPessoa             = $listagem ["fotouser"];
$email                  = $listagem ["email"];
$cor1                   = $listagem ["cor1"];
$cor2                   = $listagem ["cor2"];

$_SESSION['nome']       = $nomeUsuario;
$_SESSION['id_usuario'] = $idUsuario;
$_SESSION['fotouser']   = $fotoPessoa;
$_SESSION['email']      = $email;
$_SESSION['cor1']       = $cor1;
$_SESSION['cor2']       = $cor2;

$localfotoPessoa = "../../img/user/$fotoPessoa";

echo "<style>
.cor1{background:$cor1 !important;}
.cor2{background:$cor2 !important;}
a.thumbnail:hover,
a.thumbnail:focus,
a.thumbnail.active {border-color:$cor2 !important;}
.list-group-item {border: 1px solid $cor1 !important;}
a.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {color:$cor2 !important;}
.form-control-new {
  border: 0px !important;
  border-left: 5px solid $cor1 !important;
  border-radius: 0px !important;
  -webkit-box-shadow: inset 0 0px 0px !important;
          box-shadow: inset 0 0px 0px !important;}
.btn-default-new {
  border: 1px solid $cor1 !important;
  border-right: 1px solid $cor1 !important;
  border-left: 2px solid $cor1 !important;
  color: #333;
  background-color: #fff;
  border-color: $cor1 !important;}
  .form-control:focus { border-color: $cor2 !important;}
  .navbar-default .navbar-brand {color: #fff !important;}
  .navbar-default .navbar-nav > li > a {color: #fff !important;}
  
  .table_nome{border-left: 4px solid $cor2 !important;}
  .dynatable-active-page:hover {background: $cor2 !important;  
  color: #fff !important;}
</style>";


//mostra numero de categorias cadastradas
$numcategorias = mysqli_query($conecta,"SELECT id FROM categoria");
if (!$numcategorias) {
    echo 'Erro ao carregar as categorias: ' . mysqli_error();
    exit;
}

//pega os items no usuario e mostra quantos estao cadastrados
$itensUsuario = mysqli_query($conecta,"SELECT id_usuario FROM artigo WHERE id_usuario = '$idUsuario'");
if (!$itensUsuario) {
    echo 'Erro ao carregar os itens do usuario: ' . mysqli_error();
    exit;
}

//pega os items no usuario e mostra quantos estao cadastrados
$itensUsuarioativo = mysqli_query($conecta,"SELECT id_usuario FROM artigo WHERE id_usuario = '$idUsuario' AND ativo = 's'");
if (!$itensUsuario) {
    echo 'Erro ao carregar os itens do usuario: ' . mysqli_error();
    exit;
}

//pega os items no usuario e mostra quantos estao cadastrados
$itensUsuariobloque = mysqli_query($conecta,"SELECT id_usuario FROM artigo WHERE id_usuario = '$idUsuario' AND ativo = 'n'");
if (!$itensUsuario) {
    echo 'Erro ao carregar os itens do usuario: ' . mysqli_error();
    exit;
}

//mostra quantos anuncios existem
$numeroArtigos = mysqli_query($conecta,"SELECT id FROM artigo WHERE ativo = 's' ");
if (!$numeroArtigos) {
    echo 'Erro ao carregar os artigos: ' . mysqli_error();
    exit;
}

//mostra quantos anuncios existem
$numeroArtigosbloque = mysqli_query($conecta,"SELECT id FROM artigo WHERE ativo = 'n' ");
if (!$numeroArtigos) {
    echo 'Erro ao carregar os artigos: ' . mysqli_error();
    exit;
}

//mostra quantos usuarios existem no sistema
$numeroUsuarios = mysqli_query($conecta,"SELECT id_usuario FROM usuario WHERE nivel_usuario <= 3");
if (!$numeroUsuarios) {
    echo 'Erro ao carregar o numero de usuarios: ' . mysqli_error();
    exit;
}

//mostra quantos corretores estao cadastrados
$numeroCorretores = mysqli_query($conecta,"SELECT id FROM corretor ");
if (!$numeroCorretores) {
    echo 'Erro ao carregar os corretores: ' . mysqli_error();
    exit;
}

//mostra o numero de cores cadastradas no sistema
$numeroCores = mysqli_query($conecta,"SELECT id FROM cor ");
if (!$numeroCores) {
    echo 'Erro ao carregar as cores: ' . mysqli_error();
    exit;
}

}
mysqli_close($conecta);
?>
