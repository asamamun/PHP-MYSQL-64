<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ripple Card</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/sirxemic/jquery.ripples/dist/jquery.ripples.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: #111;
    }

    .card {
      position: relative;
      width: 400px;
      height: 250px;
      color: white;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .ripple-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e'); /* Replace with your image */
      background-size: cover;
      z-index: 1;
    }

    .card-content {
      position: relative;
      z-index: 2;
      padding: 20px;
      backdrop-filter: brightness(0.9);
    }

    .card h2 {
      margin: 0 0 10px;
    }

    .card p {
      margin: 0;
    }
  </style>
</head>
<body>

  <div class="card">
    <div class="ripple-bg"></div>
    <div class="card-content">
      <h2>Ripple Effect Card</h2>
      <p>This card has a dynamic water ripple background. Click or hover for interaction.</p>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('.ripple-bg').ripples({
        resolution: 512,
        dropRadius: 20,
        perturbance: 0.04,
        interactive: true,
      });
    });
  </script>

</body>
</html>
