<?php
@include "../../login-register/check_session.php";
session_start();
$is_not_user();
$is_not_admin();
?>
