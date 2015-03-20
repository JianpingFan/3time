<?php


class MovieModel extends Model{

	/**
	 * 影片插入的具体实现方法
	 */
	public function insert($data){
		return $this->insertData($data);
	}
	
	
	
	/**
	 * 获取V_movie表中的所有数据
	 */
	public function getList(){
		return $this->getAll();
	}
	
	/**
	 * 具体根据主键删除的方法
	 * @param unknown $id
	 * @return Ambigous <boolean, resource>
	 */
	public function remove($id){
		return $this->deleteByPK($id);
	}
}


	
?>