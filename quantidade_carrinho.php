<?php

include_once "fachada.php";
include_once "comum.php";

if (is_session_started() === FALSE) {
  session_start();
}

if ($_SESSION["quantidade"] != '') {
  
}
?>