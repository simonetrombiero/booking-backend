<?php
/**
 * Class that operate on table 'documento'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2020-08-27 11:46
 */
class DocumentoMySqlExtDAO extends DocumentoMySqlDAO{

	public function queryByIdCliente($idCliente) {
            //SOLO DOCUMENTI FISCALI
        $sql = 'SELECT d.* '
                . 'FROM documento d, clienti c, clientidoc cd '
                . 'WHERE c.id = cd.idCliente AND d.idClientedoc = cd.id AND c.id = ? AND d.idTipoDocumento<>3';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }
    
    public function queryAllByIdCliente($idCliente) {
        //INCLUSI PREVENTIVI
        $sql = 'SELECT d.* '
                . 'FROM documento d, clienti c, clientidoc cd '
                . 'WHERE c.id = cd.idCliente AND d.idClientedoc = cd.id AND c.id = ?';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idCliente);
        return $this->getList($sqlQuery);
    }
}
?>