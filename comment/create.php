<?php

include '../connection.php';

$id_topic = $_POST['id_topic'];
$comment = $_POST['comment'];
$image = $_POST['image'];
$base64code = $_POST['base64code'];
$from_id_user = $_POST['from_id_user'];
$to_id_user = $_POST['to_id_user'];

$sql = "INSERT INTO comment SET 
id_topic='$id_topic',
comment ='$comment',
image='$image', 
from_id_user = '$from_id_user', 
to_id_user = '$to_id_user'";
$result = $connect->query($sql);

if ($result) {
    if ($image != '') {
        file_put_contents("../images/comment/" . $image, base64_decode($base64code));
    }
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false));
}
