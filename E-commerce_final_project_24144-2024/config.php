<?php

echo "<h1>CONFIG TEST</h1>";

echo "<pre>";
print_r(PDO::getAvailableDrivers());

$DATABASE_URL = getenv("DATABASE_URL");
echo "<br><br>DATABASE_URL = " . ($DATABASE_URL ? "FOUND" : "NOT FOUND");

exit;