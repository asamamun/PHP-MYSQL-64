<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            margin: 0 auto;
            max-width: 1200px;
            padding: 20px;
        }
    /* Start the counter for h3 elements */
    body {
      counter-reset: h3-counter; /* Initializes the counter */
    }

    /* Apply the counter to all h3 elements */
    h3 {
      counter-increment: h3-counter; /* Increment the counter for each h3 */
    }

    /* Add the counter value before the content of each h3 */
    h3::before {
      content: counter(h3-counter, decimal-leading-zero) ". "; /* Display the counter value */
      font-weight: bold; /* Optional: make the number bold */
    }
  </style>
</head>
<body>
    <div class="container">
<div dir="auto" class="message-bubble rounded-3xl prose dark:prose-invert break-words text-primary min-h-7 prose-p:opacity-95 prose-strong:opacity-100 w-full max-w-none"><p dir="auto" class="break-words" style="white-space: pre-wrap;">PHP provides a rich set of built-in array functions for manipulating and working with arrays. Below is a comprehensive list of PHP's built-in array functions as of the latest versions (up to PHP 8.3, which aligns with knowledge available through April 2025). These functions are grouped by their primary purpose for clarity.</p>
<h3 dir="auto" class=""><a href="images/Array Creation and Conversion.png" target="_blank">Array Creation and Conversion</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array()</span> - Creates an array (alternative syntax: <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">[]</span>).</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_combine()</span> - Creates an array by using one array for keys and another for values.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_fill()</span> - Fills an array with a specified value.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_fill_keys()</span> - Fills an array with values, using specified keys.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_keys()</span> - Returns all the keys or a subset of keys from an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_values()</span> - Returns all the values of an array as a new indexed array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">range()</span> - Creates an array containing a range of elements (e.g., numbers or letters).</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Modification.png">Array Modification</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_push()</span> - Adds one or more elements to the end of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_pop()</span> - Removes and returns the last element of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_shift()</span> - Removes and returns the first element of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_unshift()</span> - Adds one or more elements to the beginning of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_splice()</span> - Removes a portion of the array and replaces it with something else.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_pad()</span> - Pads an array to a specified length with a value.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_reverse()</span> - Returns an array with elements in reverse order.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_flip()</span> - Exchanges all keys with their associated values in an array.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Sorting.png">Array Sorting</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">sort()</span> - Sorts an array in ascending order.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">rsort()</span> - Sorts an array in descending order.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">asort()</span> - Sorts an array in ascending order, maintaining key association.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">arsort()</span> - Sorts an array in descending order, maintaining key association.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">ksort()</span> - Sorts an array by key in ascending order.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">krsort()</span> - Sorts an array by key in descending order.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">usort()</span> - Sorts an array using a user-defined comparison function.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">uasort()</span> - Sorts an array with a user-defined comparison function, maintaining key association.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">uksort()</span> - Sorts an array by keys using a user-defined comparison function.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">natsort()</span> - Sorts an array using a "natural order" algorithm.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">natcasesort()</span> - Case-insensitive "natural order" sort.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_multisort()</span> - Sorts multiple or multi-dimensional arrays.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Searching and Filtering.png">Array Searching and Filtering</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">in_array()</span> - Checks if a value exists in an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_search()</span> - Searches the array for a value and returns the corresponding key.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_key_exists()</span> - Checks if a specified key exists in an array (alias: <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">key_exists()</span>).</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_filter()</span> - Filters elements of an array using a callback function.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_unique()</span> - Removes duplicate values from an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_intersect()</span> - Computes the intersection of arrays.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_intersect_key()</span> - Computes the intersection of arrays using keys for comparison.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_intersect_assoc()</span> - Computes the intersection of arrays with key preservation.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_uintersect()</span> - Computes the intersection of arrays with a user-defined comparison.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_diff()</span> - Computes the difference of arrays.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_diff_key()</span> - Computes the difference of arrays using keys.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_diff_assoc()</span> - Computes the difference of arrays with key preservation.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_udiff()</span> - Computes the difference of arrays with a user-defined comparison.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Iteration and Mapping.png">Array Iteration and Mapping</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_map()</span> - Applies a callback to the elements of one or more arrays.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_walk()</span> - Applies a user-defined function to each element of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_walk_recursive()</span> - Applies a user-defined function recursively to each element of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_reduce()</span> - Iteratively reduces the array to a single value using a callback.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Information.png">Array Information</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">count()</span> - Counts the number of elements in an array (alias: <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">sizeof()</span>).</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_count_values()</span> - Counts the frequency of each value in an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_key_first()</span> - Gets the first key of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_key_last()</span> - Gets the last key of an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_column()</span> - Returns the values from a single column of an array of arrays.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_rand()</span> - Picks one or more random keys from an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_sum()</span> - Calculates the sum of values in an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_product()</span> - Calculates the product of values in an array.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Merging and Splitting.png">Array Merging and Splitting</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_merge()</span> - Merges one or more arrays.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_merge_recursive()</span> - Merges one or more arrays recursively.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_replace()</span> - Replaces elements from one array into another.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_replace_recursive()</span> - Replaces elements from one array into another recursively.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_chunk()</span> - Splits an array into chunks.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_slice()</span> - Extracts a slice of an array.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Array Comparison.png">Array Comparison</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_diff_uassoc()</span> - Computes the difference of arrays with additional index check using a callback.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_diff_ukey()</span> - Computes the difference of arrays using keys and a callback.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_intersect_uassoc()</span> - Computes the intersection of arrays with additional index check using a callback.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_intersect_ukey()</span> - Computes the intersection of arrays using keys and a callback.</li>
</ul>
<h3 dir="auto" class=""><a href="images/Miscellaneous.png">Miscellaneous</a></h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_change_key_case()</span> - Changes the case of all keys in an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_is_list()</span> - Checks if an array has sequential numeric keys starting from 0.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">extract()</span> - Imports variables into the current symbol table from an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">compact()</span> - Creates an array containing variables and their values.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">current()</span> - Returns the current element in an array.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">next()</span> - Advances the internal pointer of an array and returns the element.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">prev()</span> - Rewinds the internal pointer of an array and returns the element.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">end()</span> - Sets the internal pointer to the last element and returns it.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">key()</span> - Fetches the key of the current element.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">pos()</span> - Alias of <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">current()</span>.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">reset()</span> - Sets the internal pointer to the first element and returns it.</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">each()</span> - Returns the current key and value pair (deprecated as of PHP 7.2, removed in PHP 8.0).</li>
<li class="break-words"><span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">list()</span> - Assigns variables as if they were an array (not strictly an array function but commonly used with arrays).</li>
</ul>
<h3 dir="auto" class="">Notes</h3>
<ul dir="auto" class="marker:text-secondary">
<li class="break-words">Some functions (e.g., <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">each()</span>) are deprecated or removed in newer PHP versions, so check compatibility with your PHP version.</li>
<li class="break-words">Many of these functions support optional parameters (e.g., flags like <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">SORT_NATURAL</span> or callbacks) to customize their behavior—refer to the official PHP documentation for details.</li>
<li class="break-words">Functions like <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_map()</span> and <span class="text-sm px-1 rounded-sm !font-mono bg-sunset/10 text-rust dark:bg-dawn/10 dark:text-dawn">array_filter()</span> are especially powerful when combined with anonymous functions (closures).</li>
</ul>
<p dir="auto" class="break-words" style="white-space: pre-wrap;">This list covers the core built-in array functions in PHP. If you need examples or details on a specific function, feel free to ask!</p></div>
</div>
<script>
    
    // Select all anchor tags on the page
    const anchorTags = document.querySelectorAll('a');
    
    // Loop through each anchor and add target="_blank"
    anchorTags.forEach(anchor => {
      anchor.setAttribute('target', '_blank');
    });
  
</script>
</body>
</html>