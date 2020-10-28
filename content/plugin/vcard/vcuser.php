 <?php
    
include "../../core/connect/conexao.php";
 $cod = $_GET['cod'];   
	$mostraDados = mysqli_query($conecta,  "SELECT * FROM contato WHERE cod = '$cod' ")or die (mysqli_error());

	if(mysqli_num_rows($mostraDados) < 1) {

	echo "
	<td >Nenhum Email informado ou cadastro bloqueado</td>
	";
	
}

else {
	while ($linha=mysqli_fetch_array($mostraDados)) {
    $id           = $linha["id"];
    $nome         = $linha["nome"];
    $snome        = $linha["snome"];
    $tel          = $linha["telefone"];
    $email        = $linha["email"];
    $estado       = $linha["estado"];
	$cidade       = $linha["cidade"];
  	$arquivo      = $email;
	
        include("vcardexp.inc.php");
    
        $test = new vcardexp;
        
        $test->setValue("firstName", "$nome");
        $test->setValue("lastName", "$snome"); 
        $test->setValue("tel_home", "$tel");
        $test->setValue("email_pref", "$email");
		$test->setValue("street_home", "$cidade");
        $test->setValue("postal_home", "");
        $test->setValue("city_home", "");
        $test->setValue("country_home", "$estado");
        
        
        $test->getCard();
    
	 header("Content-type:text/x-vCard; charset=utf-8");
     header("Content-Disposition: attachment; filename=$arquivo.vcf");
	 
	 }
	 }
    ?>