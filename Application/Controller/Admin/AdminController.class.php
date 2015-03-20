<?php
class AdminController extends Controller{
	public function adminAction(){
		$this->display("admin.html");
	}
	
	public function mainAction()
	{
		$this->display('main.html');
	}
	
	public function topAction()
	{
		$this->display('top.html');
	}
	
	public function menuAction()
	{
		$this->display('menu.html');
	}
	
}