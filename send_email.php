<?php
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';
  $mail = new PHPMailer(true);

  try {
      //Server settings
      $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'lazacrafter@gmail.com';                     // SMTP username
      $mail->Password   = 'silviaromero17';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` alsoaccepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('lazacrafter@gmail.com', $_SESSION["datos"]["nombre"]);
      $mail->addAddress('lazarogabriel2000@gmail.com');     // Add a recipient

      // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         ESTAS LINEAS SON PARA ENVIAR ARCHIVOS
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    IMPORTANTE !!!!!!!!!!!!!!!

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $_SESSION["datos"]["asunto"];
      $mail->Body    = "Nombre: " . $_SESSION["datos"]["nombre"] . "<br>Email: " . $_SESSION["datos"]["email"] . "<br><br>". $_SESSION["datos"]["mensaje"];
      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      $_SESSION["ok"] = true;
      header("Location:index.php#formulario");exit;
   }catch (Exception $e) {
     $_SESSION["fatal_send_error"] = true;
     header("Location:index.php#formulario");exit;
  }
