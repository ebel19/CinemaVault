<?php
require 'DatabaseConnection.php';

$id   = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$film = $stmt->fetch(PDO::FETCH_ASSOC);

//film posters
$details = [
    'Dune: Part Two' => [
        'poster'      => 'https://i.ebayimg.com/images/g/~2QAAOSwRYdldgg~/s-l400.jpg',
        'description' => 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.'
    ],
    'Oppenheimer' => [
        'poster'      => 'https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_SX300.jpg',
        'description' => 'The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb during World War II.'
    ],
    'Parasite' => [
        'poster'      => 'https://assets.mubicdn.net/images/notebook/post_images/29833/images-w1400.jpg?1579571205',
        'description' => 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $film ? htmlspecialchars($film['title']) : 'Film Not Found' ?> – CinemaVault</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

<nav>
    <h1>🎥 CinemaVault</h1>
    <div>
        <a href="Home.php">Home</a>
        <a href="BrowsePage.php">Browse</a>
    </div>
</nav>

<div class="container">
    <p><a href="BrowsePage.php">&larr; Back to Browse</a></p>

    <div class="detail-box">
        <?php if ($film): ?>
            <?php if (isset($details[$film['title']])): ?>
                <img src="<?= $details[$film['title']]['poster'] ?>" alt="poster">
            <?php endif; ?>

            <div class="detail-info">
                <h2><?= htmlspecialchars($film['title']) ?></h2>
                <p><?= htmlspecialchars($film['year']) ?> &bull; <?= htmlspecialchars($film['genre']) ?></p>
                <p>Director: <?= htmlspecialchars($film['director']) ?></p>
                <p>Duration: <?= htmlspecialchars($film['duration']) ?> min</p>
                <p class="rating">&#9733; <?= htmlspecialchars($film['rating']) ?></p>
                <?php if (isset($details[$film['title']])): ?>
                    <p class="desc"><?= $details[$film['title']]['description'] ?></p>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>Film not found. Please select a film from the <a href="BrowsePage.php">Browse page</a>.</p>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date('Y') ?> CinemaVault --- Ebel Eldo</p>
</footer>

</body>
</html>