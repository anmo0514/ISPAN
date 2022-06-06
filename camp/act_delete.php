<?php require __DIR__ . '/part/connect_db.php';

$act_id = isset($_GET['act_id']) ? intval($_GET['act_id']) : 0;
if (!empty($act_id)) {
    $pdo->query("DELETE FROM `act` WHERE act_id=$act_id");
}

header("Location: act_list.php");
