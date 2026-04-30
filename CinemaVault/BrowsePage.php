<?php
require 'DatabaseConnection.php';

$stmt = $pdo->query("SELECT * FROM films ORDER BY year DESC");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Films – CinemaVault</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<nav>
    <h1> 🎥CinemaVault</h1>
    <div>
        <a href="Home.php">Home</a>
        <a href="BrowsePage.php">Browse</a>
    </div>
</nav>

<div class="container">
    <h2>All Films</h2>

    <input type="text" id="search" placeholder="Search" onkeyup="filterFilms()">

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Director</th>
                <th>Duration</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody id="filmTable">
            <?php foreach ($result as $film): ?>
            <tr>
                <td>

                <!-- Make some film titles clickable-->
    <?php if (in_array($film['title'], ['Dune: Part Two', 'Oppenheimer', 'Parasite'])): ?>
        <a href="FilmDetail.php?id=<?= $film['id'] ?>"><?= $film['title'] ?></a>
    <?php else: ?>
        <?= $film['title'] ?>
    <?php endif; ?>
                </td>
                <td><?= $film['year'] ?></td>
                <td><?= htmlspecialchars($film['genre']) ?></td>
                <td><?= htmlspecialchars($film['director']) ?></td>
                <td><?= $film['duration'] ?> min</td>
                <td>&#9733; <?= $film['rating'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> CinemaVault -- Ebel Eldo</p>
</footer>

<script src="Java.js"></script>
</body>
</html>