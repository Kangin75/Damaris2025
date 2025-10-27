<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);
    $today = date("Y-m-d");

    $sql = "UPDATE borrow_records 
            SET status='已歸還', return_date=? 
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $today, $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: index.php");
exit;
?>
