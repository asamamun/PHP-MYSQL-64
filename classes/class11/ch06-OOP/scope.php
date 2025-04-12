<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP OOP Scope</title>

  <!-- Prism CSS Theme -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 1000px;
      width: 100%;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 30px;
    }

    .section {
      margin-bottom: 20px;
    }

    .section h2 {
      color: #007bff;
      margin-bottom: 10px;
    }

    .section p {
      color: #444;
      line-height: 1.6;
    }

    ul {
      padding-left: 18px;
      margin: 10px 0;
    }

    li {
      margin-bottom: 8px;
    }

    pre {
      border-radius: 8px;
      overflow-x: auto;
    }

    code {
      font-size: 14px;
      line-height: 1.6;
    }

    @media screen and (max-width: 768px) {
      .card {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <div class="card">
    <!-- Text Content -->
    <div>
      <div class="section">
        <h2>🔐 Property Scope</h2>
        <p>Controls visibility of class variables:</p>
        <ul>
          <li><strong>public</strong> – visible everywhere</li>
          <li><strong>protected</strong> – within class & subclasses</li>
          <li><strong>private</strong> – only inside the class</li>
        </ul>
      </div>

      <div class="section">
        <h2>🔧 Method Scope</h2>
        <p>Controls visibility of class functions:</p>
        <ul>
          <li><strong>public</strong> – can be called anywhere</li>
          <li><strong>protected</strong> – limited to class/subclass</li>
          <li><strong>private</strong> – only within the class</li>
        </ul>
      </div>
    </div>

    <!-- Code Examples -->
    <div>
      <pre><code class="language-php">
class Car {
    public $brand;
    protected $engine;
    private $chassis;

    public function start() {
        $this->ignite();
    }

    protected function ignite() {
        echo "Starting engine";
    }

    private function debug() {
        echo "Internal diagnostics";
    }
}
      </code></pre>
    </div>
  </div>

  <!-- Prism JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>

</body>
</html>
