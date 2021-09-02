<?php $title = 'Ingrédiant';
require('head.php');
require('header.php');
require('sibar.php');

require  '../controller/controllerIngrediant.php';
require('../controller/controllerFournisseur.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Ingrédiant - Ajout</h3>

  <!-- FORM VALIDATION -->
  <div class="modal fade  bd-example-modal-lg" id="AddFournisseur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerIngrediant.php">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Ajout des Type ingrédiant</h4>
          </div>
          <div class="modal-body">

            <div class="input-field">
              <table id="row_input">
                <tr>
                  <th width="25%"></th>
                  <th width="25%"></th>
                  <th width="25%"></th>
                  <th width="25%"></th>
                </tr>
                <tr>
                  <td>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Réf Ingrédiant</label>
                      <div class="col-lg-7">
                        <input class=" form-control" id="ref_Prod" name="refIngd[]" min="1" minlength="2" type="text" required="" />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Ingrédiant</label>
                      <div class="col-lg-7">
                        <input class=" form-control" id="nomIngd" name="nomIngd[]" minlength="2" type="text" required />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Prix Unitaire</label>
                      <div class="col-lg-7">
                        <input class=" form-control" id="prixUnt" name="prixUnt[]" min="1" type="number" />
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-3">Quantité</label>
                      <div class="col-lg-7">
                        <input class=" form-control" id="quantiteIng" name="quantiteIng[]" min="1" type="number" />
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
                <button class="btn btn-success" type="submit" id="btnAddTypeIng" name="btnAddTypeIng">Enregistrer</button>
                <button class="btn btn-theme04" type="reset" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Affichage des Ingrédiant -->

  <div class="modal fade  bd-example-modal-lg" id="ListeFournisseur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                      <th>Réferences</th>
                      <th>Nom d'ingrédiant</th>
                      <th>Quantité</th>
                      <th> Prix Unitaire</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($typeIng as $lireTIng) : ?>
                      <tr>
                        <td><?= $lireTIng->references_ing; ?></td>
                        <td><?= $lireTIng->nom_ing; ?></td>
                        <td><?= $lireTIng->prixUnitaireIng; ?></td>
                        <td><?= $lireTIng->quantiteIng; ?></td>
                        <td>
                          <a href="upIngrediant.php?id_up_Ing=<?= $lireTIng->id_TIng; ?>" onclick="return confirm('Êtes-vous sûr de vouloir modifier  : <?= $lireTIng->nom_ing; ?>')" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <a href="../controller/controllerIngrediant.php?id_Del_Ing=<?= $lireTIng->id_TIng; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ingrédiants : <?= $lireTIng->nom_ing; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4>
          <div class="row">
            <div class="col-lg-6">
              <i class="fa fa-angle-right"></i><b>Formulaire de Validation</b>
            </div>
            <div class="col-lg-2">
              <button class="btn btn-theme04 btn-xs" data-toggle="modal" data-target="#AddFournisseur"><i class="fa fa-plus"></i> Ajouter Ingrédiant</button>
            </div>
            <div class="col-lg-2">
              <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ListeFournisseur"><i class="fa fa-eye"></i> Liste Ingrédiant</button>
            </div>
          </div>
        </h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerIngrediant.php">
            <div class="row">
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Type Ingrédiant</label>
                  <div class="col-lg-7">
                    <select name="typeIng" class=" form-control">
                      <option value="">------------------</option>
                      <?php foreach ($typeIng as $Ingred) : ?>
                        <option value="<?= $Ingred->id_TIng; ?>"><?= $Ingred->nom_ing; ?> - <?= $Ingred->references_ing; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Fournisseurs</label>
                  <div class="col-lg-7">
                    <select name="fourni[]" multiple id="multipleM" class=" form-control">
                      <?php foreach ($allFournis as $FourniLire) : ?>
                        <option value="<?= $FourniLire->id_four; ?>"><?= $FourniLire->nom_four; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <button class="btn btn-theme" type="submit" name="btn_add_fourn_Ty">Ajouter</button>
                <button class="btn btn-theme04" onclick="document.location.reload()" type="reset">Annuler</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>
  <!-- /row -->
  <!-- row -->
  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4><i class="fa fa-angle-right"></i> Listes de dernière ajout</h4>
        <hr>
        <table class="table table-striped table-advance table-hover" id="IngredType">
          <thead>
            <tr>
              <th>Réf Ingrédiant</th>
              <th>Ingrédiant</th>
              <th>Fournisseurs</th>
              <th>Quantité</th>
              <th> Prix Unitaire</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDing as $lireDIng) : ?>
              <tr>

                <td rowspan="<?= $lireDIng->IIng + 1; ?>">

                  <?= $lireDIng->references_ing; ?>
                </td>
                <td rowspan="<?= $lireDIng->IIng + 1; ?>">
                  <?= $lireDIng->nom_ing;
                  $iiii = $lireDIng->id_TIng;
                  ?>
                </td>
                <?php
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM type_ingrediant, ingrediants, fournisseur WHERE type_ingrediant.id_TIng = ingrediants.id_type_ing  AND ingrediants.id_fou = fournisseur.id_four AND ingrediants.id_type_ing = ?");
                $query->execute(array($iiii));
                $echIiing =  $query->fetchall(PDO::FETCH_OBJ);

                foreach ($echIiing as $echoIii) :;
                ?>
              <tr>
                <td><?= $echoIii->nom_four; ?></td>
                <td><?= $echoIii->quantiteIng; ?></td>
                <td><?= $echoIii->prixUnitaireIng; ?></td>
                <td><?= $echoIii->quantiteIng * $echoIii->prixUnitaireIng; ?></td>
                <td>
                  <a href="../controller/controllerIngrediant.php?id_del_four_typeI=<?= $echoIii->id_ingrediant; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ingrédiants : <?= $echoIii->nom_ing; ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              <?php endforeach; ?>
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


    var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Réf Ingrédiant</label><div class="col-lg-7"><input class=" form-control" id="ref_Prod" name="refIngd[]" min="1" minlength="2" type="text" required="" /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Ingrédiant</label><div class="col-lg-7"><input class=" form-control" id="nomIngd" name="nomIngd[]" minlength="2" type="text" required /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Prix Unitaire</label><div class="col-lg-7"><input class=" form-control" id="prixUnitaire" name="prixUnt[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantitePro" name="quantiteIng[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

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