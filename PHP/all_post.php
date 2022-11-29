<?php
session_start();
include "./database/database.php";

$query ="SELECT * FROM post";

$data = mysqli_query($conn, $query);

$posts = mysqli_fetch_all($data, 1);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
    
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>



<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
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




<div class = "container mt-5">
    <h2>All Post</h2>

    <table class= "table table-resposive">
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Post Details</th>
            <th>Post Author</th>
            <th>Author Email</th>
            <th>Actions</th>
        </tr>

          <?php
          foreach ($posts as $key => $post)
          {
          ?>

        <tr>
            <td><?= ++$key?></td>
            <td><?= $post["title"] ?></td>
            <td><?= strlen ($post['details'])> 50 ? substr ($post['details'], 0, 50) . '...' : $post['details'] ?></td>
            <td><?= $post["author"] ?></td>
            <td><?= $post["mail"] ?></td>


            <td>
                <div class="btn-group">
                    <a href="./show_post.php ? id=<?= $post["id"] ?> " class="btn btn-sm btn-primary">Show</a>
                    <a href="./edit_post.php ? id=<?= $post["id"] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="./controller/delete_post.php?id=<?=$post['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </td>
        </tr>    
        
            <?php
          }
            ?>



        <?php
        if(mysqli_num_rows($data)==0)
        {
        ?>
          <tr class="text-center"> 
            <td colspan="5">No Post Found </td>
          </tr>

        <?php
        }
        ?>

    </table>        
               
</div>

        










<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_unset();