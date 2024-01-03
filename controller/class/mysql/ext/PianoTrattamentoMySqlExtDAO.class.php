<?php

/**
 * Class that operate on table 'pianoTrattamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2022-03-17 10:10
 */
class PianoTrattamentoMySqlExtDAO extends PianoTrattamentoMySqlDAO {

    public function queryPianoTrattamentoAperti($value) {
        $sql = 'SELECT * FROM pianoTrattamento WHERE idPaziente = ? AND (isChiuso!="1" OR isChiuso IS NULL)';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }
    
    public function queryPianoTrattamentoApertiInCorso($value) {
        $sql = 'SELECT * FROM pianoTrattamento WHERE idPaziente = ? AND stato<=2 AND (isChiuso!="1" OR isChiuso IS NULL)';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryPianoTrattamentoInCorsoDaEseguire($value) {
        $sql = 'SELECT * FROM pianoTrattamento WHERE idPaziente = ? AND stato<=2';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

}

?>