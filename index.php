<?php
session_start();
require_once 'admin/backend/config.php';
require_once 'admin/backend/conn.php';

// Haal alle attracties op
$stmt = $conn->prepare("SELECT id, title, themeland, img_file, description, min_length, fast_pass FROM rides");
$stmt->execute();
$attracties = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia modi dolore magnam! Iste libero voluptatum autem, sapiente ullam earum nostrum sed magnam vel laboriosam quibusdam, officia, esse vitae dignissimos nulla?
        </aside>
        <main>
            <?php foreach($attracties as $attractie): ?>
            <article class="attractie-kaart">
                <img src="<?php echo $base_url; ?>/img/attracties/<?php echo $attractie['img_file']; ?>" alt="<?php echo $attractie['title']; ?>">
                
                <div class="attractie-info-links">
                    <div>
                        <p class="thema"><?php echo ($attractie['themeland']); ?></p>
                        <h2><?php echo $attractie['title']; ?></h2>
                    </div>
                    <?php if($attractie['min_length']): ?>
                        <p class="lengte"><?php echo $attractie['min_length']; ?>cm minimale lengte</p>
                    <?php endif; ?>
                </div>
                
                <div class="attractie-info-rechts">
                    <p class="beschrijving"><?php echo $attractie['description']; ?></p>
                    <?php if($attractie['fast_pass']): ?>
                        <button class="fast-pass-btn">🎟️ FAST PASS</button>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </main>
    </div>

</body>

</html>
