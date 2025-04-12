<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>JavaScript Loops Comparison</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 20px;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    .card h2 {
      color: #333;
      margin-bottom: 10px;
    }

    .code {
      background-color: #272822;
      color: #f8f8f2;
      padding: 15px;
      border-radius: 10px;
      font-family: 'Courier New', monospace;
      font-size: 14px;
      white-space: pre;
      overflow-x: auto;
    }

    .card ul {
      padding-left: 18px;
    }

    .card li {
      margin: 6px 0;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #444;
    }

    .note {
      font-size: 14px;
      color: #777;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <h1>JavaScript Loop Comparison: <code>for...in</code> vs <code>for...of</code> vs <code>forEach()</code></h1>

  <div class="container">

    <!-- for...in -->
    <div class="card">
      <h2>🔁 for...in</h2>
      <p>Loops through **keys (property names)** of an object.</p>
      <div class="code">
const person = { name: "Ava", age: 22 };

for (let key in person) {
  console.log(key + ": " + person[key]);
}
      </div>
      <ul>
        <li>✅ Good for objects</li>
        <li>⚠️ Returns keys as strings</li>
        <li>🚫 Not ideal for arrays</li>
      </ul>
    </div>

    <!-- for...of -->
    <div class="card">
      <h2>🔁 for...of</h2>
      <p>Loops through **values** of an iterable (like Array, String).</p>
      <div class="code">
const colors = ["red", "green", "blue"];

for (let color of colors) {
  console.log(color);
}
      </div>
      <ul>
        <li>✅ Best for Arrays, Strings, Sets, etc.</li>
        <li>✅ Can use <code>break</code>/<code>continue</code></li>
        <li>✅ Works with <code>async/await</code></li>
      </ul>
    </div>

    <!-- forEach -->
    <div class="card">
      <h2>🔁 forEach()</h2>
      <p>Array method that runs a function on each element.</p>
      <div class="code">
const nums = [1, 2, 3];

nums.forEach((num, i) =&gt; {
  console.log(i + ": " + num);
});
      </div>
      <ul>
        <li>✅ Clean syntax for arrays</li>
        <li>🚫 Can't use <code>break</code>/<code>continue</code></li>
        <li>🚫 Not usable with <code>await</code> directly</li>
      </ul>
    </div>

  </div>

  <p class="note">💡 Tip: Use <code>for...in</code> for objects, <code>for...of</code> for values, and <code>forEach()</code> for clean array loops when break/await not needed.</p>

</body>
</html>
