<!DOCTYPE html>
<html>
<head>
    <title>PHP Date Format Characters</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .note { background-color: #fffde7; padding: 15px; margin: 20px 0; border-left: 4px solid #ffd600; }
    </style>
</head>
<body>
    <h1>PHP Date Format Characters</h1>
    <div class="note">
        <strong>Current Date/Time Used:</strong> <?php echo date('Y-m-d H:i:s'); ?><br>
        <strong>Timestamp:</strong> <?php echo time(); ?>
    </div>

    <table>
        <tr>
            <th>Format Character</th>
            <th>Description</th>
            <th>Example Output</th>
        </tr>
        <?php
        $formatChars = [
            // Day formats
            'd' => 'Day of the month, 2 digits with leading zeros (01 to 31)',
            'D' => 'A textual representation of a day, three letters (Mon through Sun)',
            'j' => 'Day of the month without leading zeros (1 to 31)',
            'l' => 'A full textual representation of the day of the week (Sunday through Saturday)',
            'N' => 'ISO-8601 numeric representation of the day of the week (1 (Monday) through 7 (Sunday))',
            'S' => 'English ordinal suffix for the day of the month (st, nd, rd or th)',
            'w' => 'Numeric representation of the day of the week (0 (Sunday) through 6 (Saturday))',
            'z' => 'The day of the year (0 through 365)',
            
            // Week formats
            'W' => 'ISO-8601 week number of year, weeks starting on Monday (01 through 53)',
            
            // Month formats
            'F' => 'A full textual representation of a month (January through December)',
            'm' => 'Numeric representation of a month, with leading zeros (01 through 12)',
            'M' => 'A short textual representation of a month, three letters (Jan through Dec)',
            'n' => 'Numeric representation of a month, without leading zeros (1 through 12)',
            't' => 'Number of days in the given month (28 through 31)',
            
            // Year formats
            'L' => 'Whether it\'s a leap year (1 if it is a leap year, 0 otherwise)',
            'o' => 'ISO-8601 week-numbering year (same as Y except if the ISO week number belongs to previous/next year)',
            'Y' => 'A full numeric representation of a year, 4 digits (1999 or 2003)',
            'y' => 'A two digit representation of a year (99 or 03)',
            
            // Time formats
            'a' => 'Lowercase Ante meridiem and Post meridiem (am or pm)',
            'A' => 'Uppercase Ante meridiem and Post meridiem (AM or PM)',
            'B' => 'Swatch Internet time (000 through 999)',
            'g' => '12-hour format of an hour without leading zeros (1 through 12)',
            'G' => '24-hour format of an hour without leading zeros (0 through 23)',
            'h' => '12-hour format of an hour with leading zeros (01 through 12)',
            'H' => '24-hour format of an hour with leading zeros (00 through 23)',
            'i' => 'Minutes with leading zeros (00 to 59)',
            's' => 'Seconds with leading zeros (00 through 59)',
            'u' => 'Microseconds (000000 to 999999)',
            'v' => 'Milliseconds (000 to 999)',
            
            // Timezone formats
            'e' => 'Timezone identifier (UTC, GMT, Atlantic/Azores)',
            'I' => 'Whether or not the date is in daylight saving time (1 if Daylight Saving Time, 0 otherwise)',
            'O' => 'Difference to Greenwich time (GMT) in hours (+0200)',
            'P' => 'Difference to Greenwich time (GMT) with colon between hours and minutes (+02:00)',
            'T' => 'Timezone abbreviation (EST, MDT)',
            'Z' => 'Timezone offset in seconds (-43200 through 50400)',
            
            // Full Date/Time formats
            'c' => 'ISO 8601 date (2004-02-12T15:19:21+00:00)',
            'r' => 'RFC 2822 formatted date (Thu, 21 Dec 2000 16:01:07 +0200)',
            'U' => 'Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)',
        ];

        foreach ($formatChars as $char => $description) {
            echo "<tr>";
            echo "<td>'$char'</td>";
            echo "<td>$description</td>";
            echo "<td>" . htmlspecialchars(date($char)) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Combined Format Examples</h2>
    <table>
        <tr>
            <th>Format</th>
            <th>Description</th>
            <th>Example Output</th>
        </tr>
        <?php
        $combinedFormats = [
            'Y-m-d H:i:s' => 'Common MySQL datetime format',
            'm/d/Y g:i A' => 'US format with 12-hour time',
            'd/m/Y H:i' => 'European format with 24-hour time',
            'l, F jS, Y' => 'Full textual date (e.g., Monday, January 1st, 2023)',
            'h:i:s A \o\n l, F jS, Y' => 'More complex example with text',
            'D, d M Y H:i:s O' => 'RFC 2822-like format',
            'Y-m-d\TH:i:sP' => 'ISO 8601 format with timezone',
        ];

        foreach ($combinedFormats as $format => $description) {
            echo "<tr>";
            echo "<td>'$format'</td>";
            echo "<td>$description</td>";
            echo "<td>" . htmlspecialchars(date($format)) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>