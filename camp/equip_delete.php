<?php require __DIR__ . '/part/connect_db.php';

$equip_id = isset($_GET['equip_id']) ? intval($_GET['equip_id']) : 0;
if (!empty($equip_id)) {
    $pdo->query("DELETE FROM `equip` WHERE equip_id=$equip_id");
}

header("Location: equip_list.php");
