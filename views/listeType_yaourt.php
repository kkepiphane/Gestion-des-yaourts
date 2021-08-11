<?php $title = 'Liste Type Yaourt';
 require ('main.php');
 require('../controller/controllerTYaourt.php');
?>

      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Lites des Type Yaourt </h3>
        <!-- /row -->
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes des Yaourts</h4>
                <hr>
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th>Yaourt</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allTYaout as $echoTY): ?>
                  <tr>
                    <td><?=$echoTY->nom_yaourt;?></td>
                    <td>
                      <a href="upType_yaourt.php?idUpTYa=<?=$echoTY->id_ty; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="../controller/controllerTYaourt.php?idDelTY=<?=$echoTY->id_ty;?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
      <?php require ('foot.php')?>