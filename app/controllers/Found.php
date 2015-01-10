<?php
class Found extends Controller
{
	public function index()//index function !!!!!!
	{
		$user=$this->model('User');
		$this->view('found/index',['account' => $user->account,'iconPath'=>$user->iconPath]);                
	}
}