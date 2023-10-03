<style>
    .card {
        background-color:bisque; 
        padding:10px; 
        margin:20px; 
        width:200px;
    }

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
        animation:opan 1s ease;
        display: none;
        
    }
    .show {
        animation:opaf 1s ease;
        display:flex;
        
    }
    @keyframes opan {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
    @keyframes opaf {
        from {
            opacity:0;
        }
        to{
            opacity: 1;
        }
    }

</style>
<?php
require_once 'navbar.html';
?>
<div style="margin:0 20px; padding:20px 20px; background-color:white;">
    <h1 style="color:rgb(123, 34, 1); text-align:center">Artists</h1>
    <div style="display:flex; width:100%; flex-wrap:wrap; justify-content:space-around; margin:0 auto">    
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qArt = 'SELECT * FROM artists';
    $result = mysqli_query($db, $qArt);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($artists as $a) : ?>
        <div class="card" id="card<?=$a['id']?>">
            <article id="a<?=$a['id']?>" class="one show col">
                <h2 style="width:100%; text-align:center"><strong> <?= $a['name']; ?> </strong></h2>
                <img src="img/<?= $a['poster'] ?>.png" alt="" style="height:150px">
                <button style="padding:10px; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156)" onclick="checking(<?=$a['id']?>)">More...</button>
                <a style="text-decoration:none; border:2px black solid; padding:10px; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156)" href="http://localhost:8000/songs.php?artist=<?=$a['id']?>">Show songs</a> 
            </article> 
              
            <article id="a<?=$a['id']?>" class="two hide col">
                <p><?=$a['gender']?></p>
                <p><?=$a['bio']?> </p>
                <p>Date of creation/birth: <br>
                    <?=$a['date_of_birth']?> </p>
                <button style="padding:10px;color:rgb(80, 29, 6);background-color: bisque" onclick="checking(<?=$a['id']?>)">Back</button>
            </article>
            
                       
        </div><?php endforeach;
            mysqli_close($db);
                ?>
    </div>
</div>
<script>    
    function checking(d) {
        id='a'+d;
        idc='card'+d;        
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