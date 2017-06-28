<?php

if(isset($_POST['contactAgent']) 
    && $_POST['fullname'] != '' 
    && $_POST['email_from'] != '' 
    && $_POST['subject'] != '' 
    && $_POST['message'] != '' 
    && $_POST['email_to'] != '')
{
    $to = $_POST['email_to'];
    $subject = $_POST['subject']; 

    $txt = "Name: ".$_POST['fullname']." \n"
        ."Email: ".$_POST['email_from']." \n"
        ."Subject: ".$_POST['subject']." \n"
        ."Message: ".$_POST['message'];
    $headers = "From: ".$_POST['email_from'] . "\r\n";

    mail($to,$subject,$txt,$headers);
    echo "Message Sent!";
}

else
{
    echo "Please fill up all fields!";
}    
?>