<?php
namespace Models;

use \Core\Model;

class Rates extends Model {

    public function getRatesFromProduct($id_product) {
        $array = array();

        if(!empty($id_product)) {
            $sql = "SELECT
                rates.id,
                rates.date_rated,
                rates.points,
                rates.comment,
                users.name 
            FROM rates LEFT JOIN users ON users.id = rates.id_user
            WHERE rates.id_product = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(":id", $id_product);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
        }

        return $array;
    }
}