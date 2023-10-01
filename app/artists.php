<?php
require_once 'navbar.html';
?>
<div style="margin:0 20px; padding:20px 20px; background-color:lightsalmon">
    <h2>Artists</h2>
    
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qArt = 'SELECT * FROM artists';
    $result = mysqli_query($db, $qArt);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //echo "<img src='" .$artists[1]['poster']. "'>";
    ?>
    <div style="display:flex; width:100%; flex-wrap:wrap; margin:0 auto">
    <?php
    foreach ($artists as $a) : ?>
        <div style="background-color:rgb(233, 199, 243); padding:10px; margin:20px; display:flex; flex-direction:column; align-items:center; width:200px">
            <p>
                <strong> <?= $a['name']; ?> </strong>
            </p>
            <img src="img/<?= $a['poster'] ?>.png" alt="" style="height:100px">
            
        </div><?php endforeach;
            mysqli_close($db);
                ?>
    </div>
</div>