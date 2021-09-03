<?php $title = 'Commande';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerCommande.php');
?>

<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Commande - ajout</h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validation</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerCommande.php">
            <div class="row">
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Ref Commande</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="ref_com" minlength="2" type="text" />
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-sm-6">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Date Commande</label>
                  <div class="col-lg-6">
                    <input class=" form-control" id="cname" name="dateCom" minlength="2" type="date" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="input-field">
                  <table id="row_input">
                    <tr>
                      <th width="53%"></th>
                      <th width="40%"></th>
                      <th width="28%"></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">Produit</label>
                          <div class="col-lg-7">
                            <select name="produit[]" class="form-control" onchange="selectIngrediant(this.value)">
                              <?php foreach ($allProds as $echoForeiKeyClt) : ?>
                                <option value=" <?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->ref_yaourt; ?> - <?= $echoForeiKeyClt->nom_yaourt; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">Quantité</label>
                          <div class="col-lg-7">
                            <input class=" form-control" id="quantiteIng" name="quantite[]" min="1" minlength="2" type="number" required="" />
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
                <input class="btn btn-success" type="submit" name="btnAddComm" id="btnAddComm" value="Enregistrer" />
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
        <h4>
          <div class="col-lg-6">
            <i class="fa fa-angle-right"></i>Listes des Commandes
          </div>
          <div class="col-lg-2-right">
            <a href="commandLiv.php" class="btn btn-success outline" title="Cliqué pour faire livré"><i class="fa fa-hand-o-right"></i> faire Livré</a>
          </div>
        </h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Référence</th>
              <th>Date Commande</th>
              <th>Editer</th>
              <th> Ref Produit</th>
              <th> Produit</th>
              <th> Quantité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($aDcoms as $echoComD) : ?>
              <tr>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->reference_commande ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>"><?= $echoComD->date_com ?></td>
                <td rowspan="<?= $echoComD->comptDate + 1; ?>">
                  <a href="upCommande.php?id_upd_Com=<?= $echoComD->id_com ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                </td>
                <?php
                $cltComid = $echoComD->id_com;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM commande, produits, prod_commande, type_yaout WHERE type_yaout.id_ty = produits.id_yaourt AND prod_commande.id_comma_pro = commande.id_com AND prod_commande.id_produit_com = produits.id_prod AND livraison like '%non_livre%' AND commande.id_com = '" . $cltComid . "'");
                $query->execute();
                $idCltDate = $query->fetchall(PDO::FETCH_OBJ);

                foreach ($idCltDate as $dayClt) :;
                ?>
              <tr>
                <td><?= $dayClt->ref_yaourt ?></td>
                <td><?= $dayClt->nom_yaourt ?></td>
                <td><?= $dayClt->quantite_com ?></td>
                <td>
                  <a href="../controller/controllerCommande.php?idDel_com=<?= $dayClt->id_prd_q_com ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit : <?= $dayClt->id_yaourt; ?> dans les commandes')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                </td>
              </tr>
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
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
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
     * Ici cette methode c'est pour d'ajouter les input pour l'ajout des ingrédiant et la quantité
     * 
     */
    var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Produit</label><div class="col-lg-7"><select name="produit[]" class="form-control" required><?php foreach ($allProds as $echoForeiKeyClt) : ?><option value="<?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->ref_yaourt; ?> - <?= $echoForeiKeyClt->nom_yaourt; ?></option><?php endforeach; ?></select></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantiteIng" name="quantite[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

    var x = 1;
    /**
     * Cette fonction permet d'ajouter 
     */
    $("#addFactA").click(function() {
      $("#row_input").append(html);
    });
    $("#row_input").on('click', '#delFac', function() {
      $(this).closest('tr').remove();
    });
  });




  //cette fonction permet de selectionné et de mettre les données dans les champs
  //Cette fonction permet de vérifier la quantité de produit
  function selectIngrediant(id) {
    $('#quantiteDispo').html('');
    $.ajax({
      type: 'POST',
      url: '../controller/controllerCommande.php',
      data: {
        idQuantitPro: id
      },
      success: function(data) {
        $('#quantiteDispoPro').html(data);
      }
    })
  }
  //Cette fonction permet de vérifier la valeur supérieur ou inférieur
  $('#Qvend').change(function() {
    $(document).ready(function() {
      $("input").attr({
        "max": $('#quanRecapDiso').val(),
        "min": 1
      });
    });
  });

  $(function() {
    $('#multipleM').multipleSelect();
  });
</script>
</body>

</html>