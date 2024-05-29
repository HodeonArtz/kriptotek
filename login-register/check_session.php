<?php
$check_session = function ($fn) {
  if (!isset($_SESSION["username"]) && isset($fn)) {
    $fn();
  }
  return isset($_SESSION["username"]);
};
$is_not_user = function () {
  if (!isset($_SESSION["username"])) {
    header("Location: /sintesi/paginaweb/login-register/login-page.php");
    exit();
  }
  return isset($_SESSION["username"]);
};
$is_not_admin = function () {
  if ($_SESSION && $_SESSION["tipo_user"] != "admin") {
    header("Location: /sintesi/paginaweb/");
    exit();
  }
};
?>
