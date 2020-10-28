  
<!-- Modal Definitions (tabbed over for <pre>) -->
<div id="email" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 >E-mail rapido - <?php echo "$titulo"; ?></h4>
  </div>
  
  <div class="modal-body">
  <form action="content/plugin/btemail/php/enviarapido.php" method="post" name="form1" class="form-validacao">
 
       <div class="msg_input">
       <input type="text" class="col-xs-6 validacao"                 name="nome"      placeholder="Nome" required />
       <input type="text" class="col-xs-6 validacao"                 name="snome"     placeholder="Sobrenome" required />
       <input type="text" class="col-xs-6 validacao" id="telefone"                name="telefone"  placeholder="Celular" required />
       <input type="text" class="col-xs-6 validacao"    name="email"     placeholder="Digite seu E-mail" required />
       <select class="col-xs-3 validacao estado" name="estado" id="estado" required>
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
		<input type="text" class="col-xs-9 validacao"  name="cidade" placeholder="Digite sua cidade" required />
        <textarea class="col-xs-12  campos validacao" name="mensagem" id="msg" placeholder="Digite uma mensagem" required></textarea>
        <input class="col-xs-6 BTEnvia btn btn-success" type="submit" name="BTEnvia" value="Enviar"/> 
        <input class="col-xs-6 BTApaga btn btn-danger" type="reset" name="BTApaga" value="Apagar">
        </div>
                    
                </form>
  </div>
  
  <div class="modal-footer">
    
  </div>
</div>
