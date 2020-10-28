


<br>
<div class='jumbotron'>
  <h1>Cores da sua area de trabalho</h1>
  <p>Selecione uma cor para sua área de trabalho. </p>

</div>


<div class="row">


  <?php
  //CONEXÃO COM BANCO
  include '../../core/connect/conexao.php';
  //COMANDO SQL PARA SELECIONAR TODOS OS  REGISTROS

  $mostraDados = mysqli_query($conecta, "SELECT * FROM cor where ativo = 's'") or die (mysqli_error($mostraDados));

if(mysqli_num_rows($mostraDados) < 1) {

echo "nenhuma cor";
}else{
  while($registro=mysqli_fetch_row($mostraDados))
  {
  $id=$registro[0];
  $nome=$registro[1];
  $cor1=$registro[2];
  $cor2=$registro[3];

echo "

<div class='col-xs-6 col-md-3 espaçotop'>
      <form class='thumbnail' method='post' action='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=cor' id='validaAcesso'>
      <div class='cor-1' style='background:$cor1;'></div>
      <div class='cor-2' style='background:$cor2;'></div>
      <div class='text'>$nome</div>
      <input type='hidden' name='Cor-1' value='$cor1'>
      <input type='hidden' name='Cor-2' value='$cor2'>
      <input class='botao-salva-cor' type='submit' name='botao-cor' value='Selecionar'/>
        <div class='clear'></div>
      </form>
  </div>

";
}

}

?>
