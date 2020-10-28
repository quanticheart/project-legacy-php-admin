<?php

if (!isset($_SESSION)){
session_start();
}

if(isset($_SESSION['msg_primary'])){
echo "<div class='alert alert-primary' role='alert'>$_SESSION[msg_primary]</div>";
unset($_SESSION['msg_primary']);	
}

if(isset($_SESSION['msg_default'])){
echo "<div class='alert alert-default' role='alert'>$_SESSION[msg_default]</div>";
unset($_SESSION['msg_default']);	
}

if(isset($_SESSION['msg_success'])){
echo "<div class='alert alert-success' role='alert'>$_SESSION[msg_success]</div>";
unset($_SESSION['msg_success']);	
}

if(isset($_SESSION['msg_danger'])){
echo "<div class='alert alert-danger' role='alert'>$_SESSION[msg_danger]</div>";
unset($_SESSION['msg_danger']);	
}

if(isset($_SESSION['msg_warning'])){
echo "<div class='alert alert-warning' role='alert'>$_SESSION[msg_warning]</div>";
unset($_SESSION['msg_warning']);	
}

if(isset($_SESSION['msg_info'])){
echo "<div class='alert alert-info' role='alert'>$_SESSION[msg_info]</div>";
unset($_SESSION['msg_info']);	
}



?>
