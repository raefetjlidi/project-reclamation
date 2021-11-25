<?php
require 'db.php';
$sql = 'SELECT * FROM contact';
$statement = $connection->prepare($sql);
$statement->execute();
$contact = $statement->fetchAll(PDO::FETCH_OBJ);

$sql2 = 'select * from motif as m INNER JOIN contact as c on m.reclaId == c.id';
$statement2 = $connection->prepare($sql2);
$statement2->execute();
$motif = $statement2->fetchAll(PDO::FETCH_OBJ);

 ?>
<?php require 'header.php'; ?>
<div class="container body-background">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Page Administrateur</h2>
    </div>
    <div class="card-body">
      <table class="table table-responsive table-bordered">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Tel</th>
          <th>Type</th>
          <th>Sujet</th>
          <th>Message</th>
        </tr>
        <?php foreach($contact as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->name; ?></td>
            <td><?= $person->email; ?></td>
            <td><?= $person->phone; ?></td>
            <td><?= $motif->type; ?></td>
            <td><?= $person->subject; ?></td>
            <td><?= $person->message; ?></td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Modifier</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>


