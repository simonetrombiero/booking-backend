<?php
/**
 * Class that operate on table 'prenotazioni_trattamenti'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-07-10 10:33
 */
class PrenotazioniTrattamentiMySqlExtDAO extends PrenotazioniTrattamentiMySqlDAO{
    
     public function insertAll($prenotazione, $trattamenti){
        $stringa="";
        
        for($i=0;$i<count($trattamenti);$i++){
            if($i==0){
                $stringa.='(';
            }else{
                $stringa.=',(';
            }
            $stringa.="'$prenotazione','".$trattamenti[$i]."')";
        }
        $sql ="INSERT INTO prenotazioni_trattamenti (idPrenotazione, idTrattamento) VALUES ".$stringa;
        $sqlQuery = new SqlQuery($sql);
        $this->executeInsert($sqlQuery);
        
    }
	
}
?>