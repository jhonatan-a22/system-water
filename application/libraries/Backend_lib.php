<?php

class Backend_lib{
	private $CI;
	public function __construct(){
		$this->CI = & get_instance();
	}

	public function control(){
		if (!$this->CI->session->userdata("login")) {
			redirect(base_url());
		}
		$url = $this->CI->uri->segment(1);
		if ($this->CI->uri->segment(2)) {
			$url = $this->CI->uri->segment(1);
		}

		$infomenu = $this->CI->Backend_model->getID($url);

		$privilegios = $this->CI->Backend_model->getPermisos($infomenu->id,$this->CI->session->userdata("rol"));
		if ($privilegios->leer == 0 ) {
			redirect(base_url()."redireccion");
		}else{
			return $privilegios;
		}

	}


	/*
	public function getMenu()
	{
		$menu = '';
		$parents = $this->CI->Backend_model->getParents($this->CI->session->userdata("rol"));
		foreach ($parents as $parent) {
			$children = $this->CI->Backend_model->getChildren($this->CI->session->userdata("rol"),$parent->id);
			$linkParent = $parent->link == '#' ? '#': base_url($parent->link);
			if (!$children) {
				$menu .= '<li>
                        <a href="'.$linkParent.'">
                            <i class="fa fa-home"></i> <span>'.$parent->nombre.'</span>
                        </a>
                    </li>';
			} else {
				$menu .= '<li class="treeview">
	                        <a href="#">
	                            <i class="fa fa-cogs"></i> <span>'.$parent->nombre.'</span>
	                            <span class="pull-right-container">
	                                <i class="fa fa-angle-left pull-right"></i>
	                            </span>
	                        </a><ul class="treeview-menu">';

	            foreach ($children as $child) {
	            	$menu .= '<li><a href="'.base_url($child->link).'"><i class="fa fa-circle-o"></i>'.$child->nombre.'</a></li>';
	                        
	            }
	            $menu .= '</ul></li>';            
			}
		}
		return $menu;
	}
	*/

}