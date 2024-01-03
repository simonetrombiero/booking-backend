<?php
/**
 * Class that operate on table 'messaggio_compleanno'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-31 12:09
 */
class MessaggioCompleannoMySqlExtDAO extends MessaggioCompleannoMySqlDAO{
    
    function queryMessaggioCompleanni() {
    $oggi = date("Y-m-d");
        $sql = "SELECT * FROM messaggio_compleanno WHERE dataContatto >= '$oggi'";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery); 
    }

	
}
?>