<?php
class MovieController extends Controller{
	/**
	 * 添加页面展示的方法
	 */
	public function addAction(){
		//调用cate分类中的数据
		$categoryModel = new CategoryModel();
		$rows = $categoryModel->getList();
		$this->assign('rows',$rows);
		$this->display('add.html');
	}
	
	/**
	 * 影片添加控制器
	 */
	public function insertAction(){
		//接受数据页面提交给来的差   添加时间  图片的地址
		//var_dump($_POST);
		$_POST['movie_add_time'] = date("Y-m-d H:i:s",time());
		if($_POST['movie_recommend_admin']==''){
			$_POST['movie_recommend_admin']='N';
		}
		
		//图片地址相关
		$allow_type = array("image/jpeg","image/jpg","image/png","image/gif","image/bmp");
		$uploadTool = new UploadTool($allow_type);
		
		
		$movie_img_path = $uploadTool->uploadOne($_FILES['movie_img_thumb'], 'movie_img');
		if(!$movie_img_path){
			$this->redirect('index.php?p=Admin&c=Movie&a=add',$uploadTool->error,2);
		}
		$_POST['movie_img_thumb'] = $movie_img_path;
		$movieModel = new MovieModel();
		$res = $movieModel->insert($_POST);
		if($res){
			$this->redirect('index.php?p=Admin&c=Movie&a=list');
		}else{
			$this->redirect('index.php?p=Admin&c=Movie&a=add',"影片添加失败！",2);
		}
		
	}
	
	/**
	 * 展示影片列表的方法
	 */
	public function listAction(){
		
		
		//获取V_movie中的数据
		$movieModel = new MovieModel();
		
		$rows = $movieModel->getList();
		if(!$rows){
			die();
		}
		$this->assign('rows',$rows);
		$this->display('list.html');
	}
	
	/**
	 * 删除影片
	 */
	public function removeAction(){
		//接受参数id
		if(!isset($_GET['id']) || empty($_GET['id'])){
			$this->redirect('index.php?p=Admin&c=Movie&a=list','失败',2);
		}
		$id = $_GET['id'];
		$movieModel = new MovieModel();
		$res = $movieModel->remove($id);
		if($res){
			$this->redirect('index.php?p=Admin&c=Movie&a=list');
		}else{
			$this->redirect('index.php?p=Admin&c=Movie&a=list',empty($this->error_info)?'分类删除失败！':$this->error_info,2);
		}
	}
	
	
	/**
	 * 更新影片信息
	 */
	public function updateAction(){
		//接受请求id
		$_POST['movie_id'] = $_GET['id'];
		if($_POST['movie_recommend_admin']==' '){
			$_POST['movie_recommend_admin']="Y";
		}
		$movieModel = new MovieModel();
		$res = $movieModel->update($_POST);
		if($res){
			$this->redirect('index.php?p=Admin&c=Movie&a=list');
		}else{
			$this->redirect('index.php?p=Admin&c=Movie&a=list',empty($this->error_info)?'分类删除失败！':$this->error_info,2);
		}
		
	}
}