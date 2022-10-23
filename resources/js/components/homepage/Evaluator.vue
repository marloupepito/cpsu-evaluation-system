<template>
    <div class="col-xl-6 col-lg-6 offset-md-3" >
			<div class="card border-0 mb-3 bg-white text-dark" style="height:100vh !important;">
				<div class="card-body">
						<!-- BEGIN title -->
						<div class="mb-3 text-gray-500 ">
							<b>CPSU Faculty Evaluation System</b>
							<span class="ms-2"><i class="fa fa-info-circle" title="Marketing Campaign" v-b-popover.hover="'Campaign that run for getting more returning customers.'"></i></span>
						</div>
						<div class="row align-items-center pb-1px">


							<div class="col-6 col-md-6 mb-4 d-flex align-items-center" style="height:40vh !important">
								<div class=" card shadow m-1 p-2 h-100">
								<div class="h5 mb-2px text-truncate pt-3">STUDENT</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-green" style="width: 100%"></div>
										</div>
									</div>
									
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									This is a tutorial how to evaluate properly.
								</div>
								<button @click="gotoQr('student')" href="/how-to-evaluate" class="btn btn-sm btn-green fs-10px ps-2 pe-2 w-100 h-75 mb-3">
									<i class="fas fa-qrcode fa-10x"></i>
								</button>
								</div>
							</div>




							<div class="col-6 col-md-6 mb-4 d-flex align-items-center" style="height:40vh !important">
								<div class=" card shadow m-1 p-2 h-100">
								<div class="h5 mb-2px text-truncate pt-3">SELF</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-green" style="width: 100%"></div>
										</div>
									</div>
									
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									This is a tutorial how to evaluate properly.
								</div>
								<button @click="gotoQr('self')" href="/how-to-evaluate" class="btn btn-sm btn-green fs-10px ps-2 pe-2 w-100 h-75 mb-3">
									<i class="fas fa-qrcode fa-10x"></i>
								</button>
								</div>
							</div>



							<div class="col-6 col-md-6 mb-4 d-flex align-items-center" style="height:40vh !important">
								<div class=" card shadow m-1 p-2 h-100">
								<div class="h5 mb-2px text-truncate pt-3">PEER</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-green" style="width: 100%"></div>
										</div>
									</div>
									
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									This is a tutorial how to evaluate properly.
								</div>
								<button @click="gotoQr('peer')" href="/how-to-evaluate" class="btn btn-sm btn-green fs-10px ps-2 pe-2 w-100 h-75 mb-3">
									<i class="fas fa-qrcode fa-10x"></i>
								</button>
								</div>
							</div>


							<div class="col-6 col-md-6 mb-4 d-flex align-items-center" style="height:40vh !important">
								<div class=" card shadow m-1 p-2 h-100">
								<div class="h5 mb-2px text-truncate pt-3">SUPERVISOR</div>
								<div class="d-flex align-items-center mb-2px">
									<div class="flex-grow-1">
										<div class="progress h-5px rounded-pill bg-white bg-opacity-10">
											<div class="progress-bar progress-bar-striped bg-green" style="width: 100%"></div>
										</div>
									</div>
									
								</div>
								<div class="text-gray-500 small mb-15px text-truncate">
									This is a tutorial how to evaluate properly.
								</div>
								<button @click="gotoQr('supervisor')" href="/how-to-evaluate" class="btn btn-sm btn-green fs-10px ps-2 pe-2 w-100 h-75 mb-3">
									<i class="fas fa-qrcode fa-10x"></i>
								</button>
								</div>
							</div>




						</div>
				</div>
			</div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
	data() {
		return {
			campus:'',
			campusid:''
			}
	},
	mounted(){
		const campus = window.location.search.substring(1).replace(/_/g,' ')
		const campusid = window.location.hash.substring(1)
		this.campus = campus
		this.campusid = campusid
	},
	methods:{
		gotoQr(categories){
				window.location='/scan_qr?'+categories+','+this.campus.replace(/ /g,'_')+'#'+this.campusid
		}
	},
    watch: {
    		
        }
}
</script>