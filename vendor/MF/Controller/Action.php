<?php

namespace MF\Controller;

abstract class Action {

	protected $view;
 
	public function __construct()
	{
		$this->view = new \stdClass();
	}
 
	
	protected function render($view, $layout = 'layout') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	}
	protected function render_login($view, $layout = 'layout_login') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	}
	protected function renderHome($view, $layout = 'layout_home') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	}
	protected function renderNoticias($view, $layout = 'layout_CadNoticias') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	} 
	protected function renderNoticiasJornalista($view, $layout = 'layout_CadNoticias') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	} 

	protected function renderList($view, $layout = 'layout_listar') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	} 
	protected function renderEdit($view, $layout = 'layout_alterar') {
		$this->view->page = $view; 

		if(file_exists("../App/Views/".$layout.".phtml")) {
			require_once "../App/Views/".$layout.".phtml";
		} else {
			$this->content();
		}
	} 
	
	



	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";
	}
}

?>