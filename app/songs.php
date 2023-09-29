<?php
require_once 'navbar.html';
?>
<div style="margin:0 5%; padding:20px 5%; border-radius:20px; background-color:lightsalmon">
<h2>All songs</h2>
<form method="POST">
    <label for="number">Number of songs per page: </label>
    <input type="text" name="number" value="<?php echo empty($songsNumber)?'':$songsNumber?>" id="">
    <input type="submit" name="sbtn" value="SET">    
</form>
<button style="margin:20px"><a href="http://localhost:8000/songs.php/?page=1" style="text-decoration:none;color:darkgreen;font-weight:900;margin:20px;">Show</a></button>
<?php

if (isset($_GET['page'])){
    $nbPage=$_GET['page'];
}else $nbPage=0;
?>

<?php

if ($nbPage>=1){ 
    if (isset($_POST['sbtn'])) {
        $songsNumber=$_POST['number'];
    } else {
        $songsNumber=3;
    }
    $db=mysqli_connect('db','root','root','spotify');    
    $qSongs="SELECT COUNT(*) as nbSongs FROM songs";
    $result=mysqli_query($db,$qSongs);
    $tN=mysqli_fetch_assoc($result); //one line
    $end=(ceil($tN['nbSongs']/$songsNumber)); 
    
    //echo "Total number of songs is $totalNumber.<br> Pages $end.<br>"; 
    
    $start=($nbPage-1)*$songsNumber;    
    //echo $start. ' start position<br>';
    $qSongs="SELECT title FROM songs LIMIT $start,$songsNumber"; 
    $result=mysqli_query($db,$qSongs);
    $songs=mysqli_fetch_all($result, MYSQLI_ASSOC);
    for ($i=0; $i<$songsNumber;$i++){
        if (!empty($songs[$i])) {
          $s=$songs[$i]['title'];
        echo "<div style='background-color:rgb(233, 199, 243); border-radius:10px; padding:10px; margin:5px 50% 5px 0;'><p><strong> $s </strong></p></div>";  
        }else{
            echo "<div style='background-color:rgb(233, 199, 243); border-radius:10px; padding:10px; margin:5px 50% 5px 0; color:rgb(233, 199, 243)'><p><strong>$s</strong></p></div>";   
        }
        
    }
    mysqli_close($db);
};
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
        //echo $nbPage;
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
        //echo $nbPage;
    ?>
    </button>
    
</div>