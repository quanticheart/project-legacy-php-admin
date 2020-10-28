

<?php

include "../../core/connect/conexao.php";
$mostraDados = mysqli_query($conecta,  "SELECT id, nome, ativo, mestre FROM corretor  ORDER BY id DESC")or die (mysqli_error());

echo "<table class='table'>
<thead>
  <tr>
    <th>Codigo</th>
    <th>Corretor</th>
    <th>Ativo</th>
    <th>Chefe</th>
    <th>Opções</th>
  </tr>
</thead>";


if(mysqli_num_rows($mostraDados) < 1) {
	echo "<tbody><tr>";
	echo "<td ></td>
	<td >Nenhum corretor cadastrado</td>
	<td ></td>
	<td ></td>";
	echo "</tr></tbody>";
}
else {
	while ($linha=mysqli_fetch_array($mostraDados)) {
    $id = $linha["id"];
		$nome = $linha["nome"];
		$ativo = $linha["ativo"];
		$mestre = $linha["mestre"];

		if($ativo=="s") {
			$ativo = "Sim";
			$class = "background:#2ecc71; color:#ffffff; margin-top:2px; 	font-weight: bold;";
		}
		else {
			$ativo = "Não";
			$class = "background:#e74c3c; color:#ffffff; margin-top:2px; 	font-weight: bold;";

		}

    if($mestre=="s") {
      $mestre = "Sim";
      $classmestre = "background:#2ecc71; color:#ffffff; margin-top:2px; 	font-weight: bold;";

    }
    else {
      $mestre = "Não";
      $classmestre = "background:#e74c3c; color:#ffffff; margin-top:2px; 	font-weight: bold;";

    }

		echo "<tbody>
      <tr>
        <td>$id</td>
        <td><strong>$nome</strong></td>

        <td ><div class='text-center' style='$class'>$ativo</div></td>
        <td ><div class='text-center' style='$classmestre'>$mestre</div></td>

        <td>
        <a class='btn btn-primary btn-xs' href='home.php?link=24&id=$id&acao=email'>Enviar E-mail</a>

        </td>
      </tr>
    </tbody>";
	}
}

echo "</table>";


?>
