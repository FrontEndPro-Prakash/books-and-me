<?php
error_reporting(E_ALL);
//include"file.php";

//include "PHPMailer/file.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
    $email = $_POST["email"];

    $mail   = new PHPMailer; // call the class
    //$mail->IsSMTP();
    //$mail->SMTPDebug = 1; 
    $mail->Host = 'smtp.sendgrid.net'; //Hostname of the mail server
    $mail->Port = 587; //Port of the SMTP like to be 25, 80, 465 or 587
    $mail->SMTPAuth = true; //Whether to use SMTP authentication
    $mail->Username = 'apikey'; //Username for SMTP authentication any valid email created in your domain
    $mail->Password = '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'; //Password for SMTP authentication
    $mail->AddReplyTo("info@booksandme.in"); //reply-to address
    $mail->SetFrom("info@booksandme.in"); //From address of the mail
    // put your while loop here like below,
    $mail->Subject = "Contact - ".$_POST["name"]; //Subject or your mail
    $mail->AddAddress('info@booksandme.in'); //To address who will receive this email

    $data='<table>';
    //unset($_POST['g-recaptcha-response']);
   
     $result = array_filter($_POST);   
     foreach ($result as $key => $value) {
       $data.="<tr><td>".ucfirst($key).": </td><td>".$value."</td></tr>";
     }
      

    $data.='</table>';

    $mail->MsgHTML($data); //Put your body of the message you can place html code here
   
    $send = $mail->Send(); //Send the mails
    header("Location:https://think360.in/work/books-and-me/thank-you.php");

 ?>