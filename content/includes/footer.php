<div class="corw">
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 text-center">
			<ul class="list-inline center-block">
				<li><a itemprop="url" href="sobre">Sobre</a> </li>
				<li><a itemprop="url" href="<?php echo "index.php?link=2"; ?>#cont">Contato administrativo</a> </li>
				<li><a itemprop="url" href="<?php echo "index.php?link=4&acao=site"; ?>#cont">Guardar contato</a> </li>
			</ul>
			<br>
			<br>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<center> <img src="content/img/you.png" width="70" height="70" alt="youtube logo">
					<br> <a href="https://www.youtube.com/channel/UCuwKYYknLqNoyQtpftsJeQQ" target="_blank"><h4 class="footertext">YouTube</h4></a>
					<p class="footertext">Podem inscrever-se no canal do YouTube e receber notificações de vídeos de empreendimentos novos e dicas de compras.
						<br>
						<script src="https://apis.google.com/js/platform.js"></script>
						<script src="content/includes/js.js"></script>
						
						<div class="g-ytsubscribe" data-channelid="UCuwKYYknLqNoyQtpftsJeQQ" data-layout="full" data-theme="dark" data-count="default" data-onytevent="onYtEvent"></div>
				</center>
			</div>
		
			<div class="col-xs-12 col-sm-6 col-md-4">
				<center> <img src="content/img/mon.png" width="70" height="70" alt="pagseguro logo">
					<br>
					<h4 class="footertext">Fazer uma Doação</h4>
					<p class="footertext">Caso queira colaborar com a equipe, você pode fazer uma doação usando o PagSeguro, click em baixo para abrir a pagina e concluir a colaboração.
						<br>
						<br> <strong>fácil, rapido e seguro!</strong>
						
						
						<br>
						<p class="footertext">
							<form action="https://pagseguro.uol.com.br/checkout/v2/donation.html?iot=button" method="post" target="_blank">
								<input type="hidden" name="currency" value="BRL" />
								<script>escreve_link_correio()</script>
								<input type="image" src="content/img/pag.png" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /> </form>
							<br> 
</center>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4">
				<center> <img src="content/img/caixa.png" width="70" height="70" alt="caixa logo">
					<br> <a href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso" target="_blank"><h4 class="footertext">Caixa </h4></a>
					<p class="footertext">Use o simulador da caixa para saber sobre sua renda e saber se ela se encaixa no plano de compra do empreendimento visado por você!
						<br> <a href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso" target="_blank"><h4 class="footertext">Click Aqui</h4></a>
						<br> </center>
			</div>
			<br>
			<div class="row">
				<p>
					<center>
						<div class="col-xs-12 col-sm-12 col-md-12"> <img src="<?php echo"$admsite"; ?>content/img/<?php echo"$mlogo"; ?>" height="50" width="50" alt="minilogo casacerta.me">
							<br> <a itemprop="url" href="<?php echo "index.php?link=2"; ?>#cont">Contate-nos!</a>
							<p class="footertext "><?php echo "$menutitle"; ?> 2016</p>
							<p class="footertext "><?php echo "$minidescription"; ?></p>
						</div>
					</center>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="divider" id="section5"></div>
			<div class="container">
				<div class="row">
					<h1 class="text-center">Deseja receber nossos E-mails?</h1>
					<p>
						<center>
							<div class="col-xs-12 col-sm-12 col-md-12">
								<p class="footertext ">Cadastre seus dados a baixo para receber nossos E-mails futuramente com promoções e apresentações de novos empreendimentos, isso ajudará o CasaCerta.me a encontra você para te oferecer o que procura! </p>
							</div>
						</center>
					</p>
					<br>
					<br>
					<br>
					<hr>
					<div itemprop="email" class="col-xs-12 col-sm-8 col-md-8">
						<form action="content/plugin/btemail/php/envia2.php" method="post" name="form1" class="form-validacao">
							<div class="row form-group">
								<div class="col-xs-4">
									<input type="text" class="form-control validacao" name="nome" placeholder="Nome" required /> </div>
								<div class="col-xs-4">
									<input type="text" class="form-control validacao" name="snome" placeholder="Sobrenome" required /> </div>
								<div class="col-xs-4">
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
								<div class="col-xs-6">
									<input type="text" class="form-control validacao" name="email" placeholder="Digite seu E-mail" required /> </div>
								<div class="col-xs-6">
									<input type="text" class="form-control validacao" id="telefone3" name="telefone" placeholder="Celular" required /> </div>
							</div>
							<div class="row form-group">
								<div class="col-xs-12">
									<input type="text" class="form-control validacao" name="cidade" placeholder="Digite seu endereço " required /> </div>
							</div>
							<div class="row form-group">
								<div class="col-xs-12">
									<textarea class="form-control  campos validacao" name="mensagem" id="msg" placeholder="Digite uma mensagem" required></textarea>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-xs-12">
									<button class="btn btn-default pull-right" name="BTEnvia">Cadastrar </button>
								</div>
							</div>
							<script>

							</script>
						</form>
					</div>

					<div class="col-xs-12 col-sm-3 col-md-3 pull-right text-center" itemscope itemtype="http://data-vocabulary.org/Organization">
        <strong itemprop="name"><?php echo "$menutitle"; ?></strong><br>
		<strong><?php echo "$minidescription"; ?></strong>
        <div itemprop="tel"><?php echo "$cel1"; ?></div>
        <div itemprop="local"><?php echo "$sede"; ?></div>
        <strong >E-mail</strong><br>
        <a href="<?php echo "index.php?link=2"; ?>#cont">
        <div itemprop="email"><script>escreve_link_correio2()</script></div></a>
   </div>
				</div>
			</div>
		</div>
	</div>
</div>
