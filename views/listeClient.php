<?php $title = 'Add Client';
 require ('main.php');;

 require  '../controller/controllerClient.php';
?>
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste des Clients </h3>
        <!-- /row -->
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes de tout les clients</h4>
                <hr>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Nom Client</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allClient as $echoClts):?>
                  <tr>
                    <td><?= $echoClts->nom_client; ?></td>
                    <td><?= $echoClts->telephone; ?></td>
                    <td><?= $echoClts->adresse_client; ?></td>
                    <td>
                      <a href="upClient.php?id_clt=<?=$echoClts->id_client ;?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="listeClient.php?id_DLclt=<?=$echoClts->id_client ;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
      <?php require ('foot.php');?>