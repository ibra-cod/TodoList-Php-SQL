<?php require 'includes/head.php'; ?>
<?php require 'checks/check.php'; ?>
<?php 
$error = "Fields can't be empty";
$num = 1;
/* PHP VERIFICATION*/
$error = null;
?>

      <div class="container-fuild text-center d-flex flex-column ">  
        <h2 class="h2 mt-5">CRUD PHP</h2>
        <!-- verification si le champs est vide afficher l'érreur ($erreur) nommé plus haut */ -->
        <?php if(empty($todo)):?>
            <?= $error = "Field can't be empty" ?>
        <?php endif ?>
            <div class="container d-flex align-items-center" >
            <form class="row row-cols-lg-auto g-3 align-items-center" style="display: flex;" action="checks/check.php" method="GET">
                          <div class="col-12 " >
                              <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                                <div class="input-group">
                                  <input type="text" class="form-control mr-3" id="inlineFormInputGroupUsername" placeholder="Username" name="todo" >
                                </div>
                          </div>
                      <div class="col-12">
                    <input type="submit" class="btn btn-primary"name="submit" id="todo" placeholder="envoyer" value="Add Todo">
          </div>

          <div class="container-fluid d-flex align-center">
          <table class="table">
              <thead>
                      <tr>
                        <th scope="col-2">Numberr</th>
                        <th scope="col-2">Todo</th>
                        <th scope="col-2">Date</th>
                        <th scope="col-2">Actions</th>
                      </tr>
                  </thead>
          <tbody>
          <?php
            $sql = 'SELECT * FROM `todo`';
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";  
                    echo "<td>".$num++."</td>";
                    echo "<td>".$row['todo_input']. "</td>";
                    echo "<td>".$row['Date_fin']. "</td>";
                    echo '<td><a href="checks/buttons-checks.php?id=' . htmlentities($row['input_id']) . '" class="btn btn-outline-success"> modify</a></td>';
                    echo '<td> </td>';
                    echo '<td><a href="checks/buttons-checks.php?id=' . htmlentities($row['input_id']) . '" class="btn btn-danger"> Delete</a></td>';
                   

                    
            }
              ; ?>
            </form>
      </div>
      <?php require 'includes/footer.php'; ?>