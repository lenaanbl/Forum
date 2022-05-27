<?php include_once('view/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CSS User Profile Card</title>
	<link rel="stylesheet" href="./css/style_profile.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>


<div class="wrapper">
    <div class="left">
    <div class="thumbnail">
      <img src="https://www.gravatar.com/avatar/" class="img-responsive user-photo">
    </div>        
        <h4></h4>
         <p>Parc favori</p>
    </div>
    <div>
      <button> <a href="../index.php?p=change_pass">changer mon mot de passe </a></button>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                    
                 </div>
                 <div class="data">
                   <h4>Telephone</h4>
                    <p>0001-213-998761</p>
              </div>
            </div>
        </div>
      
      <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Recent</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                 </div>
                 <div class="data">
                   <h4>Most Viewed</h4>
                    <p>dolor sit amet.</p>
              </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>