<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP String Functions with Examples</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
        .card { background: white; padding: 20px; margin: 20px auto; width: 80%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #333; color: white; }
    </style>
</head>
<body>
    <div class="card">
        <h2>PHP String Functions with Examples</h2>
        <table>
            <tr>
                <th>Function</th>
                <th>Description</th>
                <th>Example</th>
                <th>Return Value</th>
            </tr>
            <tr>
                <td><strong>strlen()</strong></td>
                <td>Returns the length of a string</td>
                <td><code>echo strlen("Hello World");</code></td>
                <td>11</td>
            </tr>
            <tr>
                <td><strong>strrev()</strong></td>
                <td>Reverses a string</td>
                <td><code>echo strrev("Hello");</code></td>
                <td>"olleH"</td>
            </tr>
            <tr>
                <td><strong>strpos()</strong></td>
                <td>Finds the position of a substring</td>
                <td><code>echo strpos("Hello World", "World");</code></td>
                <td>6</td>
            </tr>
            <tr>
                <td><strong>strrpos()</strong></td>
                <td>Finds the position of the last occurrence of a substring</td>
                <td><code>echo strrpos("Hello World", "World");</code></td>
                <td>6</td>
            </tr>
            <tr>
                <td><strong>str_replace()</strong></td>
                <td>Replaces text in a string</td>
                <td><code>echo str_replace("World", "PHP", "Hello World");</code></td>
                <td>"Hello PHP"</td>
            </tr>
            <tr>
                <td><strong>substr()</strong></td>
                <td>Extracts part of a string</td>
                <td><code>echo substr("Hello World", 0, 5);</code></td>
                <td>"Hello"</td>
            </tr>
            <tr>
                <td><strong>trim()</strong></td>
                <td>Removes whitespace</td>
                <td><code>echo trim(" Hello World ");</code></td>
                <td>"Hello World"</td>
            </tr>
            <tr>
                <td><strong>strtolower()</strong></td>
                <td>Converts to lowercase</td>
                <td><code>echo strtolower("HELLO");</code></td>
                <td>"hello"</td>
            </tr>
            <tr>
                <td><strong>strtoupper()</strong></td>
                <td>Converts to uppercase</td>
                <td><code>echo strtoupper("hello");</code></td>
                <td>"HELLO"</td>
            </tr>
            <tr>
                <td><strong>explode()</strong></td>
                <td>Splits a string into an array</td>
                <td><code>print_r(explode(" ", "Hello World"));</code></td>
                <td>Array(["Hello", "World"])</td>
            </tr>
            <tr>
                <td><strong>implode()</strong></td>
                <td>Joins array elements into a string</td>
                <td><code>echo implode("-", ["Hello", "World"]);</code></td>
                <td>"Hello-World"</td>
            </tr>
            <tr>
                <td><strong>ucfirst()</strong></td>
                <td>Capitalizes the first letter of a string</td>
                <td><code>echo ucfirst("hello world");</code></td>
                <td>"Hello world"</td>
            </tr>
            <tr>
                <td><strong>lcfirst()</strong></td>
                <td>Lowercases the first letter of a string</td>
                <td><code>echo lcfirst("Hello World");</code></td>
                <td><?php echo lcfirst("Hello World"); ?></td>
            </tr>
            <tr>
                <td><strong>ucwords()</strong></td>
                <td>Capitalizes the first letter of each word in a string</td>
                <td><code>echo ucwords("hello world");</code></td>
                <td>"Hello World"</td>
            </tr>
            <tr>
                <td><strong>strspn()</strong></td></td>
                <td>Counts the number of characters in a string that are in another string. if not found returns 0</td>
                <td><code>echo strspn("Hello World", "l");</code></td>
                <td><?php echo strspn("Hello World", "eoH"); ?></td>
            </tr>
            <tr>
                <td><strong>strcspn()</strong></td>
                <td>Counts the number of characters in a string that are not in another string</td>
                <td><code>echo strcspn("Hello World", "eoH");</code></td>
                <td><?php echo strcspn("13Hello45 World", "eoH"); ?></td>
            </tr>
            <tr>
                <td><strong>nl2br()</strong></td>
                <td>Converts newlines to HTML line breaks</td>
                <td><code>echo nl2br("Hello\nWorld");</code></td>
                <td>"Hello<br>World"</td>
            </tr>
            <tr>
                <td><strong>htmlentities()</strong></td>
                <td>Converts special characters to HTML entities</td>
                <td><code>echo htmlentities("Hello & World");</code></td>
                <td>
                    <?php echo htmlentities("<h3>Hello &   World</h3>"); ?>
                    <?php echo "<h3>Hello & World</h3>"; ?>
                </td>
            </tr>
            <tr>
                <td><strong>htmlspecialchars()</strong></td>
                <td>Converts special characters to HTML entities</td>
                <td><code>echo htmlspecialchars("Hello & World");</code></td>
                <td>
                    <?php echo htmlspecialchars("<h3>Hello &   World</h3>"); ?>
                    
                </td>
            </tr>
            <tr>
                <td><strong>strtr()</strong></td>
                <td>Replaces characters in a string</td>
                <td><code>echo strtr("Hello World", "l", "L");</code></td>
                <td><?php echo strtr("Hello World", "l", "*"); ?></td>
            </tr>
            <tr>
                <td><strong>strstr()</strong></td>
                <td>Finds the first occurrence of a substring in a string</td>
                <td><code>echo strstr("Hello World", "World");</code></td>
                <td>"World"</td>
            </tr>
            <tr>
                <td><strong>strip_tags()</strong></td>
                <td>Removes HTML tags from a string</td>
                <td><code>echo strip_tags("<h3>Hello &   World</h3>");</code></td>
                <td><?php echo strip_tags("<h3>Hello &   World</h3>"); ?></td>
            </tr>
            <tr>
                <td><strong>str_pad()</strong></td>
                <td>Adds padding to a string</td>
                <td><code>echo str_pad("Hello", 10, "*");</code></td>
                <td>"Hello*****"</td>
            </tr>
        </table>
    </div>
</body>
</html>