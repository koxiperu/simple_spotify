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
<div style="display:flex; flex-direction:row; justify-content:end; gap:20px; margin:20px;">
    <button id="byName" style="background-color:bisque; font-size:20px; padding:10px" onclick="sortName()">Sort by name</button>
    <button id="byBirth" style="background-color:bisque; font-size:20px; padding:10px" onclick="sortBirth()">Sort by date of birth/creation</button>
</div>
<div style="margin:0 20px; padding:20px 20px; background-color:white;">
    <h1 style="color:rgb(123, 34, 1); text-align:center">Artists</h1>
    <div id="cards" style="display:flex; flex-direction:row;width:100%; flex-wrap:wrap; justify-content:space-around; margin:0 auto">    
    <?php
    $db = mysqli_connect('db', 'root', 'root', 'spotify');
    $qArt = 'SELECT * FROM artists';
    $result = mysqli_query($db, $qArt);
    $artists = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //AJAX
    echo '<script>';
    echo 'var dataArray = ' . json_encode($artists) . ';';
    echo '</script>';
    ?>
    <div class="card" id="templCard">
        <article class="one show col">
            <h2 style="width:100%; text-align:center"></h2>
            <img src="" alt="" style="height:150px">
            <button class="but1" style="padding:10px; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156)" onclick="checking()">More...</button>
            <a class="ref" style="text-decoration:none; border:2px black solid; padding:10px; color:rgb(80, 29, 6);background-color: rgb(216, 173, 156)" href="http://localhost:8000/songs.php?artist=">Show songs</a> 
        </article>
        <article  class="two hide col">
            <p id="g"></p>
            <p id="b"></p>
            <p id="d"></p>
            <button class="but2" style="padding:10px;color:rgb(80, 29, 6);background-color: bisque" onclick="checking()">Back</button>
        </article> 
    <!--foreach ($artists as $a) : ?>
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
                       ...<php endforeach
        </div>-->
        <?php
            mysqli_close($db);
        ?>
    </div>
</div>
<script>
    var shownCards=[];
    var cardsToShow=[];
    const cardTempl=document.querySelector("#templCard");
// fetching data from php to js
    window.addEventListener("load", function(){
        unsortedCards(dataArray);
    });
    function unsortedCards(cardsToShow){
        for (const a of shownCards) {
            a.remove();
        };
        for (const one of cardsToShow){
            const clone=cardTempl.cloneNode(true);        
            document.querySelector("#cards").append(clone);
            const cloneCardId='card'+one.id;
            const cloneAId='a'+one.id;
            const clonePic='img/'+one.poster+'.png';
            const cloneName=one.name;
            const cloneGender=one.gender;    
            const cloneBio=one.bio; 
            const cloneDate='Date of creation/birth: '+one.date_of_birth;
            const cloneFun='checking('+one.id+')'; 
            const cloneLink='http://localhost:8000/songs.php?artist='+one.id; 
            clone.querySelector("h2").innerText=cloneName;
            clone.querySelector("img").src=clonePic;
            clone.querySelector(".card")?.setAttribute('id', cloneCardId);    
            clone.querySelector("article.one")?.setAttribute("id", cloneAId);
            clone.querySelector("article.two")?.setAttribute("id", cloneAId);
            clone.querySelector("article.one")?.setAttribute("class", "one show col");
            clone.querySelector("article.two")?.setAttribute("class", "two hide col");
            clone.querySelector(".but1")?.setAttribute("onclick", cloneFun);
            clone.querySelector(".but2")?.setAttribute("onclick", cloneFun);
            clone.querySelector(".ref")?.setAttribute("href", cloneLink);    
            clone.querySelector("#g").innerText=cloneGender;
            clone.querySelector("#b").innerText=cloneBio; 
            clone.querySelector("#d").innerText=cloneDate;
        }
    cardTempl.remove();
    shownCards=document.querySelectorAll(".card");    
    }

    function checking(d) {        
        const id1='#a'+d+'.one';
        const id2='#a'+d+'.two';      
        if (document.querySelector(id2).classList.contains('show')) {          
            document.querySelector(id1).classList.add('show');
            document.querySelector(id1).classList.remove('hide');
            document.querySelector(id2).classList.add('hide');
            document.querySelector(id2).classList.remove('show');
            info=false;
        }else{
            document.querySelector(id1).classList.add('hide');
            document.querySelector(id1).classList.remove('show');            
            document.querySelector(id2).classList.add('show');            
            document.querySelector(id2).classList.remove('hide');
            info=true;
        };
    }

    function sortName(){
        sortedArr = Array.from(dataArray);
        sortedArr.sort((x, y) => x.name.localeCompare(y.name));
        unsortedCards(sortedArr);
    }
    function sortBirth(){
        sortedArr = Array.from(dataArray);
        sortedArr.sort((x, y) => x.date_of_birth.localeCompare(y.date_of_birth));
        unsortedCards(sortedArr);
    }
</script>