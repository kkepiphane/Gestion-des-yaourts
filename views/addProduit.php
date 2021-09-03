<?php $title = 'Produit';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerProduit.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Produit Final à vendre - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerProduit.php">
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="input-field">
                  <table id="row_input">
                    <tr>
                      <th width="35%"></th>
                      <th width="30%"></th>
                      <th width="30%"></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">Produit</label>
                          <div class="col-lg-7">
                            <select class="form-control" name="yaourt[]">
                              <option>------------</option>
                              <?php foreach ($allGroupPro as $echoProY) :; ?>
                                <option value="<?= $echoProY->yaourt_id; ?>"><?= $echoProY->nom_yaourt; ?> - <?= $echoProY->ref_yaourt; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">P Unitaire</label>
                          <div class="col-lg-7">
                            <input class=" form-control" id="prixUnitaire" name="prixUnitaire[]" min="1" minlength="2" type="text" required="" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">Quantité</label>
                          <div class="col-lg-7">
                            <input class=" form-control" id="quantitePro" name="quantitePro[]" min="1" minlength="2" type="number" required="" />
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
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <input class="btn btn-success" type="submit" name="btnAddProd" id="btnAddProd" value="Enregistrer" />
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
        <h4><i class="fa fa-angle-right"></i> Listes de Yaourt Disponible</h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Ref</th>
              <th>Produit</th>
              <th>Quantité Produit</th>
              <th>Prix</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $som = 0;
            foreach ($allProds as $echoLirePro) :; ?>
              <tr>
                <td><?= $echoLirePro->ref_yaourt; ?></td>
                <td><?= $echoLirePro->nom_yaourt; ?></td>
                <td><?= $echoLirePro->quantite_pro; ?></td>
                <td><?= $echoLirePro->prix_produit; ?></td>
                <td><?= $echoLirePro->quantite_pro * $echoLirePro->prix_produit;
                    $som = $echoLirePro->quantite_pro * $echoLirePro->prix_produit + $som;
                    ?></td>
                <td>
                  <a href="upProduit.php?idUpdProd=<?= $echoLirePro->id_prod; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  <a href="../controller/controllerProduit.php?idDel_Prod=<?= $echoLirePro->id_prod; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th>Montant Total</th>
              <th><?= $som; ?></th>
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
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="../public/multiple-select.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->

<script>
  $(document).ready(function() {
    /**
     * Cette fonction permet d'ajout la notification et d'ajouter
     */
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


    /**
     * Ici cette methode c est pour d ajouter les input pour l ajout des ingrédiant et la quantité
     * 
     */
    var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Produit</label><div class="col-lg-7"><select class="form-control" name="yaourt[]"><option>------------</option><?php foreach ($allGroupPro as $echoProY) :; ?><option value="<?= $echoProY->yaourt_id; ?>"><?= $echoProY->nom_yaourt; ?> - <?= $echoProY->ref_yaourt; ?></option><?php endforeach; ?></select></div></div></td> <td><div class="form-group "><label for="cname" class="control-label col-lg-3">P Unitaire</label><div class="col-lg-7"><input class=" form-control" id="prixUnitaire" name="prixUnitaire[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantitePro" name="quantitePro[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

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




  //cette fonction permet de selectionné et de mettre les données dans les champs
  function fournisseurOnchange(id) {
    $('#ingred').html('');
    $.ajax({
      type: 'POST',
      url: '../controller/controllerFactureAchat.php',
      data: {
        id_fourSS: id
      },
      success: function(data) {
        $('#ingred').html(data);
      }
    })
  }
  //cette fonction permet de selectionné et de mettre les données dans les champs
  function IngredOnchange(id) {
    $('#ingred').html('');
    $.ajax({
      type: 'POST',
      url: '../controller/controllerFactureAchat.php',
      data: {
        id_fourSS: id
      },
      success: function(data) {
        $('#ingred').html(data);
      }
    })
  }
</script>
</body>

</html>