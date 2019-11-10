<?php
  session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'vendor/autoload.php';


  $_SESSION["errores"] = validador($_SESSION["datos"]);

  if(count($_SESSION["errores"])>0){
    header("Location:index.php#formulario");exit;
  }

  $mail = new PHPMailer(true);

  try{
      //Server settings
      $mail->SMTPDebug = 0;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'consultas.lazzaro@gmail.com';                     // SMTP username
      $mail->Password   = 'silviaromero.consultas.lazzaro';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` alsoaccepted
      $mail->Port       = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('consultas.lazzaro@gmail.com', $_SESSION["datos"]["nombre"]);
      $mail->addAddress('consultas.lazzaro@gmail.com');     // Add a recipient

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
  }

  function validador(array $datos): array{
  	$errores = [];

  	foreach($datos as $dato){
  		if(!is_array($dato))trim($dato);
  	}

  	if($datos["nombre"]=="")$errores["emptyName"] = true;
  	if(strlen($datos["nombre"]) < 5 || strlen($datos["nombre"]) > 30)$errores["lenNameError"] = true;
  	if(!filter_var($datos["email"], FILTER_VALIDATE_EMAIL))$errores["emailError"] = true;
  	if(!isset($datos["asunto"]) && empty($name))$errores["emptySubject"] = true;
  	if(strlen($datos["asunto"]) < 10 || strlen($datos["asunto"]) > 40)$errores["lenSubjectError"] = true;

  	return $errores;
  }
