<?php
include("db.php");
$conn=db();
  $res1=$conn->query("SELECT * FROM posts ORDER BY created desc;");
  $res2=$res1->fetch_all(MYSQLI_ASSOC);
function en2ar($a){
  return str_replace("%20","-",str_replace("+","-",urlencode($a)));
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="A personal blog" />
    <meta name="author" content="MoPaMo" />

    <title>spaceBlog</title>

    <!-- Bootstrap core CSS -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom fonts for this template -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
      rel="stylesheet"
      type="text/css"
    />

    <!-- Custom styles for this template -->
    <link href="clean-blog.min.css" rel="stylesheet" />
    
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/index.php">spaceBlog</a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="write.php">Write a Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.html"><span class="fas fa-search"></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header
      class="masthead"
      style="background-image: url('https://source.unsplash.com/user/nasa/daily')"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>spaceBlog</h1>
              <span class="subheading"></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="/article/<?php echo $res2[0]["id"];?>/<?php echo en2ar($res2[0]["title"]);?>">
              <h2 class="post-title"><?php echo $res2[0]["title"];?></h2>
              <h3 class="post-subtitle"><?php echo $res2[0]["short"];?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo $res2[0]["author"];?>"><?php echo $res2[0]["author"];?></a>
              on <?php echo date('M d Y', strtotime($res2[0]["created"]));?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[1]["id"];?>/<?php echo en2ar($res2[1]["title"]);?>">
              <h2 class="post-title"><?php echo $res2[1]["title"];?></h2>
              <h3 class="post-subtitle"><?php echo $res2[1]["short"];?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo $res2[1]["author"];?>"><?php echo $res2[1]["author"];?></a>
              on <?php echo date('M d Y', strtotime($res2[1]["created"]));?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[2]["id"];?>/<?php echo en2ar($res2[2]["title"]);?>">
              <h2 class="post-title"><?php echo $res2[2]["title"];?></h2>
              <h3 class="post-subtitle"><?php echo $res2[2]["short"];?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo $res2[2]["author"];?>"><?php echo $res2[2]["author"];?></a>
              on <?php echo date('M d Y', strtotime($res2[2]["created"]));?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[3]["id"];?>/<?php echo en2ar($res2[3]["title"]);?>">
              <h2 class="post-title"><?php echo $res2[3]["title"];?></h2>
              <h3 class="post-subtitle"><?php echo $res2[3]["short"];?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author.php?name=<?php echo $res2[3]["author"];?>"><?php echo $res2[3]["author"];?></a>
              on <?php echo date('M d Y', strtotime($res2[3]["created"]));?>
            </p>
          </div>
          <hr />
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#"
              >Older Posts &rarr;</a
            >
          </div>
        </div>
      </div>
    </div>

    <hr />

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
    <script src="clean-blog.min.js"></script>
  

  </body>
</html>
