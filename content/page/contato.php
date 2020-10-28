<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<h1 class="hdg light">Contato administrativo</h1>
		<p class="padding-50 line-lg">
			Tem ideias para o CasaCerta.me? Trabalha com algo relacionado e quer divulgar no CasaCerta.me? Escreva um E-mail para a nossa equipe preenchendo os campos de texto
			a baixo, <strong>fácil e rápido!</strong>
		</p>

		<br>

	</div>

	<div class="col-sm-8 col-sm-offset-2">

		<form action="content/plugin/btemail/php/enviaadm.php" method="post" name="form1" class="form-validacao">

			<div class="row form-group">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<input type="text" class="form-control validacao" name="nome" placeholder="Nome" required />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<input type="text" class="form-control validacao" name="snome" placeholder="Sobrenome" required />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<select class="form-control validacao estado" name="estado" id="estado" required>
						<option selected="" value="">Estado</option>
						<option value="São Paulo">SP </option>
						<option value="Acre">AC </option>
						<option value="Alagoas">AL </option>
						<option value="Amazonas">AM </option>
						<option value="Amapá">AP </option>
						<option value="Bahia">BA </option>
						<option value="Ceará">CE </option>
						<option value="Distrito Federal">DF </option>
						<option value="Espírito Santo">ES </option>
						<option value="Goiás">GO </option>
						<option value="Maranhão">MA </option>
						<option value="Minas Gerais">MG </option>
						<option value="Mato Grosso do Sul">MS </option>
						<option value="Mato Grosso">MT </option>
						<option value="Pará">PA </option>
						<option value="Paraíba">PB </option>
						<option value="Pernambuco">PE </option>
						<option value="Piauí">PI </option>
						<option value="Paraná">PR </option>
						<option value="Rio de Janeiro">RJ </option>
						<option value="Rio Grande do Norte">RN </option>
						<option value="Rondônia">RO </option>
						<option value="Roraima">RR </option>
						<option value="Rio Grande do Sul">RS </option>
						<option value="Santa Catarina">SC </option>
						<option value="Sergipe">SE </option>
						<option value="Tocantins">TO</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<input type="text" class="form-control validacao" name="email" placeholder="Digite seu E-mail" required />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<input type="text" class="form-control validacao" id="telefone3" name="telefone" placeholder="Celular" required />
				</div>
			</div>

			<div class="row form-group">
				<div class="col-xs-12">
					<textarea class="form-control  campos validacao" name="mensagem" id="msg" placeholder="Digite uma mensagem" required></textarea>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-xs-12">
					<button class="btn btn-default pull-right" name="BTEnvia">Enviar Mensagem</button>
				</div>
			</div>

			<script>
			jQuery(document).ready(function($)
			{
				$("#telefone2").mask("(99)9999?9-9999",
				{
					placeholder: " "
				}); // Máscara para TELEFONE
				$("#telefone3").mask("(99)9999?9-9999",
				{
					placeholder: " "
				}); // Máscara para TELEFONE
			});

			</script>

		</form>

	</div>
</div>
