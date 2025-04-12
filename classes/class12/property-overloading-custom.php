<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Property Overloading in PHP</title>
    <style>
        .card {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 700px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            background: #f8f9fa;
            border-left: 5px solid #6c5ce7;
        }
        
        .card-title {
            color: #2d3436;
            margin-top: 0;
            font-size: 1.8em;
            border-bottom: 2px solid #dfe6e9;
            padding-bottom: 10px;
        }
        
        .code-block {
            background: #2d3436;
            color: #f8f8f2;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Fira Code', monospace;
            margin: 15px 0;
            font-size: 0.95em;
        }
        
        .keyword { color: #ff7675; }
        .property { color: #55efc4; }
        .method { color: #74b9ff; }
        .string { color: #fdcb6e; }
        .comment { color: #636e72; }
        .type { color: #a29bfe; }
        
        .note {
            background: #fff9e6;
            padding: 12px;
            border-left: 4px solid #ffeaa7;
            margin: 20px 0;
            font-size: 0.9em;
            border-radius: 4px;
        }
        
        .section-title {
            color: #6c5ce7;
            margin-top: 25px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1 class="card-title">Custom Property Overloading in PHP</h1>
        
        <p>Property overloading allows dynamic handling of inaccessible properties using magic methods. Here's an advanced implementation with validation and type safety.</p>
        
        <h3 class="section-title">Advanced Property Overloading Class</h3>
        
        <div class="code-block">
<span class="comment">/**
 * SmartContainer with custom property overloading
 * Features type validation, read-only properties, and property aliases
 */</span>
<span class="keyword">class</span> <span class="method">SmartContainer</span> {
    <span class="keyword">private</span> <span class="property">$data</span> = [];
    <span class="keyword">private</span> <span class="property">$readOnly</span> = [];
    <span class="keyword">private</span> <span class="property">$propertyTypes</span> = [];
    <span class="keyword">private</span> <span class="property">$aliases</span> = [];
    
    <span class="comment">// Set property with type checking</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">__set</span>(<span class="type">string</span> <span class="property">$name</span>, <span class="property">$value</span>): <span class="type">void</span> {
        <span class="property">$originalName</span> = <span class="property">$this</span>-><span class="method">resolveAlias</span>(<span class="property">$name</span>);
        
        <span class="keyword">if</span> (<span class="keyword">isset</span>(<span class="property">$this</span>-><span class="property">readOnly</span>[<span class="property">$originalName</span>])) {
            <span class="keyword">throw</span> <span class="keyword">new</span> <span class="method">RuntimeException</span>(<span class="string">"Property {$originalName} is read-only"</span>);
        }
        
        <span class="keyword">if</span> (<span class="keyword">isset</span>(<span class="property">$this</span>-><span class="property">propertyTypes</span>[<span class="property">$originalName</span>])) {
            <span class="property">$expectedType</span> = <span class="property">$this</span>-><span class="property">propertyTypes</span>[<span class="property">$originalName</span>];
            <span class="property">$actualType</span> = <span class="method">gettype</span>(<span class="property">$value</span>);
            
            <span class="keyword">if</span> (<span class="property">$actualType</span> !== <span class="property">$expectedType</span> && !(<span class="property">$expectedType</span> === <span class="string">'float'</span> && <span class="method">is_int</span>(<span class="property">$value</span>))) {
                <span class="keyword">throw</span> <span class="keyword">new</span> <span class="method">InvalidArgumentException</span>(
                    <span class="string">"Property {$originalName} must be of type {$expectedType}, {$actualType} given"</span>
                );
            }
        }
        
        <span class="property">$this</span>-><span class="property">data</span>[<span class="property">$originalName</span>] = <span class="property">$value</span>;
    }
    
    <span class="comment">// Get property with alias support</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">__get</span>(<span class="type">string</span> <span class="property">$name</span>) {
        <span class="property">$originalName</span> = <span class="property">$this</span>-><span class="method">resolveAlias</span>(<span class="property">$name</span>);
        
        <span class="keyword">if</span> (!<span class="keyword">array_key_exists</span>(<span class="property">$originalName</span>, <span class="property">$this</span>-><span class="property">data</span>)) {
            <span class="keyword">throw</span> <span class="keyword">new</span> <span class="method">RuntimeException</span>(<span class="string">"Property {$originalName} not found"</span>);
        }
        
        <span class="keyword">return</span> <span class="property">$this</span>-><span class="property">data</span>[<span class="property">$originalName</span>];
    }
    
    <span class="comment">// Check property existence</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">__isset</span>(<span class="type">string</span> <span class="property">$name</span>): <span class="type">bool</span> {
        <span class="keyword">return</span> <span class="keyword">isset</span>(<span class="property">$this</span>-><span class="property">data</span>[<span class="property">$this</span>-><span class="method">resolveAlias</span>(<span class="property">$name</span>)]);
    }
    
    <span class="comment">// Unset property</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">__unset</span>(<span class="type">string</span> <span class="property">$name</span>): <span class="type">void</span> {
        <span class="property">$originalName</span> = <span class="property">$this</span>-><span class="method">resolveAlias</span>(<span class="property">$name</span>);
        
        <span class="keyword">if</span> (<span class="keyword">isset</span>(<span class="property">$this</span>-><span class="property">readOnly</span>[<span class="property">$originalName</span>])) {
            <span class="keyword">throw</span> <span class="keyword">new</span> <span class="method">RuntimeException</span>(<span class="string">"Cannot unset read-only property {$originalName}"</span>);
        }
        
        <span class="keyword">unset</span>(<span class="property">$this</span>-><span class="property">data</span>[<span class="property">$originalName</span>]);
    }
    
    <span class="comment">// Define property type</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">defineType</span>(<span class="type">string</span> <span class="property">$name</span>, <span class="type">string</span> <span class="property">$type</span>): <span class="type">void</span> {
        <span class="property">$this</span>-><span class="property">propertyTypes</span>[<span class="property">$name</span>] = <span class="property">$type</span>;
    }
    
    <span class="comment">// Mark property as read-only</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">markReadOnly</span>(<span class="type">string</span> <span class="property">$name</span>): <span class="type">void</span> {
        <span class="property">$this</span>-><span class="property">readOnly</span>[<span class="property">$name</span>] = <span class="keyword">true</span>;
    }
    
    <span class="comment">// Add property alias</span>
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">addAlias</span>(<span class="type">string</span> <span class="property">$original</span>, <span class="type">string</span> <span class="property">$alias</span>): <span class="type">void</span> {
        <span class="property">$this</span>-><span class="property">aliases</span>[<span class="property">$alias</span>] = <span class="property">$original</span>;
    }
    
    <span class="comment">// Resolve property alias to original name</span>
    <span class="keyword">private</span> <span class="keyword">function</span> <span class="method">resolveAlias</span>(<span class="type">string</span> <span class="property">$name</span>): <span class="type">string</span> {
        <span class="keyword">return</span> <span class="property">$this</span>-><span class="property">aliases</span>[<span class="property">$name</span>] ?? <span class="property">$name</span>;
    }
}
</div>

        <h3 class="section-title">Usage Example</h3>
        
        <div class="code-block">
