<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP final Keyword</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card {
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #6a5acd;
        }
        
        h1 {
            color: #2d3436;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #6a5acd;
            margin-top: 30px;
        }
        
        .code-block {
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 15px;
            overflow-x: auto;
            font-family: 'Courier New', monospace;
            margin: 15px 0;
            line-height: 1.5;
        }
        
        .keyword {
            color: #d63384;
            font-weight: bold;
        }
        
        .class {
            color: #3d8fd1;
        }
        
        .method {
            color: #6674cc;
        }
        
        .comment {
            color: #6c757d;
            font-style: italic;
        }
        
        .error {
            color: #dc3545;
            background: #fff0f0;
            padding: 2px 4px;
            border-radius: 3px;
        }
        
        .note {
            background: #e7f5ff;
            border-left: 4px solid #4dabf7;
            padding: 12px;
            margin: 20px 0;
            border-radius: 4px;
        }
        
        ul {
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>PHP <span class="keyword">final</span> Keyword</h1>
        
        <p>The <span class="keyword">final</span> keyword is used to prevent class inheritance or method overriding.</p>
        
        <h2>1. Final Methods</h2>
        
        <p>Prevent method overriding in child classes:</p>
        
        <div class="code-block">
// Parent class with final method
class ParentClass {
    
    // This method cannot be overridden by child classes
    final public function criticalOperation() {
        return "This operation must not be changed";
    }
    
    // This normal method can be overridden
    public function normalMethod() {
        return "This can be overridden";
    }
}

// Child class attempting to override
class ChildClass extends ParentClass {
    
    // Allowed - overriding normal method
    public function normalMethod() {
        return "Overridden version";
    }
    
    // This would cause a fatal error:
    /*
    final public function criticalOperation() {
        return "Trying to override";
    }
    */
}
        </div>
        
        <div class="note">
            <strong>Note:</strong> Attempting to override a final method results in:<br>
            <em>Fatal error: Cannot override final method ParentClass::criticalOperation()</em>
        </div>
        
        <h2>2. Final Classes</h2>
        
        <p>Prevent class inheritance entirely:</p>
        
        <div class="code-block">
// Final class cannot be extended
final class SecureDatabase {
    public function connect() {
        return "Secure connection established";
    }
}

// This would cause a fatal error:
/*
class HackAttempt extends SecureDatabase {
    public function connect() {
        return "Hacked!";
    }
}
*/

// Proper usage - instantiation is allowed
$db = new SecureDatabase();
echo $db->connect(); // Output: "Secure connection established"
        </div>
        
        <div class="note">
            <strong>Note:</strong> Attempting to extend a final class results in:<br>
            <em>Fatal error: Class HackAttempt may not inherit from final class (SecureDatabase)</em>
        </div>
        
        <h2>3. Final Constants (PHP 8.1+)</h2>
        
        <p>Prevent constant redefinition in child classes:</p>
        
        <div class="code-block">
class Config {
    // Final constant cannot be redefined
    final public const VERSION = "1.0";
    
    // Normal constant can be redefined
    public const NAME = "AppConfig";
}

class CustomConfig extends Config {
    // Allowed - overriding normal constant
    public const NAME = "CustomApp";
    
    // This would cause a fatal error:
    /*
    final public const VERSION = "2.0";
    */
}
        </div>
        
        <h2>When to Use final</h2>
        
        <ul>
            <li><strong>Security:</strong> Protect critical classes/methods from modification</li>
            <li><strong>API Design:</strong> Lock down public interfaces to prevent breaking changes</li>
            <li><strong>Performance:</strong> Enables some compiler optimizations</li>
            <li><strong>Design Intent:</strong> Clearly communicates what shouldn't be extended</li>
        </ul>
        
        <div class="note">
            <strong>Best Practice:</strong> Consider making classes final by default, and only remove the final keyword when extension is specifically required.
        </div>
    </div>
</body>
</html>