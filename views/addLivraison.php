<?php $title = 'Livraison';
require('head.php');
require('header.php');
require('sibar.php');
require('../controller/controllerLivraison.php');
require('../controller/controllerLivreur.php');
require('../controller/controllerClient.php');
?>
<section class="wrapper">
  <h3><i class="fa fa-angle-right"></i>Livraison - Ajout </h3>
  <!-- FORM VALIDATION -->
  <div class="row mt">
    <div class="col-lg-12">
      <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> Formulaire de Validations</h4>
        <hr>
        <div class=" form">
          <form class="cmxform form-horizontal style-form" id="commentForm" method="POST" action="../controller/controllerLivraison.php">
            <div class="row">
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Date Livraison</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="dateLivraison" minlength="2" type="date" required />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-3">Date Paiment</label>
                  <div class="col-lg-7">
                    <input class=" form-control" id="cname" name="datePaie" minlength="2" type="date" />
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Nom du Client</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="nomClient">
                      <option>------------</option>
                      <?php foreach ($allClient as $echoFoerIng) : ?>
                        <option value="<?= $echoFoerIng->id_client; ?>"><?= $echoFoerIng->nom_client; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xs-3 col-sm-3">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-4">Nom du Livreur</label>
                  <div class="col-lg-7">
                    <select class="form-control" name="nomLivreur">
                      <option>------------</option>
                      <?php foreach ($allLiv as $echoForLivreur) : ?>
                        <option value="<?= $echoForLivreur->idLivreur; ?>"><?= $echoForLivreur->nom_dis; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="input-field">
                  <table id="row_input">
                    <tr>
                      <th width="35%"></th>
                      <th width="34%"></th>
                      <th width="28%"></th>
                      <th width="28%"></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group ">
                          <label for="cname" class="control-label col-lg-3">Produit</label>
                          <div class="col-lg-7">
                            <select name="produit[]" class="form-control" onchange="selectIngrediant(this.value)">
                              <?php foreach ($allProds as $echoForeiKeyClt) : ?>
                                <option value=" <?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->id_yaourt; ?> --(<?= $echoForeiKeyClt->quantite_pro; ?>)</option>
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
                          <input class="btn btn-theme" type="button" name="addFactA" id="addFactA" value="Ajout une ligne" />
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset col-lg-8">
                <input class="btn btn-success" type="submit" name="btnAddDistribution" id="btnAddLivraison" value="Enregistrer" />
                <button class="btn btn-theme04" type="reset">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
  </div>

  <div class="row mt">
    <div class="col-md-12">
      <div class="content-panel">
        <h4>
          <i class="fa fa-angle-right"></i>Listes des Livraisons directes
        </h4>
        <hr>
        <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th>Date Livraison</th>
              <th>Date Paiement</th>
              <th> Client</th>
              <th>Fournisseur</th>
              <th>Edité</th>
              <th> Produit</th>
              <th> Quantité</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allDiss as $echoDistribut) : ?>
              <tr>
                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->date_livraison ?></td>
                <td rowspan="<?= $echoDistribut->comId + 1; ?>">
                  <?php
                  if (is_null($echoDistribut->date_paiment)) {
                    echo "pas de date fixé";
                  } else {
                    echo $echoDistribut->date_paiment;
                  }

                  ?>
                </td>
                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->nom_client ?></td>
                <td rowspan="<?= $echoDistribut->comId + 1; ?>"><?= $echoDistribut->nom_dis ?></td>
                <td rowspan="<?= $echoDistribut->comId + 1; ?>">
                  <a href="upLivraison.php?id_upd_livraison=<?= $echoDistribut->idDis ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                </td>
                <?php
                $idD = $echoDistribut->idDis;
                $db = dbConnect();
                $query = $db->prepare("SELECT * FROM distributions, livreur, clients, distribu_produit, produits WHERE distributions.id_livreur = livreur.idLivreur AND distributions.idClient = clients.id_client AND distribu_produit.id_distribu  = distributions.idDis AND distributions.idDis = ? AND distribu_produit.idProduits_dis = produits.id_prod");
                $query->execute(array($idD));
                $proDis = $query->fetchall(PDO::FETCH_OBJ);

                foreach ($proDis as $produitD) :;
                ?>
              <tr>
                <td><?= $produitD->id_yaourt ?></td>
                <td><?= $produitD->quantite_venduPro ?></td>
                <td>
                  <a href="../controller/controllerLivraison.php?idDel_com=<?= $produitD->id_dis_prod  ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit : <?= $produitD->id_yaourt; ?> dans les commandes')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
  <!-- /row -->
</section>
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="lib/jquery/jquery.min.js"></script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="lib/gritter-conf.js"></script>
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
    var html = '<tr><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Produit</label><div class="col-lg-7"><select name="produit[]" class="form-control" required><?php foreach ($allProds as $echoForeiKeyClt) : ?><option value="<?= $echoForeiKeyClt->id_prod; ?>"><?= $echoForeiKeyClt->id_yaourt; ?> </option><?php endforeach; ?></select></div></div></td><td><div class="form-group "><label for="cname" class="control-label col-lg-3">Quantité</label><div class="col-lg-7"><input class=" form-control" id="quantiteIng" name="quantite[]" min="1" minlength="2" type="number" required="" /></div></div></td><td><div class="form-group "><input class="btn btn-danger btn-xs" type="button" name="delFac" id="delFac" value="Supprimer" /></div></td></tr>';

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