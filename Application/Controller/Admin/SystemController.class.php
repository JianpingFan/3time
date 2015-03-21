<?php


class SystemController extends Controller{

	public function add_adminAction(){
		if(empty($_POST)){
			$groupModel = new GroupModel();
			$rows = $groupModel->getList();
			$this->assign('rows',$rows);
			$this->display("add_admin.html");
			return ;
		}
		$adminModel = new AdminModel();
		$res = $adminModel->add_admin($_POST);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=list");
		}else{
			$this->redirect("index.php?p=Admin&c=System&a=add_admin",'添加失败',2);
		}
	}
	
	/**
	 * 获取所有的管理员
	 */
	public function listAction(){
		$groupModel = new GroupModel();
		$groups = $groupModel->getList();
		$this->assign('groups',$groups);
		$adminModel = new AdminModel();
		$rows = $adminModel->getList();
		$this->assign('rows',$rows);
		$this->display("list.html");
	}
	/**
	 * 更新管理员信息
	 */
	public function update_adminAction(){
		$adminModel = new AdminModel();
		$res = $adminModel->update_admin($_POST);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=list");
		}else {
			$this->redirect("index.php?p=Admin&c=System&a=list",'修改失败!',2);
		}
	}
	/**
	 * 删除管理员
	 */
	public function remove_adminAction(){
		$adminModel = new AdminModel();
		$res = $adminModel->remove_admin($_GET['id']);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=list");
		}else{
			$this->redirect("index.php?p=Admin&c=System&a=list",'删除失败!',2);
		}
	}
	
	/**
	 * 添加用户组展示和提交页面
	 */
	public function add_groupAction(){
		if(empty($_POST)){
			$this->display("add_group.html");
			return ;
		}
		//接受参数
		
		$groupModel = new GroupModel();
		$res = $groupModel->insert($_POST);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=add_group",'添加成功',2);
		}else{
			$this->redirect("index.php?p=Admin&c=System&a=add_group",'添加失败',2);
		}
	}
	/**
	 * 获取所有的用户组列表
	 */
	public function group_listAction(){
		//获取数据
		$groupModel = new GroupModel();
		$rows = $groupModel->getList();
		$this->assign('rows',$rows);
		$this->display("group_list.html");
	}
	
	/**
	 * 更新用户组
	 */
	public function update_groupAction(){
		$groupModel = new GroupModel();
		$res = $groupModel->update($_POST);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=group_list",'修改成功',2);
		}else{
			$this->redirect("index.php?p=Admin&c=System&a=group_list",'修改失败',2);
		}
	}
	/**
	 * 删除用户组
	 */
	public function remove_groupAction(){
		$id = $_GET['id'];
		$groupModel = new GroupModel();
		$res = $groupModel->remove($id);
		if($res){
			$this->redirect("index.php?p=Admin&c=System&a=group_list");
		}else{
			$this->redirect("index.php?p=Admin&c=System&a=group_list",'删除失败',2);
		}
	}
	
	
	
	public function system_wegitAction(){
		$this->display("system_wegit.html");
	}
	
	
}

?>