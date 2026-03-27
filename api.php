<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once 'db.php';

$section = $_GET['section'] ?? '';
$conn = getConnection();

switch ($section) {
    case 'profile':
        $result = $conn->query("SELECT * FROM profile LIMIT 1");
        echo json_encode($result->fetch_assoc());
        break;

    case 'experiences':
        $result = $conn->query("SELECT year, role, place FROM experiences ORDER BY sort_order ASC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    case 'skills':
        $result = $conn->query("SELECT name, level FROM skills ORDER BY sort_order ASC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $row['level'] = (int)$row['level'];
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    case 'certificates':
        $result = $conn->query("SELECT title, issuer, year, description AS `desc`, image, tags FROM certificates ORDER BY sort_order ASC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $row['tags'] = explode(',', $row['tags']);
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    case 'socials':
        $result = $conn->query("SELECT label, link, icon FROM socials ORDER BY sort_order ASC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
        break;

    default:
        http_response_code(400);
        echo json_encode(['error' => 'Section tidak valid']);
}

$conn->close();