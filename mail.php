<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

function enviarCodigoEmail($destinatario, $codigo) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; //Preencher
        $mail->SMTPAuth = true;
      		
		$mail->Username = 'seu e-mail de envio'; //Preencher
        $mail->Password = 'senha app 16 caracteres'; //Preencher
		
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
		
		// Define o idioma e o charset
        $mail->setLanguage('pt_br');
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('seu e-mail de envio', 'Sistema de Login'); //Preencher
        $mail->addAddress($destinatario);

        $mail->isHTML(true);
        $mail->Subject = 'Código de Verificação';
        $mail->Body = "Seu código de verificação é: <b>$codigo</b>";

        $mail->send();
        echo 'Código enviado com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar código: {$mail->ErrorInfo}";
    }
}
?>
