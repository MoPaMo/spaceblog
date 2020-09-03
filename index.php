<?php
include("db.php");
$conn=db();
  $res1=$conn->query("SELECT * FROM posts ORDER BY created desc;");
  $res2=$res1->fetch_all(MYSQLI_ASSOC);
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
        <a class="navbar-brand" href="index.html">spaceBlog</a>
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
              <a class="nav-link" href="contact.html">Contact</a>
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
            <a href="/article/<?php echo $res2[0]["id"];?>">
              <h2 class="post-title"><?php echo hex2bin($res2[0]["title"]);?></h2>
              <h3 class="post-subtitle"><?php echo hex2bin($res2[0]["short"]);?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo hex2bin($res2[0]["author"]);?>"><?php echo hex2bin($res2[0]["author"]);?></a>
              on <?php echo $res2[0]["created"];?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[1]["id"];?>">
              <h2 class="post-title"><?php echo hex2bin($res2[1]["title"]);?></h2>
              <h3 class="post-subtitle"><?php echo hex2bin($res2[1]["short"]);?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo hex2bin($res2[1]["author"]);?>"><?php echo hex2bin($res2[1]["author"]);?></a>
              on <?php echo $res2[1]["created"];?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[2]["id"];?>">
              <h2 class="post-title"><?php echo hex2bin($res2[2]["title"]);?></h2>
              <h3 class="post-subtitle"><?php echo hex2bin($res2[2]["short"]);?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo hex2bin($res2[2]["author"]);?>"><?php echo hex2bin($res2[2]["author"]);?></a>
              on <?php echo $res2[2]["created"];?>
            </p>
          </div>
          <hr />
          <div class="post-preview">
            <a href="/article/<?php echo $res2[3]["id"];?>">
              <h2 class="post-title"><?php echo hex2bin($res2[3]["title"]);?></h2>
              <h3 class="post-subtitle"><?php echo hex2bin($res2[3]["short"]);?></h3>
            </a>
            <p class="post-meta">
              Posted by
              <a href="/author/<?php echo hex2bin($res2[3]["author"]);?>"><?php echo hex2bin($res2[3]["author"]);?></a>
              on <?php echo $res2[3]["created"];?>
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
            

<!-- Matomo Image Tracker-->
<img src="http://trecker.rf.gd/matomo/matomo.php?idsite=1&amp;rec=1" style="border:0" alt="" />
<!-- End Matomo -->


          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="clean-blog.min.js"></script>
    <!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//trecker.rf.gd/matomo/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
  </body>
</html>
