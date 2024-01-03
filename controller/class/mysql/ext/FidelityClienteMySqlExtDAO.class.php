<?php
/**
 * Class that operate on table 'fidelity_cliente'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2021-02-26 11:04
 */
class FidelityClienteMySqlExtDAO extends FidelityClienteMySqlDAO{
    
   
    public function queryInfoFidelityCardCliente() {
        $sql ="SELECT t.id as idCard, t.codiceBarre as numeroCard, c.cellulare, c.nome, c.cognome, c.c_fiscale as codiceFiscale from fidelityCard as t, fidelity_cliente as tc, clienti as c where c.id=tc.idCliente and tc.idCard=t.id and t.isSospesa='0'";
        $sqlQuery = new SqlQuery($sql);
        $tab = $this->execute($sqlQuery);
        $ret = array();
        for($i=0;$i<count($tab);$i++){
            
            $fidelityCardCliente = new FidelityCardCliente();
            
            $fidelityCardCliente->idCard = $tab[$i]["idCard"];
            
            if(isBlankOrNull($tab[$i]["numeroCard"])){
                $fidelityCardCliente->numeroCard ='';
            }else {
                $fidelityCardCliente->numeroCard = $tab[$i]["numeroCard"];
            }
            
            if(isBlankOrNull($tab[$i]["cellulare"])){
                $fidelityCardCliente->cellulare ='';
            }  else {
                $fidelityCardCliente->cellulare = $tab[$i]["cellulare"];
            }
            
            
            if(isBlankOrNull($tab[$i]["cognome"])){
                $fidelityCardCliente->cognome = '';
            }  else {
                $fidelityCardCliente->cognome = $tab[$i]["cognome"];
                
            }
            
            if(isBlankOrNull($tab[$i]["nome"])){
                $fidelityCardCliente->nome ='';
            }else{
                $fidelityCardCliente->nome = $tab[$i]["nome"];
            }
            
            if(isBlankOrNull($tab[$i]["codiceFiscale"])){
                $fidelityCardCliente->codiceFiscale = ''; 
            }else{
                $fidelityCardCliente->codiceFiscale = $tab[$i]["codiceFiscale"]; 
            }
            
                     
             
             
            
            $ret[$i] = $fidelityCardCliente;
        }
        
        return $ret;
    }

}

class FidelityCardCliente{

var $idCard; 
var $numeroCard;
var $cognome; 
var $nome; 
var $cellulare; 
var $codiceFiscale;

}   
   
?>