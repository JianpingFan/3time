<?php


class AdminModel extends Model{
	
	public function check($username,$password){
           return $this->count("admin_mail='{$username}' and admin_passwd='{$password}'");
	}
	
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
	
	public function getAdmin_group($condition){
		return $this->getAll($condition);
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