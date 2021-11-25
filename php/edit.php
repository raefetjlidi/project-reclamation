<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM contact WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$contact = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['subject']) && isset($_POST['message'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $type = $_POST['type'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];



  $sql = 'UPDATE contact SET name=:name, email=:email , phone=:phone , type=:type , subject=:subject , message=:message WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email,':phone' => $phone,':type' => $type ,':subject' => $subject, ':message' => $message, ':id' => $id])) {
    header("location:\atelierphp/web/php/index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update contact</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $contact->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $contact->email; ?>" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
          <label for="phone">phone</label>
          <input type="phone" value="<?= $contact->phone; ?>" name="phone" id="phone" class="form-control">
        </div>

        <div class="form-group">
          <label for="type">type</label>
          <input type="type" value="<?= $contact->type; ?>" name="type" id="type" class="form-control">
        </div>

        <div class="form-group">
          <label for="subject">Email</label>
          <input type="subject" value="<?= $contact->subject; ?>" name="subject" id="subject" class="form-control">
        </div>

        <div class="form-group">
          <label for="message">message</label>
          <input type="message" value="<?= $contact->message; ?>" name="message" id="message" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
