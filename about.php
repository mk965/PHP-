<?php
	header('content-type:text/html;charset=utf-8');
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
							
							<div class="section--header">
								<h2 class="section--title" style="margin-bottom:20px">关于艾意迪</h2>
								<div class="section--description">
									<div>
										<div class="am-g">
											<div class="am-u-lg-5">
												<!--百度地图容器-->
												<div style="width:345px;height:550px;border:#ccc solid 1px;" id="dituContent"></div>
											</div>
											<div class="am-u-lg-7">
												<p>青岛艾意迪教育是青岛地区专业多语种培训、留学、科研机构，自成立以来取得了辉煌的发展业绩，累计为社会培养日韩语人才上千人，得到了培训业界充分的肯定以及众多好评。</p>
												<p>学校现开设日语、韩语、对外汉语培训。</p>
												<p>
													<br>
													<b>微信：</b>13780650801（严老师）
													<br>
													<b>电话：</b>0532-89081203
													<br>
													<b>地址：</b>青岛市城阳区兴阳路假日酒店办公楼311
												</p>
												<br>
												<span>关注艾意迪教育微信公众号领取韩语、日语学习资料：<b style="color:red">aiyidiedu</b></span><br>
												<span>立即预约可获得价值<b style="color:red">380元学习礼包</b>一份：</span>
												<iframe style="margin-top:10px" src="yuyue.php" frameborder="0" marginheight="0" marginwidth="0" height="167" scrolling="no" width="100%"></iframe>
											</div>
										</div>
									</div>
								</div>
						    </div>
							 
							
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
							<div style="width: 100%; height: 300px;">
								<iframe style="margin-top:30px" src="yuyue.php" frameborder="0" marginheight="0" marginwidth="0" height="270" scrolling="no" width="100%"></iframe>

							</div>
						</div>
					</div>
                </div>
            </div>
<script>
	var homeTag    = document.getElementsByClassName("am-nav")[0].getElementsByTagName("li")[0].getElementsByTagName("a")[0];
	var jieshaoTag = document.getElementsByClassName("am-nav")[0].getElementsByTagName("li")[13].getElementsByTagName("a")[0];
	homeTag.setAttribute('class','');
	jieshaoTag.setAttribute('class','current');
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMarker();//向地图中添加marker
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(120.423365,36.302445);//定义一个中心点坐标
        map.centerAndZoom(point,14);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_ZOOM});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    //标注点数组
    var markerArr = [{title:"艾意迪教育（城阳总校）",content:"地址：城阳区兴阳路308号假日酒店办公楼311<br/>电话：0532-89081203",point:"120.406657|36.294489",isOpen:1,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
		 ];
    //创建marker
    function addMarker(){
        for(var i=0;i<markerArr.length;i++){
            var json = markerArr[i];
            var p0 = json.point.split("|")[0];
            var p1 = json.point.split("|")[1];
            var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
            var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                        borderColor:"#808080",
                        color:"#333",
                        cursor:"pointer"
            });
			
			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
				    this.openInfoWindow(_iw);
			    });
			    _iw.addEventListener("open",function(){
				    _marker.getLabel().hide();
			    })
			    _iw.addEventListener("close",function(){
				    _marker.getLabel().show();
			    })
				label.addEventListener("click",function(){
				    _marker.openInfoWindow(_iw);
			    })
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
        }
    }
    //创建InfoWindow
    function createInfoWindow(i){
        var json = markerArr[i];
        var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
        return iw;
    }
    //创建一个Icon
    function createIcon(json){
        var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
        return icon;
    }
    
    initMap();//创建和初始化地图
</script>
<?php include 'footer.html'; ?>