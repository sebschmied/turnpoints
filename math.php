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
    echo "(VAL: ". $val. "STRLEN: " . strlen($val) . ")";
    if (strlen($val) == 8) {
        $deg = intval(substr($val, 0, 2));

        $min = intval(substr($val, 2, 2));
        $sec = intval(substr($val, 5, 3));
    }

    /*
    * lon: ex. 00816.756E
    * It is a decimal number where
1-3 characters are degrees,
4-5 characters are minutes,
6 decimal point,
7-9 characters are decimal minutes.
    */
    else {
        $deg = intval(substr($val, 0, 3));

        $min = intval(substr($val, 3, 2));
        $sec = intval(substr($val, 6, 3));

    }




    return $deg+((($min*60)+($sec))/3600);
}