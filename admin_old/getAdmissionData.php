<?php
include('../inlcudes/config.php');
header('Content-Type: application/json');

$sql = "SELECT district, 
               SUM(CASE WHEN gender = 'male' THEN 1 ELSE 0 END) AS male,
               SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) AS female
        FROM admissions
        GROUP BY district";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

echo json_encode($data);
?>
