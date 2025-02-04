<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email extends Model
{

    public static function sendEmail($data)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "info@b-ent.in";                     //SMTP username
            $mail->Password   = "qspq ugqa ttdx oqwl";                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom("info@b-ent.in", 'Mailer');
            $mail->addAddress("info@b-ent.in", $data['name']);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['message'];
            $mail->AltBody = $data['message'];

            if($mail->send()){
                return true;
            }else{
                echo "some error";
                echo "Mailer Error: " . $mail->ErrorInfo;
                return false;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }
}
