<?php
/**
 * Class that operate on table 'pianoTrattamentoItem'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2022-07-14 12:26
 */
class PianoTrattamentoItemMySqlExtDAO extends PianoTrattamentoItemMySqlDAO{
    
    function loadItemPiano($idPiano, $idTrattamento){
        $sql = 'SELECT * FROM pianoTrattamentoItem WHERE idPiano = ? AND idTrattamentoPiano = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPiano);
                $sqlQuery->setNumber($idTrattamento);
		return $this->getRow($sqlQuery);
        
    }
}
?>