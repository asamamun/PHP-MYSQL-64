<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Static Classes & Methods</title>
    <style>
        .card {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 700px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background: #f8f9fa;
            border-left: 5px solid #4CAF50;
        }
        
        h1, h2 {
            color: #2c3e50;
        }
        
        .code-block {
            background: #2d2d2d;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Consolas', monospace;
            margin: 15px 0;
        }
        
        .keyword { color: #f92672; }
        .class { color: #a6e22e; }
        .method { color: #66d9ef; }
        .property { color: #fd971f; }
        .string { color: #e6db74; }
        .comment { color: #75715e; }
        
        .note {
            background: #fff3cd;
            padding: 10px;
            border-left: 3px solid #ffc107;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Static Classes & Methods in PHP</h1>
        
        <h2>Static Methods</h2>
        <p>Static methods belong to the class itself rather than any object instance.</p>
        
        <div class="code-block">
<span class="keyword">class</span> <span class="class">MathUtils</span> {
    <span class="comment">// Static method</span> <br>
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="keyword">function</span> <span class="method">add</span>(<span class="keyword">int</span> <span class="property">$a</span>, <span class="keyword">int</span> <span class="property">$b</span>): <span class="keyword">int</span> { <br>
        <span class="keyword">return</span> <span class="property">$a</span> + <span class="property">$b</span>;
    }<br>
    
    <span class="comment">// Regular instance method</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">subtract</span>(<span class="keyword">int</span> <span class="property">$a</span>, <span class="keyword">int</span> <span class="property">$b</span>): <span class="keyword">int</span> { <br>
        <span class="keyword">return</span> <span class="property">$a</span> - <span class="property">$b</span>;
    }<br>
}<br>

<span class="comment">// Calling static method (no instance needed)</span> <br>
<span class="keyword">echo</span> <span class="class">MathUtils</span>::<span class="method">add</span>(<span class="number">5</span>, <span class="number">3</span>); <span class="comment">// Output: 8</span> <br>

<span class="comment">// Calling instance method (requires object)</span> <br>
<span class="property">$math</span> = <span class="keyword">new</span> <span class="class">MathUtils</span>(); <br>
<span class="keyword">echo</span> <span class="property">$math</span>-><span class="method">subtract</span>(<span class="number">5</span>, <span class="number">3</span>); <span class="comment">// Output: 2</span>
        </div>
        
        <div class="note">
            <strong>Note:</strong> Static methods are called using <code>::</code> (scope resolution operator) instead of <code>-></code>.
        </div>
        
        <h2>Static Properties</h2>
        <p>Static properties maintain their value across all instances of a class.</p>
        
        <div class="code-block">
<span class="keyword">class</span> <span class="class">Counter</span> {
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="property">$count</span> = <span class="number">0</span>; <br>
    
    <span class="keyword">public</span> <span class="keyword">function</span> __construct() {
        <span class="keyword">self</span>::<span class="property">$count</span>++;
    } <br>
    
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="keyword">function</span> <span class="method">getCount</span>(): <span class="keyword">int</span> {
        <span class="keyword">return</span> <span class="keyword">self</span>::<span class="property">$count</span>;
    } <br>
} <br>

<span class="comment">// Create instances</span> <br>
<span class="property">$a</span> = <span class="keyword">new</span> <span class="class">Counter</span>();<br>
<span class="property">$b</span> = <span class="keyword">new</span> <span class="class">Counter</span>();<br>
<span class="property">$c</span> = <span class="keyword">new</span> <span class="class">Counter</span>();<br>

<span class="comment">// Access static property</span> <br>
<span class="keyword">echo</span> <span class="class">Counter</span>::<span class="property">$count</span>; <span class="comment">// Output: 3</span> <br>

<span class="comment">// Call static method</span> <br>
<span class="keyword">echo</span> <span class="class">Counter</span>::<span class="method">getCount</span>(); <span class="comment">// Output: 3</span>
        </div>
        
        <h2>Static Classes</h2>
        <p>PHP doesn't have true static classes, but you can emulate them:</p>
        
        <div class="code-block">
<span class="keyword">final</span> <span class="keyword">class</span> <span class="class">StringUtils</span> { <br>
    <span class="comment">// Private constructor prevents instantiation</span> <br>
    <span class="keyword">private</span> <span class="keyword">function</span> __construct() {} <br>
    
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="keyword">function</span> <span class="method">toUpper</span>(<span class="keyword">string</span> <span class="property">$str</span>): <span class="keyword">string</span> { <br>
        <span class="keyword">return</span> strtoupper(<span class="property">$str</span>);
    } <br>
    
    <span class="keyword">public</span> <span class="keyword">static</span> <span class="keyword">function</span> <span class="method">toLower</span>(<span class="keyword">string</span> <span class="property">$str</span>): <span class="keyword">string</span> { <br>
        <span class="keyword">return</span> strtolower(<span class="property">$str</span>);
    } <br>
} <br>

<span class="comment">// Usage</span> <br>
<span class="keyword">echo</span> <span class="class">StringUtils</span>::<span class="method">toUpper</span>(<span class="string">'hello'</span>); <span class="comment">// Output: HELLO</span> <br>
<span class="keyword">echo</span> <span class="class">StringUtils</span>::<span class="method">toLower</span>(<span class="string">'WORLD'</span>); <span class="comment">// Output: world</span> <br>

<span class="comment">// This would cause an error:</span>
<span class="comment">// $utils = new StringUtils(); // Error: Call to private constructor</span>
        </div>
        
        <div class="note">
            <strong>Key Points:</strong>
            <ul>
                <li>Static methods/properties belong to the class, not instances</li>
                <li>Use <code>self::</code> to access static members within the class</li>
                <li>Static properties maintain their value across all instances</li>
                <li>Emulate static classes with <code>final</code> class + private constructor</li>
            </ul>
        </div>
    </div>
</body>
</html>