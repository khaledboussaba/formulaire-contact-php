<?php 
    
    $firstName = $lastName = $email = $phoneNumber = $message = "";
    $firstNameError = $lastNameError = $emailError = $phoneNumberError = $messageError = "";
    $isSuccess = false;
    $emailTo = "khaledboussaba@gmail.com";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $firstName = verifyInput($_POST['firstName']);
        $lastName = verifyInput($_POST['lastName']);
        $email = verifyInput($_POST['email']);
        $phoneNumber = verifyInput($_POST['phoneNumber']);
        $message = verifyInput($_POST['message']);
        $isSuccess = true;

        $emailText = "";

        if (empty($firstName)) {
            $firstNameError = "Je veux connaitre votre prénom !";
            $isSuccess = false;
        } else {
            $emailText .= "First name : $firstName\n";
        }

        if (empty($lastName)) {
            $lastNameError = "Eh oui ... je veux tout savoir, même votre nom !";
            $isSuccess = false;
        } else {
            $emailText .= "Last name : $lastName\n";
        }

        if (!isEmail($email)) {
            $emailError = "Votre adresse mail n'est pas valide !";
            $isSuccess = false;
        } else {
            $emailText .= "Email : $email\n";
        }

        if (!isPhoneNumberr($phoneNumber)) {
            $phoneNumberError = "Veuillez saisir que des chiffres et des espaces s'il vous plaît !";
            $isSuccess = false;
        } else {
            $emailText .= "Phone number : $phoneNumber\n";
        }

        if (empty($message)) {
            $messageError = "Que voulez-vous me dire ?";
            $isSuccess = false;
        } else {
            $emailText .= "Message : $message\n";
        }

        if ($isSuccess) {
            $headers = "From: $firstName $lastName <$email>\r\nReply-To: $email";
            mail($emailTo, "Un message de votre site !", $emailText, $headers);
            $firstName = $lastName = $email = $phoneNumber = $message = "";
        }

    }

    function isEmail($var) {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function isPhoneNumberr($var) {
        return preg_match("/^[0-9 ]*$/", $var);
    }

    function verifyInput($var) {
        $var = trim($var);
        $var = stripcslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="container">

            <div class="divider"></div>

            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">

                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="firstName">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Votre prénom" value="<?php echo $firstName; ?>">
                                <p class="comments"><?php echo $firstNameError; ?></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="lastName">Nom<span class="blue"> *</span></label>
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Votre nom" value="<?php echo $lastName; ?>">
                                <p class="comments"><?php echo $lastNameError; ?></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">
                                <p class="comments"><?php echo $emailError; ?></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phoneNumber">Téléphone</label>
                                <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Votre téléphone"  value="<?php echo $phoneNumber; ?>">
                                <p class="comments"><?php echo $phoneNumberError; ?></p>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Votre message"><?php echo $message; ?></textarea>
                                <p class="comments"><?php echo $messageError; ?></p>
                            </div>
                            
                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises</strong></p>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>

                        </div>

                        <p class="thank-you" style="display: <?php if($isSuccess) echo 'block';else echo 'none'; ?>">
                            Votre message a bien été envoyé. Merci de m'avoir contacté :)
                        </p>

                    </form>
                </div>
            </div>

        </div>
        
    </body>
</html>