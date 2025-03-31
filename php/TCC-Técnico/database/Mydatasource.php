<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'doomgym');

$conn2 = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);

$conn = mysqli_connect(HOST, USER, PASS, DBNAME);
