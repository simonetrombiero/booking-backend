<?php
/** 
 * Class that operate on table 'clienti'. Database Mysql.
 *
 * @author: http://phpdao.com  
 * @date: 2018-09-07 11:38
 */
class ClientiMySqlExtDAO extends ClientiMySqlDAO{

	    function findClientiLike($like) {
                $sql = 'SELECT * FROM clienti WHERE ' . $like;
                $sqlQuery = new SqlQuery($sql);
                return $this->getList($sqlQuery);
    }
    
    function queryCompleannoClienti(){
        //$sql="SELECT cognome, nome, DATE_FORMAT( data_nascita, '%d-%m-%Y' ) AS nato FROM clienti WHERE DAYOFMONTH(NOW()) = DAYOFMONTH(data_nascita) AND MONTH(NOW()) = MONTH(data_nascita)"; 
         //$sql = "SELECT * FROM clienti WHERE MONTH(NOW()) = MONTH(data_nascita) AND DAYOFMONTH(data_nascita) BETWEEN DAYOFMONTH(NOW()) AND DAYOFMONTH(NOW()) +3 ";
        $sql ="SELECT * FROM clienti where date_format(data_nascita,'%m%d') >= date_format(now(),'%m%d') and date_format(data_nascita,'%m%d') < date_format(DATE_ADD(NOW(), INTERVAL 5 DAY),'%m%d')";
        
      //  SELECT * FROM clienti WHERE MONTH(NOW()) = MONTH(data_nascita) BETWEEN DAYOFMONTH(data_nascita) AND DAYOFMONTH(NOW()+3) 
        //$sql="SELECT * FROM clienti WHERE DAYOFMONTH(NOW()) = DAYOFMONTH(data_nascita) AND MONTH(NOW()) = MONTH(data_nascita)"; 
         $sqlQuery = new SqlQuery($sql);
         return $this->getList($sqlQuery);
        
        
    }
}
?>