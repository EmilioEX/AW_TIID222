<?php
    function conectar(){
        $db="";
        $host="";
        $pass="";
        $user="";

        mysqli_connect($host, $user, $pass);

        mysqli_select_db($con, $db);
        return $con;
    }
?>

