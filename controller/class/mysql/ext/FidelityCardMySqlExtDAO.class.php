<?php
/**
 * Class that operate on table 'fidelityCard'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-02-26 11:04
 */
class FidelityCardMySqlExtDAO extends FidelityCardMySqlDAO{
    
    function queryByCodiceInternoNotNull(){
        //$sql = "SELECT COUNT(codiceInterno) AS numeroVirtuale FROM  tessere WHERE  codiceInterno != ''";
        $sql = "SELECT * FROM  fidelityCard WHERE  codiceInterno != ''";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    
    }

	
}
?>