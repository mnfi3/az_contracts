<?php

namespace App\Http\Controllers;


class PersianNumber {

  public static function persianToLatin($string){

    $chars = array();
    $chars[0] = '۰';
    $chars[1] = '۱';
    $chars[2] = '۲';
    $chars[3] = '۳';
    $chars[4] = '۴';
    $chars[5] = '۵';
    $chars[6] = '۶';
    $chars[7] = '۷';
    $chars[8] = '۸';
    $chars[9] = '۹';

    $latinString = '';

    for ($i = 0 ; $i < strlen($string) ; $i++){
      switch (mb_substr($string, $i, 1, 'utf-8')){
        case  $chars[0] : $latinString .= '0';break;
        case  $chars[1] : $latinString .= '1';break;
        case  $chars[2] : $latinString .= '2';break;
        case  $chars[3] : $latinString .= '3';break;
        case  $chars[4] : $latinString .= '4';break;
        case  $chars[5] : $latinString .= '5';break;
        case  $chars[6] : $latinString .= '6';break;
        case  $chars[7] : $latinString .= '7';break;
        case  $chars[8] : $latinString .= '8';break;
        case  $chars[9] : $latinString .= '9';break;
        default : $latinString .= mb_substr($string, $i, 1, 'utf-8');break;
      }
    }

    return $latinString;
  }



  public static function latinToPersian($string){
    $chars = array();
    $chars[0] = '۰';
    $chars[1] = '۱';
    $chars[2] = '۲';
    $chars[3] = '۳';
    $chars[4] = '۴';
    $chars[5] = '۵';
    $chars[6] = '۶';
    $chars[7] = '۷';
    $chars[8] = '۸';
    $chars[9] = '۹';

    $persianString = '';

    for ($i = 0 ; $i < strlen($string) ; $i++){

      switch (mb_substr($string, $i, 1, 'utf-8')){
        case '0' : $persianString .= $chars[0]; break;
        case '1' : $persianString .= $chars[1]; break;
        case '2' : $persianString .= $chars[2]; break;
        case '3' : $persianString .= $chars[3]; break;
        case '4' : $persianString .= $chars[4]; break;
        case '5' : $persianString .= $chars[5]; break;
        case '6' : $persianString .= $chars[6]; break;
        case '7' : $persianString .= $chars[7]; break;
        case '8' : $persianString .= $chars[8]; break;
        case '9' : $persianString .= $chars[9]; break;
        default : $persianString .= mb_substr($string, $i, 1, 'utf-8');break;
      }
    }


    return $persianString;
  }



}