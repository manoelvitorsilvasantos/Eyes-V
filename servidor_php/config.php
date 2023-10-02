<?php
error_reporting(E_ERROR | E_PARSE);
try {
	$conn = new MySQLi("localhost", "ifba", "ifba6514", "image_db");
} catch (Exception $e) {
	echo "Exceção capturada: " . $e->getMessage();
}