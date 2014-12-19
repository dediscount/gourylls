<?php
class User extends Controller
{
	public function index($firstName='',$lastName='')//index function !!!!!!
	{
		//echo $firstName;
		$user=$this->model('User');
		//$user->name=$firstName.' '.$lastName;
		//echo $user->name;
		//$this->view('home/index',['name'=>$user->name]);
		$this->view('user/index');
	}
}?>