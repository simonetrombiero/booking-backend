<?php

/**
 * Class that operate on table 'anamnesticoCorpoHead'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-05-08 09:45
 */
class AnamnesticoCorpoHeadMySqlExtDAO extends AnamnesticoCorpoHeadMySqlDAO {

    public function queryByIdQuestionarioOrderBy($value, $orderColumn) {
        $sql = 'SELECT * FROM anamnesticoCorpoHead WHERE idQuestionario = ? ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryByIdAnamnesticoByData($idAnamnestico, $dataAnamnestico) {
        $sql = 'SELECT * FROM anamnesticoCorpoHead WHERE idQuestionario = ? AND data=?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idAnamnestico);
        $sqlQuery->set($dataAnamnestico);
        
        return $this->getList($sqlQuery);
    }

}

?>