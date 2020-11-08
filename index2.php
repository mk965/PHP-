<?php
	header('content-type:text/html;charset=utf-8');
	
	
	$data_banner = json_decode(file_get_contents("http://localhost/blog/home/api/getData?type=banner"), true);
	foreach($data_banner['data'] as $item){
		echo '<li><img src="'.$item['banner_url'].'" /></li>';
	}
	
	
	echo '<br><br><br>=============================================================<br><br><br>'
	
	
	$data_course = json_decode(file_get_contents("http://localhost/blog/home/api/getData?type=course"), true);
	foreach($data_course['data'] as $item){
		echo '<li>'.$item['course_name'].'</li>';
    
	}
	
	
	echo '<br><br><br>=============================================================<br><br><br>'
	
	
	$data_class = json_decode(file_get_contents("http://localhost/blog/home/api/getData?type=class"), true);
	foreach($data_class['data'] as $item){
		echo '<li>'.$item['class_name'].'</li>';
    
	}
	
	
	
?>