<?php
include ('cache.php');
Cache::start();

echo '<!DOCTYPE html><html lang="es"><head><title>Cache Test</title></head><body>';
echo '<h1>System Time: '.time().'</h1>';
echo "<ul>";
for ($i=0; $i<1000; $i++) {
	echo '<li>Item number: '.$i.'</li>';
}
echo "</ul>";
echo "</body><html>";

Cache::flush();