<?php
class CategoryController extends Controller{
	/**
	 * 分类相关的方法
	 */
	public function CategoryAction(){
		$categoryModel = new CategoryModel();
		
		$rows = $categoryModel->getList();
		$this->assign('rows',$rows);
		
		$this->display("Category.html");
	}
	
	/**
	 * 分类列表页面
	 */
	public function listAction(){
		$categoryModel = new CategoryModel();
		
		$rows = $categoryModel->getList();
		$this->assign('rows',$rows);
		$this->display("list.html");
	}
	/**
	 * 分类添加的方法
	 */
	public function insertAction(){
		//接受数据
		$cate=array('create_name'=>$_POST['categoryName']);
		//实列化cateGory模型类
		$categoryModel = new CategoryModel();
		
		//执行模型类中的插入方法
		
		$res = $categoryModel->insert($cate);
		if($res){
			$this->redirect('index.php?p=Admin&c=Category&a=Category');
		}else{
			$this->redirect('index.php?p=Admin&c=Category&a=Category',empty($this->error_info)?'分类添加失败！':$this->error_info,2);
		}
	}
	/**
	 * 根据分类表中的id进行删除
	 * 
	 */
	public function removeAction(){
		//接受参数id
		if(!isset($_GET['id']) || empty($_GET['id'])){
			$this->redirect('index.php?p=Admin&c=Category&a=Category','失败',2);
		}
		$id = $_GET['id'];
		$categoryModel = new CategoryModel();
		$res = $categoryModel->remove($id);
		if($res){
			$this->redirect('index.php?p=Admin&c=Category&a=list');
		}else{
			$this->redirect('index.php?p=Admin&c=Category&a=list',empty($this->error_info)?'分类删除失败！':$this->error_info,2);
		}
	}
	
	/**
	 * 分类修改的方法
	 */
	public function updateAction(){
		//接受参数id
		if(!isset($_GET['id']) || empty($_GET['id'])){
			$this->redirect('index.php?p=Admin&c=Category&a=list','失败',2);
		}
		if(!isset($_POST['create_name']) || empty($_POST['create_name'])){
			$this->redirect('index.php?p=Admin&c=Category&a=list','失败',2);
		}
		$id = $_GET['id'];
		$create_name= $_POST['create_name'];
		$data = array('category_id'=>$id,'create_name'=>$create_name);
		$categoryModel = new CategoryModel();
		$res = $categoryModel->updateData($data);
		if($res){
			$this->redirect('index.php?p=Admin&c=Category&a=list');
		}else{
			$this->redirect('index.php?p=Admin&c=Category&a=list','失败',2);
		}
	}
}