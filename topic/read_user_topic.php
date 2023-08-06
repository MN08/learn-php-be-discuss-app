<?php
include '../connection.php';

$id_user = $_POST['id_user'];

$sql = "SELECT * FROM topics WHERE id_user = '$id_user'";
$result = $connect->query($sql);

if ($result) {
    $data = array();
    while ($row_user_topic = $result->fetch_assoc()) {
        $data[] = $row_user_topic;
    }
    echo json_encode(array(
        'success' => true,
        'data' => $data,
    ));
} else {
    echo json_encode(array(
        'success' => false,
        'data' => [],
    ));
}
