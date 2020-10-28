 <?php
 include "../../core/connect/conexao.php";   

 
if (isset($_POST['BTEnvia'])){	
        include("vcardexp.inc.php");
    
        $test = new vcardexp;
        
        $test->setValue("firstName", "CasaCerta.me");
        $test->setValue("lastName", "");
        $test->setValue("organisation", "CasaCerta");
        $test->setValue("tel_work", "11968884509");
        $test->setValue("tel_home", "");
        $test->setValue("tel_pref", "");
        $test->setValue("url", "$site");
        $test->setValue("email_internet", "");
        $test->setValue("email_pref", "casacerta.contato@gmail.com");
        $test->setValue("street_home", "");
        $test->setValue("postal_home", "");
        $test->setValue("city_home", "");
        $test->setValue("country_home", "");
        $test->copyPicture("");
        
        
        $test->getCard();
    
	 header("Content-type:text/x-vCard; charset=utf-8");
     header("Content-Disposition: attachment; filename=casacerta.vcf");
}	 

  

    ?>