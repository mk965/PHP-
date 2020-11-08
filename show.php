<?php
	
	header('content-type:text/html;charset=utf-8');
	$type = $_GET['type'];
	$data = null;
	switch ($type){
		case 'course':
			$data = getData('course',$_GET["course_id"]);
			break;  
		case 'class':
			$data = getData('class',$_GET["class_id"]);
			break;
		case 'teacher':
			$data = getData('teacher',$_GET["teacher_id"]);
			break;
		case 'news':
			$data = getData('news',$_GET["news_id"]);
			break;
		default:
			break;
	}
	function getData($type,$id){
		$getUrl = file_get_contents('apiRootPath.txt').'getOneData?type='.$type.'&'.$type.'_id='.$_GET[$type."_id"];
		$resData = json_decode(file_get_contents($getUrl), true);
		return $resData;
	}
	include 'header.html';
?>
<style>
	.section--description{text-align: left!important; color: black!important;}
	.section--description p{text-indent: 2em;}
</style>
			<div class="section course">
                <div class="container">
                	
                 	<div class="am-g doc-am-g">
						<div class="am-u-sm-12 am-u-md-8 am-u-lg-9">
							
							<?php
								switch ($type){
									case 'course':
										echo '<div class="section--header">
							                    <h2 class="section--title">'.$data['course_name'].'</h2>
							                    <div class="section--description">
							                    	<b>课程类型：</b>'.$data['course_type'].'语课程<br><br>
							                    	<b>使用教材：</b>'.$data['course_book'].'<br><br>
							                    	<b>课程介绍：</b>'.$data['course_desc'].'<br><br>
							                    	<b>适合人群：</b>'.$data['course_people'].'<br><br>
							                    	<b>课程特色：</b>'.$data['course_feature'].'<br><br>
							                    	<p>
							                    		
							                    	</p>
							                    </div>
						               		</div>';
										break;  
									case 'class':
										echo '<div class="section--header">
							                    <h2 class="section--title">'.$data['class_name'].'</h2>
							                    <div class="section--description">
							                    	<b>开班类型：</b>'.$data['class_type'].'语班<br><br>
							                    	<b>开班时间：</b>'.$data['class_start'].'<br><br>
							                    	<b>课时长度：</b>'.$data['class_keshi'].'课时<br><br>
							                    	<b>上课校区：</b>'.$data['class_campus'].'<br><br>
							                    	<b>使用教材：</b>'.$data['class_book'].'<br><br>
							                    	<b>适合人群：</b>'.$data['class_people'].'<br><br>
							                    	<b>课程特色：</b>'.$data['class_feature'].'<br><br>
							                    	<p>
							                    		
							                    	</p>
							                    </div>
						               		</div>';
										break;
									case 'teacher':
										echo ' <div data-am-widget="intro"class="am-intro am-cf am-intro-default">
											    <div class="am-g am-intro-bd">
											        <div class="am-intro-left am-u-sm-5"><img style="width: 100%;" src="'.$data['teacher_photo'].'" alt="艾意迪教师" /></div>
											        <div class="am-intro-right am-u-sm-7">
											        	<p><span style="font-size: 28px;">'.$data['teacher_name'].'</span><span style="color: #9b9b9b">&nbsp;&nbsp;&nbsp;&nbsp;'.$data['teacher_type'].'语老师</span></p>
											        	
											        	<p style="text-indent: 2em;">'.$data['teacher_desc'].'</p>
											        </div>
											    </div>
											 </div>';
										break;
									case 'news':
										echo '<div class="section--header">
							                    <h2 class="section--title">'.$data['news_name'].'</h2>
							                    <div class="section--description">
							                    	<div>
							                    		'.htmlspecialchars_decode($data['news_desc']).'
							                    	</div>
							                    </div>
						               		</div>';
										break;
									default:
										break;
								}
							?>
							
							
						</div>
						
						<!--侧边栏-->
						<div class="am-u-sm-12 am-u-md-4 am-u-lg-3" style="border-left: 1px gainsboro dashed!important;">
							<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="margin: 0!important;">
							    <h2 class="am-titlebar-title ">
							     	预约领取免费试听课
							    </h2>
							
							    <nav class="am-titlebar-nav">
							        <a href="#more" class="">more &raquo;</a>
							    </nav>
							</div>
							<div style="width: 100%; height: 300px; background: gainsboro;">
								<iframe src="yuyue.php" frameborder="0" marginheight="0" marginwidth="0" height="300" scrolling="no" width="100%"></iframe>

							</div>
						</div>
					</div>
                </div>
            </div>
			
<?php include 'footer.html'; ?>