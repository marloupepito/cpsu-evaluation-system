<template>
	<div>
		<!-- BEGIN profile -->
		<div class="profile">
			<div class="profile-header">
				<!-- BEGIN profile-header-cover -->
				<div class="profile-header-cover"></div>
				<!-- END profile-header-cover -->
				<!-- BEGIN profile-header-content -->
				<div class="profile-header-content">
					<!-- BEGIN profile-header-img -->
					<div class="profile-header-img">
						<img src="/assets/img/user/user-13.jpg" alt="" />
					</div>
					<!-- END profile-header-img -->
					<!-- BEGIN profile-header-info -->
					<div class="profile-header-info">
						<h4 class="mt-0 mb-1">{{data.id_number}}</h4>
						<p class="mb-2">{{data.academic_rank}} </p>
						<p class="mb-2">{{data.campus}} </p>
						<!--<a href="#" class="btn btn-xs btn-green text-white">Edit Profile</a>-->
					</div>
					<!-- END profile-header-info -->
				</div>
				<!-- END profile-header-content -->
				<!-- BEGIN profile-header-tab -->
				<ul class="profile-header-tab nav nav-tabs bg-green">
					<li class="nav-item"><a class="nav-link  text-white" v-bind:class="{ 'active': tab.loaded }">&nbsp;</a></li>
				</ul>
				<!-- END profile-header-tab -->
			</div>
		</div>
		<!-- END profile -->
		<!-- BEGIN profile-content -->
		<div class="profile-content">
			<!-- BEGIN tab-content -->
			<div class="tab-content p-0">
			
				<!-- END #profile-videos tab -->
				<!-- BEGIN #profile-loadeds tab -->
				<div class="tab-pane fade" v-bind:class="{ 'show active': tab.loaded }">
				<div class="row">
						<div class="col-md-8">
							<h4 class="mb-3">Loaded List ({{loaded.length}})</h4>

							<div class="row gx-1">
								<div class="col-xl-4 col-lg-6 mb-1" v-for="(item, index) in loaded">
									<div class="p-2 d-flex align-items-center card flex-row border-0 rounded">
										<a href="javascript:;">
											<img src="/assets/img/user/user-1.jpg" alt="" class="rounded" width="64" />
										</a>
										<div class="flex-1 ps-3">
											<b class="text-dark">{{item.subject}}</b>
										</div>
										<div>
											<b-dropdown menu-class="dropdown-menu-end me-1" right class="dropdown" toggle-class="btn bg-none border-0 w-40px h-40px text-gray-500 rounded-pill d-flex align-items-center justify-content-center" no-caret>
												<template slot="button-content">
													<i class="fa fa-ellipsis-h fa-lg"></i>
												</template>
												<a href="javascript:;" class="dropdown-item">Action 1</a>
												<a href="javascript:;" class="dropdown-item">Action 2</a>
												<a href="javascript:;" class="dropdown-item">Action 3</a>
												<div class="dropdown-divider"></div>
												<a href="javascript:;" class="dropdown-item">Action 4</a>
											</b-dropdown>
										</div>
									</div>
								</div>	
							</div>
						</div>
						<div  class="col-md-4">
								<h4 class="mb-3">Subject Listed</h4>
								<div class="card shadow">
									<div class="row gx-1 p-2">
										<div class="col-xl-12 col-lg-12 mb-1" v-for="(item, index) in loadedList">
											<div class="d-flex align-items-center card flex-row border-0 rounded">
												<a href="javascript:;">
													<img src="/assets/img/user/user-1.jpg" alt="" class="rounded" width="64" />
												</a>
												<div class="flex-1 ps-3">
													<b class="text-dark">{{item.subject}}</b>
												</div>
												<div>
													<div class=" btn btn-green">
														<i class="fa fa-plus fa-lg"></i>
													</div>
												</div>
											</div>
										</div>	
									</div>
								</div>
						</div>
				</div>
					
				</div>
				<!-- END #profile-loadeds tab -->
			</div>
			<!-- END tab-content -->
		</div>









	<b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Submit Your Name"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">




      	 <b-form-group
          label="Course Year"
        >
          <v-select label="Course Year"
          v-model="courseyear"
          @input="selectCourseYear"
             placeholder="Select Course Year" :options="courselist"></v-select>
        </b-form-group>


  <b-form-group
          label="Semester"
          label-for="subject-input"
          invalid-feedback="Semester is required"
          :state="semState"
        >

          <v-select label="subject"
      	    v-model="sem"
            :state="semState"
            required
             placeholder="Select Semester" @input="selectCourseYear" :options="['1st Semester','2nd Semester']"></v-select>

        </b-form-group>




        <b-form-group
          label="Subject"
          label-for="subject-input"
          invalid-feedback="Subject is required"
          :state="subjectState"
        >
          <v-select label="subject"
          v-model="subject"
            :state="subjectState"
            required
             placeholder="Select Subject" :options="subjectList"></v-select>
        </b-form-group>



		<b-form-group
          label="Section"
          label-for="subject-input"
          invalid-feedback="Section is required"
          :state="sectionState"
        >
          <v-select
            id="section-input"
            v-model="section"
            :state="syState"
            required
            placeholder="Select Section"
            :options="['Section A','Section B','Section C', 'Section D', 'Section E', 'Section F']"
          ></v-select>
        </b-form-group>
      


        <!-- <b-form-group
          label="School Year"
          label-for="subject-input"
          invalid-feedback="School Year is required"
          :state="syState"
        >
          <b-form-input
            id="sy-input"
            v-model="sy"
            :state="syState"
            required
          ></b-form-input>
        </b-form-group> -->

          



      </form>
    </b-modal>


		

		<!-- END profile-content -->
	</div>
