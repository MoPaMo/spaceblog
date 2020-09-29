<?php
if(isset($_GET["name"])){
include("../db.php");
/*$conn=db();
  $res1=$conn->query("");
  $res2=$res1->fetch_all(MYSQLI_ASSOC);*/
  $stmt = db()->prepare("SELECT * FROM posts ;");echo "hi";
   $stmt->bind_param("");
    /*$title = $_GET["name"];
  $short=$_GET["name"];*/
$stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
$res2 = $result->fetch_assoc(); // fetch data   
  print_r($res2);
  if(count($res2)>0){
      foreach($res2 as $res){?>
          <div class="post-preview">
            <a href="/article/<?php echo $res["id"];?>">
              <h2 class="post-title"><?php echo hex2bin($res["title"]);?></h2>
              <h3 class="post-subtitle"><?php echo hex2bin($res["short"]);?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo hex2bin($res["author"]);?>"><?php echo hex2bin($res["author"]);?></a>
              on <?php echo $res["created"];?>
            </p>
          </div>
          <hr /><?php }}else{echo "<img style=\"max-width:50vw\" src=\"https://cdn.glitch.com/637778d7-facd-4553-820b-773fd6182020%2Fundraw_empty_xct9.svg?v=1599632299973\"> <h2>Nothing found</h2><small>Search is case insensitive!</small>";}
  /**/
}else {echo"nöp";} ?>