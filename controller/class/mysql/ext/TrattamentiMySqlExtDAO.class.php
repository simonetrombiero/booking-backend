<?php
/**
 * Class that operate on table 'trattamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-09-07 11:38
 */
class TrattamentiMySqlExtDAO extends TrattamentiMySqlDAO{

	function findTrattamentoLike($like) {
        $sql = "SELECT * FROM trattamenti WHERE trattamento ".$like;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery); 
    }
}
?> 