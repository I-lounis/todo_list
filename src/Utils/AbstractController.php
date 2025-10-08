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

        $regexDescription = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{0,1000}$/';
        $regexText = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{5,1000}$/';

        switch($nameInput){

            case 'title':

                if(!preg_match($regexDescription, $value)){
                    $this->arrayError['title'] = 'Merci de renseigner un pseudo correcte!';
                }
                break;

            case 'description':

                if(!preg_match($regexDescription, $value)){
                    $this->arrayError['description'] = 'Merci de mettre une vraie description';
                }
                break;

            case 'status':

                if(!preg_match($regexDescription, $value)){
                    $this->arrayError['status'] = 'Merci de mettre une vraie description';
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