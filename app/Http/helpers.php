<?php
    function random($length) {
        $characters = 'abcdefghijkmnpqrstuvwxyz23456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }
?>