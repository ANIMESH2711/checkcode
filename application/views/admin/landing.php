<!DOCTYPE html>
<html lang="en">
<head>
  <title>Check Code</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #5d5656;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!-- <a class="navbar-brand" href="#">Logo</a> -->
      <a class="navbar-brand" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://rhino-pharma.com/">Home</a></li>
        <li><a href="#">About</a></li>
        <!-- <li><a href="#">Projects</a></li> -->
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </div>
</nav>




<?php if ($this->session->flashdata('category_success1')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success1') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error1')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error1') ?> </div>
<?php } ?>



<?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
<?php }  ?>

<!-- <?php //unset($_SESSION['category_success1']);unset($_SESSION['category_error1']);unset($_SESSION['category_error']); ?> -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <!-- <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image"> -->
        <img src="http://rhino-pharma.com/img/11.jpg" style="width:90%;height:350px"  alt="Image">
        <div class="carousel-caption">
          <h3>Make Your Health</h3>
          <!-- <p>Money Money.</p> -->
        </div>      
      </div>

      <div class="item">
        <!-- <img src="https://placehold.it/1200x400?text=Another Image Maybe" alt="Image"> -->
        <img src="http://rhino-pharma.com/img/12.jpg" style="width:90%;height:350px"  alt="Image">
        <div class="carousel-caption">
          <h3>Fit Your Figure</h3>
          <!-- <p>Lorem ipsum...</p> -->
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center" >    
  <h3 style="text-decoration:underline"><b>Confirm Your Coupon Code Here</b></h3><br>
  <div class="row">
    <div class="col-sm-6" style="background-color:grey"> 
      <!-- <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Current Project</p> -->
<h1><b>CHECK FOR AUTHENTICITY</b></h1>
<p>Enter "Authenticity Codes" found on the label to verify the authenticity of your product.<p>
     
 
<?php if ($this->session->flashdata('category_success1')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success1') ?> </div>
    <?php } ?>
    <?php if ($this->session->flashdata('category_error1')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error1') ?> </div>
<?php } ?>



<?php if ($this->session->flashdata('category_error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
<?php }  ?>

<?php unset($_SESSION['category_success1']);unset($_SESSION['category_error1']);unset($_SESSION['category_error']); ?>
  <form action="<?=base_url('Admin/validateForm/');?>" method="post" >

  <label for="fname">Code no:</label><br>
  <input type="text" id="fname" placeholder="Code Number" name="Code" required><br><br>
  <label for="lname">Serial nO:</label><br>
  <input type="text" id="lname" name="Serial"  placeholder="Serial Number" required><br><br>
  <input type="submit" class="btn-primary" value="Submit">
</form> 
    </div>
    <div class="col-sm-6" style="text-align:left"> 
    <div class="col-sm-6" style="text-align:left"> 
      <img src="http://rhino-pharma.com/img/1.jfif" class="img-responsive" style="width:;height:270px"  alt="Image">
      </div><div class="col-sm-6" style="text-align:left"> 
      <img src="http://rhino-pharma.com/img/2.jfif" class="img-responsive" style="width:;height:270px"  alt="Image">
     </div>
      <!-- <li><b>1. If authentication codes are checked more than once then the product is fake.</b></li>   
      <li><b>2. Meditechpharmaceutical.net is the only legit site. Fake website and social media include the following:</b></li>   
      <li><b>FAKE Website:</b></li>   
      <li><b>Meditech-pharmaceutical.net</b></li>   
      <li><b>Meditechpharmaceutical.com</b></li>   
      <li><b>Meditech-pharmaceutical.com</b></li>   
      <li><b>FAKE Facebook:</b></li>   
      <li><b>Meditech Steroid Malaysia</b></li>   
      <li><b>Meditech international</b></li>   
      <li><b>Muscle Juice Malaysia</b></li>   
      <li><b>Meditech HUMAN Pharmaceutical</b></li>   
      <li><b>BFNH Steroid Bangladesh</b></li>   
      <li><b>NO pain NO gain</b></li>   
      <li><b>Meditech Pharmaceutical Philippines - Distributor</b></li>   
      <li><b>FAKE Instagram</b></li>   
      <li><b>ma.tt1059</b></li>   
      <li><b>steroid_king_</b></li>   
      <li><b>meditech_bn</b></li>   
      <li><b>meditech_bodyengineers</b></li>   
      <li><b>meditech_steroids.china             </b></li>     -->
    </div>
    <!-- <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div> -->
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Rhino - Pharma</p>
</footer>

</body>
</html>
