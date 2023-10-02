<?php
error_reporting(E_ERROR | E_PARSE);
try {
	$conn = new MySQLi("localhost", "mvictor", "65564747", "image_db");
} catch (Exception $e) {
	echo "Exceção capturada: " . $e->getMessage();
}