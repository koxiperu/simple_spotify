<style>
    .col {
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .col>* {
        width:150px;
        margin:10px auto;
    }
    .hide {
        display: none;
    }
    .show {
        display:flex;
    }
    
</style>
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
        <div style="background-color:rgb(233, 199, 243); padding:10px; margin:20px; width:200px;">
            <article id="a<?=$a['id']?>" class="one show col">
                <p style="width:100%; text-align:center"><strong> <?= $a['name']; ?> </strong></p>
                <img src="img/<?= $a['poster'] ?>.png" alt="" style="height:150px">
                <button style="padding:10px;" onclick="checking(<?=$a['id']?>)">More...</button> 
            </article> 
              
            <article id="a<?=$a['id']?>" class="two hide col">
                <p><?=$a['gender']?></p>
                <p><?=$a['bio']?> </p>
                <p>Date of creation/birth: <br>
                    <?=$a['date_of_birth']?> </p>
                <button style="padding:10px;" onclick="checking(<?=$a['id']?>)">Less...</button>
            </article>
            
                       
        </div><?php endforeach;
            mysqli_close($db);
                ?>
    </div>
</div>
<script>
    function checking(d) {
        id='a'+d;
        if (document.querySelector(`#${id}.two`).classList.contains('show')) {
            document.querySelector(`#${id}.one`).classList.add('show');
            document.querySelector(`#${id}.one`).classList.remove('hide');
            document.querySelector(`#${id}.two`).classList.add('hide');
            document.querySelector(`#${id}.two`).classList.remove('show');
            info=false;
        }else{
            document.querySelector(`#${id}.one`).classList.add('hide');
            document.querySelector(`#${id}.one`).classList.remove('show');
            document.querySelector(`#${id}.two`).classList.add('show');
            document.querySelector(`#${id}.two`).classList.remove('hide');
            info=true;
        };
    }
</script>