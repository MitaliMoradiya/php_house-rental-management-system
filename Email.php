<?php


include 'PHPMailerAutoload.php';
class Email
{
    static public function send($from,$subject,$message,$to)
    {
        
        $mail = new PHPMailer(true); //defaults to using php "mail()"; the true param means it will throw exceptions on errors, which we need to catch

        try {
          $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = "19bmiit030@gmail.com";
        $mail->Password = "wbzyfqttgnqqejbt";
        $mail->SetFrom($from);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($to);
        if($mail->Send()){
           return true;
        }else{
           return false;
        }
        
        
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
          echo $e->getMessage(); //Boring error messages from anything else!
        }
//        $mail = new PHPMailer();
//        $mail->isSMTP();
//        $mail->SMTPDebug = 0;
//        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'ssl';
//        $mail->SMTPOptions = array(
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
//        );
//        $mail->Host = 'smtp.gmail.com';
//        $mail->Port = 465;
//        $mail->IsHTML(true);
//        $mail->Username = "19bmiit030@gmail.com";
//        $mail->Password = "wbzyfqttgnqqejbt";
//        $mail->SetFrom($from);
//        $mail->Subject = $subject;
//        $mail->Body = $message;
//        $mail->AddAddress($to);
//
//        if($mail->Send())
//        {
//            echo "send";
//        }
//        else
//        {
//            return ;
//        }
    }
}