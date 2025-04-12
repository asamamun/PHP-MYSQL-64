<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Interfaces vs Abstract Classes</title>
    <style>
        .card {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            background: #f8f9fa;
        }
        
        .tab-container {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background: #e9ecef;
            border: 1px solid #ddd;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
        }
        
        .tab.active {
            background: #fff;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
            font-weight: bold;
        }
        
        .tab-content {
            display: none;
            padding: 15px;
            background: #fff;
            border-radius: 0 0 5px 5px;
        }
        
        .tab-content.active {
            display: block;
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
        
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .comparison-table th, .comparison-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        
        .comparison-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>PHP Interfaces vs Abstract Classes</h1>
        
        <div class="tab-container">
            <div class="tab active" onclick="openTab(event, 'interfaces')">Interfaces</div>
            <div class="tab" onclick="openTab(event, 'abstract')">Abstract Classes</div>
            <div class="tab" onclick="openTab(event, 'comparison')">Comparison</div>
            <div class="tab" onclick="openTab(event, 'example')">Complete Example</div>
        </div>
        
        <div id="interfaces" class="tab-content active">
            <h2>Interfaces in PHP</h2>
            <p>An interface defines a contract that implementing classes must follow.</p>
            
            <div class="code-block">
<span class="keyword">interface</span> <span class="class">LoggerInterface</span> {<br>
&nbsp;&nbsp;<span class="comment">// All methods in an interface must be public</span><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">log</span>(<span class="keyword">string</span> <span class="property">$message</span>): <span class="keyword">void</span>;<br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">error</span>(<span class="keyword">string</span> <span class="property">$message</span>): <span class="keyword">void</span>;<br>
}<br><br>
<span class="comment">// Implementing the interface</span><br>
<span class="keyword">class</span> <span class="class">FileLogger</span> <span class="keyword">implements</span> <span class="class">LoggerInterface</span> {<br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">log</span>(<span class="keyword">string</span> <span class="property">$message</span>): <span class="keyword">void</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Implementation here</span><br>
&nbsp;&nbsp;}<br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">error</span>(<span class="keyword">string</span> <span class="property">$message</span>): <span class="keyword">void</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="comment">// Implementation here</span><br>
&nbsp;&nbsp;}<br>
}
            </div>
            
            <h3>Interface Characteristics:</h3>
            <ul>
                <li>Can only declare method signatures (no implementation)</li>
                <li>All methods must be public</li>
                <li>Can define constants (but not properties)</li>
                <li>A class can implement multiple interfaces</li>
                <li>Used to define capabilities a class must have</li>
            </ul>
        </div>
        
        <div id="abstract" class="tab-content">
            <h2>Abstract Classes in PHP</h2>
            <p>Abstract classes provide partial implementation that child classes can extend.</p>
            
            <div class="code-block">
<span class="keyword">abstract</span> <span class="keyword">class</span> <span class="class">Shape</span> {<br>
&nbsp;&nbsp;<span class="keyword">protected</span> <span class="property">$color</span>;<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> __construct(<span class="keyword">string</span> <span class="property">$color</span>) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$this</span>-><span class="property">color</span> = <span class="property">$color</span>;<br>
&nbsp;&nbsp;}<br><br>
&nbsp;&nbsp;<span class="comment">// Abstract method (must be implemented by child classes)</span><br>
&nbsp;&nbsp;<span class="keyword">abstract</span> <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getArea</span>(): <span class="keyword">float</span>;<br><br>
&nbsp;&nbsp;<span class="comment">// Concrete method (inherited as-is)</span><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getColor</span>(): <span class="keyword">string</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">$this</span>-><span class="property">color</span>;<br>
&nbsp;&nbsp;}<br>
}<br><br>
<span class="keyword">class</span> <span class="class">Circle</span> <span class="keyword">extends</span> <span class="class">Shape</span> {<br>
&nbsp;&nbsp;<span class="keyword">private</span> <span class="property">$radius</span>;<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> __construct(<span class="keyword">string</span> <span class="property">$color</span>, <span class="keyword">float</span> <span class="property">$radius</span>) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">parent</span>::__construct(<span class="property">$color</span>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$this</span>-><span class="property">radius</span> = <span class="property">$radius</span>;<br>
&nbsp;&nbsp;}<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getArea</span>(): <span class="keyword">float</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> pi() * pow(<span class="keyword">$this</span>-><span class="property">radius</span>, <span class="number">2</span>);<br>
&nbsp;&nbsp;}<br>
}
            </div>
            
            <h3>Abstract Class Characteristics:</h3>
            <ul>
                <li>Can contain both abstract and concrete methods</li>
                <li>Can have properties and constants</li>
                <li>Methods can have any visibility (public, protected, private)</li>
                <li>A class can only extend one abstract class</li>
                <li>Used to provide common base functionality</li>
            </ul>
        </div>
        
        <div id="comparison" class="tab-content">
            <h2>Interfaces vs Abstract Classes</h2>
            
            <table class="comparison-table">
                <tr>
                    <th>Feature</th>
                    <th>Interface</th>
                    <th>Abstract Class</th>
                </tr>
                <tr>
                    <td>Method Implementation</td>
                    <td>No implementation (only signatures)</td>
                    <td>Can have both abstract and concrete methods</td>
                </tr>
                <tr>
                    <td>Properties</td>
                    <td>Cannot have properties</td>
                    <td>Can have properties</td>
                </tr>
                <tr>
                    <td>Constants</td>
                    <td>Can have constants</td>
                    <td>Can have constants</td>
                </tr>
                <tr>
                    <td>Multiple Inheritance</td>
                    <td>Class can implement multiple interfaces</td>
                    <td>Class can extend only one abstract class</td>
                </tr>
                <tr>
                    <td>Method Visibility</td>
                    <td>All methods must be public</td>
                    <td>Methods can be public, protected, or private</td>
                </tr>
                <tr>
                    <td>When to Use</td>
                    <td>Define capabilities/contracts</td>
                    <td>Share common base functionality</td>
                </tr>
            </table>
        </div>
        
        <div id="example" class="tab-content">
            <h2>Complete Example Using Both</h2>
            
            <div class="code-block">
