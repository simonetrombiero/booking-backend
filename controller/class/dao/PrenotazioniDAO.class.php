<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PrenotazioniDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Prenotazioni 
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
 	 * @param prenotazioni primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Prenotazioni prenotazioni
 	 */
	public function insert($prenotazioni);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Prenotazioni prenotazioni
 	 */
	public function update($prenotazioni);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdPiano($value);

	public function queryByIdCliente($value);

	public function queryByData($value);

	public function queryByOraInizio($value);

	public function queryByOraFine($value);

	public function queryByNote($value);

	public function queryByStatus($value);

	public function queryByNoShow($value);


	public function deleteByIdPiano($value);

	public function deleteByIdCliente($value);

	public function deleteByData($value);

	public function deleteByOraInizio($value);

	public function deleteByOraFine($value);

	public function deleteByNote($value);

	public function deleteByStatus($value);

	public function deleteByNoShow($value);


}
?>