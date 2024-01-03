<?php
/**
 * Class that operate on table 'pagamento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-08-04 11:58
 */
class PagamentoMySqlExtDAO extends PagamentoMySqlDAO{
    public function queryTotaleAllPagamenti($idCliente) {
        //$sql ='SELECT p.*, SUM(importo) AS totalePagamenti FROM pagamenti p WHERE cliente = ?';
        
        $sql ='SELECT p.cliente AS idCliente, SUM(importo) AS totalePagamenti FROM pagamenti p WHERE cliente = ?';
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idCliente);
        $tab = $this->execute($sqlQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            
            $clienteTotaleAllPagamento = new ClienteTotaleAllPagamenti();
            
            $clienteTotaleAllPagamento->idCliente = $tab[$i]["idCliente"];
            
//            if(isBlankOrNull($tab[$i]["nomeCliente"])){
//                $clienteTotaleAllPagamento->nomeCliente ='';
//            }else {
//                $clienteTotaleAllPagamento->nomeCliente = $tab[$i]["nomeCliente"];
//            }
//            
//            if(isBlankOrNull($tab[$i]["cognomeCliente"])){
//                $clienteTotaleAllPagamento->cognomeCliente ='';
//            }  else {
//                $clienteTotaleAllPagamento->cognomeCliente = $tab[$i]["cognomeCliente"];
//            }
//            
            
            
            if(isBlankOrNull($tab[$i]["totalePagamenti"])){
                 $clienteTotaleAllPagamento->totalePagamenti ='';
            }else{
                $clienteTotaleAllPagamento->totalePagamenti = $tab[$i]["totalePagamenti"];
            }
            
            
       
             
             
            
            $ret[$i] = $clienteTotaleAllPagamento;
        }
        
        return $ret;
    }

}
 
class ClienteTotaleAllPagamenti{
var $idCliente;
//var $nomeCliente;
//var $cognomeCliente; 
var $totalePagamenti;
	
}
?>