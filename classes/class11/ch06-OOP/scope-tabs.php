<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP Scope Tabs</title>

  <!-- Prism Theme -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet"/>

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
    }

    .card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 800px;
      max-width: 100%;
      padding: 30px;
    }

    .tabs {
      display: flex;
      margin-bottom: 20px;
    }

    .tab {
      flex: 1;
      padding: 12px 16px;
      background: #f1f1f1;
      text-align: center;
      cursor: pointer;
      border-radius: 8px 8px 0 0;
      font-weight: bold;
      transition: background 0.3s;
    }

    .tab.active {
      background: #007bff;
      color: white;
    }

    .content {
      background: #ffffff;
      border: 1px solid #ddd;
      border-top: none;
      padding: 20px;
      border-radius: 0 0 12px 12px;
    }

    .section h2 {
      color: #007bff;
      margin-top: 0;
    }

    .hidden {
      display: none;
    }

    pre {
      border-radius: 8px;
      overflow-x: auto;
      margin-top: 16px;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="tabs">
      <div class="tab active" onclick="showTab('public')">Public</div>
      <div class="tab" onclick="showTab('protected')">Protected</div>
      <div class="tab" onclick="showTab('private')">Private</div>
    </div>

    <div class="content">
      <div class="section" id="public">
        <h2>🔓 Public Property</h2>
        <p>Accessible from anywhere (inside and outside the class).</p>
        <pre><code class="language-php">
class User {
    public $name = "Alice";
}

$user = new User();
echo $user->name; // ✅ Works
        </code></pre>
      </div>

      <div class="section hidden" id="protected">
        <h2>🔐 Protected Property</h2>
        <p>Accessible only within the class or subclass — not from outside.</p>
        <pre class="language-php"><code>
class User {
    protected $email = "alice@example.com";

    public function getEmail() {
        return $this->email;
    }
}

$user = new User();
echo $user->getEmail();  // ✅ Works
echo $user->email;       // ❌ Error: Cannot access protected property
        </code></pre>
      </div>

      <div class="section hidden" id="private">
        <h2>🔒 Private Property</h2>
        <p>Accessible only inside the class itself — not even in subclasses.</p>
        <pre class="language-php"><code>
class User {
    private $password = "secret123";

    public function getPassword() {
        return $this->password;
    }
}

$user = new User();
echo $user->getPassword(); // ✅ Works
echo $user->password;      // ❌ Error: Cannot access private property
        </code></pre>
      </div>
    </div>
  </div>

<!-- Prism core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>

<!-- Markup (required for PHP) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup-templating.min.js"></script>

<!-- PHP syntax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>


  <script>
function showTab(tabId) {
  document.querySelectorAll('.section').forEach(section => {
    section.classList.add('hidden');
  });
  document.getElementById(tabId).classList.remove('hidden');

  document.querySelectorAll('.tab').forEach(tab => {
    tab.classList.remove('active');
  });
  event.target.classList.add('active');

  // Fix syntax highlighting for newly visible tab
  Prism.highlightAll();
}

  </script>

</body>
</html>