<span class="keyword">interface</span> <span class="class">Drawable</span> {<br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">draw</span>(): <span class="keyword">string</span>;<br>
}<br><br>
<span class="keyword">abstract</span> <span class="keyword">class</span> <span class="class">Shape</span> <span class="keyword">implements</span> <span class="class">Drawable</span> {<br>
&nbsp;&nbsp;<span class="keyword">protected</span> <span class="property">$color</span>;<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> __construct(<span class="keyword">string</span> <span class="property">$color</span>) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$this</span>-><span class="property">color</span> = <span class="property">$color</span>;<br>
&nbsp;&nbsp;}<br><br>
&nbsp;&nbsp;<span class="keyword">abstract</span> <span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getArea</span>(): <span class="keyword">float</span>;<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getColor</span>(): <span class="keyword">string</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">$this</span>-><span class="property">color</span>;<br>
&nbsp;&nbsp;}<br>
}<br><br>
<span class="keyword">class</span> <span class="class">Circle</span> <span class="keyword">extends</span> <span class="class">Shape</span> {<br>
&nbsp;&nbsp;<span class="keyword">private</span> <span class="property">$radius</span>;<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> __construct(<span class="keyword">string</span> <span class="property">$color</span>, <span class="keyword">float</span> <span class="property">$radius</span>) {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">parent</span>::__construct(<span class="property">$color</span>);<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">$this</span>-><span class="property">radius</span> = <span class="property">$radius</span>;<br>
&nbsp;&nbsp;}<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">getArea</span>(): <span class="keyword">float</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> pi() * pow(<span class="keyword">$this</span>-><span class="property">radius</span>, <span class="number">2</span>);<br>
&nbsp;&nbsp;}<br><br>
&nbsp;&nbsp;<span class="keyword">public</span> <span class="keyword">function</span> <span class="method">draw</span>(): <span class="keyword">string</span> {<br>
&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="string">"Drawing a {$this->color} circle with radius {$this->radius}"</span>;<br>
&nbsp;&nbsp;}<br>
}<br><br>
<span class="comment">// Usage</span><br>
<span class="property">$circle</span> = <span class="keyword">new</span> <span class="class">Circle</span>(<span class="string">'red'</span>, <span class="number">5</span>);<br>
<span class="keyword">echo</span> <span class="property">$circle</span>-><span class="method">draw</span>(); <span class="comment">// From interface</span><br>
<span class="keyword">echo</span> <span class="string">"Area: "</span> . <span class="property">$circle</span>-><span class="method">getArea</span>(); <span class="comment">// From abstract class</span>
            </div>
            
            <h3>Key Points in This Example:</h3>
            <ul>
                <li><code>Drawable</code> interface defines a capability (can be drawn)</li>
                <li><code>Shape</code> abstract class provides common base functionality</li>
                <li><code>Circle</code> implements the interface methods and extends the abstract class</li>
                <li>Shows how interfaces and abstract classes can work together</li>
            </ul>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }
            
            // Remove active class from all tabs
            const tabs = document.getElementsByClassName("tab");
            for (let i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove("active");
            }
            
            // Show the current tab and mark button as active
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }
    </script>
</body>
</html>