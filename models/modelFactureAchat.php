<?php

require_once '../db/bdd.php';
class ModelFactureAchats
{
    //Ahout des factures

    public function addFactureAchat($designa, $dateFaAch, $idFourni, $id_ing, $nomUser, $date)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO facture_achat(designation_ach, dateFactAchat, id_fourni, id_ing, user_create,date_create) VALUES (?,?,?,?,?,?)");
            $executFourni = $query->execute(array($designa, $dateFaAch, $idFourni, $id_ing, $nomUser, $date));
            return $executFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Ajout des ingrédiants et des produits
     */
    public function addFactureAchatProduit($idFac, $idFacIng, $prixUnitFac, $quantiteFac)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO prod_fac_achats(idFacAchats, id_ingred_achts, prixUnitaire_act, quantite_act) VALUES (?,?,?,?)");
            $executFac = $query->execute(array($idFac, $idFacIng, $prixUnitFac, $quantiteFac));
            return $executFac;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * Ajout des ingrédiants et des produits pour faire le stock
     */
    public function addFactureAchatStock($idFac, $idFacIng, $prixUnitFac, $quantiteFac)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO stock_facture_acht(id_fact_ach, id_ing_pro, prixUnitaire_prod, quantite_pro_ach) VALUES (?,?,?,?)");
            $executFac = $query->execute(array($idFac, $idFacIng, $prixUnitFac, $quantiteFac));
            return $executFac;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getFactureAchat()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_achat,fournisseur WHERE facture_achat.id_fourni = fournisseur.id_four ORDER BY id_fac_ach DESC LIMIT 0,1");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Affichage de tous les factures 
     */
    public function getFactureAlls()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_achat,fournisseur WHERE facture_achat.id_fourni = fournisseur.id_four ORDER BY designation_ach");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération de l id pour affichier ensembles des donnés concenant la facture
     */
    public function getAllFactureAchats($FacD)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_achat,fournisseur,stock_facture_acht,ingrediants WHERE facture_achat.id_fourni = fournisseur.id_four AND facture_achat.id_fac_ach  = stock_facture_acht.id_fact_ach  AND stock_facture_acht.id_ing_pro  = ingrediants.id_ing AND stock_facture_acht.id_fact_ach  = '" . $FacD . "' ORDER BY designation_ach");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Dernier sajout pour faire la modification de la factures
     */
    public function idFactureAchat($idFacht)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM facture_achat,fournisseur,stock_facture_acht,ingrediants WHERE facture_achat.id_fourni = fournisseur.id_four AND facture_achat.id_fac_ach  = stock_facture_acht.id_fact_ach  AND stock_facture_acht.id_ing_pro  = ingrediants.id_ing AND stock_facture_acht.id_fact_ach = ?");
            $query->execute(array($idFacht));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Modification de la factures
     */
    public function updateFactureAchats($idFacAchat, $designa, $dateFaAch, $idFourni, $ing)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE facture_achat SET designation_ach = ?, dateFactAchat = ?, id_fourni = ?, id_ing = ? WHERE id_fac_ach = '" . $idFacAchat . "'");
            $updateFourni = $query->execute(array($designa, $dateFaAch, $idFourni, $ing));
            return $updateFourni;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    //Modification des ingrediant des factures
    public function addFactureAchatProduitM($idFac, $idFacIng, $prixUnitFac, $quantiteFac)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO prod_fac_achats( id_ingred_achts = ?, prixUnitaire_act = ?, quantite_act = ? WHERE idFacAchats = '" . $idFac . "'");
            $executFac = $query->execute(array($idFacIng, $prixUnitFac, $quantiteFac));
            return $executFac;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Suppression des facutres 
     */
    public function deleteFactureAchat($idFacAch)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM facture_achat WHERE id_fac_ach=?");
            $delFAcht = $query->execute(array($idFacAch));
            return $delFAcht;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * 
     * Récupération des ids des founisseurs 
     */
    public function idFournisseursIng($idFournisseur)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM ingrediants, fournisseur WHERE ingrediants.id_fou = fournisseur.id_four AND ingrediants.id_fou  = '" . $idFournisseur . "'");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération d\'id de la derniers ajouts de la factures
     * 
     */
    public function idDernierAdd()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_ing FROM facture_achat ORDER BY id_fac_ach DESC LIMIT 0,1");
            $query->execute();
            $envoie = $query->fetch(PDO::FETCH_OBJ);

            $chaine = $envoie->id_ing;
            $array = array_map('intval', explode(',', $chaine));
            $idArray = implode("','", $array);

            $sql = $db->prepare("SELECT * FROM ingrediants, fournisseur WHERE ingrediants.id_fou = fournisseur.id_four AND ingrediants.id_ing IN ('" . $idArray . "')");

            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function idFact()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT id_fac_ach FROM facture_achat ORDER BY id_fac_ach DESC LIMIT 0,1");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
