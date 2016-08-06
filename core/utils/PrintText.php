<?php 
namespace Core\Utils;

class PrintText
{
    
    public static function sameLine($value)
    {
        print $value;
    }

    public static function nextLine($value)
    {
        print $value;
        print '<br>';
    }    
}