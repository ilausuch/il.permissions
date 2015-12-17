<?php
	require_once("il.permissions.php");
	
	$ps=new ilPermissions(["app.s1","app.s2","app.s2.m1#edit","app.s3#edit","app.s3.m1"]);
	
	$test=[
		"app",
		"app.s1",
		"app.s1#edit",
		"app.s1.m1",
		"app.s2",
		"app.s2#edit",
		"app.s2.m1",
		"app.s2.m1#edit",
		"app.s3",
		"app.s3#edit",
		"app.s3.m1",
		"app.s3.m1#edit"
	];
	
	foreach($test as $t)
		if ($ps->check($t))
			echo "YES {$t}\n";
		else
			echo "NO  {$t}\n";