</template>

<script>
import AppOptions from '../assets/config/AppOptions.vue'
import axios from 'axios'
export default {
	mounted(){
		const id = window.location.search.substring(1)
		axios.post('/get_student_subject_loading',{
			id:id
			})
			.then(res=>{
				 this.data = res.data.status
				 console.log(res.data.status2)
				 this.loadedList = res.data.status2
			})
		},
	data() {
		return {
			loadedList:[],
			department:'',
			subjectList:[],
			courseyear:[],
			courselist:[
				
				'BEED 1',
				'BEED 2',
				'BEED 3',
				'BEED 4',
				'BSED 1',
				'BSED 2',
				'BSED 3',
				'BSED 4',

			],
			loaded:[],
			data:[],
			tab: {
				loaded: true
			},
			name: '',
     	   nameState: null,
     	   id:'',
     	   sem:'',
     	   semState:null,
     	   sy:'',
     	   syState:null,
     	   subject:'',
     	   subjectState:null,
     	   section:'',
     	   sectionState:null,
     	   year:'',
     	   yearState:null,
     	   program:'',
     	   programState:null,
		}
	},
	methods: {
		openAddSubject(){
				 this.$nextTick(() => {
		          this.$bvModal.show('modal-prevent-closing')
		        })
		},
		selectCourseYear(){
			this.subject = null
			axios.post('/select_course_year',{
				search:this.courseyear,
				semester:this.sem
			})
			.then(res=>{
				this.subjectList =res.data.status.map(res=>res.subject)
			})
		},
		checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
      
        if(valid === true){
        	axios.post('/add_subject_loaded',{
        		id:this.id,
        		subject:this.subject,
		        sem:this.sem,
		        sy:this.sy,
		        section:this.section,
        	})
        	.then(res=>{
        		 this.$nextTick(() => {
			          this.$bvModal.hide('modal-prevent-closing')
			        })
        		this.loaded = res.data.loading
        		this.$swal({
				  icon: 'success',
				  title: 'Your work has been saved',
				  showConfirmButton: false,
				  timer: 1500
				})
        	})
        	.catch(err=>{
        		this.$swal({
				  icon: 'error',
				  title: 'Your work has not been save',
				  showConfirmButton: false,
				  timer: 1500
				})
        	})
        }else{
        	  	this.subjectState = valid
		        this.semState = valid
		        this.syState = valid
		        this.sectionState = valid
        }
        return valid


      },
      resetModal() {
        this.subject = ''
        this.subjectState = null
        this.sem = ''
        this.semState = null
        this.sy = ''
        this.syState = null
        this.section = ''
        this.sectionState = null
      },
      handleOk(bvModalEvent) {
        bvModalEvent.preventDefault()
        this.handleSubmit()
      },
      handleSubmit() {
        if (!this.checkFormValidity()) {
          return
        }
       
      }
	},
	created() {
		AppOptions.appContentClass = 'p-0';
	},
	beforeRouteLeave (to, from, next) {
		AppOptions.appContentClass = '';
		next();
	}
}
</script>