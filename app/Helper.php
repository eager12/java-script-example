<?php

function findObjectByPos($array,$pos , $type='key'){
    foreach ( $array as $element ) {
        if ( $pos == $element->$type ) {
            return $element;
        }
    }
    return false;
}

function enToFa($string) {
    return strtr($string, array('0'=>'۰','1'=>'۱','2'=>'۲','3'=>'۳','4'=>'۴','5'=>'۵','6'=>'۶','7'=>'۷','8'=>'۸','9'=>'۹'));
}



