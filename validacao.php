<?php
    /*  Função que formata telefone para um dos formatos válidos.
        O primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, 
        insere o hifem, e o ultimo pega apenas o 4 ultimos digitos */
    function formataTelefone($number){
        $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
        return $number;
    }
?>