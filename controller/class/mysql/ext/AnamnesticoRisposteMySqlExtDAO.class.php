<?php
/**
 * Class that operate on table 'anamnesticoRisposte'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-02-06 09:37
 */
class AnamnesticoRisposteMySqlExtDAO extends AnamnesticoRisposteMySqlDAO{

	public function queryByRispostaOrderByID($value){
		$sql = 'SELECT * FROM anamnesticoRisposte WHERE idRisposta = ? ORDER BY id';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

}
?>