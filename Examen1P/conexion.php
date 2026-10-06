<?php
    function conectar(){
        $data="autos";
        $host="localhost";
        $user="root";
        $contr="";

        $c= mysqli_connect($host, $user, $contr);
        mysqli_select_db($c, $data);
        return $c;
    }
?>