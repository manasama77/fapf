<?php
session_start();
session_destroy();
require_once('../constants.php');

return header("Location:" . APP_URL . '/pelamar/login.php');
