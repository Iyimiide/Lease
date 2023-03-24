<?php
require 'config2.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login2.php");
