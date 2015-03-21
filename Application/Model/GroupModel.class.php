<?php
class GroupModel extends Model{
	
	
	/**
	 * 用户组插入的方法
	 * @param unknown $data
	 */
	public function insert($data){
		//处理数据
		$data['group_wegit'] = implode(' ', $data['group_wegit']);
		return $this->insertData($data);
	}
	
	/**
	 * 获取管理员列表的具体方法
	 */
	public function getList(){
		return $this->getAll();
	}

	/**
	 * 更新用户组方法
	 */
	public function update($data){
		$data['group_wegit'] = implode(' ', $data['group_wegit']);
		return $this->updateData($data);
	}
	
	public function remove($id){
		return $this->deleteByPK($id);
	}
}

?>