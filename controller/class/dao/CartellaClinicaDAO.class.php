<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface CartellaClinicaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CartellaClinica 
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
 	 * @param cartellaClinica primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CartellaClinica cartellaClinica
 	 */
	public function insert($cartellaClinica);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CartellaClinica cartellaClinica
 	 */
	public function update($cartellaClinica);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdQuestionaro($value);

	public function queryByDataComplilazione($value);

	public function queryByStatoBocca($value);

	public function queryByNote($value);


	public function deleteByIdQuestionaro($value);

	public function deleteByDataComplilazione($value);

	public function deleteByStatoBocca($value);

	public function deleteByNote($value);


}
?>