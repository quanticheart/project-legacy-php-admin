<?php

$BotaoContatoParaEmail = '
  
  <table class="button google expand" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100% !important; margin: 0 0 16px; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 16px; margin: 0; padding: 0;" align="left" valign="top">
      <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #fefefe; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 16px; width: auto !important; background: #2199e8; margin: 0; padding: 0; border: 2px solid #2199e8;" align="left" bgcolor="#2199e8" valign="top">
            <center data-parsed="" style="width: 100%; min-width: 0;"><a href="#" align="center" class="text-center" style="color: #fefefe; font-family: Helvetica, Arial, sans-serif; font-weight: bold; text-align: center; line-height: 1.3; text-decoration: none; font-size: 16px; display: inline-block; border-radius: 3px; width: calc(100% - 20px); margin: 0; padding: 8px 16px; border: 0px solid #2199e8;">Youtube</a></center>
          </td>
          <td class="expander" style="word-wrap: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: auto !important; color: #fefefe; font-family: Helvetica, Arial, sans-serif; font-weight: normal; line-height: 19px; font-size: 16px; background: #2199e8; margin: 0; padding: 0; border: 2px solid #2199e8;" align="left" bgcolor="#2199e8" valign="top"></td>
        </tr></table></td>
  </tr></table>

    <p style="color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 16px; margin: 0 0 10px; padding: 0;" align="left">Phone: 408-341-0600</p>
                                                            <p style="color: #0a0a0a; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 16px; margin: 0 0 10px; padding: 0;" align="left">Email: <a href="mailto:foundation@zurb.com" style="color: #2199e8; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;">foundation@zurb.com</a></p>
';


$conecta = new mysqli('localhost', 'root', '', 'adm') or die("Error " . mysqli_error($conecta));

$mostraDadossite = mysqli_query($conecta,  "SELECT * FROM site ")or die (mysqli_error());
$camposite = mysqli_fetch_array ($mostraDadossite);
$site           = $camposite["site"];
$admsite        = $camposite["admsite"];
$title          = $camposite["title"];
$sede           = $camposite["sede"];
$menutitle      = $camposite["menutitle"];
$description    = $camposite["description"];
$minidescription= $camposite["minidescription"];
$keywords       = $camposite["keywords"];
$cel1           = $camposite["cel1"];
$cel2           = $camposite["cel2"];
$logo           = $camposite["logo"];
$mlogo          = $camposite["mlogo"];
$flogo          = $camposite["flogo"];
$face           = $camposite["face"];
$google         = $camposite["google"];
$youtube        = $camposite["youtube"];
$email1         = $camposite["email1"];
$email2         = $camposite["email2"];
$emaildesc      = $camposite["emaildesc"];

date_default_timezone_set("America/Sao_Paulo");
ini_set('smtp_port' , '587');

?>
