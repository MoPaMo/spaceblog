<?php
if(isset($_GET["id"])){
  include("db.php");
  $conn=db();
  $res1=$conn->query("SELECT * FROM posts WHERE id=".intval($_GET["id"]).";");
  $res2=$res1->fetch_all(MYSQLI_ASSOC);
  if(count($res2)>0){
    $res= $res2[0];
  }
}else{
  http_response_code(404);
  include('404.html'); // provide your own HTML for the error page
  die();
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="<?php echo hex2bin($res["short"]);?>" />
    <meta name="author" content="<?php echo hex2bin($res["author"]);?>" />

    <title><?php echo hex2bin($res["title"]);?> -- spaceBlog</title>

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
    <link href="/clean-blog.min.css" rel="stylesheet" />
    <style>
      ul.share-buttons {
        list-style: none;
        padding: 0;
      }

      ul.share-buttons li {
        display: inline;
      }

      ul.share-buttons .sr-only {
        position: absolute;
        clip: rect(1px 1px 1px 1px);
        clip: rect(1px, 1px, 1px, 1px);
        padding: 0;
        border: 0;
        height: 1px;
        width: 1px;
        overflow: hidden;
      }
    </style>
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/">spaceBlog</a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menü
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about.html">Über</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/post.html">Zufälliger Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact.html">Kontakt</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header
      class="masthead"
      style="background-image: url('<?php echo hex2bin($res["image"]);?>'), url('https://source.unsplash.com/user/nasa')"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?php echo hex2bin($res["title"]);?> </h1>
              <h2 class="subheading">
                <?php echo hex2bin($res["short"]);?> 
              </h2>
              <span class="meta"
                >Posted by
                <a href="#"><?php echo hex2bin($res["author"]);?> </a>
                on <?php echo $res["created"];?> </span
              >
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            echo hex2bin($res["content"]);
            ?>

            <p>
               Photos by 
              <a href="https://www.unsplash.com/photos/@nasa/"
                >NASA @ Unsplash</a
              >.
            </p>
          </div>
        </div>

        <ul class="share-buttons text-center" data-source="simplesharingbuttons.com">
          <li>
            <a
              href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&quote=spaceBlog%3A%20article"
              target="_blank"
              title="Share on Facebook"
              ><i class="fab fa-facebook-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Share on Facebook</span></a
            >
          </li>
          <li>
            <a
              href="https://twitter.com/intent/tweet?source=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&text=spaceBlog%3A%20article:%20<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>"
              target="_blank"
              title="Tweet"
              ><i class="fab fa-twitter-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Tweet</span></a
            >
          </li>
          <li>
            <a
              href="https://plus.google.com/share?url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>"
              target="_blank"
              title="Share on Google+"
              ><i class="fab fa-google-plus-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Share on Google+</span></a
            >
          </li>
          <li>
            <a
              href="http://www.tumblr.com/share?v=3&u=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>"
              target="_blank"
              title="Post to Tumblr"
              ><i class="fab fa-tumblr-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Post to Tumblr</span></a
            >
          </li>
          <li>
            <a
              href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&description=Found%20this%20article%20on%20spaceBlog%3A"
              target="_blank"
              title="Pin it"
              ><i class="fab fa-pinterest-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Pin it</span></a
            >
          </li>
          <li>
            <a
              href="https://getpocket.com/save?url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&title=spaceBlog%3A%20article"
              target="_blank"
              title="Add to Pocket"
            >
              <i class="fab fab fa-get-pocket fa-2x" aria-hidden="true"></i>
              <span class="sr-only">Add to Pocket</span>
            </a>
          </li>
          <li>
            <a
              href="http://www.reddit.com/submit?url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&title=spaceBlog%3A%20article"
              target="_blank"
              title="Submit to Reddit"
              ><i class="fab fa-reddit-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Submit to Reddit</span></a
            >
          </li>
          <li>
            <a
              href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&title=spaceBlog%3A%20article&summary=Found%20this%20article%20on%20spaceBlog%3A&source=http%3A%2F%2Fhttps%3A%2F%2Fspaceblog.glitch.me"
              target="_blank"
              title="Share on LinkedIn"
              ><i class="fab fa-linkedin fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Share on LinkedIn</span></a
            >
          </li>
          <li>
            <a
              href="http://wordpress.com/press-this.php?u=<?php echo urlencode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>&quote=spaceBlog%3A%20article&s=Found%20this%20article%20on%20spaceBlog%3A"
              target="_blank"
              title="Publish on WordPress"
              ><i class="fab fa-wordpress fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Publish on WordPress</span></a
            >
          </li>
          <li>
            <a
              href="mailto:?subject=spaceBlog%3A%20article&body=Found%20this%20article%20on%20spaceBlog%3A:%20<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");?>"
              target="_blank"
              title="Send email"
              ><i class="fas fa-envelope-square fa-2x" aria-hidden="true"></i
              ><span class="sr-only">Send email</span></a
            >
          </li>
        </ul>
      </div>
    </article>

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
    <script>function share(){
  if (navigator.share) {
  navigator.share({
    title: '<?php echo ',
    text: 'Check out web.dev.',
    url: 'https://web.dev/',
  })
    .then(() => console.log('Successful share'))
    .catch((error) => console.log('Error sharing', error));
}
}</script>
    <script src="/clean-blog.min.js"></script>
  </body>
</html>
