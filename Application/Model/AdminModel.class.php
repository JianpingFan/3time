<?php


class AdminModel extends Model{
	/**
	 * 添加管理员方法
	 */
	public function add_admin($data){
		//对密码数据进行处理
		$data['admin_passwd']=md5($data['admin_passwd']);
		return $this->insertData($data);
	}
	/**
	 * 获取所有管理员方法
	 */
	public function getList(){
		return $this->getAll();
	}
	
	/**
	 * 更新管理员的方法
	 */
	public function update_admin($data){
		$data['admin_passwd'] = md5($data['admin_passwd']);
		return $this->updateData($data);
	}
	/**
	 * 删除管理员方法
	 * @param unknown $id
	 */
	public function remove_admin($id){
		return $this->deleteByPK($id);
	}
}

?>