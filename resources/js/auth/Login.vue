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
				<div class="login-header">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span> <b>CPSU</b>&nbsp;Evaluation
						</div>
						<small>Central Philippine State University</small>
					</div>
					<div class="icon">
						<i class="fa fa-lock"></i>
					</div>
				</div>
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


						<div class="mb-20px">
							<a @click="gotohome" class="btn btn-primary d-block w-100 h-45px btn-lg">Homepage</a>
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
import AppOptions from '../components/assets/config/AppOptions.vue'
export default {
	mounted(){
			
		},
		created() {
		AppOptions.appEmpty = true;
	},
	beforeRouteLeave (to, from, next) {
		AppOptions.appEmpty = true;
		next();
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
		gotohome(){
			this.$router.push({path:'/'})
			},
		 validate (e) {
		 	e.preventDefault()
		 	this.incorrect =''
          axios.post('/user_login',{
                username:this.username,
                password:this.password
            })
            .then(res=>{       
                if(res.data.status && res.data.status.academic_rank === 'Main Administrator Campus'){
                	localStorage.setItem("academic_rank", res.data.status.academic_rank);
               		window.location ='/adminstrator/main/dashboard'
                }else if(res.data.status && res.data.status.academic_rank !== 'Main Administrator Campus'){
                	localStorage.setItem("academic_rank", res.data.status.academic_rank);
                	localStorage.setItem("campus", res.data.status.campus);
                	localStorage.setItem("campusid", res.data.status.id);
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

