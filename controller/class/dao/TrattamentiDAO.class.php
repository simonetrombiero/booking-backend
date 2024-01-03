<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface TrattamentiDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Trattamenti 
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
 	 * @param trattamenti primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Trattamenti trattamenti
 	 */
	public function insert($trattamenti);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Trattamenti trattamenti
 	 */
	public function update($trattamenti);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCodice($value);

	public function queryByTrattamento($value);

	public function queryByCategoria($value);

	public function queryByClassificazione($value);

	public function queryByCosto($value);

	public function queryByIdAliquota($value);

	public function queryByTempo($value);


	public function deleteByCodice($value);

	public function deleteByTrattamento($value);

	public function deleteByCategoria($value);

	public function deleteByClassificazione($value);

	public function deleteByCosto($value);

	public function deleteByIdAliquota($value);

	public function deleteByTempo($value);


}
?>