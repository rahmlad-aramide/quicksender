<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;


// Load Composer's autoloader
require 'vendor/autoload.php';

// require 'vendor/PHPMailer/src/Exception.php';
// require 'vendor/PHPMailer/src/PHPMailer.php';
// require 'vendor/PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $cc = $_POST['cc'];
    $bcc = $_POST['bcc'];
    $subject = $_POST['subject'];
    $msg = $_POST['message'];

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        // $mail->isSMTP(); 
        // $mail->Host       = 'smtp.mailtrap.io'; 
        // $mail->SMTPAuth   = true;
        // $mail->Username   = '192bf88d9c5bef';
        // $mail->Password   = 'a3636acac91698'; 
        // $mail->SMTPSecure = 'tls'; 
        // $mail->Port       = 2525;

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '192bf88d9c5bef'; //paste one generated by Mailtrap
        $mail->Password = 'a3636acac91698';//paste one generated by Mailtrap
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;
    
        //Recipients
        $mail->setFrom($from);
        $mail->addAddress($to);
        $mail->addReplyTo($from);
        if(!empty($cc)){
            $mail->addCC($cc);
        }
        if(!empty($bcc)){
            $mail->addBCC($bcc);
        }
    
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
    
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $msg;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quicksender - Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
         <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>   
    </head>
    <body>
        <div id="login-page" class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-5 p-5 shadow-sm border rounded-5 border-primary bg-white">
                <h2 class="text-center mb-4 text-primary">Quicksender Login</h2>
                <form id="login-form">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control border border-primary" id="username" aria-describedby="usernameHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" id="password" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="main-page" class="row justify-content-center d-none my-5">
         <div class="col-9">
               <div class="card">
                  <div class="card-body">
                     <form method="POST" action="">
                           <div class="row">
                              <div class="col">
                                 <input name="from" class="form-control mb-4" placeholder="From:" />
                              </div>
                              <div class="col">
                                 <input name="to" class="form-control mb-4" placeholder="To:" />
                              </div>
                           </div>
                           <input name="cc" class="form-control mb-4" placeholder="CC:" />
                           <input name="bcc" class="form-control mb-4" placeholder="BCC:" />
                           <input name="subject" class="form-control mb-4" placeholder="Subject:" />
                           <textarea name="message" class="form-control" placeholder="Message:"></textarea>
                           <button type="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
                     </form>
                  </div>
               </div>
         </div>
      </div>
      <script>
         CKEDITOR.replace( 'message' );
      </script>
      <script>
         const form = document.getElementById('login-form');

         form.addEventListener('submit', (event) => {
         // Prevent the default form submission behavior.
         event.preventDefault();

         // Get the values of the username and password inputs.
         const username = document.getElementById('username').value;
         const password = document.getElementById('password').value;
         const mainPage = document.getElementById('main-page');
         const loginPage = document.getElementById('login-page');

         if(username === "dosh" && password=== "dosh") {
            setTimeout(function() {
               if(mainPage.classList.contains('d-none')){mainPage.classList.remove('d-none')};
               loginPage.classList.add('d-none');
            }, 1000)
         }

         });
      </script>
    </body>
</html>