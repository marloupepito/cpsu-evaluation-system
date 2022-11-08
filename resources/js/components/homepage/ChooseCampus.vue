<template>
	<div id="campuses" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container">
				<h2 class="content-title">All Campuses</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div v-for="(item, index) in campus" class="col-lg-4 col-md-6">
						<a  @click="gotohome(item.campus,item.id)">
						<div class="service">
							<div class="icon bg-green" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-school"></i></div>
							<div class="info">
								<h4 class="title">{{item.campus}}</h4>
								<h6>Campus Administrator</h6>
								<p class="desc">{{item.name}}</p>
							</div>
						</div>
						</a>
					</div>
					<!-- end col-4 -->
					
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
</template>
<script>
import axios from 'axios';
import AppOptions from '../assets/config/AppOptions.vue'

export default {
	
		created() {
		AppOptions.appEmpty = true;
	},
	beforeRouteLeave (to, from, next) {
		AppOptions.appEmpty = true;
		next();
	},
	data() {
		return { 
			hidden:'',
			path:window.location.pathname,
			campus:[]
			}
	},
	mounted(){
	 axios.post('/get_all_users2')
	 .then(res=>{
	 	setTimeout(() => {
          this.hidden='d-none'
        }, 2000);
        
	 	this.campus = res.data.status
	 })

	},
	methods:{
		
		gotocampuses(){
			this.$router.push({path:'/Campuses'})
			},
		gotohome(campus,id){
			window.location= '/home?'+campus.replace(/ /g,'_')+'#'+id;
		}
	},
}
</script>

<style>
    #loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: black;
  background-image: url("/images/loading.gif");
  background-repeat: no-repeat;
  background-position: center;
}
.cpsu{
display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-image: url("/images/logo.png");
  background-repeat: no-repeat;
  background-position: center;
}
</style>