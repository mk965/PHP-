<?php
	
	header('content-type:text/html;charset=utf-8');
	$apiRootPath = file_get_contents('apiRootPath.txt');
	/*
	 * 为了弥补服务器的不足，直接读取服务器缓存文件，首页打开速度提升十倍以上。
	 * 每次进行数据库写入操作时更新缓存数据文件。
	 * 当缓存文件不存在时直接访问数据库。
	 */
	$cacheData = file_get_contents('http://localhost/blog/Public/cache/cacheData.json');
	if($cacheData){
		$j_chcheData   = json_decode($cacheData,true);
		//print_r ($j_chcheData['banner_data']);
		$data_banner['data']   = $j_chcheData['data_banner'];
		$data_course['data']   = $j_chcheData['data_course'];
		$data_class['data']    = $j_chcheData['data_class'];
		$data_teacher['data']  = $j_chcheData['data_teacher'];
		$data_news_ri['data']  = $j_chcheData['data_news_ri'];
		$data_news_han['data'] = $j_chcheData['data_news_han'];
	}else{
		$data_banner   = json_decode(file_get_contents($apiRootPath."getData?type=banner"), true);
		$data_course   = json_decode(file_get_contents($apiRootPath."getData?type=course"), true);
		$data_class    = json_decode(file_get_contents($apiRootPath."getData?type=class"), true);
		$data_teacher  = json_decode(file_get_contents($apiRootPath."getData?type=teacher"), true);
		/*学习资讯中日语和韩语分两次获取，只获取8条，因为在前台只显示8条一直有bug。一次全部查询和分两次每次查8条，牺牲了效率。*/
		$data_news_ri  = json_decode(file_get_contents($apiRootPath."getData?type=news_ri"), true);
		$data_news_han = json_decode(file_get_contents($apiRootPath."getData?type=news_han"), true);
	}
