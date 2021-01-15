<?php

    function getPdo()
    {
        $host = "127.0.0.1";
        $user = "root";
        $pass = "123456abc";
        $db = "js2006";
        return new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }


