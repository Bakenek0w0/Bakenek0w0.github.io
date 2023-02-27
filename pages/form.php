<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', 'root');

if (isset($_POST['forminscription'])) {
    //Verif Champs remplis 

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['mdp']) and !empty($_POST['mdp2'])) {



        $pseudolength = strlen($pseudo);
        if ($pseudolength <= 255) {
            if ($mail == $mail2) {
                //Filtervar pour confirmer l'entrée d'une adresse 
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    // verif mail existant 
                    //prepare requete 
                    $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
                    //execute requete  
                    $reqmail->execute(array($mail));
                    //Compte cbn de compte il y a avec l'info
                    $mailexist = $reqmail->rowCount();
                    $reqpseudo = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
                    $reqpseudo->execute(array($pseudo));
                    $pseudoexist = $reqpseudo->rowCount();



                    if ($mailexist == 0) {
                        if ($pseudoexist == 0) {
                            if ($mdp == $mdp2) {
                                $insertmbr = $bdd->prepare("INSERT INTO membres (pseudo, mail, motdepasse) VALUES (?,?,?)");
                                $insertmbr->execute(array($pseudo, $mail, $mdp));
                                $confirmation = "Votre compte a bien était créé !";
                            } else {
                                $erreur = "Vos mots de passes ne correspondent pas !";
                            }
                        } else {
                            $erreur = " Pseudo déjà utilisé !";
                        }
                    } else {
                        $erreur = " Adresse mail déjà utilisée !";
                    }
                } else {
                    $erreur = "Votre Adresse mail n'est pas valide";
                }
            } else {
                $erreur = "Vos adresses ne correspondent pas ! ";
            }
        } else {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        }
    } else {
        $erreur = "Tout les champs doivent être complétés !";
    }
}

?>

<html>

<head>
    <title>Formulaire de connexion</title>
    <meta charset="utf-8 ">
    <link rel="stylesheet" href="form.css">


</head>

<body>
    <div align="center">
        <h2>Inscription</h2>
        <br /><br />
        <form method="POST" action="">
            <table>
                <tr>
                    <td align="right">
                        <label for="pseudo">Pseudo :</label>
                    </td>
                    <td>
                        <input type=" text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php
                                                                                                        if (isset($pseudo)) {

                                                                                                            echo $pseudo;
                                                                                                        }
                                                                                                        ?>" />
                    </td>

                    </td>
                </tr>

                <tr>
                    <td align="right">
                        <label for="mail">Mail :</label>
                    </td>
                    <td>
                        <input type=" email" placeholder="Votre mail" id="mail" name="mail" <?php
                                                                                            if (isset($mail)) {

                                                                                                echo $mail;
                                                                                            }
                                                                                            ?>" />
                    </td>

                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mail2">Confirmation du Mail:</label>
                    </td>
                    <td>
                        <input type=" email" placeholder="Confirmez votre mail" id="mail2" name="mail2" <?php
                                                                                                        if (isset($mail2)) {

                                                                                                            echo $mail2;
                                                                                                        }
                                                                                                        ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mdp">Mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" <?php
                                                                                                    if (isset($mdp)) {

                                                                                                        echo $mdp;
                                                                                                    }
                                                                                                    ?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mdp2">Confirmation du Mot de passe:</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2" <?php if (isset($mdp2)) {
                                                                                                                    echo $mdp2;
                                                                                                                }                ?>" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="submit" name="forminscription" value="S'inscrire"></td>
                </tr>


            </table>


        </form>

        <?php
        if (isset($erreur)) {

            echo '<font color="red"><b> ' . $erreur . '</b></font>';
        } else {
            echo '<font color="green"> <b>' . $confirmation  . '</b></font>';
        }
        ?>

    </div>
</body>
<html>