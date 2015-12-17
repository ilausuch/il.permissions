<?php
	/**
	il.Permissions php module
	LICENSE MIT 2015 Ivan Lausuch <ilausuch@gmail.com>
	*/

	class ilPermissions{
		private $allowedPermissionList;
		
		public function __construct($allowedPermissionList) {
			$this->allowedPermissionList=$allowedPermissionList;
		}
		
		private function match($permission,$template){
			$template=explode("#", $template);
			$permission=explode("#", $permission);
			
			if ($template[0]!=substr($permission[0], 0, strlen($template[0])))
				return false;
			
			if (count($permission)>1){
				if (count($template)>1)
					return $permission[1]==$template[1];
				else
					return false;
			}	
			
			return true;
		}
		
		public function check($permission){
			foreach($this->allowedPermissionList as $template)
				if ($this->match($permission,$template))
					return true;
					
			return false;
		}
	}
	
	