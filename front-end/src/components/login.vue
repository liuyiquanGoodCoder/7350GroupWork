<style>
@import url("../AmazeUI-2.4.2/assets/css/amazeui.min.css");
@import url("../css/dlstyle.css");
</style>
<template>
	<div>
		<div class="login-boxtitle">
			<a href="#"><img alt="" src="../images/logobig.png" /></a>
		</div>
		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="../images/big.jpg" /></div>
				<div class="login-box">
					<div>
						<h3 class="title" v-if="title">登陆商城</h3>
						<span class="am-fr">{{error}}</span>
					</div>
					

					<div class="clear"></div>

					<div class="login-form">
						<form  method="post" onsubmit="return false;">
							<div class="user-name">
								<label for="user"><i class="am-icon-user"></i></label>
								<input type="text"  placeholder="邮箱/手机/用户名" v-model="userName">
							</div>
							<div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" placeholder="请输入密码" v-model="password">
							</div>
						</form>
					</div>

					<div class="login-links">
						<div class="am-btn-group">
							<li><label for="remember-me"><input  type="checkbox">记住密码</label></li>
							<li><a href="#" class="am-fr">忘记密码</a></li>
							<li><router-link to="/register" class="am-fr">免费注册</router-link></li>
						</div>
						<br />
					</div>
					<div class="am-cf">
						<button class="am-btn am-btn-primary am-btn-sm" v-on:click="login">登陆</button>  
					</div>
					<div class="partner">		
						<h3>合作账号</h3>
						<div class="am-btn-group">
							<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
							<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
							<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
						</div>
					</div>	

				</div>
			</div>
		</div>
		<Footer></Footer>
	</div>	
</template>
<script>
	import Footer from "../components/footer"
	export default{
		data(){
			return {
				title:true,
				error:"",
				userName:"",
				password:"",
				
			}
		},
		components: {
			Footer
		},
		methods: {
			login(){
				const $this = this;
				const url = "http://jwt.test/api/login";
				axios.post(url, {
				    email: $this.userName,
				    password: $this.password
				  })
				  .then(function (response) {
				    console.log(response);
				    if(response.data.success == false){
				    	$this.title = false;
				    	$this.error = "你输入的密码和账户名不匹配，是否忘记密码或忘记会员名";
				    }else if(response.data.success == true){
				    	//need improve
				    	$this.$router.go(-1);
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
				});
			}
		}
	}

</script>

