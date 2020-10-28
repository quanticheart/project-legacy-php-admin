<div class="dynatable dv">

<div class='page-header dataTables_wrapper '>
            <h3 class="no-select"><small class='glyphicon glyphicon-globe ' aria-hidden='true'></small > Tabela com registros</h3><div class='clear'></div>
            </div>
		
<?php 		
if($_SESSION['UsuarioNivel'] == "3"){
echo "

<div class='btn-group '>
  <button type='button' class='btn btn-success dropdown-toggle bttable' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    <span class='glyphicon glyphicon-download' aria-hidden='true'></span> Exportar dados 
  </button>
<ul class='dropdown-menu'>
<!--<li><a href='#' onClick ='$('#my-table').tableExport({type:'json',escape:'false',ignoreColumn: [ 0 ] });'>JSON</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'json',escape:'false',ignoreColumn: [ 0 ] });'>JSON (ignoreColumn)</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'json',escape:'true',ignoreColumn: [ 0 ] });'>JSON (with Escape)</a></li>
<li class='divider'></li>    
<li><a href='#' onClick ='$('#my-table').tableExport({type:'xml',escape:'false',ignoreColumn: [ 0 ] });'>XML</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'sql',ignoreColumn: [ 0 ], tableName:'artigo' });'>SQL</a></li>
<li class='divider'></li>    
<li><a href='#' onClick ='$('#my-table').tableExport({type:'csv',escape:'false',ignoreColumn: [ 0 ] });'>CSV</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'txt',escape:'false',ignoreColumn: [ 0 ] , separator: ','});'>TXT</a></li>
<li class='divider'></li>	
<li><a href='#' onClick ='$('#my-table').tableExport({type:'excel',escape:'false', ignoreColumn: [ 0 ] });'>XLS</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'doc',escape:'false', ignoreColumn: [ 0 ] , separator: ',' });'>Word</a></li>
<li><a href='#' onClick ='$('#my-table').tableExport({type:'powerpoint',escape:'false', ignoreColumn: [ 0 ] });'>PowerPoint</a></li>
<li class='divider'></li>   
<li><a href='#' onClick ='$('#my-table').tableExport({type:'png',escape:'false'});'>PNG</a></li>-->
<li><a href='#' target='_blank' onClick ='$('#my-table').tableExport({type:'pdf',pdfFontSize:'7', pdfLeftMargin:-10 , escape:'false',ignoreColumn: [ 0 ]});' >PDF</a></li>
</ul>
</div>

";}


  ?>
<button type="button" onClick='history.go(0)' class="btn btn-warning dropdown-toggle bttable" >
  <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar
  </button>

  <?php 		
if($_SESSION['UsuarioNivel'] == "3"){
echo "
<label class='on-off '><input type='checkbox' name='ligado' /><span><a></a></span></label>
";}


  ?>

<?php

include "../../core/connect/conexao.php";
$mostraDados = mysqli_query($conecta,  "SELECT id, id_usuario, id_cat, codigoanuncio, titulo, data, ativo, destaque, destaqueluxo FROM artigo WHERE id_usuario = '$idUsuario' AND ativo = 'n' ORDER BY id DESC")or die (mysqli_error());

echo "



 <table id='my-table' class='table'>
		
        <thead>
          <tr>
          <th width='20'></th>
    <th>Titulo</th>
	<th>Artigo de</th>
    <th>Categoria</th>
    <th>Enviado</th>
    <th>Destaque</th>
    <th>luxo</th>
    <th>Ativo</th>
   
    </tr>
    </thead>";


if(mysqli_num_rows($mostraDados) < 1) {
	echo "<tbody><tr>";
	echo "<td ></td>
	<td><div class='table_nome'><strong>Nenhum registro</strong></div></td>
	<td ></td>
  	<td ></td>
    <td ></td>
    <td ></td>
    <td ></td>
	<td ></td>
	";
	echo "</tr></tbody>";
}
else {
	while ($linha=mysqli_fetch_array($mostraDados)) {
    $id           = $linha["id"];
	$idusu   = $linha["id_usuario"];
    $idanuncio    = $linha["codigoanuncio"];
    $titulo       = $linha["titulo"];
    $id_cat       = $linha["id_cat"];
    $data         = $linha["data"];
    $destaque     = $linha["destaque"];
    $destaqueluxo = $linha["destaqueluxo"];
    $ativo        = $linha["ativo"];

    $cat = mysqli_query($conecta,  "SELECT nome FROM categoria WHERE id = '$id_cat'")or die (mysqli_error());
    $campo = mysqli_fetch_array ($cat);
    $nomecat = $campo ['nome'];

		$nomeu = mysqli_query($conecta,  "SELECT nome FROM usuario WHERE id_usuario = '$idusu'")or die (mysqli_error());
    $campow = mysqli_fetch_array ($nomeu);
    $nomeusuario = $campow ['nome'];
		
		if($ativo=="s") {
	    $ativo = "Sim";
		$class = "background:#2ecc71; color:#ffffff; font-weight: bold;";
		$menu = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=bloquear&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-01.png' alt='...'>
        <h5 class='text-center'>Bloquear</h5>
        </a>
        </div>";
		
		}
		else {	
		$ativo = "Não";
		$class = "background:#e74c3c; color:#ffffff; font-weight: bold;";
		$menu = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=ativar&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-02.png' alt='...'>
        <h5 class='text-center'>Ativar</h5>
        </a>
        </div>";
		}


	
	 if($destaque=="s") {
	    $destaque = "Sim";
		$classd = "background:#2ecc71; color:#ffffff; font-weight: bold;";
		$menud = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=bloqueardestaque&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-07.png' alt='...'>
        <h5 class='text-center'>Bloquear</h5>
        </a>
        </div>";
		
		}
		else {	
		$destaque = "Não";
		$classd = "background:#e74c3c; color:#ffffff; font-weight: bold;";
		$menud = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=ativardestaque&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-06.png' alt='...'>
        <h5 class='text-center'>Ativar</h5>
        </a>
        </div>";
		}

  
	
        if($destaqueluxo=="s") {
	    $destaqueluxo = "Sim";
		$classl = "background:#2ecc71; color:#ffffff; font-weight: bold;";
		$menul = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=bloquearluxo&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-09.png' alt='...'>
        <h5 class='text-center'>Bloquear</h5>
        </a>
        </div>";
		
		}
		else {	
		$destaqueluxo = "Não";
		$classl = "background:#e74c3c; color:#ffffff; font-weight: bold;";
		$menul = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area2/core/scriptAcao.php?acao=ativarluxo&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-08.png' alt='...'>
        <h5 class='text-center'>Ativar</h5>
        </a>
        </div>";
		}


		echo "<tbody>
      <tr>
	    <td class='op' >
		 <div class='box'>
          <div class='top'>
          <span class='label label-default nohover'>Opções</span>
          </div>
		  
          <div class='bottom'>";
           
		  include ('menutab/menu_tab_user.php');
		  
        echo "  </div>
        </div>
		</td>
		  
		<td><div class='table_nome'><strong>$titulo</strong></div></td>  
        <td>$nomeusuario</td>
        <td>$nomecat</td>
        <td>$data</td>
        <td><div class='badge' style='$classd'>$destaque</div></td>
        <td><div class='badge' style='$classl'>$destaqueluxo</div></td>
        <td><div class='badge' style='$class' >$ativo</div></td>

       
      </tr>
    </tbody>";
	}
}

echo "</table>";



?>

