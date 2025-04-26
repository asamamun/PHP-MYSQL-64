<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Date and Time Functions</title>
    <style>
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .card h3 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .card p {
            margin-bottom: 10px;
            color: #34495e;
        }
        .card .syntax {
            background-color: #f0f0f0;
            padding: 8px;
            border-radius: 4px;
            font-family: monospace;
            overflow-x: auto;
        }
        .card .returns {
            font-style: italic;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <!-- Date/Time Functions -->
        <div class="card">
            <h3>date()</h3>
            <p>Formats a local date and time.</p>
            <div class="syntax">string date(string $format [, int $timestamp = time()])</div>
            <div class="returns">Returns: Formatted date string</div>
        </div>

        <div class="card">
            <h3>time()</h3>
            <p>Returns the current Unix timestamp.</p>
            <div class="syntax">int time(void)</div>
            <div class="returns">Returns: Current timestamp</div>
        </div>

        <div class="card">
            <h3>strtotime()</h3>
            <p>Parses an English textual datetime into a Unix timestamp.</p>
            <div class="syntax">int strtotime(string $datetime [, int $baseTimestamp = time()])</div>
            <div class="returns">Returns: Timestamp or FALSE on failure</div>
        </div>

        <div class="card">
            <h3>mktime()</h3>
            <p>Returns the Unix timestamp for a date.</p>
            <div class="syntax">int mktime([int $hour = date("H") [, int $minute = date("i") [, int $second = date("s") [, int $month = date("n") [, int $day = date("j") [, int $year = date("Y") [, int $is_dst = -1]]]]]]])</div>
            <div class="returns">Returns: Timestamp or FALSE on failure</div>
        </div>

        <div class="card">
            <h3>gmdate()</h3>
            <p>Formats a GMT/UTC date and time.</p>
            <div class="syntax">string gmdate(string $format [, int $timestamp = time()])</div>
            <div class="returns">Returns: Formatted GMT date</div>
        </div>

        <div class="card">
            <h3>idate()</h3>
            <p>Formats a local time/date as integer.</p>
            <div class="syntax">int idate(string $format [, int $timestamp = time()])</div>
            <div class="returns">Returns: Integer value of date component</div>
        </div>

        <div class="card">
            <h3>getdate()</h3>
            <p>Returns an associative array with date/time information.</p>
            <div class="syntax">array getdate([int $timestamp = time()])</div>
            <div class="returns">Returns: Associative array of date components</div>
        </div>

        <div class="card">
            <h3>localtime()</h3>
            <p>Returns the local time as an array.</p>
            <div class="syntax">array localtime([int $timestamp = time() [, bool $is_associative = false]])</div>
            <div class="returns">Returns: Array of time components</div>
        </div>

        <div class="card">
            <h3>microtime()</h3>
            <p>Returns the current Unix timestamp with microseconds.</p>
            <div class="syntax">mixed microtime([bool $as_float = false])</div>
            <div class="returns">Returns: String or float with microseconds</div>
        </div>

        <div class="card">
            <h3>date_create()</h3>
            <p>Creates a new DateTime object.</p>
            <div class="syntax">DateTime|false date_create([string $datetime = "now" [, DateTimeZone $timezone = null]])</div>
            <div class="returns">Returns: DateTime object or FALSE on failure</div>
        </div>

        <div class="card">
            <h3>date_diff()</h3>
            <p>Calculates the difference between two DateTime objects.</p>
            <div class="syntax">DateInterval date_diff(DateTimeInterface $base, DateTimeInterface $target [, bool $absolute = false])</div>
            <div class="returns">Returns: DateInterval object with the difference</div>
        </div>

        <div class="card">
            <h3>date_add()</h3>
            <p>Adds an amount of days, months, years, hours, minutes and seconds to a DateTime object.</p>
            <div class="syntax">DateTime date_add(DateTime $object, DateInterval $interval)</div>
            <div class="returns">Returns: Modified DateTime object</div>
        </div>

        <div class="card">
            <h3>date_sub()</h3>
            <p>Subtracts an amount of days, months, years, hours, minutes and seconds from a DateTime object.</p>
            <div class="syntax">DateTime date_sub(DateTime $object, DateInterval $interval)</div>
            <div class="returns">Returns: Modified DateTime object</div>
        </div>

        <div class="card">
            <h3>date_timezone_get()</h3>
            <p>Returns the timezone of the given DateTime object.</p>
            <div class="syntax">DateTimeZone|false date_timezone_get(DateTimeInterface $object)</div>
            <div class="returns">Returns: DateTimeZone object or FALSE on failure</div>
        </div>

        <div class="card">
            <h3>date_timezone_set()</h3>
            <p>Sets the timezone for a DateTime object.</p>
            <div class="syntax">DateTime date_timezone_set(DateTime $object, DateTimeZone $timezone)</div>
            <div class="returns">Returns: DateTime object</div>
        </div>

        <div class="card">
            <h3>date_format()</h3>
            <p>Formats a DateTime object as a string.</p>
            <div class="syntax">string date_format(DateTimeInterface $object, string $format)</div>
            <div class="returns">Returns: Formatted date string</div>
        </div>

        <div class="card">
            <h3>checkdate()</h3>
            <p>Validates a Gregorian date.</p>
            <div class="syntax">bool checkdate(int $month, int $day, int $year)</div>
            <div class="returns">Returns: TRUE if valid, FALSE otherwise</div>
        </div>

        <div class="card">
            <h3>date_default_timezone_get()</h3>
            <p>Gets the default timezone used by all date/time functions.</p>
            <div class="syntax">string date_default_timezone_get(void)</div>
            <div class="returns">Returns: Timezone identifier</div>
        </div>

        <div class="card">
            <h3>date_default_timezone_set()</h3>
            <p>Sets the default timezone used by all date/time functions.</p>
            <div class="syntax">bool date_default_timezone_set(string $timezone)</div>
            <div class="returns">Returns: TRUE on success, FALSE on failure</div>
        </div>

        <div class="card">
            <h3>date_parse()</h3>
            <p>Returns associative array with detailed info about given date.</p>
            <div class="syntax">array date_parse(string $date)</div>
            <div class="returns">Returns: Associative array with parsed date info</div>
        </div>

        <div class="card">
            <h3>date_parse_from_format()</h3>
            <p>Parses a date string according to a specified format.</p>
            <div class="syntax">array date_parse_from_format(string $format, string $date)</div>
            <div class="returns">Returns: Associative array with parsed date info</div>
        </div>

        <div class="card">
            <h3>date_sun_info()</h3>
            <p>Returns an array with information about sunset/sunrise and twilight begin/end.</p>
            <div class="syntax">array date_sun_info(int $timestamp, float $latitude, float $longitude)</div>
            <div class="returns">Returns: Array with sunrise/sunset information</div>
        </div>

        <div class="card">
            <h3>date_sunrise()</h3>
            <p>Returns time of sunrise for a given day and location.</p>
            <div class="syntax">mixed date_sunrise(int $timestamp [, int $format = SUNFUNCS_RET_STRING [, float $latitude = ini_get("date.default_latitude") [, float $longitude = ini_get("date.default_longitude") [, float $zenith = ini_get("date.sunrise_zenith") [, float $utc_offset = 0]]]]])</div>
            <div class="returns">Returns: Sunrise time in specified format</div>
        </div>

        <div class="card">
            <h3>date_sunset()</h3>
            <p>Returns time of sunset for a given day and location.</p>
            <div class="syntax">mixed date_sunset(int $timestamp [, int $format = SUNFUNCS_RET_STRING [, float $latitude = ini_get("date.default_latitude") [, float $longitude = ini_get("date.default_longitude") [, float $zenith = ini_get("date.sunset_zenith") [, float $utc_offset = 0]]]]])</div>
            <div class="returns">Returns: Sunset time in specified format</div>
        </div>

        <div class="card">
            <h3>strftime()</h3>
            <p>Formats a local time/date according to locale settings (deprecated in PHP 8.1).</p>
            <div class="syntax">string strftime(string $format [, int $timestamp = time()])</div>
            <div class="returns">Returns: Formatted date string</div>
        </div>

        <div class="card">
            <h3>gmstrftime()</h3>
            <p>Formats a GMT/UTC time/date according to locale settings (deprecated in PHP 8.1).</p>
            <div class="syntax">string gmstrftime(string $format [, int $timestamp = time()])</div>
            <div class="returns">Returns: Formatted GMT date string</div>
        </div>
    </div>
</body>
</html>