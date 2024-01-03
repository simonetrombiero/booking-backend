<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface IncaricoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Incarico 
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
 	 * @param incarico primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Incarico incarico
 	 */
	public function insert($incarico);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Incarico incarico
 	 */
	public function update($incarico);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);


	public function deleteByNome($value);


}
?>