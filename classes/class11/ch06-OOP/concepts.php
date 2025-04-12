<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PHP OOP Concepts</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f8fc;
      padding: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }
    .card {
      background: #ffffff;
      border-radius: 16px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      width: 260px;
      padding: 20px;
      transition: 0.3s;
    }
    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.15);
    }
    .card h3 {
      margin-top: 0;
      color: #007bff;
      font-size: 20px;
    }
    .card p {
      color: #444;
      font-size: 15px;
    }
  </style>
</head>
<body>

  <div class="card">
    <h3>Class</h3>
    <p>A class is a blueprint that defines the properties and methods common to all objects of a certain kind in PHP.</p>
  </div>

  <div class="card">
    <h3>Object</h3>
    <p>An object is an instance of a class. It allows access to class properties and methods via the <code>-></code> operator.</p>
  </div>

  <div class="card">
    <h3>Properties</h3>
    <p>Properties are variables declared inside a class that hold data or state for an object.</p>
  </div>

  <div class="card">
    <h3>Methods</h3>
    <p>Methods are functions inside a class. They define the behavior or actions that an object can perform.</p>
  </div>

  <div class="card">
    <h3>Encapsulation</h3>
    <p>Encapsulation restricts direct access to object data by using access modifiers: <code>public</code>, <code>protected</code>, and <code>private</code>.</p>
  </div>

  <div class="card">
    <h3>Inheritance</h3>
    <p>Inheritance lets a class (child) inherit properties and methods from another class (parent) using the <code>extends</code> keyword.</p>
  </div>

  <div class="card">
    <h3>Polymorphism</h3>
    <p>Polymorphism allows objects to be treated as instances of their parent class, enabling method overriding and interface implementation.</p>
  </div>

</body>
</html>
