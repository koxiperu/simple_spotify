<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; background-color:lightsalmon">
    <h2>The three latest songs are:</h2>
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qSongs = 'SELECT title, release_date 
FROM `songs` 
ORDER BY release_date DESC';
    $result = mysqli_query($db, $qSongs);
    $bsongs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($i = 0; $i < 3; $i++) {
    ?>
        
        <div style="background-color:rgb(233, 199, 243); padding:10px; margin:5px 50% 5px 0">
        <h1><?= $i ?>: <?= $bsongs[$i]['title']; ?></h1>
            <p>
                <?= $bsongs[$i]['release_date']; ?>
            </p>

        </div>
    <?php
    }
    mysqli_close($db);

    ?>
</div>