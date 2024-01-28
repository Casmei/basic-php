<?php

function send($data) 
{
    $email = new PHPMailer\PHPMailer\PHPMailer;
    $email->CharSet = 'UTF-8';
    $email->SMTPSecure = 'plain';
    $email->isSMTP();
    $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->Port = 2525;
    $email->SMTPAuth = true;
    $email->Username = '237ab15085d2ac';
    $email->Password = 'd235b7517159f3';
    $email->isHTML(true);
    $email->setFrom('tiago@protonmail.com');
    $email->FromName = $data->name;
    $email->addAddress($data->email);
    $email->Body = $data->message;
    $email->Subject = $data->subject;
    $email->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver HTML';
    return $email->send();

}