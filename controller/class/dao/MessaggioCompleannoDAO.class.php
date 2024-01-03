<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface MessaggioCompleannoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MessaggioCompleanno 
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
 	 * @param messaggioCompleanno primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessaggioCompleanno messaggioCompleanno
 	 */
	public function insert($messaggioCompleanno);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessaggioCompleanno messaggioCompleanno
 	 */
	public function update($messaggioCompleanno);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByDataContatto($value);


	public function deleteByIdCliente($value);

	public function deleteByDataContatto($value);


}
?>