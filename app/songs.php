<style>
    form>* {
        width:100%;
    }
    form {
        width:300px;
    }
    .audio {
        display:flex;
        justify-content: center;
    }

</style>
<?php
require_once 'navbar.html';
?>
<div style="display:flex; flex-direction:row; justify-content:center; align-items:center; gap:20px">
    <form method="POST" style="display:flex; flex-direction:column; justify-content:center; align-items:center; background-color:bisque; height:100%; padding:10px; margin:0;">
        <label for="categ" style="font-size:30px;">Choose the artist: </label>
        <select style="font-size:20px;padding:10px" name="categ">
            <?php
            $db = mysqli_connect('db', 'root', 'root', 'spotify');
            $qArt = 'SELECT id,name FROM artists';
            $result = mysqli_query($db, $qArt);
            $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_close($db);
            foreach ($artists as $a) : ?>
                <option value="<?=$a['id']?>"><?=$a['name']?></option>
                <?php endforeach;
                ?>
        </select>
        <input type="submit" name="sbtn" value="show songs of this artist" style="color:rgb(80, 29, 6);background-color: rgb(216, 173, 156);font-size:20px; padding:10px">    
    </form>
    <h1 style="color:rgb(80, 29, 6)"> OR </h1>
    <a href="http://localhost:8000/songs.php?page=1" style="text-decoration:none; color:black; display:flex; flex-direction:column; justify-content:center; text-align:center; background-color:bisque; padding:20px; height:110px;font-size:40px; width:300px">Show all songs</a>
</div>
<div style="margin:20px; padding:20px; background-color:white;display:flex; flex-direction:column; justify-content:center ">
<?php
if ((isset($_POST['sbtn']))or(isset($_GET['artist']))){
    if (isset($_POST['sbtn'])) {
        $chart=$_POST['categ'];
    }else{
        $chart=$_GET['artist'];
    }; 
    $db=mysqli_connect('db','root','root','spotify');
    $qstring="SELECT title, release_date, src, artist_id, artists.name AS name FROM `songs`
              INNER JOIN `artists` ON
              artists.id=songs.artist_id
              WHERE artist_id=".$chart; 
    $qSongs=$qstring;
    $result=mysqli_query($db,$qSongs);
    $songs=mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($db);
    ?>
    <h1 style="color:rgb(123, 34, 1); text-align:center">Songs of <?=$songs[0]['name']?></h1>
        <?php
            foreach ($songs as $s):?>
                <div style='background-color:bisque; padding:10px; margin:5px auto;width:70%'>
                    <h2><?=$s['title']?></h2>
                    <div class="audio">
                        <audio style="width:70%" controls src=<?=$s['src']?>></audio>
                    </div>
                    <p>Release date: <?=$s['release_date']?></p>
                </div>
            <?php endforeach;
}else{
        
    if (isset($_GET['page'])){
        $nbPage=$_GET['page'];
    }else {
        $nbPage=0;
    };
    $songsNumber=5;
    if ($nbPage>=1){ 
        $db=mysqli_connect('db','root','root','spotify');    
        $qSongs="SELECT COUNT(*) as nbSongs FROM songs";
        $result=mysqli_query($db,$qSongs);
        $tN=mysqli_fetch_assoc($result); //one line
        $end=(ceil($tN['nbSongs']/$songsNumber)); 
        $start=($nbPage-1)*$songsNumber; 
        mysqli_close($db);
        $db=mysqli_connect('db','root','root','spotify');   
        $qSongs="SELECT title, src, artist_id, artists.name AS name FROM `songs`
            INNER JOIN `artists` ON
            artists.id=songs.artist_id
            LIMIT $start,$songsNumber"; 
        $result=mysqli_query($db,$qSongs);
        $songs=mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($db);
        ?>
        <h1 style="color:rgb(123, 34, 1); text-align:center">All songs:</h1>
        <?php
        foreach ($songs as $s) :?>
                <div style='background-color:bisque; padding:10px; margin:5px auto;width:70%'>
                    <h2><?= $s['title']?></h2>
                    <div class="audio">
                        <audio style="width:70%" controls src=<?=$s['src']?>></audio>
                    </div>
                    <p><?=$s['name']?></p></div>
                <?php 
        endforeach; 
    
    ?>
    <div style="display:flex; flex-direction:row; justify-content:center; gap:20px; margin:20px">
        <?php  if ($nbPage!=0) echo 'Page ' .$nbPage;?> 
        <button style="padding:0" disabled="<?php echo ($nbPage<=1)?'true':'false'?>">
            <?php
                if ($nbPage<=1) echo "Back";
                else {
                    $cp=$nbPage-1;
                    echo "<a href='?page=$cp' style='text-decoration:none; border:2px black solid; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156); padding:10px 20px; width:50px;box-shadow:0 0 10px brown;'>Back</a>";
                };
            ?>
        </button>
        <button style="padding:0" disabled="<?php echo ($nbPage==$end)?'true':'false'?>">
            <?php 
                if ($nbPage==0)  echo "Next";
                else if ($nbPage==$end) echo "Next";
                    else {
                        $cp=$nbPage+1;
                        echo "<a href='?page=$cp' style='text-decoration:none; border:2px black solid; box-shadow:0 0 10px brown; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156);padding:10px 20px; width:50px'>Next</a>";
                    };
            ?>
        </button>
    </div>
<?php
    };

};
?>
</div>
