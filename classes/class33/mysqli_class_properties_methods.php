<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .ripple-bg {
  filter: brightness(0.2); /* Darker image without affecting ripple */
}
    </style>
        
</head>
<body>
    <a href="ripple.php">Water ripple tutorial</a>
<div id="ripple-bg" style="width:100%; height:100vh; background-image:url('water2-removebg-preview.png'); background-size:cover;">
    <marquee behavior="scroll" direction="">
        you will get affected_rows from MYSQLI class properties BUT num_rows from MYSQLI_RESULT class
    </marquee>
    <h3>MYSQLI class properties and methods</h3>
<ul>
    <li>Properties:
        <ul>
            <li>connect_errno: Returns the error code for the most recent connection attempt.</li>
            <li>connect_error: Returns a string description of the last connect error.</li>
            <li><mark>affected_rows</mark>: Returns the number of affected rows in the previous operation.</li>
            <li><mark>insert_id</mark>: Returns the ID of the last inserted row.</li>
            <li>errno: Returns the error code for the most recent function call.</li>
            <li>error: Returns a string description of the last error.</li>
            <li>host_info: Returns a string representing the type of connection.</li>
            <li>server_info: Returns the MySQL server version.</li>
        </ul>
    </li>
    <li>Methods:
        <ul>
            <li>connect(): Establishes a new connection to the MySQL server.</li>
            <li><mark>query()</mark>: Executes a query against the database.</li>
            <li>prepare(): Prepares an SQL statement for execution.</li>
            <li><mark>real_escape_string()</mark>: Escapes special characters in a string for use in an SQL statement.</li>
            <li><mark>close()</mark>: Closes the database connection.</li>
            <li>begin_transaction(): Starts a new transaction.</li>
            <li>commit(): Commits the current transaction.</li>
            <li>rollback(): Rolls back the current transaction.</li>
            <li><mark>set_charset: sets the database character set(normally UTF8MB4)</mark></li>
        </ul>
    </li>
</ul>
<h3>The mysqli_result class properties and methods</h3>
<ul>
    <li>Properties:
        <ul>
            <li><mark>num_rows</mark>: Returns the number of rows in the result set.</li>
            <li>num_fields: Returns the number of fields in the result set.</li>
        </ul>
    </li>
    <li>Methods:
        <ul>
            <li>fetch_assoc(): Returns an associative array of the next row from the result set.</li>
            <li>fetch_array(): Returns an associative+numeric array of the next row from the result set.</li>
            <li>fetch_object(): Returns an object of the next row from the result set.</li>
            <li>fetch_row(): Returns an numeric array of the next row from the result set.</li>
            <li><mark>free(): Releases the memory associated with a result</mark></li>
        </ul>
    </li>
</ul>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/sirxemic/jquery.ripples/dist/jquery.ripples.min.js"></script>
<script>
  $('#ripple-bg').ripples({
    resolution: 512,
    dropRadius: 20, // px
    perturbance: 0.04, // 0-1
  });
</script>

</body>
</html>