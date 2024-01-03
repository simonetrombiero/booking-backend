<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface UtenteDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Utente 
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
 	 * @param utente primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Utente utente
 	 */
	public function insert($utente);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Utente utente
 	 */
	public function update($utente);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdRuolo($value);

	public function queryByNome($value);

	public function queryByCognome($value);

	public function queryByUsername($value);

	public function queryByPassword($value);

	public function queryByIsAdmin($value);

	public function queryByIsSospeso($value);


	public function deleteByIdRuolo($value);

	public function deleteByNome($value);

	public function deleteByCognome($value);

	public function deleteByUsername($value);

	public function deleteByPassword($value);

	public function deleteByIsAdmin($value);

	public function deleteByIsSospeso($value);


}
?>