
function onYtEvent(payload) {
	if(payload.eventType == 'subscribe') {} else if(payload.eventType == 'unsubscribe') {}
	if(window.console) {
		window.console.log('YT event: ', payload);
	}
}

usuario="jonny255d" 
dominio="gmail.com" 
conector="@" 


function dar_correio(){ 
   return usuario+conector+dominio 
} 

function escreve_link_correio(){ 
   document.write('<input type="hidden" name="receiverEmail" value="' + dar_correio() +'" />') 
} 




usuario2="casacerta.contato" 
dominio2="gmail.com" 
conector2="@" 


function dar_correio2(){ 
   return usuario2 + conector2 + dominio2 
} 

function escreve_link_correio2(){ 
   document.write(""+dar_correio2()+"") 
} 		

jQuery(document)
	.ready(function ($) {
		$("#telefone2")
			.mask("(99)9999?9-9999", {
				placeholder: " "
			});
		$("#telefone3")
			.mask("(99)9999?9-9999", {
				placeholder: " "
			});
	});
			