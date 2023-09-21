<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; border-radius:20px; background-color:lightsalmon">
    <h2>Artists</h2>
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qArt = 'SELECT * FROM artists';
    $result = mysqli_query($db, $qArt);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //echo "<img src='" .$artists[1]['poster']. "'>";
    foreach ($artists as $a) : ?>
        <div style="background-color:rgb(233, 199, 243); border-radius:10px; padding:10px; margin:5px 50% 5px 0; display:flex; flex-direction:row; justify-content:space-between">
            <p>
                <strong> <?= $a['name']; ?> </strong>
            </p>
            <p>
                <img src=<?= $a['poster'] ?> alt="" style="height:100px">
            </p>
        </div><?php endforeach;
            mysqli_close($db);

                ?>
</div>