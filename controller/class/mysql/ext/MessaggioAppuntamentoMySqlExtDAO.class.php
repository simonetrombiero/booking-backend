<?php
/**
 * Class that operate on table 'messaggio_appuntamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-03-30 13:03
 */
class MessaggioAppuntamentoMySqlExtDAO extends MessaggioAppuntamentoMySqlDAO{
    
function queryMessaggioAppuntamenti() {
    $oggi = date("Y-m-d");
        $sql = "SELECT * FROM messaggio_appuntamento WHERE dataContatto >= '$oggi'";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery); 
    }
	
}
?>