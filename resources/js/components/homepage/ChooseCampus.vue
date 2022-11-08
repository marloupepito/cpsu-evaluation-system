<template>
    <div >
    	<div >
		<div id="page-container" class="fade">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-transparent navbar-fixed-top navbar-expand-lg">
			<!-- begin container -->
			<div class="container">
				<!-- begin navbar-brand -->
				<a href="index.html" class="navbar-brand">
					<span class="brand-logo"></span>
					<span class="brand-text">
						<span class="text-theme">Color</span> Admin
					</span>
				</a>
				<!-- end navbar-brand -->
				<!-- begin navbar-toggle -->
				<button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#header-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- end navbar-header -->
				<!-- begin navbar-collapse -->
				<div class="collapse navbar-collapse" id="header-navbar">
					<ul class="nav navbar-nav navbar-end">
						
						<li class="nav-item"><a class="nav-link" href="#home" data-click="scroll-to-target">HOME</a></li>
						<li class="nav-item"><a class="nav-link" href="#about" data-click="scroll-to-target">ABOUT</a></li>
						<li class="nav-item"><a class="nav-link" href="#campuses" data-click="scroll-to-target">CAMPUSES</a></li>
						<li class="nav-item"><a class="nav-link" href="#how" data-click="scroll-to-target">HOW TO EVALUATE</a></li>
					</ul>
				</div>
				<!-- end navbar-collapse -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #header -->
		
		<!-- begin #home -->
		<div id="home" class="content has-bg home">
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
				<p>
					We have created a multi-purpose theme that take the form of One-Page or Multi-Page Version.<br />
					Use our <a href="#">theme panel</a> to select your favorite theme color.
				</p>
				<a href="#" class="btn btn-theme btn-primary">Explore More</a> <a href="#" class="btn btn-theme btn-yellow text-white">Purchase Now</a><br />
				<br />
				or <a href="#">subscribe</a> newsletter
			</div>
			<!-- end container -->
		</div>
		<!-- end #home -->
		
		<!-- begin #about -->
		<div id="about" class="content" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
				<h2 class="content-title">About Us</h2>
				<p class="content-desc">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur eros dolor,<br />
					sed bibendum turpis luctus eget
				</p>
				<!-- begin row -->
				<div class="row">
					<!-- begin col-4 -->
					<div class="col-lg-4">
						<!-- begin about -->
						<div class="about">
							<h3 class="mb-3">Our Story</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
								Vestibulum posuere augue eget ante porttitor fringilla. 
								Aliquam laoreet, sem eu dapibus congue, velit justo ullamcorper urna, 
								non rutrum dolor risus non sapien. Vivamus vel tincidunt quam. 
								Donec ultrices nisl ipsum, sed elementum ex dictum nec. 
							</p>
							<p>
								In non libero at orci rutrum viverra at ac felis. 
								Curabitur a efficitur libero, eu finibus quam. 
								Pellentesque pretium ante vitae est molestie, ut faucibus tortor commodo. 
								Donec gravida, eros ac pretium cursus, est erat dapibus quam, 
								sit amet dapibus nisl magna sit amet orci. 
							</p>
						</div>
						<!-- end about -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-lg-4">
						<h3 class="mb-3">Our Philosophy</h3>
						<!-- begin about-author -->
						<div class="about-author">
							<div class="quote">
								<i class="fa fa-quote-left"></i>
								<h3>We work harder,<br /><span>to let our user keep simple</span></h3>
								<i class="fa fa-quote-right"></i>
							</div>
							<div class="author">
								<div class="image">
									<img src="assets/img/user/user-1.jpg" alt="Sean Ngu" />
								</div>
								<div class="info">
									Sean Ngu
									<small>Front End Developer</small>
								</div>
							</div>
						</div>
						<!-- end about-author -->
					</div>
					<!-- end col-4 -->
					<!-- begin col-4 -->
					<div class="col-lg-4">
						<h3 class="mb-3">Our Experience</h3>
						<!-- begin skills -->
						<div class="skills">
							<div class="skills-name">Front End</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 95%">
									<span class="progress-number">95%</span>
								</div>
							</div>
							<div class="skills-name">Programming</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 90%">
									<span class="progress-number">90%</span>
								</div>
							</div>
							<div class="skills-name">Database Design</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 85%">
									<span class="progress-number">85%</span>
								</div>
							</div>
							<div class="skills-name">Wordpress</div>
							<div class="progress mb-3">
								<div class="progress-bar progress-bar-striped progress-bar-animated bg-theme" style="width: 80%">
									<span class="progress-number">80%</span>
								</div>
							</div>
						</div>
						<!-- end skills -->
					</div>
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #about -->
		
		<!-- begin #milestone -->
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
						<div class="service">
							<div class="icon bg-green" data-animation="true" data-animation-type="animate__bounceIn"><i class="fa fa-cog"></i></div>
							<div class="info">
								<h4 class="title">{{item.campus}}</h4>
								<h6>Campus Administrator</h6>
								<p class="desc">{{item.name}}</p>
							</div>
						</div>
					</div>
					<!-- end col-4 -->
					
					<!-- end col-4 -->
				</div>
				<!-- end row -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #milestone -->
