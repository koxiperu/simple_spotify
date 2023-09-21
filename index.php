<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; border-radius:20px; background-color:lightsalmon">
    <h2>The latest songs</h2>
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qSongs = 'SELECT title, release_date 
FROM `songs` 
ORDER BY release_date DESC';
    $result = mysqli_query($db, $qSongs);
    $bsongs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($i = 0; $i < 3; $i++) {
        $bestSongs[$i] = $bsongs[$i];
    }

    foreach ($bestSongs as $b) : ?>
        <div style="background-color:rgb(233, 199, 243); border-radius:10px; padding:10px; margin:5px 50% 5px 0">
            <p>
                <strong> <?= $b['title']; ?></strong>
            </p>
            <p>
                <?= $b['release_date']; ?>
            </p>

        </div>



    <?php endforeach;
    mysqli_close($db);

    ?>
</div>