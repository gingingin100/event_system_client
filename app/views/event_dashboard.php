<?php
// Decode the JSON string to get an associative array
$eventsData = json_decode($event_list, true);
$events = $eventsData['events'];  // Extract the 'events' array
?>

<main>
    <h1>User Dashboard</h1>
    <div class="container">
        <h2>Your Registered Events</h2>
        
        <!-- Table to display the events -->
        <table>
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['event_name']) ?></td>
                        <td><?= htmlspecialchars($event['start_date']) ?></td>
                        <td><?= htmlspecialchars($event['end_date']) ?></td>
                        <td><?= htmlspecialchars($event['location']) ?></td>
                        <td><?= htmlspecialchars($event['price']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
