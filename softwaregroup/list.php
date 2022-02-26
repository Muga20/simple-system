<?php
include './db.php';

$statement = $pdo->prepare("SELECT * FROM  MEMBERS ");
$statement->execute();
$MEMBERS = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<style>
.trd {
  border-radius: 9px;
  background-color:#f57128;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  font-size: 17px;
}
.table-d{
  display: flex;
 
}
.table-d a {
  text-decoration: none;
}
.table-d control-button delete :hover {
background-color: #ff007b;
}
.member-table{
  border: 5px solid #b1346a;
  border-radius: 5px;
  width: 500px;


}
tr{
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

th{
  border: 3px solid #b1346a;
  border-radius: 3px; 
  padding-left: 1px;
  padding-right: 1px;
  
}
td{
  border:3px solid #b1346a;
  border-radius: 3px; 
  font-size: 19px;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
</style>

<table class="member-table" border='0' >
  <thead >
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Controls</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($MEMBERS as $MEMBERS):?>
      <tr>
        <td><?php echo $MEMBERS["MembersID"]; ?></td>
        <td><?php echo $MEMBERS["firstname"]; ?></td>
        <td><?php echo $MEMBERS["lastname"]; ?></td>
        <td><?php echo $MEMBERS["email"]; ?></td>
        <td><?php echo $MEMBERS["Phone"]; ?></td>

        <td class="table-d">
          <a href="update.php?id=<?php echo $MEMBERS["MembersID"]; ?>">
            <button class="control-button edit">Edit</button>
          </a>
          
          <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $MEMBERS['MembersID']; ?>" />
            <button class="control-button delete">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>