<div id="how" class="content bg-light" data-scrollview="true">
			<!-- begin container -->
			<div class="container" data-animation="true" data-animation-type="animate__fadeInDown">
				<h2 class="content-title">How To Evaluate</h2>
				<!-- begin accordion -->
				<div class="accordion" id="faq">
					<!-- begin panel -->
					<div class="accordion-item border-0">
						<div class="accordion-header">
							<button class="accordion-button bg-dark text-light px-3 py-10px fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1">
								<i class="fa fa-question-circle fa-fw text-theme me-5px"></i> 
								Question 1
							</button>
						</div>
						<div id="faq-1" class="collapse show" data-bs-parent="#faq">
							<div class="accordion-body bg-light">
								<p class="mb-0">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
									3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
									Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic 
									synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</p>
							</div>
						</div>
					</div>
					<!-- end card -->
					<!-- begin card -->
					<div class="accordion-item border-0">
						<div class="accordion-header">
							<button class="accordion-button bg-dark text-light px-3 py-10px fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2">
								<i class="fa fa-question-circle fa-fw text-theme me-5px"></i> 
								Question 2
							</button>
						</div>
						<div id="faq-2" class="collapse" data-bs-parent="#faq">
							<div class="card-body bg-light">
								<p class="mb-0">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
									3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
									Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic 
									synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</p>
							</div>
						</div>
					</div>
					<!-- end card -->
					<!-- begin card -->
					<div class="accordion-item border-0">
						<div class="accordion-header">
							<button class="accordion-button bg-dark text-light px-3 py-10px fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3">
								<i class="fa fa-question-circle fa-fw text-theme me-5px"></i> 
								Question 3
							</button>
						</div>
						<div id="faq-3" class="collapse" data-bs-parent="#faq">
							<div class="card-body bg-light rounded-bottom">
								<p class="mb-0">
									Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
									3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
									Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
									Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. 
									Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic 
									synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
								</p>
							</div>
						</div>
					</div>
					<!-- end card -->
				</div>
				<!-- end accordion -->
			</div>
			<!-- end container -->
		</div>
		<!-- end #footer -->
		<!-- begin theme-panel -->
	
	<!-- end theme-panel -->
	</div>
    </div>


    <div id="footer" class="footer">
			<div class="container">
				<div class="footer-brand">
					<div class="footer-brand-logo"></div>
					Color Admin
				</div>
				<p>
					&copy; Copyright Color Admin 2021 <br />
					An admin & front end theme with serious impact. Created by <a href="#">SeanTheme</a>
				</p>
				<p class="social-list">
					<a href="#"><i class="fab fa-facebook-f fa-fw"></i></a>
					<a href="#"><i class="fab fa-instagram fa-fw"></i></a>
					<a href="#"><i class="fab fa-twitter fa-fw"></i></a>
					<a href="#"><i class="fab fa-google-plus-g fa-fw"></i></a>
					<a href="#"><i class="fab fa-dribbble fa-fw"></i></a>
				</p>
			</div>
		</div>
		</div>
</template>
<script>
import axios from 'axios';
export default {
	components:{
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