<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2023-05-31 12:17
 */
interface PagamentoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Pagamento 
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
 	 * @param pagamento primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Pagamento pagamento
 	 */
	public function insert($pagamento);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Pagamento pagamento
 	 */
	public function update($pagamento);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdRisorsa($value);

	public function queryByNome($value);

	public function queryByIsFineMese($value);

	public function queryByIsPagamentoImmediato($value);


	public function deleteByIdRisorsa($value);

	public function deleteByNome($value);

	public function deleteByIsFineMese($value);

	public function deleteByIsPagamentoImmediato($value);


}
?>