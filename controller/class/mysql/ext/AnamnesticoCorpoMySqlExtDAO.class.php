<?php
/**
 * Class that operate on table 'anamnesticoCorpo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-04-27 15:23
 */
class AnamnesticoCorpoMySqlExtDAO extends AnamnesticoCorpoMySqlDAO{
	
	public function queryByIdAnamnesticoOrderBy($value, $orderColumn){
		$sql = 'SELECT * FROM anamnesticoCorpo WHERE idAnamnestico = ? ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
        

	
}

?>