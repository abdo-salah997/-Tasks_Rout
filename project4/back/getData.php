<?php
include "dbcont.php";

class getData
{
    static function skills()
    {
        global $cont;

        $skillData = $cont->prepare("SELECT * FROM `skills`");
        $skillData->execute();

        return $skillData;
    }

    static function experience()
    {
        global $cont;

        $experienceData = $cont->prepare("SELECT * FROM `experience`");
        $experienceData->execute();

        return $experienceData;
    }

    static function eduction()
    {
        global $cont;
        $eductionData = $cont->prepare("SELECT * FROM `eduction`");
        $eductionData->execute();
        return $eductionData;
    }

    static function about(){
        global $cont;

        $aboutData = $cont->prepare("SELECT * FROM `about`");
        $aboutData->execute();

        return $aboutData->fetch();
    }
    static function services(){
        global $cont;

        $servicestData = $cont->prepare("SELECT * FROM `service`");
        $servicestData->execute();

        return $servicestData;
    }
    static function products(){

        global $cont;

        $productstData = $cont->prepare("SELECT * FROM `products`");
        $productstData->execute();

        return $productstData;

    }
    static function catigory(){
        global $cont;

        $catigorytData = $cont->prepare("SELECT * FROM `catigory`");
        $catigorytData->execute();

        return $catigorytData;
    }

}
