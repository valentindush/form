<?php

    function giveFactors($num){

        $factors = [];

        for($i = 1; $i < $num; $i++){
            if($num % $i ==  0){
                array_push($factors, $i);
            }
        }

    }

    giveFactors(40);
?>