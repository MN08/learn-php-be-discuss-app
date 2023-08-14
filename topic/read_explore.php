<?php
include '../connection.php';

$sql = "SELECT * FROM topics";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row_topic = $result->fetch_assoc()) {
        $id_user = $row_topic["id_user"];
        $sql_user = "SELECT * FROM users WHERE id = '$id_user'";
        $result_user = $connect->query($sql_user);

        $user = array();
        while ($row_user = $result_user->fetch_assoc()) {
            $user[] = $row_user;
        }
        $row_topic["user"] = $user[0];
        $data[] = $row_topic;
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
