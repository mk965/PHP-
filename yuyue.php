<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="css/amazeui.css">
		<link rel="stylesheet" href="css/womenmobi.css">
		<title>日语培训-韩语培训-青岛艾意迪教育-手机版</title>
		<script src="js/jquery.js" type="text/javascript"></script>

		<script type="text/javascript" src="js/jquery-form.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#form2').ajaxForm({
					beforeSubmit: checkForm2,
					success: complete2,
					dataType: 'json'
				});

				function checkForm2() {
					if('' == $.trim($('#name').val())) {
						alert('姓名不能为空');
						return false;
					}
					if('' == $.trim($('#tel').val())) {
						alert('手机不能为空');
						return false;
					}
					if($('#tel').val().length != 11) {
						alert('请输入正确的手机号码！');
						return false;
					}
					if(!$("#tel").val().match(/^(((13[0-9]{1})|145|147|150|151|152|153|155|156|157|158|159|178|180|181|182|183|184|185|186|187|188|189)+\d{8})$/)) {
						alert("请输入正确的号码")
						$("#tel").focus();
						return false;
					}

					//可以在此添加其它判断
				}

				function complete2(data) {
					if(data.status == 1) {
						alert(data.info);
						window.location.href = window.location.href;
					} else {
						alert(data.info);
					}
				}

			});
		</script>
		<style type="text/css">
			body {
				background: #fff;
			}
			.yuyue {
				border: none;
				margin: 0 auto;
			}
		</style>
	</head>

	<body>

		<div class="yuyue">
			<div class="am-container">

				<form method="post" class="am-form" id="form2" name="form2" action="http://localhost/blog/home/api/appt">
					<fieldset>
						<div class="am-form-group">
							<input type="text" class="" id="name" name="appt_name" placeholder="请输入您的姓名">
						</div>
						<div class="am-form-group">
							<input type="text" class="" id="tel" name="appt_phone" placeholder="请输入您的手机号码">
						</div>
						<!--
						<input type="hidden" name="typeid" value="wang">
						<input type="hidden" name="beizhu" value="cardmobi">-->
						<p>
							<button type="submit" class="am-btn yuyue-btn">立即预约，免费体验</button>
						</p>
					</fieldset>
				</form>
			</div>
		</div>

	</body>

</html>