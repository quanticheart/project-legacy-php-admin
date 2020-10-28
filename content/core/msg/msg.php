<?php
session_start();

if($_SESSION["msg_default"] != false )
echo "<div class='alert alert-default' role='alert'>$_SESSION[msg_default]</div>";
unset($_SESSION['msg_default']);

if($_SESSION['msg_primary'] != false )
echo "<div class='alert alert-primary' role='alert'>$_SESSION[msg_primary]</div>";
unset($_SESSION['msg_primary']);

if($_SESSION['msg_success'] != false )
echo "<div class='alert alert-success' role='alert'>$_SESSION[msg_success]</div>";
unset($_SESSION['msg_success']);

if($_SESSION['msg_info'] != false )
echo "<div class='alert alert-info' role='alert'>$_SESSION[msg_info]</div>";
unset($_SESSION['msg_info']);

if($_SESSION['msg_warning'] != false )
echo "<div class='alert alert-warning' role='alert'>$_SESSION[msg_warning]</div>";
unset($_SESSION['msg_warning']);

if($_SESSION['msg_danger'] != false )
echo "<div class='alert alert-danger' role='alert'>$_SESSION[msg_danger]</div>";
unset($_SESSION['msg_danger']);

?>
