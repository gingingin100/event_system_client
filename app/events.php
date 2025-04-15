<?php
require 'db.php';
header('Content-Type: application/json');

// Connect to Redis
$redis = new Redis();
$redis->connect('redis', 6379);

// Check if events are cached
$cachedEvents = $redis->get('events_list');
if ($cachedEvents) {
    echo $cachedEvents;
    exit;
}
// If not cached, fetch from database
$result = $conn->query("SELECT * FROM events1");
$events = $result->fetch_all(MYSQLI_ASSOC);
// Store result in Redis (expires in 300 seconds)
$redis->setex('events_list', 300, json_encode($events));
echo json_encode($events);
?>