<link rel="stylesheet" href="./styles/all.css">
<?php require "dashboard.php"; ?>
<?php require "./db.php" ?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  //ERROR CHECKING 

  $errors = [];

  if (!$firstName) {
    $errors[] = 'First Name is required';
    
  }
  if (!$firstName) {
    $errors[] = 'Last Name is required';
  }
  if (!$firstName) {
    $errors[] = 'Email is required';
  }

  //SEND TO DATABASE 
  if (empty($errors)) {
    $statement = $pdo->prepare("INSERT INTO  MEMBERS (Firstname, Lastname, Email,Phone) VALUES (:firstName, :lastName, :email, :phone)");
    $statement->bindValue('firstName', $firstName);
    $statement->bindValue('lastName', $lastName);
    $statement->bindValue('email', $email);
    $statement->bindValue('phone', $phone);
    $statement->execute();
    header("Location: index.php");
  }
}


?>

<?php if (!empty($errors)) : ?>
  <div class="error-alert">
    <?php foreach ($errors as $error) : ?>
      <p><?php echo $error; ?></p>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

  
<form class="form" method="post">
  <h1 class="emoji">👤</h1>
  <h2 class="member-heading-text">
    Add New Member
  </h2>
  <hr>
  <div class="form-grou">
    <label  class="label-class" for="firstName">First Name 👇</label>
    <input   class="input-one"  type="text" name="firstName" id="firstName" placeholder="Enter Members  First Name">
  </div>
  <div class="form-grou">
    <label  class="label-class" for="lastName">Last Name 👇</label>
    <input   class="input-one" type="text" name="lastName" id="lastName" placeholder="Enter Members Last Name">
  </div>
  <div class="form-grou">
    <label  class="label-class" for="email">Email Address 👇</label>
    <input  class="input-one"  type="text" name="email" id="email" placeholder="Enter Members  Email Address">
  </div>
  <div class="form-grou">
    <label  class="label-class" for="phone">Phone 👇</label>
    <input  class="input-one" type="text" name="phone" id="phone" placeholder="Enter phone Address">
  </div>
  <br>
  <div class="form-grou">
    <button   class="button-one" type="submit" class="form-sub">
      SUBMIT
    </button>
  </div>
</form>