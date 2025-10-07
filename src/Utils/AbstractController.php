<?php

namespace App\Utils;

abstract class AbstractController
{
    protected array $arrayError = [];

    public function isNotEmpty ($nameInput){

        if(empty($_POST[$nameInput])){
            $this->arrayError[$nameInput] = "Ce champs ne peut pas être vide.";
            return $this->arrayError;
        }
        return false;
    }


    public function checkFormat($nameInput, $value){

        $regexPseudo = '/^([0-9a-z_\-.A-Zà-üÀ-Ü\ ]){3,255}$/';
        $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
        $regexDescription = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{0,1000}$/';
        $regexImg = '/^([0-9a-z_\-.A-Zà-üÀ-Ü]){0,255}$/';
        $regexText = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{5,1000}$/';

        switch($nameInput){

            case 'pseudo':

                if(!preg_match($regexPseudo, $value)){
                    $this->arrayError['pseudo'] = 'Merci de renseigner un pseudo correcte!';
                }
                break;

            case 'password':

                if(!preg_match($regexPassword, $value)){
                    $this->arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
                }
                break;

            case 'email':

                if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->arrayError['mail'] = 'Merci de renseigner un e-mail correcte!';
                }
                break;

            case 'description':

                if(!preg_match($regexDescription, $value)){
                    $this->arrayError['description'] = 'Merci de mettre une vraie description';
                }
                break;

            case 'image':

                if(!preg_match($regexImg, $value)){
                    $this->arrayError['image'] = 'Merci de mettre une véritable image';
                }
                break;
            case 'commit':
                if(!preg_match($regexText, $value)){
                    $this->arrayError['commit'] = 'Merci de renseigner un texte correcte!';
                }
                break;
            case 'comment':
                if(!preg_match($regexText, $value)){
                    $this->arrayError['comment'] = 'Merci de renseigner un texte correcte!';
                }
                break;
        }
    }


    public function totalCheck($nameInput, $valueInput)
    {
        $this->checkFormat($nameInput, $valueInput);
        $this->isNotEmpty($nameInput);
        return $this->arrayError;
    }

    public function errorMessage($myMessage){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $myMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }

    public function debug ($info){
        echo '<pre>';
        var_dump($info);
        echo '</pre>';
    }

    public function redirectToRoute($route, $code){
        http_response_code($code);
        header("Location: {$route}");
        exit;
    }
}