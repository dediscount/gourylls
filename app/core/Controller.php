<?php
class Controller
{
	public function model($model)
	{
		require_once '/../models/'.$model.'.php';
		//return new $model();
	}
	public function view($view, $data='')
	{
//            if($data==='')
//            {
//                echo "empty";
//            }
		//echo '../app/views/'.$view.'.php';
		require_once '/../views/'.$view.'.php';
		//return new $view();	NO INSTANCE!!!!!!!!
	}
	
	
	
}