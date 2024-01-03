<?php
/**
 * Class that operate on table 'anamnesticoQuestionarioGruppo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2023-02-06 09:37
 */
class AnamnesticoQuestionarioGruppoMySqlExtDAO extends AnamnesticoQuestionarioGruppoMySqlDAO{

    public function queryByIdAnamnestico($idQuestionario) {
        $sql = 'SELECT g.* '
                . 'FROM anamnesticoQuestionario aq, anamnesticoQuestionarioGruppo g '
                . 'WHERE aq.idAnamnestico= ? AND g.id = aq.idGruppo '
                . 'GROUP BY g.id '
                . 'ORDER BY g.ordine ASC';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->set($idQuestionario);
        return $this->getList($sqlQuery);
        
    }
	
}
?>