<?php require "dashboard.php"; ?>
<link rel="stylesheet" href="./styles/all.css">

<body class="body-one">
<header class="header-one">
    
<a class="logo" href="./images/logo.png">Sft.Grp<img class="logo-image" src="./images/logo.png" alt=""></a>
<nav>
    <ul>
        <li><a href="" class="active">Home</a></li>
        <li><a href="">About</a></li>
        <li> <a href="create.php">
          Add Member
         </a></li>
    </ul>
</nav>
<br><br><br><br>

<div>
  <h2 class="customer-heading-text">
    Members
  </h2>
  <hr>
  <div class="push">
  <?php include './list.php'; ?>
</div>
</div>




</body>

</html>