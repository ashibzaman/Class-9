<?php
session_start();
?>



<html> 
 <title>Add Post</title>

 <head>

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

 </head>
 
 <body>
 
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./all_post.php">All Post</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php
if(isset($_SESSION["success"])){ ?>
<div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style = "position: absolute; bottom: 100px; right: 100px;" >
  <div class="toast-header">
    <strong class="me-auto">Post System</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <?= $_SESSION["success"]?>
  </div>
</div>

<?php } ?>


<div class ="container">
  <div class="col-6 mx-auto mt-5">
      
    <div calss= "card">
      <div class="card-hearder">
        <strong>Add Post</strong>
      </div>

        <div class = "card-body">
         <form action="./controller/post_store.php" method= "POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Post Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" 
                value="<?= isset($_SESSION["oldData"]["title"]) ? $_SESSION ["oldData"]["title"]: ""?>">
              
              <?php
              if (isset ($_SESSION ["error"]["title"])){
              ?>
          
                  <span class="text-danger">
                    <?php
                        echo $_SESSION ["error"]["title"]
                    ?>              
                  </span>      
              <?php
              }
              ?>
            </div>
			
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Details</label>
            <textarea name="details" class="form-control" id="details"><?= isset($_SESSION["oldData"]["details"]) ? $_SESSION ["oldData"]["details"]: ""?>
            </textarea>
            

              <?php
              if (isset ($_SESSION ["error"]["details"])){
              ?>
          
                  <span class="text-danger">
                    <?php
                        echo $_SESSION ["error"]["details"]
                    ?>              
                  </span>      
              <?php
              }
              ?>

          </div>

				<div class="mb-3">
					<label for="author" class="form-label">Author Name</label>
					<input type="text" name="author" class="form-control" id="author"
          value="<?= isset($_SESSION["oldData"]["author"]) ? $_SESSION ["oldData"]["author"]: ""?>">
				  <?php
				  if (isset ($_SESSION ["error"]["author"])){
				  ?>
          
                  <span class="text-danger">
                    <?php
                        echo $_SESSION ["error"]["author"]
                    ?>              
                  </span>      
				  <?php
				  }
				  ?>
				</div>



				<div class="mb-3">
					<label for="mail" class="form-label">Email Address</label>
					<input type="text" name="mail" class="form-control" id="mail"
          value="<?= isset($_SESSION["oldData"]["mail"]) ? $_SESSION ["oldData"]["mail"]: ""?>">
				  <?php
				  if (isset ($_SESSION ["error"]["mail"])){
				  ?>
          
                  <span class="text-danger">
                    <?php
                        echo $_SESSION ["error"]["mail"]
                    ?>              
                  </span>      
				  <?php
				  }
				  ?>
				</div>


          <button type="submit" name = "submit" value="submitted" class="btn btn-primary w-100">Submit</button>
        </form>
        </div>
    </div>



  </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

 </body>
 </html>

 <?php
 session_unset()
 ?>