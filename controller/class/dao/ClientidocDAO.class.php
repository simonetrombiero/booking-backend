<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface ClientidocDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Clientidoc 
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
 	 * @param clientidoc primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Clientidoc clientidoc
 	 */
	public function insert($clientidoc);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Clientidoc clientidoc
 	 */
	public function update($clientidoc);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByCodice($value);

	public function queryByNome($value);

	public function queryByCognome($value);

	public function queryByRagioneSociale($value);

	public function queryByPiva($value);

	public function queryByIdCitta($value);

	public function queryByIndirizzo($value);

	public function queryByCap($value);

	public function queryByCodiceFiscale($value);


	public function deleteByIdCliente($value);

	public function deleteByCodice($value);

	public function deleteByNome($value);

	public function deleteByCognome($value);

	public function deleteByRagioneSociale($value);

	public function deleteByPiva($value);

	public function deleteByIdCitta($value);

	public function deleteByIndirizzo($value);

	public function deleteByCap($value);

	public function deleteByCodiceFiscale($value);


}
?>