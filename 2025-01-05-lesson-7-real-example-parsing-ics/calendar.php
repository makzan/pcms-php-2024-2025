<?php
// Function to parse the .ics file and return events
function parseICS($filePath) {
    $events = [];
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $event = null;
    foreach ($lines as $line) {
        $line = trim($line);

        if ($line === "BEGIN:VEVENT") {
            $event = [];
        } elseif ($line === "END:VEVENT") {
            if ($event) {
                $events[] = $event;
                $event = null;
            }
        } elseif ($event !== null) {
            if (strpos($line, ":") !== false) {
                [$key, $value] = explode(":", $line, 2);
                // Handle multi-line values
                if (isset($event[$key])) {
                    $event[$key] .= "\n" . $value;
                } else {
                    $event[$key] = $value;
                }
            }
        }
    }

    return $events;
}

// Function to filter events based on date range
function filterEventsByDateRange($events, $startDate, $endDate) {
    $filteredEvents = [];
    foreach ($events as $event) {
        if (isset($event['DTSTART']) || isset($event['DTSTART;TZID="China Standard Time"'])) {
            $dtStart = $event['DTSTART'] ?? $event['DTSTART;TZID="China Standard Time"'];
            $eventDate = DateTime::createFromFormat('Ymd', $dtStart) ?: DateTime::createFromFormat('Ymd\THis', $dtStart);

            if ($eventDate && $eventDate >= $startDate && $eventDate <= $endDate) {
                $filteredEvents[] = $event;
            }
        }
    }
    return $filteredEvents;
}

function clean_summary_text($summary) {
    $cleanedSummary = preg_replace('/\s+/', ' ', $summary);
    $cleanedSummary = str_replace("\n", ' ', $cleanedSummary);

    // remove if existing "+" or "-" in the first character
    if (substr($cleanedSummary, 0, 1) === '+' || substr($cleanedSummary, 0, 1) === '-') {
        $cleanedSummary = substr($cleanedSummary, 1);
    }

    // remove "已確認" in summary
    $cleanedSummary = str_replace('已確認', '', $cleanedSummary);



    return $cleanedSummary;
}

// Determine this Saturday and next Friday
$today = new DateTime();
$saturday = (clone $today)->modify('next Saturday');
$friday = (clone $saturday)->modify('+6 days');

// Process the uploaded file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['icsFile'])) {
    $uploadedFile = $_FILES['icsFile']['tmp_name'];

    if (is_uploaded_file($uploadedFile)) {
        $events = parseICS($uploadedFile);
        $filteredEvents = filterEventsByDateRange($events, $saturday, $friday);

        // Display the events in a table
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<thead><tr><th>Date</th><th>Time</th><th>Summary</th></tr></thead>";
        echo "<tbody>";

        foreach ($filteredEvents as $event) {
            $dtStart = $event['DTSTART'] ?? $event['DTSTART;TZID="China Standard Time"'];
            $dtEnd = $event['DTEND'] ?? $event['DTEND;TZID="China Standard Time"'];
            $summary = $event['SUMMARY'] ?? 'No Summary';

            $startDate = DateTime::createFromFormat('Ymd', $dtStart) ?: DateTime::createFromFormat('Ymd\THis', $dtStart);
            $endDate = DateTime::createFromFormat('Ymd', $dtEnd) ?: DateTime::createFromFormat('Ymd\THis', $dtEnd);

            $date = $startDate->format('Y-m-d');
            $time = $startDate->format('H:i') . ' - ' . $endDate->format('H:i');

            // Handle all-day events
            if ($startDate->format('His') === '000000' && $endDate->format('His') === '000000') {
                $time = 'All Day';
            }

            $summary = clean_summary_text($summary);
            echo "<tr>";
            echo "<td>{$date}</td>";
            echo "<td>{$time}</td>";
            echo "<td contenteditable>{$summary}</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Failed to upload the file.";
    }
}
?>

<!-- HTML Form for uploading the ICS file -->
<form method="POST" enctype="multipart/form-data">
    <label for="icsFile">Upload ICS File:</label>
    <input type="file" name="icsFile" id="icsFile" required>
    <button type="submit">Upload and Parse</button>
</form>