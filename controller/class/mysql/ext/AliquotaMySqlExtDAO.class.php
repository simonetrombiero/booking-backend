<?php
/**
 * Class that operate on table 'aliquota'. Database Mysql.
 *
 * @author: http://phpdao.com 
 * @date: 2020-07-31 12:48
 */
class AliquotaMySqlExtDAO extends AliquotaMySqlDAO{ 
    
    function queryAllInCorso() {
        //$sql = "SELECT * FROM aliquota WHERE isSospeso <> 1";
        $sql = "SELECT * FROM aliquota WHERE isSospeso != 1 OR isSospeso is null";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery); 
    }
	
}
?>