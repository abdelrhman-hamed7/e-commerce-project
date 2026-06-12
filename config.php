<?php

try {
    $pdo = new PDO(getenv("postgresql://laptop_agency_db_user:73FLP2oCrT2bIQJ9RgUba4gWqkuUC2Qc@dpg-d8ls8vl8nd3s73a6hogg-a.oregon-postgres.render.com/laptop_agency_db"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

?>