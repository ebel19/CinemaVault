<?php
require 'DatabaseConnection.php';

$stmt = $pdo->query("SELECT * FROM films ORDER BY rating DESC LIMIT 6");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎥 CinemaVault</title>

    <!-- Link to Css--> 
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<nav>
    <!-- Navigation -->
    <h1>🎥 CinemaVault</h1>
    <div>
        <a href="Home.php">Home</a>
        <a href="BrowsePage.php">Browse</a>
    </div>
</nav>

<div class="hero">
    <h2>A curated collection of great films</h2>
    <p>Browse a list of classic and modern cinema.</p>
    <a href="BrowsePage.php" class="btn">Browse All Films</a>
</div>

<!-- top rated films-->
<div class="container">
    <h2>Top Rated Films</h2>
    <div class="grid">
        <?php foreach ($result as $film): ?>
        <div class="card">
            <h3><?= htmlspecialchars($film['title']) ?></h3>
            <p><?= $film['year'] ?> - <?= htmlspecialchars($film['genre']) ?></p>
            <p>Director: <?= htmlspecialchars($film['director']) ?></p>
            <p class="rating">&#9733; <?= $film['rating'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> CinemaVault -- Ebel Eldo</p>
</footer>

</body>
</html>