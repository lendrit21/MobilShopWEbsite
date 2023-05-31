<?php
//Përfshin filen e konfigurimit me lidhjen e bazës së të dhënave.
include 'config.php';

session_start();//Fillon një sesion të ri ose rifillon një sesion ekzistues.
session_unset(); //Pastron të gjitha variablat e sesionit
session_destroy();//Shkatërron sesionin dhe fshin të gjitha të dhënat e sesionit.
//Ridrejton përdoruesin në faqen e identifikimit.
header('location:login.php');
?>
