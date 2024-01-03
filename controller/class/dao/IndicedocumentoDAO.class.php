<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface IndicedocumentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Indicedocumento 
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
 	 * @param indicedocumento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Indicedocumento indicedocumento
 	 */
	public function insert($indicedocumento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Indicedocumento indicedocumento
 	 */
	public function update($indicedocumento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdTipoDocumento($value);

	public function queryByNome($value);

	public function queryByAnno($value);

	public function queryByProgressivo($value);

	public function queryByRegistro($value);


	public function deleteByIdTipoDocumento($value);

	public function deleteByNome($value);

	public function deleteByAnno($value);

	public function deleteByProgressivo($value);

	public function deleteByRegistro($value);


}
?>