?>
<?php include 'header.html'; ?>
            <div data-am-widget="slider" class="am-slider am-slider-a1 m-banner" data-am-slider='{&quot;directionNav&quot;:false}'>
                <ul class="am-slides">
                    <li>
                        <a href="#">
                            <img src="images/m-banner.jpg"></a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="images/m-banner01.jpg"></a>
                    </li>
                </ul>
            </div>
            <div>
                <div data-am-widget="slider" class="am-slider am-slider-a1 banner" data-am-slider='{&quot;directionNav&quot;:false}'>
                    <ul id="index_banner" class="am-slides">
                        <?php
							foreach($data_banner['data'] as $item){
								echo '<li>
										<a href="#" style="background:url('.$item['banner_url'].') no-repeat center top;"></a>
									</li>';
							}
						?>
                    </ul>
                    <div class="banner-top">
                        <dl class="tongzhi">
                            <dt>预约免费获取试听课</dt>
                            <dd>
                                <iframe src="yuyue.php" frameborder="0" marginheight="0" marginwidth="0" height="160" scrolling="no" width="100%"></iframe>
                            </dd>
                            <dd class="yy-tel">电话预约：0532-89081203</dd>
                            <dd class="tz-list">
                                <h1>最新优惠</h1>
                                <a href="Show.asp?ArticleID=21827" title="优惠正当时！暑假班直减1000元！秋季班预报直减1500！" target="_blank">优惠正当时！暑假班直减1000元！秋季班…</a>
                                <a href="Show.asp?ArticleID=21711" title="花道大师插花艺术沙龙，体验优雅轻奢生活" target="_blank">花道大师插花艺术沙龙，体验优雅轻奢生…</a></dd>
                        </dl>
                    </div>
                </div>
                <div class="section course">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">全部课程</h2>
                            <p class="section--description">艾意迪教育课程包括零基础入门课、文化兴趣课、旅游课、考级考研课、留学课程、就业课程等。</p>
                        </div>
                        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
                            <ul class="am-tabs-nav am-cf info-tab">
                                <li class="am-active">
                                    <a href="[data-tab-panel-0]">日语课程</a></li>
                                <li class="">
                                    <a href="[data-tab-panel-1]">韩语课程</a></li>
                            </ul>
                            <div class="am-tabs-bd info-tab-con">
                                <div data-tab-panel-0 class="am-tab-panel am-active">
                                    <div class="am-g">
										<?php 
											foreach($data_course['data'] as $item){
												if($item['course_type'] == '日'){
													echo '<div class="am-u-sm-12 am-u-lg-4 course-list">
														<dl class="course-dl">
															<dt>
																<a href="Show.php?type=course&course_id='.$item['course_id'].'">'.$item['course_name'].'</a></dt>
															<dd>
																<p>'.$item['course_desc'].'</p>
																<a href="Show.php?type=course&course_id='.$item['course_id'].'" class="cour-more">课程详情</a></dd>
														</dl>
													</div>';
												}
											}
										?>
                                    </div>
                                </div>
                                <div data-tab-panel-1 class="am-tab-panel">
                                    <div class="am-g">
										<?php 
											foreach($data_course['data'] as $item){
												if($item['course_type'] == '韩'){
													echo '<div class="am-u-sm-12 am-u-lg-4 course-list">
														<dl class="course-dl">
															<dt>
																<a href="Show.php?type=course&course_id='.$item['course_id'].'">'.$item['course_name'].'</a></dt>
															<dd>
																<p>'.$item['course_desc'].'</p>
																<a href="Show.php?type=course&course_id='.$item['course_id'].'" class="cour-more">课程详情</a></dd>
														</dl>
													</div>';
												}
											}
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section class">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">近期开班</h2>
                            <p class="section--description">艾意迪教育采用滚动式开班，开班时间灵活可选-周末班、半天班、晚班、暑假班、寒假班、全日制班等</p></div>
                        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
                            <ul class="am-tabs-nav am-cf info-tab">
                                <li class="am-active">
                                    <a href="[data-tab-panel-0]">日语开班</a></li>
                                <li class="">
                                    <a href="[data-tab-panel-1]">韩语开班</a></li>
                            </ul>
                            <div class="am-tabs-bd info-tab-con">
                                <div data-tab-panel-0 class="am-tab-panel am-active">
                                    <div class="class-list">
										<?php 
											foreach($data_class['data'] as $item){
												if($item['class_type'] == '日'){
													echo '<ul class="am-g">
															<li class="am-u-sm-12 am-u-lg-4 course-title">
																<i class="am-icon-circle-o"></i>&nbsp;&nbsp;
																<a href="Show.php?type=class&class_id='.$item['class_id'].'" title="'.$item['class_campus'].$item['class_name'].'" target="_blank">'.$item['class_campus'].$item['class_name'].'</a></li>
															<li class="am-u-sm-7 am-u-lg-2">时间：'.$item['class_start'].'</li>
															<li class="am-u-sm-5 am-u-lg-2 xiaoqu">校区：'.$item['class_campus'].'</li>
															<li class="am-u-sm-5 am-u-lg-2">
																<a href="Show.php?type=class&class_id='.$item['class_id'].'" class="price">
																	<i class="am-icon-eye"></i>&nbsp;查看详情</a>
															</li>
															<li class="am-u-sm-5 am-u-lg-2 zxzx-li">
																<a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="zxzx-btn" target="_blank">
																	<i class="am-icon-phone-square"></i>&nbsp;在线咨询</a>
															</li>
														</ul>';
												}
											}
										?>
                                    </div>
                                </div>
                                <div data-tab-panel-1 class="am-tab-panel">
                                    <div class="class-list">
										<?php 
											foreach($data_class['data'] as $item){
												if($item['class_type'] == '韩'){
													echo '<ul class="am-g">
															<li class="am-u-sm-12 am-u-lg-4 course-title">
																<i class="am-icon-circle-o"></i>&nbsp;&nbsp;
																<a href="Show.php?type=class&class_id='.$item['class_id'].'" title="'.$item['class_campus'].$item['class_name'].'" target="_blank">'.$item['class_campus'].$item['class_name'].'</a></li>
															<li class="am-u-sm-7 am-u-lg-2">时间：'.$item['class_start'].'</li>
															<li class="am-u-sm-5 am-u-lg-2 xiaoqu">校区：'.$item['class_campus'].'</li>
															<li class="am-u-sm-5 am-u-lg-2">
																<a href="Show.php?type=class&class_id='.$item['class_id'].'" class="price">
																	<i class="am-icon-eye"></i>&nbsp;查看详情</a>
															</li>
															<li class="am-u-sm-5 am-u-lg-2 zxzx-li">
																<a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="zxzx-btn" target="_blank">
																	<i class="am-icon-phone-square"></i>&nbsp;在线咨询</a>
															</li>
														</ul>';
												}
											}
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section teacher">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">教师团队</h2>
                            <p class="section--description">强大的科研实力、优秀的教学师资-教学专家、外教、专职教师为您保驾护航</p></div>
                        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
                            <ul class="am-tabs-nav am-cf info-tab">
                                <li class="am-active">
                                    <a href="[data-tab-panel-0]">日语老师</a></li>
                                <li class="">
                                    <a href="[data-tab-panel-1]">韩语老师</a></li>
                            </ul>
                            <div class="am-tabs-bd info-tab-con">
                                <div data-tab-panel-0 class="am-tab-panel am-active">
                                    <!--about-container start-->
                                    <div class="about-container">
                                        <div class="our-team">
                                            <div class="am-g">
												<?php 
													foreach($data_teacher['data'] as $item){
														if($item['teacher_type'] == '日'){
															echo '<div class="am-u-md-3">
																	<div class="team-box">
																		<div class="our-team-img">
																			<a href="Show.php?type=teacher&teacher_id='.$item['teacher_id'].'" title="'.$item['teacher_name'].'" target="_blank">
																				<img src="'.$item['teacher_photo'].'" />
																			</a>
																		</div>
																		<div class="team_member--body">
																			<h3 class="team_member--name">'.$item['teacher_name'].'</h3>
																			<span class="team_member--position">'.$item['teacher_type'].'语老师</span>
																			<p class="teacher-text">'.$item['teacher_name'].'，'.$item['teacher_desc'].'</p>
																			<a href="Show.php?type=teacher&teacher_id='.$item['teacher_id'].'" title="'.$item['teacher_name'].'" class="teacher-links">老师详细介绍</a></div>
																	</div>
																</div>';
														}
													}
												?>
												
                                                <div class="am-u-md-3">
                                                    <div class="team-box">
                                                        <div class="our-team-img">
                                                            <a href="Show.asp?ArticleID=21818" title="苗苗" target="_blank">
                                                                <img src="http://www.xdjy369.com/d/file/contents/2018/04/5acdae409f31f.jpg" /></a>
                                                        </div>
                                                        <div class="team_member--body">
                                                            <h3 class="team_member--name">苗苗</h3>
                                                            <span class="team_member--position">日语老师</span>
                                                            <p class="teacher-text">苗苗，硕士研究生，毕业于青岛外国语大学日语专业，多年从事日语笔译口译以及教学工作…</p>
                                                            <a href="Show.asp?ArticleID=21818" title="苗苗" class="teacher-links">老师详细介绍</a></div>
                                                    </div>
                                                </div>
												
                                            </div>
                                            <!--about-container end--></div>
                                    </div>
                                </div>
                                <div data-tab-panel-1 class="am-tab-panel">
                                    <!--about-container start-->
                                    <div class="about-container">
                                        <div class="our-team">
                                            <div class="am-g">
												<?php 
													foreach($data_teacher['data'] as $item){
														if($item['teacher_type'] == '韩'){
															echo '<div class="am-u-md-3">
																	<div class="team-box">
																		<div class="our-team-img">
																			<a href="Show.php?type=teacher&teacher_id='.$item['teacher_id'].'" title="'.$item['teacher_name'].'" target="_blank">
																				<img src="'.$item['teacher_photo'].'" />
																			</a>
																		</div>
																		<div class="team_member--body">
																			<h3 class="team_member--name">'.$item['teacher_name'].'</h3>
																			<span class="team_member--position">'.$item['teacher_type'].'语老师</span>
																			<p class="teacher-text">'.$item['teacher_name'].'，'.$item['teacher_desc'].'</p>
																			<a href="Show.php?type=teacher&teacher_id='.$item['teacher_id'].'" title="'.$item['teacher_name'].'" class="teacher-links">老师详细介绍</a></div>
																	</div>
																</div>';
														}
													}
												?>
                                                <div class="am-u-md-3">
                                                    <div class="team-box">
                                                        <div class="our-team-img">
                                                            <a href="Show.asp?ArticleID=19611" title="张晗" target="_blank">
                                                                <img src="http://www.xdjy369.com/d/file/contents/2017/03/58dca9573f7b6.jpg" /></a>
                                                        </div>
                                                        <div class="team_member--body">
                                                            <h3 class="team_member--name">张晗</h3>
                                                            <span class="team_member--position">韩语老师</span>
                                                            <p class="teacher-text">毕业于延边大学朝鲜语系，韩国诚信女子大学消费者生活文化系，双学士学位。从事…</p>
                                                            <a href="Show.asp?ArticleID=19611" title="张晗" class="teacher-links">老师详细介绍</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--about-container end--></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section learninfo">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">学习资讯</h2></div>
                        <div data-am-widget="tabs" class="am-tabs am-tabs-default">
                            <ul class="am-tabs-nav am-cf info-tab">
                                <li class="am-active">
                                    <a href="[data-tab-panel-0]">日语学习</a></li>
                                <li class="">
                                    <a href="[data-tab-panel-1]">韩语学习</a></li>
                            </ul>
                            <div class="am-tabs-bd info-tab-con">
                                <div data-tab-panel-0 class="am-tab-panel am-active">
                                    <div class="am-g">
										<?php 
											foreach($data_news_ri['data'] as $item){
												if($item['news_type'] == '日'){
													echo '<div class="am-u-sm-12 am-u-lg-6 course-list">
															<dl class="course-dl">
																<dt>
																	<a href="Show.php?type=news&news_id='.$item['news_id'].'" title="'.$item['news_name'].'" style="color:#333;">'.$item['news_name'].'</a></dt>
																<dd>
																	<p class="summary">'.match_chinese($item['news_desc']).'</p>
																	<p align="right">
																		<a href="Show.php?type=news&news_id='.$item['news_id'].'" title="'.$item['news_name'].'" class="yuedu-more">阅读全文</a></p>
																</dd>
															</dl>
														</div>';
												}
											}
										?>
                                    </div>
                                    <div class="more">
                                        <a href="#">查看更多</a>
									</div>
                                </div>
                                <div data-tab-panel-1 class="am-tab-panel ">
                                    <div class="am-g">
										<?php 
											foreach($data_news_han['data'] as $item){
												if($item['news_type'] == '韩'){
													echo '<div class="am-u-sm-12 am-u-lg-6 course-list">
															<dl class="course-dl">
																<dt>
																	<a href="Show.php?type=news&news_id='.$item['news_id'].'" title="'.$item['news_name'].'" style="color:#333;">'.$item['news_name'].'</a></dt>
																<dd>
																	<p class="summary">'.match_chinese($item['news_desc']).'</p>
																	<p align="right">
																		<a href="Show.php?type=news&news_id='.$item['news_id'].'" title="'.$item['news_name'].'" class="yuedu-more">阅读全文</a></p>
																</dd>
															</dl>
														</div>';
												}
											}
										?>
                                    </div>
									<div class="more">
                                        <a href="#">查看更多</a>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">艾意迪教育学习环境</h2>
                            <p class="section--description">2017艾意迪教育6大校区全新升级，优美舒适的教学环境只为成就更好的你</p></div>
                    </div>
                    <div class="product1-show-container">
                        <ul class="am-avg-md-5 am-avg-sm-2">
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx003-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx001-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx002-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx001-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx005-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx006-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx007-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx002-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx005-s.jpg" alt=""></a>
                            </li>
                            <li>
                                <div class="product-img-box"></div>
                                <a href="#">
                                    <img src="http://www.xdjy369.com/statics/rihanyu/images/topic/en-sishu/gx001-s.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" style="border-bottom: 1px solid #e9e9e9;">
                    <div class="container">
                        <div class="section--header">
                            <h2 class="section--title">我们的服务</h2>
                            <p class="section--description">贴心课程服务团队，倾力支持，全程陪学。从量身定制的课程规划、学习课程方法指导，我们为您排除你在学习旅程中的一切障碍。</p></div>
                        <!--index-container start-->
                        <div class="index-container">
                            <div class="am-g">
                                <div class="am-u-md-3">
                                    <div class="service_item">
                                        <i class="service_item--icon">
                                            <img src="images/fw-img01.jpg"></i>
                                        <h3 class="service_item--title">免费试听课</h3>
                                        <div class="service_item--text">
                                            <p>每周末举办多语种免费试听课，了解语言知识，参观学习环境</p>
                                        </div>
                                        <footer class="service_item--footer">
                                            <a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="link -blue_light">立即预约</a></footer>
                                    </div>
                                </div>
                                <div class="am-u-md-3">
                                    <div class="service_item">
                                        <i class="service_item--icon">
                                            <img src="images/fw-img02.jpg"></i>
                                        <h3 class="service_item--title">文化体验课</h3>
                                        <div class="service_item--text">
                                            <p>定期举办各国文化体验活动，感受异国文化，品尝异国美食</p>
                                        </div>
                                        <footer class="service_item--footer">
                                            <a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="link -blue_light">立即预约</a></footer>
                                    </div>
                                </div>
                                <div class="am-u-md-3">
                                    <div class="service_item">
                                        <i class="service_item--icon">
                                            <img src="images/fw-img03.jpg"></i>
                                        <h3 class="service_item--title">多语种网校</h3>
                                        <div class="service_item--text">
                                            <p>线上线下结合，通过海到学园免费预习、复习、联系、评测</p>
                                        </div>
                                        <footer class="service_item--footer">
                                            <a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="link -blue_light">免费学习</a></footer>
                                    </div>
                                </div>
                                <div class="am-u-md-3">
                                    <div class="service_item">
                                        <i class="service_item--icon">
                                            <img src="images/fw-img04.jpg"></i>
                                        <h3 class="service_item--title">留学规划</h3>
                                        <div class="service_item--text">
                                            <p>专业留学顾问为您免费量身定制留学规划、语言学习计划</p>
                                        </div>
                                        <footer class="service_item--footer">
                                            <a href="http://p.qiao.baidu.com/cps/chat?siteId=12190405&userId=25805819" target="_blank" class="link -blue_light">免费规划</a></footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--index-container end--></div>
                </div>
<?php include 'footer.html'; ?>

<?php 
	//过滤字符串中的特所符号和字母，只保留汉字和数字，这样就不会显示富文本中的html标签了
	function match_chinese($chars,$encoding='utf8')
	{
		$pattern =($encoding=='utf8')?'/[\x{4e00}-\x{9fa5}0-9]/u':'/[\x80-\xFF]/';
		preg_match_all($pattern,$chars,$result);
		$temp =join('',$result[0]);
		return $temp;
	}
?>