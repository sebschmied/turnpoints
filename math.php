<?php
/**
 * Created by PhpStorm.
 * User: sschmied
 * Date: 27.04.18
 * Time: 23:06
 */


//https://stackoverflow.com/a/22317686/7563639

function SeeYoutoDD($val)
{
    //lat:
    /* ex. 4845.884
           4845.884
    It is a decimal number where
1-2 characters are degrees,
3-4 characters are minutes,
5 decimal point,
6-8 characters are decimal minutes.
*
     *
     * http://www.keepitsoaring.com/LKSC/Downloads/cup_format.pdf
     */
    //echo "(VAL: ". $val. "STRLEN: " . strlen($val) . ")";
    if (strlen($val) == 8) {
        $deg = doubleval(substr($val, 0, 2));

        $min = doubleval(substr($val, 2, 2));
        $decimal_minutes = doubleval('0.'. substr($val, 5, 3));
        echo "dec ".$decimal_minutes;
    }

    /*
    * lon: ex. 00816.756
    * It is a decimal number where
1-3 characters are degrees,
4-5 characters are minutes,
6 decimal point,
7-9 characters are decimal minutes.
    */
    else {
        $deg = doubleval(substr($val, 0, 3));

        $min = doubleval(substr($val, 3, 2));
        $decimal_minutes = doubleval('0.' . substr($val, 6, 3));
        echo "dec " .$decimal_minutes;
    }




    return $deg+(($min*60+$decimal_minutes*60)/3600);
}