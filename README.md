# il.permissions

il.permissions is a permission system than allow to control a huge application sections and actions with permissions a list of simple permissions.

## Permission definition

A permission is a path with optional operation. 

>path[#operation]

For instance, to define edit access to module2 in section 1, permission can be:

> app.section1.module2#edit

There are not rules you can define your structure and your operations. However you can follow these advices:

* Always begin with app to control app access
* If operation it not defined means view access

## Permission check

An user will have a set of permissions, these define what user is allowed to do. There several rules:

**1. If user has upper path permission than  the required permission** 

> User permission: app.secction1
> App permission required: app.section1.module1

In this case user is allowed because $app.section1$ permission path is upper than required permission $app.section1.module1$


**2. If user has special operation permission automatically has view permission**

> User permission: app.section1#edit
> App permission required: app.section1

User can view $app.section1$ because he can edit this section

**3. If user has upper path operation permission than the required operation permission**

> User permission: app.secction1#edit
> App permission required: app.section1.module1#edit

## Examples

User permission list:
> app.s1
app.s2
app.s2.m1#edit
app.s3#edit
app.s3.m1

Required permission and if is allowed:

> **NO**  - app
**YES** - app.s1
**NO** - app.s1#edit
**YES** - app.s1.m1
**YES** - app.s2
**NO**  - app.s2#edit
**YES** - app.s2.m1
**YES** - app.s2.m1#edit
**YES** - app.s3
**YES** - app.s3#edit
**YES** - app.s3.m1
**YES** - app.s3.m1#edit

## Usage in php

```php
//load ilPermissions class
require_once("il.permissions.php");

//Create an ilPermission object with the list of user permissions	
$ps=new ilPermissions(["app.s1","app.s2","app.s2.m1#edit","app.s3#edit","app.s3.m1"]);

//Check required permission
if ($ps->check("app.s1#edit")){
	//It's allowed
}
else{
	//Forbiden
}
```

## Usage in js

Load il.permissions.js
```html
<script type="text/javascript" src="il.permissions.js"></script>
```
Check permission:
```js
//Create an ilPermissions object with list of user permissions
ps=new ilPermissions(["app.s1","app.s2","app.s2.m1#edit","app.s3#edit","app.s3.m1"]);
			
//Check required permission
if (ps.check("app.s1#edit")){
	//It's allowed
}
else{
	//Forbiden
}		
``` 


## Credits

MIT License @2015
Ivan Lausuch [ilausuch@gmail.com](mailto:ilausuch@gmail.com)



