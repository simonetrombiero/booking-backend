<?php
/**
 * Class that operate on table 'Acconto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-08-04 11:58
 */
class AccontoMySqlExtDAO extends AccontoMySqlDAO{
    /**
     * Insert record to table
     *
     * @param AccontoMySql acconto
     */
    public function insert($acconto){
        $sql = 'INSERT INTO pagamenti (cliente, data, importo, modalitaPagamento) VALUES (?, ?, ?, ?)';
        $sqlQuery = new SqlQuery($sql);
        
        $sqlQuery->set($acconto->cliente);
        $sqlQuery->set(date("d-m-Y"));
        $sqlQuery->setNumber($acconto->importo);
        $sqlQuery->setNumber($acconto->modalitaPagamento);

        $id = $this->executeInsert($sqlQuery);  
        $acconto->id = $id;
        return $id;
    }

}

class ClienteTotaleAllPagamenti{
    var $idCliente;
    //var $nomeCliente;
    //var $cognomeCliente; 
    var $totalePagamenti;

}

    /**
     * Read row
     *
     * @return AccontoMySql 
     */
    protected function readRow($row){
        $acconto = new Acconto();
        
        $acconto->id = $row['id'];
        $acconto->cliento = $row['cliento'];
        $acconto->data = $row['data'];
        $acconto->importo = $row['importo'];
        $acconto->modalitaPagamento = $row['modalitaPagamento'];

        return $acconto;
    }
    
    protected function getList($sqlQuery){
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            $ret[$i] = $this->readRow($tab[$i]);
        }
        return $ret;
    }
    
    /**
     * Get row
     *
     * @return AliquotaMySql 
     */
    protected function getRow($sqlQuery){
        $tab = QueryExecutor::execute($sqlQuery);
        if(count($tab)==0){
            return null;
        }
        return $this->readRow($tab[0]);     
    }
    
    /**
     * Execute sql query
     */
    protected function execute($sqlQuery){
        return QueryExecutor::execute($sqlQuery);
    }
    
    
    /**
     * Execute sql query
     */
    protected function executeUpdate($sqlQuery){
        return QueryExecutor::executeUpdate($sqlQuery);
    }

    /**
     * Query for one row and one column
     */
    protected function querySingleResult($sqlQuery){
        return QueryExecutor::queryForString($sqlQuery);
    }

    /**
     * Insert row to table
     */
    protected function executeInsert($sqlQuery){
        return QueryExecutor::executeInsert($sqlQuery);
    }
?>