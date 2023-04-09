<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Carousel Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      #myCarousel{
        position: relative;
        top: -250px;
        
        
      }
      #Team{
        position: relative;
        top: -150px;
      }
      img{
        border-radius: 100px;
        width: 150px;
        
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body style="background-image: url(assets/images/footer-bg.jpg)">
    

<main>

  <div id="myCarousel"  data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
            <h1><p style="color: black; font-size: 150%;">Employee   <b style="color: orangered;">Expense</b> Team</p></h1>
            <p>The employee expense team consists of experienced accountants and financial analysts.</p>
            
          </div>
        </div>
      </div>
     

    </div>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div id="Team" class="row">
      <div class="col-lg-4">
        <img src="assets/images/andam.jpg"  alt="">
       <h2 class="fw-normal">Andam</h2>
        <p>is a detail-oriented developer with expertise in programming languages, algorithms, and data structures. They excel at problem-solving and stay up-to-date with the latest tech trends.</p>
        <p><a class="btn btn-secondary" href="https://www.facebook.com/Andam.Adam.username">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="assets/images/hiwa.jpg" alt="">
        <h2 class="fw-normal">Hiwa</h2>
        <p>is a creative and innovative developer with a passion for creating engaging user experiences. They enjoy experimenting with new ideas and approaches to problem-solving.</p>
        <p><a class="btn btn-secondary" href="https://www.facebook.com/hiwa.muhammed.78">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="assets/images/sirwan.jpg"  alt="">
        <h2 class="fw-normal">Sirwan</h2>
        <p>is a collaborative developer who values teamwork and open communication. They are skilled at building strong relationships with colleagues and stakeholders, and always ready to lend a helping hand to achieve common goals.</p>
        <p><a class="btn btn-secondary" href="https://www.facebook.com/sirwan.bakr.399">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


  

  

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


 


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
