

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
$mostraDados = mysqli_query($conecta, "SELECT * FROM cor ORDER BY id DESC") or die (mysqli_error($mostraDados));

echo "<table id='my-table' class='table'>
<thead>
  <tr>
    <th></th>
    <th>Nome</th>
    <th width='100px !important'>principal</th>
    <th width='100px !important'>Secundaria</th>
    <th>ativo</th>
    
  </tr>
</thead>";


if(mysqli_num_rows($mostraDados) < 1) {
	echo "<tbody>
      <tr>
	    <td class='op' >
		 </td>
		<td><div class='table_nome'><strong>Nenhum registro</strong></div></td>
        <td></td>
        <td ></td>
        <td></td>
		
		</tr>
	  </tbody>";
}
else {
	while ($linha=mysqli_fetch_array($mostraDados)) {
		$id = $linha["id"];
	    $nome = $linha["nome"];
		$cor1 = $linha["cor1"];
		$cor2 = $linha["cor2"];
	    $ativo = $linha["ativo"];


        if($ativo=="s") {
	    $ativo = "Sim";
		$class = "background:#2ecc71; color:#ffffff; font-weight: bold;";
		$menu = "
		<div class='col-xs-4 col-md-2'>
        <a href='content/page/area1/cor/corAcao.php?acao=bloquear&id=$id' class='thumbnail'>
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
        <a href='content/page/area1/cor/corAcao.php?acao=ativar&id=$id' class='thumbnail'>
        <img  src='../../plugin/tab/img/menu-02.png' alt='...'>
        <h5 class='text-center'>Ativar</h5>
        </a>
        </div>";
		}


		/* echo "<tbody>
      <tr>
        <td>#</td>
        <td><strong>$nome</strong></td>
        
        <td ><div class='text-center' style='$class'>$ativo</div></td>
        <td>
        <a class='btn btn-success btn-xs' href='home.php?link=10&id=$id&acao=alterar'>Alterar</a>
		<a class='btn btn-danger btn-xs' href='home.php?link=10&id=$id&acao=excluir'>Excluir</a>
        <a class='btn btn-$botao btn-xs' $link$id'>$acao</a>
        </td>
      </tr>
    </tbody>";*/
	
	echo "<tbody>
      <tr>
	    <td class='op' >
		 <div class='box'>
          <div class='top'>
          <span class='label label-default nohover'>Opções</span>
          </div>
		  
          <div class='bottom'>";
           
		  include ('menu_tab_cor.php');
		  
        echo "  </div>
        </div>
		</td>
		<td><div class='table_nome'><strong>$nome</strong></div></td>
        <td ><div style='background:$cor1 !important; color:#ffffff; margin-top:2px; font-weight: bold; padding-left:8px;'  >$cor1</div></td>
		<td ><div style='background:$cor2 !important; color:#ffffff; margin-top:2px; font-weight: bold; padding-left:8px;'  >$cor2</div></td>
		<td ><div class='badge' style='$class'>$ativo</div></td>
		</tr>
	  </tbody>
      ";
	  
	}
}

echo "</table>";


?>
