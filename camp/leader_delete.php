<?php require __DIR__ . '/part/connect_db.php';

$act_l_id = isset($_GET['act_l_id']) ? intval($_GET['act_l_id']) : 0;
if (!empty($act_l_id)) {
    $pdo->query("DELETE FROM `act_leaders` WHERE act_l_id=$act_l_id");
}

header("Location: leader_list.php");
