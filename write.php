<?php 
include("db.php");
include("Parsedown.php");
if(isset($_POST["pwd"])&&$_POST["pwd"]==getenv("pass")){
  
  if(isset($_POST["author"])&&$_POST["author"]!=""&& isset($_POST["title"])&&$_POST["title"]!=""&&isset($_POST["content"])&&$_POST["content"]!=""&&isset($_POST["short"])&&$_POST["short"]!=""){
    if(!isset($_POST["image"])) {$image=bin2hex("");} else {$image=bin2hex($_POST["image"]);}
    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
    $stmt = adb()->prepare("INSERT INTO posts(title, short, content, author, image) VALUES (?,?,?,?,?);");
    $stmt->bind_param("sssss", $title, $short, $content, $author, $image);
    $title = $_POST["title"];
    $short = $_POST["short"];
    $content = $Parsedown->text($_POST["content"]);
    $author = $_POST["author"];
    $image = $_POST["image"];
$stmt->execute();
    header("Location: /");
    }
  }                        
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="A personal blog">
  <meta name="author" content="MoPaMo">

  <title>Write a new Article | spaceBlog</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
  <meta name="robots" content="noindex, follow" />
  <!-- Custom styles for this template -->
  <link href="/clean-blog.min.css" rel="stylesheet">
  <style>
    #imgpreview{
      max-width:5vw;
    }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/index.php">spaceBlog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menü
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Zufälliger Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Kontakt</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('https://source.unsplash.com/featured/?paper?pen')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Write a new blog post</h1>
            <h2 class="subheading">We're waiting for your next post!</h2>
            <span class="meta">Posted by
              <a href="#">You</a>
              on <span id="datenow">Now</span></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <div class="container">
    

    <form action="" method="POST">
      <div class="form-group">
         <div class="form-row">
    <div class="col">
      <label for="imageinput"><i class="fas fa-images"></i> Image </label>
        <input type="url" maxlength="1500" class="form-control" id="imageinput" aria-describedby="imagehelp" name="image"  placeholder="Enter Hero Images URL"><small id="imagehelp" class="form-text text-muted">
        Enter the URL of a CC-BY-* image 
      </small>
    </div>
    <div class="col">
      <img src="https://cdn.glitch.com/637778d7-facd-4553-820b-773fd6182020%2Fundraw_image_post_24iy.svg?v=1601474780699" id="imgpreview">
    </div>
  </div>
        
    </div>
      <div class="form-group">
        <label for="titleinput"><i class="fas fa-heading"></i> Title</label>
        <input type="text" maxlength="50" class="form-control" id="titleinput" name="title" autofocus placeholder="Enter Title">
    </div>
      <div class="form-group">
        <label for="shortInput"><i class="fas fa-subscript"></i> Short Description</label>
        <input type="text" maxlength="50" class="form-control" name="short" id="shortInput" aria-describedby="emailHelp" placeholder="Enter Short Description">
    </div>
    <div class="form-group">
      <label for="content"><i class="fas fa-font"></i>Content</label>
      <textarea rows="5" class="form-control" id="content" name="content" aria-describedby="postContent" placeholder="Enter Your Content"></textarea>
      <small id="authorHelp" class="form-text text-muted">
        Enter your creative, innovative Article. We're supporting <a href="https://en.wikipedia.org/wiki/Markdown">Markdown formatting</a>, so take alook at the <a href="">Markdown Cheatsheet</a>!
      </small>
    </div>
    <div class="form-group">
      <label for="author"><i class="fas fa-user"></i> Your Name</label>
      <input type="text" maxlength="50" class="form-control" id="author" name="author" aria-describedby="authorHelp" placeholder="Enter Your Name"/>
      <small id="authorHelp" class="form-text text-muted">
        Your name will be shown at your posts
      </small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1"><i class="fas fa-key"></i> Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Enter Your Admin-Password">
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <!--<li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>-->
            <li class="list-inline-item">
              <a href="https://github.com/MoPaMo">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; MoPaMo 2020</p>
        </div>
      </div>
    
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="/clean-blog.min.js"></script>
<script>
  
// Must be triggered some kind of "user activation"
$(document).ready(function(){
  $("#imageinput").keyup(function(){
    $("#imgpreview").attr("src", $("#imageinput").val());
  });
});
  </script>
</body>

</html>
