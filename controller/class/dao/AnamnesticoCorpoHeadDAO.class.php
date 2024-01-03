<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface AnamnesticoCorpoHeadDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AnamnesticoCorpoHead 
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
 	 * @param anamnesticoCorpoHead primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AnamnesticoCorpoHead anamnesticoCorpoHead
 	 */
	public function insert($anamnesticoCorpoHead);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AnamnesticoCorpoHead anamnesticoCorpoHead
 	 */
	public function update($anamnesticoCorpoHead);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdQuestionario($value);

	public function queryByIdCliente($value);

	public function queryByData($value);

	public function queryByEta($value);

	public function queryByAltezza($value);

	public function queryByNote($value);


	public function deleteByIdQuestionario($value);

	public function deleteByIdCliente($value);

	public function deleteByData($value);

	public function deleteByEta($value);

	public function deleteByAltezza($value);

	public function deleteByNote($value);


}
?>