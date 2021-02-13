<?php
    require("phpmailer/class.phpmailer.php");
    require("phpmailer/class.smtp.php");

    class Correo{
      public function __construct(){
            date_default_timezone_set('Pacific/Honolulu');
            header('content-type: application/json; charset=utf-8');

            $this->mail = new PHPMailer();
            $this->mail->IsSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPKeepAlive = true; 
            $this->mail->SMTPSecure = "tls";
            $this->mail->SMTPDebug  = 0;
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->Port = 587;

            $this->mail->Username = "workin@coruniamericana.edu.co";
            $this->mail->Password = "workin2021.";
            $this->mail->SetFrom('workin@coruniamericana.edu.co', utf8_decode('Corporación Universitaria Americana'));

            $this->mail->Subject = utf8_decode("Codigo | Corporación Universitaria Americana");
            $this->mail->AltBody = "";
      }

      function enviarcorreo($codigo,$email){
            $html = '
                      <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                      <br>
                      <tr>
                      <td align="center" style="color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                          <img src="'.RUTA_APP.'/../public/img/header-email.jpg" alt="Corporación Universitaria Americana" width="100%" />
                      </td>
                      </tr>
                      <tr>
                      <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                              <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                              <b align="center"></b>                        
                              </td>
                          </tr>
                          <tr>
                              <td>
                              <p style="font-size: 14pt; text-align: center">Su código de verificación es el siguiente:</p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                              <h4 style="font-size: 14pt;text-align: center">'.$codigo.'</h4>
                              </td>
                          </tr>
                          <tr>
                              <td align="center" style="color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                              <img src="" style="max-width: 500px"></img>
                              </td>
                          </tr>           
                          </table>
                      </td>
                      </tr>
                      <tr>
                      <td bgcolor="#242422" style="padding: 30px 30px 30px 30px;">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                              <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                              &reg; Corporación Universitaria Americana '.date('Y').'<br/>
                              <!-- <a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly -->
                              </td>
                              <td align="right" width="25%">
                              <table border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                      <a href="https://www.instagram.com/coruniamericana/" style="color: #ffffff;">
                                      <img src="'.RUTA_APP.'/../public/img/instagram.png" alt="Instagram" width="38" height="38" style="display: block;" border="0" />
                                      </a>
                                  </td>
                                  <td style="font-size: 0; line-height: 0;" width="20">&nbsp; </td>
                                  <td style="font-size: 0; line-height: 0;" width="20">&nbsp; </td>
                                  <td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;">
                                      <a href="https://www.facebook.com/Coruniamericana/" style="color: #ffffff;">
                                      <img src="'.RUTA_APP.'/../public/img/facebook.png" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                      </a>
                                  </td>
                                  </tr>
                              </table>
                              </td>
                          </tr>
                          </table>
                      </td>
                      </tr>
                  </table>';
      
                  $this->mail->Subject = utf8_decode("Código de verificación - Votaciones.");
                  $this->mail->MsgHTML($html);
                  $this->mail->AddAddress($email, "");
                  $this->mail->IsHTML(true);
                  $this->mail->smtpConnect(
                    array(
                      "ssl" => array(
                      "verify_peer" => false,
                      "verify_peer_name" => false,
                      "allow_self_signed" => true
                      )
                  ));

                  if ($this->mail->Send()) {
                   return true;
                  }else{
                    return $this->mail->ErrorInfo;
                  }             
      }
    }


?>