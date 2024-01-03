<?php
/**
 * Class that operate on table 'anamnesticoQuestionario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-02-06 09:37
 */
class AnamnesticoQuestionarioMySqlExtDAO extends AnamnesticoQuestionarioMySqlDAO{
    
    public function queryByIdGruppoOrderBy($idQuestionario, $idGruppo, $orderColumn){
		$sql = 'SELECT * FROM anamnesticoQuestionario WHERE idAnamnestico = ? AND idGruppo = ? ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
                $sqlQuery->setNumber($idQuestionario);
		$sqlQuery->setNumber($idGruppo);
		return $this->getList($sqlQuery);
	}

	
}
?>