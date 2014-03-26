<?php
/**
 * Created by PhpStorm.
 * User: Johnson
 * Date: 3/25/14
 * Time: 9:07 PM
 */

class Input
{

    public static function get($input, $standard = "default")
    {
        if (isset($_GET[$input]))
        {
            return$_GET[$input];
        }
        else
        {
            if ($standard != "default")
            {
                return $standard;
            }
            else
            {
                return null;
            }

        }

    }
} 