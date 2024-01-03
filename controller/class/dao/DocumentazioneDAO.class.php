<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface DocumentazioneDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Documentazione 
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
 	 * @param documentazione primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Documentazione documentazione
 	 */
	public function insert($documentazione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Documentazione documentazione
 	 */
	public function update($documentazione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPaziente($value);

	public function queryByDataAcquisizione($value);

	public function queryByDataDocumento($value);

	public function queryByDescrizione($value);

	public function queryByAllegato($value);


	public function deleteByIdPaziente($value);

	public function deleteByDataAcquisizione($value);

	public function deleteByDataDocumento($value);

	public function deleteByDescrizione($value);

	public function deleteByAllegato($value);


}
?>