<?php

namespace App\Services;

class Capitalizer implements Transform
{
    public function transform(string $string): string
    {

    $processed= "";
    foreach(explode(" ",$string) as $word){

        foreach(str_split($word) as $key=>$letter) {
            if(($key+1)%2!=0 && ctype_alpha($letter)){
                $processed .= mb_strtoupper($letter);
            }else{
                $processed .= $letter;
            }
        }
        $processed .= " ";
    }
    return $processed;

    }
}