<template>
    <div class="col-xl-6 col-lg-6 offset-md-3" >
<!-- BEGIN card -->
<div :class="hidden" v-if="path === '/'">
<div id="loading"/>
	
<div class="cpsu"/>

</div>
				<div class="card border-0 mb-3 bg-white text-dark" style="height:100vh !important;">
					<!-- BEGIN card-body -->
					<div class="card-body">
						<!-- BEGIN title -->
						<div class="mb-3 text-gray-500 ">
							<b>CPSU Faculty Evaluation System</b>
							<span class="ms-2"><i class="fa fa-info-circle" title="Marketing Campaign" v-b-popover.hover="'Campaign that run for getting more returning customers.'"></i></span>
						</div>
						<!-- END title -->
						<!-- BEGIN row -->
						<div class="row align-items-center pb-1px" style="height:24vh !important">
							<!-- BEGIN col-4 -->
							<div class="col-4">
								<div class="h-100px d-flex align-items-center justify-content-center">
									<img src="/images/b.jpg" class="mw-100 mh-100" />
								</div>
							</div>
							<!-- END col-4 -->
							<!-- BEGIN col-8 -->
							<div class="col-8">
								<div class="h5 mb-2px text-truncate">How to Evaluate</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-blue" style="width: 100%"></div>
										</div>
									</div>
									
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									This is a tutorial how to evaluate properly.
								</div>
								<a href="/how-to-evaluate" class="btn btn-xs btn-blue fs-10px ps-2 pe-2">
									Click Me!
								</a>
							</div>
							<!-- END col-8 -->
						</div>
						<!-- END row -->
						<hr class="bg-white bg-opacity-20 mt-20px mb-20px" />
						<!-- BEGIN row -->
						<div class="row align-items-center"  style="height:24vh !important">
							<!-- BEGIN col-4 -->
							<div class="col-4">
								<div class="h-100px d-flex align-items-center justify-content-center">
									<img src="/images/a.jpg" class="mw-100 mh-100" />
								</div>
							</div>
							<!-- END col-4 -->
							<!-- BEGIN col-8 -->
							<div class="col-8">
								<div class="mb-2px text-truncate h5">Start Evaluation</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-danger" style="width: 100%"></div>
										</div>
									</div>
								
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									{{timerStatus}}<br />
									<b class="text-danger">
									{{timerCount}}
									</b>
									<b :class="hide">
									{{timerCount2}}
									</b>
								</div>
								<button @click="startEvaluation" :disabled="buttonDisable" class="btn btn-xs btn-danger fs-10px ps-2 pe-2">Click Me!</button>
							</div>
							<!-- END col-8 -->
						</div>

						<hr class="bg-white bg-opacity-20 mt-20px mb-20px" />
						<!-- BEGIN row -->
						<div class="row align-items-center"  style="height:24vh !important">
							<!-- BEGIN col-4 -->
							<div class="col-4">
								<div class="h-100px d-flex align-items-center justify-content-center">
									<img src="/images/c.jpg" class="mw-100 mh-100" />
								</div>
							</div>
							<!-- END col-4 -->
							<!-- BEGIN col-8 -->
							<div class="col-8">
								<div class="mb-2px text-truncate h5">Account</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-blue" style="width: 100%"></div>
										</div>
									</div>
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
										For administrative only!
								</div>
								<a href="/login" class="btn btn-xs btn-blue fs-10px ps-2 pe-2">Click Me!</a>
							</div>
							<!-- END col-8 -->
						</div>
						
						<!-- END row -->
					</div>
					<!-- END card-body -->
				</div>
    </div>
</template>
<script>
import axios from 'axios';
	const countDownDate = new Date("2022-08-22 6:17:00 pm").getTime();
	const countDownDate2 = new Date("2022-08-24 6:18:00 pm").getTime();
 	const path = window.location.pathname

export default {
	data() {
		return { 
			path:path,
			timerCount: '',
			timerCount2: '',
			timerStatus:'',
			buttonDisable:null,
			hide:'text-black d-none',
			start:'',
			end:'',
			hidden:'',
			timeHide:3
			}
	},
	mounted(){
		axios.post('get_schedule')
		.then(res=>{
				localStorage.setItem("start", new Date(res.data.status[0].start+" 6:00:00 am").getTime())
			localStorage.setItem("end", new Date(res.data.status[0].end+" 6:00:00 am").getTime())
			})

	},
	methods:{
		startEvaluation(){
			window.location='/start-evaluation';
		}
	},
    watch: {
    		timeHide:{
    			handler(value){
    				 if (value > 0) {
                        setTimeout(() => {
                            this.timeHide--;
                        }, 1000);
                    }else{
                    	this.hidden ='d-none'
                    }
    			},
    			immediate: true
    		},
            timerCount: {
                handler(value) {

				function aaaa(n){
			  	  return 1/(n*0)===1/0
				} 

					  const now = new Date().getTime();
					  const distance = localStorage.getItem("start") - now;
					  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
					  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					  const seconds = Math.floor((distance % (1000 * 60)) / 1000);


			                   
				      const aaa = setTimeout(() => {
				            this.timerCount=days+"Days "+hours+"h "+minutes+"m "+seconds+"s";
				      },1000);

					

                  
	   				if (aaaa(seconds) === false) {
	   					this.hide ="text-black"
	   					this.timerStatus = 'The evaluation will end in'
	   					 this.timerCount='';
	   					 this.buttonDisable=false
			    		clearInterval(aaa)
		               }else{
		               	this.hide ="text-black d-none"
		               	this.buttonDisable=true
		               	this.timerStatus ='The evaluation will start in'
		               }

                },

                immediate: true // This ensures the watcher is triggered upon creation
            },
            timerCount2: {
                handler(value) {

				function aaaa(n){
			  	  return 1/(n*0)===1/0
				} 

			  const now = new Date().getTime();
			  const distance2 = localStorage.getItem("end") - now;
			  const distance1 = localStorage.getItem("start") - now;

			  const days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
			  const hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			  const minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
			  const seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
	                   
		    
  					const bbb = setTimeout(() => {
			            	this.timerCount2=days2+"Days "+hours2+"h "+minutes2+"m "+seconds2+"s"

			      },1000);
		      
				  if (aaaa(seconds2) === false) {
				 		 	this.buttonDisable=true
			    			clearInterval(bbb)
			    			console.log('end')
			    			this.timerStatus ='The Evaluation is not available!'
	               }
		      
     			
	   				

                },

                immediate: true // This ensures the watcher is triggered upon creation
            }

        }
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