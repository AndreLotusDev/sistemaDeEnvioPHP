<?php 
    // Debugger 
    // print_r($_POST); 

    // Importando a biblioteca PHP Mailer
    require "./lib/Exception.php";
    require "./lib/OAuth.php";
    require "./lib/PHPMailer.php";
    require "./lib/POP3.php";
    require "./lib/SMTP.php";

    // 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Message
    {
        private $email = null;
        private $title = null;
        private $subject = null;

        public $status = array('code_status', 'description_status');
        // Metodos set e get publicos
        public function __get($atr)
        {
            return $this->$atr;
        }

        public function __set($atr, $value)
        {
            $this->$atr = $value;
        }

        public function validMessage()
        {
            if(empty($this->email) || empty($this->title) || empty($this->subject))
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    $message = new Message();
    $message->__set('email', $_POST['email']);
    $message->__set('title', $_POST['title']);
    $message->__set('subject', $_POST['subject']);

    // print_r($message);

    // Se a mensagem for uma mensagem válida !
    if(!($message->validMessage()))
    {
        // Verifica quais incongruencias tem o nosso sender
        header("Location: index.php");
        echo "<br> Mensagem não é válida <br/>";
        die();
    }
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = false;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'INSIRA SEU EMAIL';                     // SMTP username
        $mail->Password   = 'INSIRA SUA SENHA';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setLanguage('pt');
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->setFrom('andrsoares954@gmail.com', 'Usuário');
        $mail->addAddress($message->__get('email'), 'Destinário');     // Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $message->__get('title');
        $mail->Body    = $message->__get('subject');
        $mail->AltBody = 'É necessário um clinte com visualizador HTML para visualizar a mensagem';

        $mail->send();

        $message->status['code_status'] = 1;
        $message->status['description_status'] = "Email validado com sucesso";

        // echo 'Mensagem enviada com sucesso';
        } 
        catch (Exception $e) 
        {
            $message->status['code_status'] = 2;
            echo $message->status['description_status'] = "Nao foi possivel enviar o email <br>" . "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
?>

<html>

    <head>
    <meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <div class="py-3 text-center">
            <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails teste!</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php if($message->status['code_status'] == 1) {?>
                    <div class="container">
                        <h1 class="display-4 text-sucess text-center"> Sucesso </h1>
                        <p class="text-center"><?php echo $message->status['description_status'] ?></p>
                        <p class="text-center">
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white ">Voltar</a>
                        </p>
                    </div>
                <?php } ?>

                <?php if($message->status['code_status'] == 2) {?>
                    <div class="container">
                        <h1 class="display-4 text-sucess"> Ops! </h1>
                        <p><?php echo $message->status['description_status'] ?></p>
                        <p class="text-center">
                            <a href="index.php" class="btn btn-success btn-lg mt-5 text-white ">Voltar</a>
                        </p>
                    </div>    
                <?php } ?>
            </div>
        </div>
    </body>
</html>