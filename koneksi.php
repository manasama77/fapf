<?php
session_start();

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "u1673034_hrm";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
  die("Koneksi ke database gagal : " . $conn->connect_error);
}


$pdo = new PDO("mysql:host=$hostName;dbname=$databaseName", $userName, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
