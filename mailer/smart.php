<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$comment = $_POST['comments'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'kodrikgleb2@mail.ru';                 // Наш логин
$mail->Password = 'YfCvFhR34';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('kodrikgleb2@mail.ru', 'Doctor Kramer');   // От кого письмо 
$mail->addAddress('dorstrsale@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новый пользователь К-Сервис';
$mail->Body    = '
	Данные пользователя: <br> 
	<br>
	Имя: ' . $name . '  <br>
	<br>
	Телефон: ' . $number . ' <br>
	<br>
	Email: ' . $email . ' <br>
	<br>
	Комментарий пользователя: ' . $comment . ' ';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>