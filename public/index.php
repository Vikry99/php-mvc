<?php

//  jalankan sesion yang di folder core dan file Flasher.php
// jika di aplikasi session kita tidak terdaftar session id maka aplikasi di mulau atau start
if ( !session_id() ) session_start();

require_once '../app/init.php';


$app = new App;
