/**
	il.Permissions javascript module
	LICENSE MIT 2015 Ivan Lausuch <ilausuch@gmail.com>	
*/
	
function ilPermissions(allowedPermissionList){
	this.allowedPermissionList=allowedPermissionList;
	
	this.match=function(permission,template){
		template=template.split("#");
		permission=permission.split("#");
		
		if (template[0]!=permission[0].substr(0, template[0].length))
			return false;
			
		if (permission.length>1){
			if (template.length>1)
				return permission[1]==template[1];
			else
				return false;
		}
		
		return true;
	}
	
	this.check=function(permission){
		for (i in this.allowedPermissionList)
			if (this.match(permission,this.allowedPermissionList[i]))
				return true;
				
		return false;
	}
}