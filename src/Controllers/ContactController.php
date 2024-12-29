<?php

namespace Src\Controllers;

class ContactController extends Controller
{
    public function sendMail()
    {
        //collect POST values
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message'],ENT_SUBSTITUTE | ENT_HTML401);
        
        //e-mail formatting
        $to = "ablazelef@gmail.com";
        $subject = "Nouveau message de $username";
        $body = "Username: $username\nE-mail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            return header('Location: /my-first-blog?success_mail=true');
        }
    }
}
