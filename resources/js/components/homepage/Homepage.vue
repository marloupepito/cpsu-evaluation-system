<template>
	<div id="home" class="content has-bg home" style="height:100vh">
			<!-- begin content-bg -->
			<div class="content-bg" style="background-image: url(images/background.jpeg);" 
				data-paroller="true" 
				data-paroller-type="foreground" 
				data-paroller-factor="-0.25">
			</div>
			<!-- end content-bg -->
			<!-- begin container -->
			<div class="container home-content">
				<h1>CPSU EVALUATION SYSTEM</h1>
				<h3>Multipurpose One Page Theme</h3>
			
				<a href="#" class="btn btn-theme btn-primary w-100 m-0 mb-3 text-white">About</a> 
				<a href="#" class="btn btn-theme btn-primary w-100 m-0 mb-3 text-white" @click="gotocampuses">Campuses</a> 
				<a href="#" class="btn btn-theme btn-primary w-100 m-0 mb-3 text-white"  @click="gotohow">How To Evaluate</a>
				<br />
				or <a href="#">subscribe</a> newsletter
			</div>
		</div>
</template>


<script>
import AppOptions from '../assets/config/AppOptions.vue'
export default {
		created() {
		AppOptions.appEmpty = true;
	},
	beforeRouteLeave (to, from, next) {
		AppOptions.appEmpty = true;
		next();
	},
	methods:{
		gotocampuses(){
			this.$router.push({path:'/campuses'})
		},
		gotohow(){
			this.$router.push({path:'/how-to-evaluate'})
		}
	}
	

}
</script>

