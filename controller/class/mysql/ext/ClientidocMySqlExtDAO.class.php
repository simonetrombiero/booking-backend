<?php
/**
 * Class that operate on table 'clientidoc'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-08-04 11:58
 */
class ClientidocMySqlExtDAO extends ClientidocMySqlDAO{
    
    public function queryTotaleAllDocumenti($idCliente) {
        //$sql ='SELECT p.*, SUM(importo) FROM pagamenti p WHERE cliente = ?';
        //SELECT c.idCliente as idCliente, c.nome as nomeCliente, c.cognome as cognomeCliente, COUNT(c.idCliente) as numeroFattureCliente, MIN(d.data) as dataMinore, SUM(d.totaleDocumento) as totale, SUM(d.totaleDaSaldare) as totaleDaSaldare, SUM(d.totaleSaldato) as totaleSaldato  FROM documento d, clientedoc c WHERE d.idClienteDoc = c.id AND d.totaleDaSaldare > 0 AND idTipoDocumento = ? GROUP BY c.idCliente
        
        //SELECT c.idCliente AS idCliente, c.nome AS nomeCliente, c.cognome AS cognomeCliente, SUM( d.totaleDocumento ) AS totale, SUM( d.totaleDaSaldare ) AS totaleDaSaldare, SUM( d.totaleSaldato ) AS totaleSaldato FROM documento d, clientedoc c WHERE d.idClienteDoc = c.id AND d.totaleDaSaldare >0 AND idCliente =? GROUP BY c.idCliente
        
        //SELECT c.idCliente AS idCliente, c.nome AS nomeCliente, c.cognome AS cognomeCliente, SUM( d.totaleDocumento ) AS totale FROM documento d, clientedoc c WHERE d.idClienteDoc = c.id AND d.totaleDaSaldare >0 AND idCliente =20 GROUP BY c.idCliente
        
                
        //$sql ='SELECT d.*, SUM(importo) as totaleAllDoc FROM documento d WHERE cliente = ?';
       $sql ='SELECT c.idCliente AS idCliente, c.nome AS nomeCliente, c.cognome AS cognomeCliente, SUM( d.totaleDocumento ) AS totale FROM documento d, clientidoc c WHERE d.idClienteDoc = c.id AND idTipoDocumento <>3  AND idCliente =? GROUP BY c.idCliente';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idCliente);
        $tab = $this->execute($sqlQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            
            $clienteTotaleAllDocumento = new ClienteTotaleAllDocumenti();
            
            $clienteTotaleAllDocumento->idclienti = $tab[$i]["idClienti"];
            
            if(isBlankOrNull($tab[$i]["nomeCliente"])){
                $clienteTotaleAllDocumento->nomeCliente ='';
            }else {
                $clienteTotaleAllDocumento->nomeCliente = $tab[$i]["nomeCliente"];
            }
            
            if(isBlankOrNull($tab[$i]["cognomeCliente"])){
                $clienteTotaleAllDocumento->cognomeCliente ='';
            }  else {
                $clienteTotaleAllDocumento->cognomeCliente = $tab[$i]["cognomeCliente"];
            }
            
            
            
            if(isBlankOrNull($tab[$i]["totale"])){
                 $clienteTotaleAllDocumento->totale ='';
            }else{
                $clienteTotaleAllDocumento->totale = $tab[$i]["totale"];
            }
            
            
        
             
             
            
            $ret[$i] = $clienteTotaleAllDocumento;
        }
        
        return $ret;
    }
    public function queryAllDocumentiDaSaldare() {
//               $sql = 'SELECT c.idCliente as idCliente, '
//                . 'c.nome as nomeCliente, '
//                . 'c.cognome as cognomeCliente, '
//                . 'COUNT(c.idCliente) as numeroFattureCliente, '
//                . 'MIN(d.data) as dataMinore, '
//                . 'SUM(d.totaleDocumento) as totale, '
//                . 'SUM(d.totaleDaSaldare) as totaleDaSaldare, '
//                . 'SUM(d.totaleSaldato) as totaleSaldato '
//                . 'FROM documento d, clientedoc c '
//                . 'WHERE d.idClienteDoc = c.id AND d.totaleDaSaldare > 0 AND idTipoDocumento = ? GROUP BY c.idCliente';
               $sql = 'SELECT c.idCliente as idCliente, '
                . 'c.nome as nomeCliente, '
                . 'c.cognome as cognomeCliente, '
                . 'COUNT(c.idCliente) as numeroFattureCliente, '
                . 'MIN(d.data) as dataMinore, '
                . 'SUM(d.totaleDocumento) as totale, '
                . 'SUM(d.totaleDaSaldare) as totaleDaSaldare, '
                . 'SUM(d.totaleSaldato) as totaleSaldato '
                . 'FROM documento d, clientidoc c '
                . 'WHERE d.idClienteDoc = c.id AND d.totaleDaSaldare > 0 AND idTipoDocumento <>3 GROUP BY c.idCliente';
        $sqlQuery = new SqlQuery($sql);
        //$sqlQuery->setNumber($idTipoDocumento);
        return $this->getListFattureDaSaldare($sqlQuery);
    }

    protected function readRowFattureDaSaldare($row) {
        $dati = null;
        
        $dati['idCliente'] = $row['idCliente'];
        $dati['nomeCliente'] = $row['nomeCliente'];        
        $dati['cognomeCliente'] = $row['cognomeCliente'];
        $dati['numeroFattureCliente'] = $row['numeroFattureCliente'];
        $dati['dataMinore'] = $row['dataMinore'];
        $dati['totaleFatture'] = $row['totale'];
        $dati['totaleFattureDaSaldare'] = $row['totaleDaSaldare'];
        $dati['totaleFattureSaldate'] = $row['totaleSaldato'];
        
        return $dati;
    }

    protected function getListFattureDaSaldare($sqlQuery) {
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();
        for ($i = 0; $i < count($tab); $i++) {
            $ret[$i] = $this->readRowFattureDaSaldare($tab[$i]);
        }
        return $ret;
    }
        
   // }

}
 
class ClienteTotaleAllDocumenti{
var $idCliente;
var $nomeCliente;
var $cognomeCliente; 
var $totale;
	
}
?>