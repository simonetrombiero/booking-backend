<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoQuestionarioGruppoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoQuestionarioGruppo 
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
 	 * @param anamnesticoQuestionarioGruppo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoQuestionarioGruppo anamnesticoQuestionarioGruppo
 	 */
	public function insert($anamnesticoQuestionarioGruppo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoQuestionarioGruppo anamnesticoQuestionarioGruppo
 	 */
	public function update($anamnesticoQuestionarioGruppo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescrizione($value);

	public function queryByOrdine($value);


	public function deleteByDescrizione($value);

	public function deleteByOrdine($value);


}
?>