<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Audio Player</title>
</head>
<body>
  <h1>Audio Library</h1>

  <!-- Upload Form -->
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Audio File: <input type="file" name="audio" required></label><br>
    <label>Language: <input type="text" name="language" required></label><br>
    <label>Genre: <input type="text" name="genre" required></label><br>
    <button type="submit">Upload</button>
  </form>

  <hr>

  <!-- Search -->
  <form action="search.php" method="get">
    <label>Search by Name: <input type="text" name="query"></label>
    <button type="submit">Search</button>
  </form>

  <hr>

  <!-- Audio List -->
  <h2>All Audio Files</h2>
  <div id="audio-list">
    <?php include 'list.php'; ?>
  </div>
</body>
</html>