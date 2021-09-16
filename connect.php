<?php
/* Set e-mail recipient */
$myemail  = "mansoor250984@gmail.com";
$subject = "Blue Pine Contact";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
/* Check all form inputs using check_input function */
$name  = check_input($_POST['name'], "");
$email  = check_input($_POST['email'], "");
$phone    = check_input($_POST['phone']);
$message    = check_input($_POST['message']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}



/* Let's prepare the message for the e-mail */
$message = "Hi Blue Pine Team!
-------------------------------------------
You have received mail through the Blue Pine 'Contact Form'
Below is a copy of the information that the user submitted:
-------------------------------------------
NAME :: $name

EMAIL :: $email

PHONE :: $phone

MESSAGE :: $message

============================
Thank you
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thankyou.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>
 
 