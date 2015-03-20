<?php
class CategoryModel extends Model{
	
	
	//具体实现插入分类的方法
	public function insert($categoryName){
		//验证数据是否为空
		if(empty($categoryName)){
			$this->error_info= '分类名不能为空!';
			return false;
		}
		$key = array_keys($categoryName);
		$values = array_values($categoryName);
		$count = $this->count("$key[0]='$values[0]'");
		if($count){
			$this->error_info= '该分类已经存在!';
			return false;
		}
		return $this->insertData($categoryName);
	}
	/**
	 * 具体实现获得表中所有数据的方法
	 */
	public function getList(){
		return $this->getAll();
	}
	/**
	 * 根据主键进行分类的删除
	 * @param unknown $id
	 */
	public function remove($id){
		return $this->deleteByPK($id);
	}
	
	/**
	 * 分类跟新的具体实现方法
	 */
	public function update(){
		return $this->updateData($data);
	}
}