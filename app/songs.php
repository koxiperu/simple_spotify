<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; border-radius:20px; background-color:lightsalmon">
<div style="display:flex; flex-direction:row; align-items:center; gap:20px">
    <form method="POST" style="display:flex; flex-direction:column; justify-content:center; align-items:center;gap:5px; background-color:white; padding:10px; margin:10px; width:200px; height:100px">
        <label for="categ">Choose the artist: </label>
        <select name="categ">
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
        <input type="submit" name="sbtn" value="show songs of this artist">    
    </form>
    <h1> OR </h1>
    <form method="POST">
        <input type="submit" name="sbtnall" value="All songs" style="display:flex; flex-direction:column; justify-content:center; align-items:center;gap:5px; background-color:white; padding:10px; margin:10px; width:200px; height:100px">    
    </form>
</div>
<?php
if (isset($_POST['sbtn'])){
    $chart=$_POST['categ'];
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
    <h1>Songs of <?=$songs[0]['name']?></h1>
    <?php
    foreach ($songs as $s):?>
        <div style='background-color:rgb(233, 199, 243); display:flex; flex-direction:row; justify-content:space-between; border-radius:10px; padding:10px; margin:5px 50% 5px 0;'>
            <p><strong> <?=$s['title']?> </strong></p>
            <audio controls src=<?=$s['src']?>></audio>
            <p><?=$s['release_date']?></p>
        </div>
    <?php endforeach;
}else if (isset($_POST['sbtnall'])){
    if (isset($_GET['page'])){
        $nbPage=$_GET['page'];
    }else {
        $nbPage=1;
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
        <h1>All Songs</h1>
        <?php
        foreach ($songs as $s) :?>
                <div style='background-color:rgb(233, 199, 243); display:flex; flex-direction:row; justify-content:space-between; gap:20px; border-radius:10px; padding:10px; margin:5px 50% 5px 0;'>
                    <p><strong><?= $s['title']?> </strong></p>
                    <audio controls src=<?=$s['src']?>></audio>
                    <p><?=$s['name']?></p></div>
                <?php 
        endforeach; 
    
    ?>
    <div>
        <?php  if ($nbPage!=0) echo 'Page ' .$nbPage;?> 
        <button disabled="<?php echo ($nbPage<=1)?'true':'false'?>">
            <?php
                if ($nbPage<=1) echo "Back";
                else {
                    $cp=$nbPage-1;
                    echo "<a href='?page=$cp' style='color:darkgreen;font-weight:900; text-decoration:none'>Back</a>";
                };
            ?>
        </button>
        <button disabled="<?php echo ($nbPage==$end)?'true':'false'?>">
            <?php 
                if ($nbPage==0)  echo "Next";
                else if ($nbPage==$end) echo "Next";
                    else {
                        $cp=$nbPage+1;
                        echo "<a href='?page=$cp' style='color:darkgreen;font-weight:900;text-decoration:none'>Next</a>";
                    };
            ?>
        </button>
    </div>
<?php
    };

};
?>
</div>
