<?php
  //Getting all form variable
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $message = $_POST['message'];
  

  if (!empty($email) && !empty($message)){//if email and message field is not empty
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){//if email looks valid
        $receiver = "sammycharity@gmail.com";//emaill receiver email address
        $subject = "From: $name <$email>"; //subject of the email; charity <sammycharity@gmail>
        //merging concating all user values inside body variable. \n used for new line
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage: $message\n\nRegards,\n$name";
        $sender = "From: $email"; //sender email
        if(mail($receiver, $subject, $body, $sender)){//mail() is a inbuild php function to send mail
            echo "Your message has been send!";
        }else{
            echo "Sorry, failed to send your message!";
        }
    }else{
        echo "Enter a valid email adress!";
    }
  }else{
    echo "Email field is require!";
  }
?>