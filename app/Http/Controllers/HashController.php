<?php

namespace App\Http\Controllers;

class HashController extends Controller
{
    public function gerarHash($string=""){
        $caracteres = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','W','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','w','y','z',0,1,2,3,4,5,6,7,8,9];
        $string_aleatoria =  $caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)].$caracteres[rand(0,61)];
        $hash = md5($string.$string_aleatoria);
        return $hash;
    }
}
