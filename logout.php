<?php
session_start();
unset($_SESSION);
session_destroy();
require_once "function.php";
checkLogin();