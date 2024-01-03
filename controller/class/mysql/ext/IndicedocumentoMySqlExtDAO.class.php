<?php
/** 
 * Class that operate on table 'indicedocumento'. Database Mysql.
 *
 * @author: http://phpdao.com 
 * @date: 2018-09-07 11:38
 */
class IndicedocumentoMySqlExtDAO extends IndicedocumentoMySqlDAO{  

	function loadMaxIndiceByTipo($idTipoDocumento, $anno) {
        
        //$sql = 'SELECT * FROM indicedocumento WHERE idTipoDocumento = ? AND id = (SELECT MAX(id) FROM indicedocumento WHERE idTipoDocumento = ? )';
        $sql = 'SELECT max(id) AS id, idTipoDocumento, nome, anno, progressivo, registro FROM indicedocumento WHERE idTipoDocumento = ? AND anno= ? GROUP BY anno ORDER BY anno';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idTipoDocumento);
        $sqlQuery->setNumber($anno);
        return $this->getRow($sqlQuery);
    }
}
?>