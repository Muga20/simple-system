<link rel="stylesheet" href="./styles/all.css">
<?php require "dashboard.php"; ?>
<?php require "./db.php" ?>
<?php

$id =  $_GET["id"] ?? null;
error_reporting(0);
if (!$id) {
  header("Location: index.php");
  exit;
}

$statement = $pdo->prepare("SELECT * FROM MEMBERS  WHERE MembersID= :id");
$statement->bindValue("id", $id);
$statement->execute();
$MEMBERS  = $statement->fetch(PDO::FETCH_ASSOC);

$firstname = $MEMBERS ['firstname'];
$lastname = $MEMBERS ['lastname'];
$email =  $MEMBERS ['email'];
$phone =  $MEMBERS ['phone'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  //ERROR CHECKING 

  $errors = [];

  if (!$firstname) {
    $errors[] = 'First Name is required';
  }
  if (!$firstname) {
    $errors[] = 'Last Name is required';
  }
  if (!$email) {
    $errors[] = 'Email is required';
  }
  if (!$phone) {
    $errors[] = 'Phone is required';
  }

  //UPDATE TABLE IN  THE DATABASE 
  if (empty($errors)) {
    $statement = $pdo->prepare("UPDATE MEMBERS SET Firstname= :firstname, Lastname= :lastname, Email= :email , Phone=:phone WHERE MEMBERSID= :id");

    $statement->bindValue('firstname', $firstname);
    $statement->bindValue('lastname', $lastname);
    $statement->bindValue('email', $email);
    $statement->bindValue('phone', $phone);
    $statement->bindValue('id', $id);

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
<style>

</style>



<form class="form" method="post">
<h1 class="emoji">👍</h1>
  <h2 class="member-heading-text">
  Update Members
  </h2>
  <hr>
  <div class="form-grou">
    <label class="label-class"for="firstname">First Name 👇</label>
    <input class="input-one" type="text" name="firstname" id="firstname" placeholder="Enter Members First Name" value="<?php echo $firstname; ?>">
  </div>
  <div class="form-grou">
    <label class="label-class" for="lastname">Last Name 👇</label>
    <input class="input-one"  type="text" name="lastname" id="lastname" placeholder="Enter Members Last Name" value="<?php echo $lastname; ?>">
  </div>
  <div class="form-grou">
    <label class="label-class" for="email">Email Address 👇</label>
    <input class="input-one"  type="text" name="email" id="email" placeholder="Enter Members Email Address" value="<?php echo $email; ?>">
  </div>
  <div class="form-grou">
    <label  class="label-class" for="phone">Phone 👇</label>
    <input class="input-one"  type="text" name="phone" id="phone" placeholder="Enter Members Phone" value="<?php echo $phone; ?>">
  </div>
  <br>
  <div class="form-grou">
    <button class="button-one"type="submit" class="form-submit-button">
      SUBMIT
    </button>
  </div>
</form>