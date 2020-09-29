<?php
if(isset($_GET["name"])){
include("../db.php");
/*$conn=db();
  $res1=$conn->query("");
  $res2=$res1->fetch_all(MYSQLI_ASSOC);*/
  $stmt = db()->prepare("SELECT * FROM posts WHERE title LIKE "" ;");
   $stmt->bind_param("");
    /*$title = $_GET["name"];
  $short=$_GET["name"];*/
$stmt->execute();
  $result = $stmt->get_result();
while ($data = $result->fetch_assoc())
{
    $statistic[] = $data;
}

// Proof that it's working

$res2=$statistic;
  #echo $statistic[0]["author"];
  if(count($res2)>0){
      foreach($res2 as $res){?>
          <div class="post-preview">
            <a href="/article/<?php echo $res["id"];?>">
              <h2 class="post-title"><?php echo $res["title"];?></h2>
              <h3 class="post-subtitle"><?php echo $res["short"];?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo $res["author"];?>"><?php echo $res["author"];?></a>
              on <?php echo $res["created"];?>
            </p>
          </div>
          <hr /><?php }}else{echo "<img style=\"max-width:50vw\" src=\"https://cdn.glitch.com/637778d7-facd-4553-820b-773fd6182020%2Fundraw_empty_xct9.svg?v=1599632299973\"> <h2>Nothing found</h2><small>Search is case insensitive!</small>";}
  /**/
}else {echo"nöp";} ?>