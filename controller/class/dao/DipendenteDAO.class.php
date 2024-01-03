<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface DipendenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Dipendente 
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
 	 * @param dipendente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Dipendente dipendente
 	 */
	public function insert($dipendente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Dipendente dipendente
 	 */
	public function update($dipendente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdSede($value);

	public function queryByIdIncarico($value);

	public function queryByNome($value);

	public function queryByCognome($value);

	public function queryByBackgroundColor($value);


	public function deleteByIdSede($value);

	public function deleteByIdIncarico($value);

	public function deleteByNome($value);

	public function deleteByCognome($value);

	public function deleteByBackgroundColor($value);


}
?>