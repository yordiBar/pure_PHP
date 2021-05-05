<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'functions.php';
$_session = new USER();

