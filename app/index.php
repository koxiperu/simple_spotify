<style>
    .audio {
        display:flex;
        justify-content: center;
    }
</style>
<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; background-color:white; display:flex; flex-direction:column; justify-content:center">
    <h1 style="color:rgb(123, 34, 1); text-align:center">The three latest songs are:</h1>
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qSongs = 'SELECT title, release_date, src, artists.name AS name FROM `songs`
    INNER JOIN `artists` ON
    artists.id=songs.artist_id
    ORDER BY release_date DESC';
    $result = mysqli_query($db, $qSongs);
    $bsongs = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    mysqli_close($db);
    for ($i = 0; $i < 3; $i++) {
    ?>
        
        <div style="background-color:bisque; padding:10px; margin:5px auto;width:70%">
            <h2><?= $i+1 ?>. <?= $bsongs[$i]['title']; ?></h2>
            <div class="audio">
                <audio style="width:70%" controls src=<?=$bsongs[$i]['src']?>></audio>
            </div>
            
            <div style="display:flex; flex-direction:row; justify-content:space-between; font-size:20px">
                <p><?=$bsongs[$i]['name']?></p>
                <p>Release date: <?= $bsongs[$i]['release_date']; ?></p>
            </div>    
        </div>
    <?php
    }

    ?>
</div>