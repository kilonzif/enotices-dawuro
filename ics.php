<?php
// I know there are probably better ways to do this, but this accomplishes what I needed it to do.
// Fetch vars. In this case, they're being pulled via the URL.
$event = array(
	'id' => $_GET['id'],
	'title' => $_GET['title'],
	'description' => $_GET['description'],
	'datestart' => "".$_GET['year'].$_GET['month'].$_GET['day']."T".$_GET['hr'].$_GET['min'].$_GET['sec']."Z",
	'address' => $_GET['stage']
);
// Convert times to iCalendar format. They require a block for yyyymmdd and then another block
// for the time, which is in hhiiss. Both of those blocks are separated by a "T". The Z is
// declared at the end for UTC time, but shouldn't be included in the date conversion.
// iCal date format: yyyymmddThhiissZ 20180226T111100
// PHP equiv format: Ymd\This

// Build the ics file
$ical = 'BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
CALSCALE:GREGORIAN
BEGIN:VEVENT
DTEND:' . $event['datestart'] . '
UID:' . $event['title'] . '
DTSTAMP:' . time() . '
LOCATION:' . $event['address'] . '
DESCRIPTION:' . addslashes($event['description']) . '
URL;VALUE=URI: http://mydomain.com/events/' . $event['id'] . '
SUMMARY:' . addslashes($event['title']) . '
DTSTART:' . $event['datestart'] . '
END:VEVENT
END:VCALENDAR';
//set correct content-type-header
if($event['id']){
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=mohawk-event.ics');
	echo $ical;
} else {
	// If $id isn't set, then kick the user back to home. Do not pass go,
        // and do not collect $200. Currently it's _very_ slow.
	header('Location: /');
}

//echo $event['datestart'];
?>