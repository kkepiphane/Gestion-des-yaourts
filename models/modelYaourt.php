<?php

require_once '../db/bdd.php';
class ModelYaourt
{
    public function addYaourt($id_ing, $yourt_id, $quantiteDY, $nivoPro, $user_create, $date_create)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("INSERT INTO yaourt(ing_id, yaourt_id ,quantiteDispoY, niveau_production , user_create, dateCreate) VALUES (?,?,?,?,?,?)");
            $executYaourt = $query->execute(array($id_ing, $yourt_id, $quantiteDY, $nivoPro, $user_create, $date_create));
            return $executYaourt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt,composition_produit, type_ingrediant, type_yaout  WHERE  type_yaout.id_ty  = composition_produit.id_typeY  AND  type_ingrediant.id_TIng   = composition_produit.id_typeI GROUP BY composition_produit.id_typeY ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getCompositions()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM composition_produit, type_ingrediant, type_yaout WHERE type_yaout.id_ty  = composition_produit.id_typeY  AND  type_ingrediant.id_TIng   = composition_produit.id_typeI GROUP BY composition_produit.id_typeY ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getAllYaourts()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, prod_fac_achats, ingrediants WHERE yaourt.idType_yaourt = type_yaout.id_ty AND  prod_fac_achats.id_ingred_achts  = ingrediants.id_ing AND yaourt.id_ingred = prod_fac_achats.id_ingred_achts  ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    //Affichage des tableau dans tableau
    public function getAllYaourtAProduit()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT *, COUNT(DISTINCT prod_fac_achats.id_ingred_achts) AS compTab FROM yaourt, type_yaout, prod_fac_achats, ingrediants  WHERE yaourt.idType_yaourt = type_yaout.id_ty AND prod_fac_achats.id_ingred_achts  = ingrediants.id_ing AND yaourt.id_ingred = prod_fac_achats.id_ingred_achts  GROUP BY yaourt.idType_yaourt ORDER BY nom_yaourt");
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllYaourtAProduitSecondT($idIngY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, prod_fac_achats, ingrediants WHERE yaourt.idType_yaourt = type_yaout.id_ty AND prod_fac_achats.id_ingred_achts  = ingrediants.id_ing AND yaourt.id_ingred = prod_fac_achats.id_ingred_achts AND yaourt.idType_yaourt = ?  GROUP BY yaourt.idType_yaourt,yaourt.id_ingred ORDER BY nom_yaourt");
            $query->execute(array($idIngY));
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function yaourtDetail($idY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM yaourt, type_yaout, facture_achat, fournisseur, prod_fac_achats, ingrediants  WHERE yaourt.idType_yaourt = type_yaout.id_ty  AND facture_achat.id_fourni = fournisseur.id_four AND facture_achat.id_fac_ach  = prod_fac_achats.idFacAchats  AND prod_fac_achats.id_ingred_achts  = ingrediants.id_ing AND yaourt.id_ingred = prod_fac_achats.id_ingred_achts  AND id_yaourt =? GROUP BY prod_fac_achats.id_ingred_achts ");
            $query->execute(array($idY));
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function updateYaourts($idY, $idTYa, $idIngY, $quantiteDY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE yaourt SET idType_yaourt = ?,id_ingred = ?, quantiteDispoY = ? WHERE id_yaourt  = '" . $idY . "'");
            $executYaourt = $query->execute(array($idTYa, $idIngY, $quantiteDY));
            return $executYaourt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function deleteYaourt($idYa)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("DELETE FROM yaourt WHERE id_yaourt =?");
            $deletYa = $query->execute(array($idYa));
            return $deletYa;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération de l id pour affichier ensembles des donnés concenant la facture
     */
    public function getAllIngrediantsAchats()
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM prod_fac_achats, type_ingrediant, composition_produit, type_yaout WHERE prod_fac_achats.id_ingred_achts  = type_ingrediant.id_TIng  AND composition_produit.id_typeI   = type_ingrediant.id_TIng AND composition_produit.id_typeY  = type_yaout.id_ty GROUP BY prod_fac_achats.id_ingred_achts");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /**
     * Récupération de la quantité par groupe et par la somme 
     */
    public function getAllQuantiteIng($inG)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT COUNT(prod_fac_achats.id_ingred_achts) AS Compt , SUM(quantite_act) AS Quantite FROM prod_fac_achats WHERE id_ingred_achts = '" . $inG . "' GROUP BY id_ingred_achts");
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllYIng($inG)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM prod_fac_achats, type_ingrediant, composition_produit, type_yaout WHERE prod_fac_achats.id_ingred_achts  = type_ingrediant.id_TIng  AND composition_produit.id_typeI   = type_ingrediant.id_TIng AND composition_produit.id_typeY  = type_yaout.id_ty  AND type_yaout.id_ty  = ? GROUP BY type_ingrediant.id_TIng");
            $query->execute(array($inG));
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    /**
     * modfifcation de la quantité des ingrédaint aprés l ajout ou la modification pour la produit du yaourt
     */
    public function updateQuantiteProd($idIngd, $quantiteDY)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("UPDATE prod_fac_achats SET quantite_act = ? WHERE id_ingred_achts LIKE '%" . $idIngd . "%'");
            $executYaourt = $query->execute(array($quantiteDY));
            return $executYaourt;
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getAllProdQuantYao($inG)
    {
        try {
            $db = dbConnect();
            $query = $db->prepare("SELECT * FROM prod_fac_achats, type_ingrediant, composition_produit WHERE prod_fac_achats.id_ingred_achts  = type_ingrediant.id_TIng  AND composition_produit.id_typeI = type_ingrediant.id_TIng AND composition_produit.id_typeY  = ? GROUP BY prod_fac_achats.id_ingred_achts");
            $query->execute(array($inG));
            $query->execute();
            return $query->fetchall(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
