<?php $title = 'Type Produit';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerTYaourt.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Type <?= $getN->produitGest; ?> & Ingrédiant </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4>
          <div class="row">
            <div class="col-lg-6">
              <i class="fa fa-angle-right"></i> Formulaire de validation de Composition
            </div>
            <div class="col-lg-2">
              <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#type_yaourt"><i class="fa fa-plus"></i> Ajouter Ingrédiant</button>
            </div>
            <div class="col-lg-2">
              <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#Liste_yaourt"><i class="fa fa-eye"></i> Liste Ingrédiant</button>
            </div>
          </div>
        </h4>
        <hr>

        <div class="modal fade  bd-example-modal-lg" id="type_yaourt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerTYaourt.php">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Ajout des Types <?= $getN->produitGest; ?></h4>
                </div>
                <div class="modal-body">

                  <div class="input-field">
                    <table id="row_input">
                      <tr>
                        <th width="50%"></th>
                        <th width="50%"></th>
                        <th width="50%"></th>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Réf</label>
                            <div class="col-lg-7">
                              <input class=" form-control" id="ref_Prod" name="refPro[]" min="1" minlength="2" type="text" required="" />
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Type <?= $getN->produitGest; ?></label>
                            <div class="col-lg-7">
                              <input class=" form-control" id="nomYPro" name="nomYPro[]" minlength="2" type="text" required />
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="form-group ">
                            <input class="btn btn-theme btn-xs" type="button" name="addFactA" id="addFactA" value="Ajout une ligne" />
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="form-group">
                    <div class="col-lg-offset col-lg-8">
                      <button class="btn btn-success" type="submit" id="btn_type_pro" name="btn_type_pro">Enregistrer</button>
                      <button class="btn btn-theme04" type="reset" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerTYaourt.php">
            <div class="row">
              <div class="col-xs-4 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Type <?= $getN->produitGest; ?></label>
                  <div class="col-lg-6">
                    <select name="tyTY" class=" form-control">
                      <option value="">----------------</option>
                      <?php foreach ($typ as $echoTypeY) : ?>
                        <option value=" <?= $echoTypeY->id_ty; ?>"><?= $echoTypeY->nom_yaourt; ?> - <?= $echoTypeY->ref_yaourt; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Type d'ingrédiant</label>
                  <div class="col-lg-6">
                    <select name="TYIng[]" id="multipleM" class=" form-control" multiple>
                      <?php foreach ($affichIn as $echoFoerIng) : ?>
                        <option value=" <?= $echoFoerIng->id_TIng; ?>"><?= $echoFoerIng->nom_ing; ?> - <?= $echoFoerIng->references_ing; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btnAddTypeY">Ajouter</button>
                <a href="#" class="btn btn-theme04" onclick="document.location.reload()" type="reset">Annuler</a>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>


  <div class="modal fade  bd-example-modal-lg" id="Liste_yaourt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">La liste des Ingrédaints</h4>
        </div>
        <div class="modal-body">

          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout</h4>
                <hr>
                <table class="table table-striped table-advance table-hover" id="IngredFourni">
                  <thead>
                    <tr>
                      <th>Référence</th>
                      <th>Type <?= $getN->produitGest; ?></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($typ as $lireTY) : ?>
                      <tr>
                        <td><?= $lireTY->ref_yaourt; ?></td>
                        <td><?= $lireTY->nom_yaourt; ?></td>
                        <td>
                          <a href="upType_yaourt.php?id_upd_TY=<?= $lireTY->id_ty; ?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier  : <?= $lireTY->nom_yaourt; ?> - <?= $lireTY->ref_yaourt; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="../controller/controllerTYaourt.php?id_Del_Ty=<?= $lireTY->id_ty; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce type de produit : <?= $lireTY->nom_yaourt; ?> - <?= $lireTY->ref_yaourt; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
        </div>
      </div>
    </div>
  </div>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes des <?= $getN->produitGest; ?> & Ingrédiant</h4>
        <hr>
        <table class="table table-striped table-advance table-hover" width="100%" cellspacing="0" cellpadding="5">
          <thead>
            <tr>
              <th><?= $getN->produitGest; ?></th>
              <th>Type d'ingrédiant</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allTYaout as $echoTY) : ?>
              <tr>
                <td rowspan="<?= $echoTY->idTYao + 1; ?>">
                  <?= $echoTY->nom_yaourt; ?>
                </td>
                <?php
                $aaaaaa = $echoTY->id_ty;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM type_yaout, composition_produit, type_ingrediant WHERE composition_produit.id_typeY  = type_yaout.id_ty AND composition_produit.id_typeI = type_ingrediant.id_TIng AND composition_produit.id_typeY = '" . $aaaaaa . "'");
                $query->execute();
                $echI =  $query->fetchall(PDO::FETCH_OBJ);
                foreach ($echI as $echoTI) :
                ?>
              <tr>
                <td><?= $echoTI->nom_ing; ?> - <?= $echoTI->references_ing; ?></td>
                <td>
                  <a href="../controller/controllerTYaourt.php?id_Del_comp=<?= $echoTI->id_comp; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ingrédiants : <?= $echoTI->nom_ing; ?> - <?= $echoTI->references_ing; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endforeach; ?>
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
  </div>
  <!-- /row -->
</section>
</section>
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/multiple-select.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->

<script src="../public/js-ui/DataTables/datatables.min.js"></script>
<script src="../public/js-ui/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../public/js-ui/Customizable-Analog-Clock-with-jQuery/js/jquery.thooClock.js"></script>

<script>
  $(document).ready(function() {
    function load_unseen_notification(view = '') {
      $.ajax({
        url: "../controller/controllerNotification.php",
        method: "POST",
        data: {
          view: view
        },
        dataType: "json",
        success: function(data) {
          $('.dropdown-menu').html(data.notification);
          if (data.unseen_notification > 0) {
            $('.count').html(data.unseen_notification);
          }
        }
      });
    }
    load_unseen_notification();
    $('#notifFom').on('submit', function(event) {
      event.preventDefault();
      if ($('#sujet').val() != '' && $('#dateAvnt').val() != '') {
        var form_data = $(this).serialize();
        $.ajax({
          url: "../controller/controllerNotification.php",
          method: "POST",
          data: form_data,
          success: function() {
            $('#notifFom')[0].reset();
            load_unseen_notification();
          }
        })
      } else {
        alert("les Données sont pas entrées veuillet vérifié les champs");
      }
    });
    //Lorsqu on click on a affiche plus la notification
    $(document).on('click', '.dropdown-toggle', function() {
      $('.count').html('');
      load_unseen_notification('yes');
    })
    setInterval(function() {
      load_unseen_notification();
    }, 5000);


    var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Ref</label><div class="col-lg-7"><input class=" form-control" id="ref_Prod" name="refPro[]" min="1" minlength="2" type="text" required="" /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Type <?= $getN->produitGest; ?></label><div class="col-lg-7"><input class=" form-control" id="nomYPro" name="nomYPro[]" minlength="2" type="text" required /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

    var x = 1;
    /**
     * Cette fonction permet d ajouter 
     */
    $("#addFactA").click(function() {
      $("#row_input").append(html);
    });
    $("#row_input").on('click', '#delFac', function() {
      $(this).closest('tr').remove();
    });
  });
</script>

<script>
  $(function() {
    $('#multipleM').multipleSelect();
  });
</script>

<script>
  $(document).ready(function() {
    $('#IngredTyp').dataTable();
  });
</script>
</body>

</html>