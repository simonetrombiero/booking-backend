<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoQuestionarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoQuestionario 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param anamnesticoQuestionario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoQuestionario anamnesticoQuestionario
 	 */
	public function insert($anamnesticoQuestionario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoQuestionario anamnesticoQuestionario
 	 */
	public function update($anamnesticoQuestionario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdAnamnestico($value);

	public function queryByIdGruppo($value);

	public function queryByDomanda($value);

	public function queryByOpzioneRisposta($value);

	public function queryByTipoRisposta($value);

	public function queryByOrdine($value);

	public function queryByIsObbligatorio($value);


	public function deleteByIdAnamnestico($value);

	public function deleteByIdGruppo($value);

	public function deleteByDomanda($value);

	public function deleteByOpzioneRisposta($value);

	public function deleteByTipoRisposta($value);

	public function deleteByOrdine($value);

	public function deleteByIsObbligatorio($value);


}
?>