<?php

/**
 * Class that operate on table 'pianoTrattamentoDettaglio'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2022-03-17 10:10
 */
class PianoTrattamentoDettaglioMySqlExtDAO extends PianoTrattamentoDettaglioMySqlDAO {

    function queryPeriodoDaA($inizio, $fine) {
        $sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data > '$inizio' AND data <= '$fine'";
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    function queryProssimePrenotazioni($idCliente) {
        $oggi = date("Y-m-d");
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data > '$oggi' AND idCliente = ?";
		$sql = "SELECT pd.* FROM pianoTrattamentoDettaglio pd, pianoTrattamento p WHERE pd.data > '$oggi' AND pd.trattamentoID=p.id AND p.idPaziente = ?";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }

    function queryPrecedentiPrenotazioni($idCliente) {
        $oggi = date("Y-m-d");
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data < '$oggi' AND idCliente = ?";
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data <= '$oggi' AND idCliente = ?";
		$sql = "SELECT pd.* FROM pianoTrattamentoDettaglio pd, pianoTrattamento p WHERE pd.data <= '$oggi' AND pd.trattamentoID=p.id AND p.idPaziente = ?";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }

    function queryByDataOperatoreOrderByOraInizio($data, $idOperatore) {

        $sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data = '$data' AND operatore = ?  ORDER BY oraInizio";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idOperatore);
        return $this->getList($sqlQuery);
    }

    function queryByDataCabinaOrderByOraInizio($data, $idPostazione) {

        $sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE data = '$data' AND postazione = ? ORDER BY oraInizio";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idPostazione);
        return $this->getList($sqlQuery);
    }

    public function queryPrenotazioneOK($idPostazione, $data, $oraInizio, $oraFine) {
        //SELECT * FROM pianoTrattamentoDettaglio WHERE postazione=3 AND data='2021-03-17' AND((oraInizio<'11:30:00' AND oraFine>'11:30:00') OR (oraInizio<'13:00:00' AND oraFine>'13:00:00')) 
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE postazione=? AND data='$data' AND((oraInizio BETWEEN '$oraInizio' AND '$oraFine') OR (oraFine BETWEEN '$oraInizio' AND '$oraFine'))";
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE postazione= ? AND data='$data' AND((oraInizio<'$oraInizio' AND oreFine>'$oraInizio') OR (oraInizio<'$oraFine' AND oreFine>'$oraFine'))";
		$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE postazione= ? AND data='$data' AND((oraInizio<='$oraInizio' AND oreFine>='$oraInizio') OR (oraInizio<='$oraFine' AND oreFine>='$oraFine'))";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idPostazione);
        return $this->getList($sqlQuery);
    }
	
	public function queryOperatoreOK($idOperatore, $data, $oraInizio, $oraFine) {
       // $sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE operatore= ? AND data='$data' AND((oraInizio<'$oraInizio' AND oreFine>'$oraInizio') OR (oraInizio<'$oraFine' AND oreFine>'$oraFine'))";
		$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE operatore= ? AND data='$data' AND((oraInizio<='$oraInizio' AND oreFine>='$oraInizio') OR (oraInizio<='$oraFine' AND oreFine>='$oraFine'))";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idOperatore);
        return $this->getList($sqlQuery);
    }

    public function queryByTrattamentoIDorderByDataDESC($value) {
        $sql = 'SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? ORDER BY data DESC';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

    public function queryPresenzaTrattamentoID($value) {
        $oggi = date("Y-m-d");
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND noShow=0 AND data<='$oggi'";
		$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND noShow=0 AND data<='$oggi' GROUP BY data";
        
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }
	
	 public function queryAllPrecedentiOggi($value) {
        $oggi = date("Y-m-d");
        $sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND data<='$oggi'";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }
	
	 public function queryLimitPrecedentiOggi($value, $limit) {
        $oggi = date("Y-m-d");
        //$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND data<='$oggi' LIMIT 0,$limit";
		$sql = "SELECT * FROM pianoTrattamentoDettaglio WHERE trattamentoID = ? AND data<='$oggi' ORDER BY data DESC LIMIT 0,$limit";
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($value);
        return $this->getList($sqlQuery);
    }

}

?>