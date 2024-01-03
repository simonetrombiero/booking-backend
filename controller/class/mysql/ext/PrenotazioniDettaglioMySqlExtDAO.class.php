<?php

/**
 * Class that operate on table 'prenotazioniDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2022-07-29 18:45
 */
class PrenotazioniDettaglioMySqlExtDAO extends PrenotazioniDettaglioMySqlDAO {

    public function queryPrenotazioniDettaglioByPrenotazioneOperatore($prenotazione, $operatore) {

        $sql = "SELECT * 
            FROM prenotazioniDettaglio 
            WHERE prenotazione = ? AND idOperatore = ?";

        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($prenotazione);
        $sqlQuery->setNumber($operatore);
        return $this->getList($sqlQuery);
    }

    public function queryPrenotazioniDettaglioByPrenotazionePostazione($prenotazione, $postazione) {

        $sql = "SELECT * 
            FROM prenotazioniDettaglio 
            WHERE prenotazione = ? AND idPostazione = ?";


        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($prenotazione);
        $sqlQuery->setNumber($postazione);
        return $this->getList($sqlQuery);
    }

}

?>