<?php

/**
 * Class that operate on table 'prenotazioni'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-07-17 13:10
 */
class PrenotazioniMySqlExtDAO extends PrenotazioniMySqlDAO {

    function queryPeriodoDaA($inizio, $fine) {
        $sql = "SELECT * FROM prenotazioni WHERE data > '$inizio' AND data <= '$fine'";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    function queryProssimePrenotazioni($idCliente) {
        $oggi = date("Y-m-d");
        $sql = "SELECT * FROM prenotazioni WHERE data > '$oggi' AND idCliente = ?";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }

    function queryPrecedentiprenotazioni($idCliente) {
        $oggi = date("Y-m-d");
        //$sql = "SELECT * FROM prenotazioni WHERE data < '$oggi' AND idCliente = ?";
        $sql = "SELECT * FROM prenotazioni WHERE data <= '$oggi' AND idCliente = ?";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }

    function queryByDataOperatoreOrderByOraInizio($data, $idOperatore) {

        $sql = "SELECT * FROM prenotazioni WHERE data = '$data' AND idOperatore = ?  ORDER BY oraInizio";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idOperatore);
        return $this->getList($sqlQuery);
    }

    function queryByDataCabinaOrderByOraInizio($data, $idCabina) {

        $sql = "SELECT * FROM prenotazioni WHERE data = '$data' AND idCalendario = ? ORDER BY oraInizio";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCabina);
        return $this->getList($sqlQuery);
    }

    public function queryPrenotazioneOK($idCabina, $data, $oraInizio, $oraFine) {
        //SELECT * FROM prenotazioni WHERE idCalendario=3 AND data='2021-03-17' AND((oraInizio<'11:30:00' AND oraFine>'11:30:00') OR (oraInizio<'13:00:00' AND oraFine>'13:00:00')) 
        //$sql = "SELECT * FROM prenotazioni WHERE idCalendario=? AND data='$data' AND((oraInizio BETWEEN '$oraInizio' AND '$oraFine') OR (oraFine BETWEEN '$oraInizio' AND '$oraFine'))";
        $sql = "SELECT * FROM prenotazioni WHERE idCalendario= ? AND data='$data' AND((oraInizio<'$oraInizio' AND oraFine>'$oraInizio') OR (oraInizio<'$oraFine' AND oraFine>'$oraFine'))";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCabina);
        return $this->getList($sqlQuery);
    }

    public function queryPresenza($idPiano) {
        $oggi = date("Y-m-d");
        //$ora = sommaOre(date("H:i:s"), "00:15:00");
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND noShow=0 AND data<='$oggi'";
        //$sql = "SELECT * FROM prenotazioni WHERE idPiano = ? AND noShow=0 AND data<='$oggi' GROUP BY data";

        $data = date('d-m-Y H:i:s');
        $ora = date('H:i:s', strtotime("$data - 15 minutes"));

        $sql = "SELECT * FROM prenotazioni WHERE idPiano = ? AND noShow=0 AND data<'$oggi' UNION  SELECT * FROM prenotazioni WHERE idPiano = '$idPiano' AND noShow=0 AND data='$oggi' AND oraInizio<'$ora'";

        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idPiano);
        return $this->getList($sqlQuery);
    }

    public function queryAssenza($idPiano) {
        $oggi = date("Y-m-d");

        $data = date('d-m-Y H:i:s');
        $ora = date('H:i:s', strtotime("$data - 15 minutes"));

        //$ora = sommaOre(date("H:i:s"), "00:15:00");

        $sql = "SELECT * FROM prenotazioni WHERE idPiano = ? AND noShow=1 AND data<'$oggi' UNION  SELECT * FROM prenotazioni WHERE idPiano = '$idPiano' AND noShow=1 AND data='$oggi' AND oraInizio<'$ora'";

        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idPiano);
        return $this->getList($sqlQuery);
    }

    public function queryPrenotazioniGiornoOperatoreOrderBYoraInizio($data, $operatore) {
        $sql = "SELECT p.* 
            FROM prenotazioni p, prenotazioniDettaglio pd 
            WHERE p.data = ? AND pd.idOperatore = ? AND p.id=pd.prenotazione
            GROUP BY p.id
            ORDER BY p.oraInizio";


        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($data);
        $sqlQuery->setNumber($operatore);
        return $this->getList($sqlQuery);
        //SELECT p.* FROM prenotazioni p, prenotazioniDettaglio pd WHERE p.data = "2022-12-14" AND pd.idOperatore = 7 ORDER BY p.oraInizio
        //SELECT p.* FROM prenotazioni p, prenotazioniDettaglio pd WHERE p.data = "2022-12-14" AND pd.idOperatore = 7 AND p.id=pd.prenotazione ORDER BY p.oraInizio
    }

    public function queryPrenotazioniGiornoPostazioneOrderBYoraInizio($data, $postazione) {
        $sql = "SELECT p.* 
            FROM prenotazioni p, prenotazioniDettaglio pd 
            WHERE p.data = ? AND pd.idPostazione = ? AND p.id=pd.prenotazione
            GROUP BY p.id
            ORDER BY p.oraInizio";


        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($data);
        $sqlQuery->setNumber($postazione);
        return $this->getList($sqlQuery);
    }

    public function queryPrenotazioniGiornoPostazioneOraInizio($data, $postazione, $oraInizio, $oraFine) {
        //echo $data."-".$postazione."-". $oraInizio."-". $oraFine;
        $sql = "SELECT p.* 
            FROM prenotazioni p, prenotazioniDettaglio pd 
            WHERE p.data = ? AND pd.idPostazione = ? AND p.id=pd.prenotazione AND oraInizio BETWEEN '$oraInizio' AND '$oraFine'";


        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($data);
        $sqlQuery->setNumber($postazione);
        return $this->getList($sqlQuery);
    }

}

?>