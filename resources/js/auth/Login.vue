<template>
	<div>
		<!-- BEGIN login -->
		<div class="login login-v2 fw-bold">
			<!-- BEGIN login-cover -->
			<div class="login-cover">
				<div class="login-cover-img" v-bind:style="{ backgroundImage: 'url('+ bg.activeImg +')' }"></div>
				<div class="login-cover-bg"></div>
			</div>
			<!-- END login-cover -->
			
			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<a href="/" class="text-white btn text-left w-100" style="text-align: left !important;padding:0px !important;">
				<div class="login-header">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span> <b>CPSU</b>&nbsp;Evaluation
						</div>
						<small>DJVV Campus San Carlos City Negros Occidental</small>
					</div>
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
				</div>
				</a>
				<!-- END login-header -->
				<div class="text-danger p-2 text-center align-middle">
<b >{{incorrect}}</b>
				</div>
				<!-- BEGIN login-content -->
				<div class="login-content">
					<form @submit="validate">
						<div class="form-floating mb-20px">
							<input type="text" v-model="username" required class="form-control fs-13px h-45px border-0" placeholder="Username" id="emailAddress" />
							<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Username</label>
						</div>
						<div class="form-floating mb-20px">
							<input type="password" v-model="password"  required class="form-control fs-13px h-45px border-0" placeholder="Password" />
							<label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
						</div>
						<br />
						<div class="mb-20px">
							<button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Login</button>
						</div>
					
					</form>
				</div>
				<!-- END login-content -->
			</div>
			<!-- END login-container -->
		</div>
		<!-- END login -->
		
	
	</div>
</template>


<script>
import axios from 'axios'

export default {
	mounted(){
			
		},
	data() {
		return {
			incorrect:null,
		      valid: true,
		      username:'',
		      password: '',
			bg: {
				activeImg: '/assets/img/login-bg/login-bg-17.jpg',
				bg1: {
					active: true,
					img: '/assets/img/login-bg/login-bg-17.jpg'
				},
				
			}
		}
	},
	methods: {
		 validate (e) {
		 	e.preventDefault()
		 	this.incorrect =''
          axios.post('/user_login',{
                username:this.username,
                password:this.password
            })
            .then(res=>{   
            console.log(res.data.status)     
                if(res.data.status === 'success'){
                    window.location ='/adminstrator/dashboard'
                }else{
                  this.incorrect = res.data.status
                }
            })
            .catch(err=>{
                console.log(err)
            //    this.$refs.form.reset()
            })
      },
		
		
	}
}
</script>