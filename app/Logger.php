<?php
namespace App;

class Logger implements LoggerInterface
{
    public function debug($var){
        dump($var);
    }
}