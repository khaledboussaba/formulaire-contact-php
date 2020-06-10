<?php 

    $myArray = array("firstName" => "", "lastName" => "", "email" => "", "phoneNumber" => "", "message" => "",
                    "firstNameError" => "", "lastNameError" => "", "emailError" => "", "phoneNumberError" => "", "messageError" => "",
                    "isSuccess" => false
                  );
    
    $emailTo = "khaledboussaba@gmail.com";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $myArray["firstName"] = verifyInput($_POST['firstName']);
        $myArray["lastName"] = verifyInput($_POST['lastName']);
        $myArray["email"] = verifyInput($_POST['email']);
        $myArray["phoneNumber"] = verifyInput($_POST['phoneNumber']);
        $myArray["message"] = verifyInput($_POST['message']);
        $myArray["isSuccess"] = true;

        $emailText = "";

        if (empty($myArray["firstName"])) {
            $myArray["firstNameError"] = "Je veux connaitre votre prénom !";
            $myArray["isSuccess"] = false;
        } else {
            $emailText .= "First name : {$myArray["firstName"]}\n";
        }

        if (empty($myArray["lastName"])) {
            $myArray["lastNameError"] = "Eh oui ... je veux tout savoir, même votre nom !";
            $myArray["isSuccess"] = false;
        } else {
            $emailText .= "Last name : {$myArray["lastName"]}\n";
        }

        if (!isEmail($myArray["email"])) {
            $myArray["emailError"] = "Votre adresse mail n'est pas valide !";
            $myArray["isSuccess"] = false;
        } else {
            $emailText .= "Email : {$myArray["email"]}\n";
        }

        if (!isPhoneNumberr($myArray["phoneNumber"])) {
            $myArray["phoneNumberError"] = "Veuillez saisir que des chiffres et des espaces s'il vous plaît !";
            $myArray["isSuccess"] = false;
        } else {
            $emailText .= "Phone number : {$myArray["phoneNumber"]}\n";
        }

        if (empty($myArray["message"])) {
            $myArray["messageError"] = "Que voulez-vous me dire ?";
            $myArray["isSuccess"] = false;
        } else {
            $emailText .= "Message : {$myArray["message"]}\n";
        }

        if ($myArray["isSuccess"]) {
            $headers = "From: {$myArray["firstName"]} {$myArray["lastName"]} <{$myArray["email"]}>\r\nReply-To: {$myArray["email"]}";
            mail($emailTo, "Un message de votre site !", $emailText, $headers);
        }

        echo json_encode($myArray);

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