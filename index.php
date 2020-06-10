<!DOCTYPE html>
<html>
    <head>
        <title>Contactez-moi !</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <script src="js/script.js"></script>
    </head>
    <body>

        <div class="container">

            <div class="divider"></div>

            <div class="heading">
                <h2>Contactez-moi</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method="post" action="" role="form">

                        <div class="row">
                            
                            <div class="col-md-6">
                                <label for="firstName">Prénom<span class="blue"> *</span></label>
                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Votre prénom">
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="lastName">Nom<span class="blue"> *</span></label>
                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Votre nom">
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="email">Email<span class="blue"> *</span></label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Votre email">
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phoneNumber">Téléphone</label>
                                <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Votre téléphone">
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="message">Message<span class="blue"> *</span></label>
                                <textarea id="message" name="message" class="form-control" rows="4" placeholder="Votre message"></textarea>
                                <p class="comments"></p>
                            </div>
                            
                            <div class="col-md-12">
                                <p class="blue"><strong>* Ces informations sont requises</strong></p>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="submit" class="button1" value="Envoyer">
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
        
    </body>
</html>