<span class="comment">// Create container instance</span>
<span class="property">$container</span> = <span class="keyword">new</span> <span class="method">SmartContainer</span>();

<span class="comment">// Define property types</span>
<span class="property">$container</span>-><span class="method">defineType</span>(<span class="string">'username'</span>, <span class="string">'string'</span>);
<span class="property">$container</span>-><span class="method">defineType</span>(<span class="string">'age'</span>, <span class="string">'integer'</span>);
<span class="property">$container</span>-><span class="method">defineType</span>(<span class="string">'price'</span>, <span class="string">'float'</span>);

<span class="comment">// Set values with type checking</span>
<span class="property">$container</span>-><span class="property">username</span> = <span class="string">'john_doe'</span>; <span class="comment">// Valid</span>
<span class="property">$container</span>-><span class="property">age</span> = 30;         <span class="comment">// Valid</span>

<span class="comment">// Add property alias</span>
<span class="property">$container</span>-><span class="method">addAlias</span>(<span class="string">'username'</span>, <span class="string">'user'</span>);

<span class="comment">// Access through alias</span>
<span class="keyword">echo</span> <span class="property">$container</span>-><span class="property">user</span>; <span class="comment">// Outputs: john_doe</span>

<span class="comment">// Mark as read-only</span>
<span class="property">$container</span>-><span class="method">markReadOnly</span>(<span class="string">'username'</span>);

<span class="comment">// This will throw an exception:</span>
<span class="comment">// $container->username = 'new_name';</span>
</div>

        <div class="note">
            <strong>Advanced Features:</strong>
            <ul>
                <li>Type validation for properties</li>
                <li>Read-only property support</li>
                <li>Property aliases (multiple names for same property)</li>
                <li>Proper error handling with exceptions</li>
                <li>Type flexibility (allows integers for float properties)</li>
            </ul>
        </div>
    </div>
</body>
</html>