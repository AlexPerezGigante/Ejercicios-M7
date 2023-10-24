<?php
session_start();
$_SESSION['username'] = $_POST['user'];
$_SESSION['userpass'] = $_POST['pass'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['authuser'] = 0;

// Check username and password information
if ($_SESSION['username'] === 'Joe' && $_SESSION['userpass'] === '12345') {
    $_SESSION['authuser'] = 1;
} else {
$get1 = $_GET['get1'];
$get2 = $_GET['get2'];
echo "<p>GET1: $get1</p>";
echo "<p>GET2: $get2</p>";
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();
}
setcookie('cookie1', 'cookie1', time() + 60);
setcookie('cookie2', 'cookie2', time() + 60);

$cookie1 = $_COOKIE['cookie1'];
$cookie2 = $_COOKIE['cookie2'];

$fecha = date('Y-m-d H:i:s');

echo "<p>Session Username: " . $_SESSION['username'] . "</p>";
echo "<p>Session Email: " . $_SESSION['email'] . "</p>";
echo "<p>Cookie 1: $cookie1</p>";
echo "<p>Cookie 2: $cookie2</p>";
echo "<p>Fecha y hora actual: $fecha</p>";
?>
