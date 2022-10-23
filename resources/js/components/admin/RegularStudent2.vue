<template>
	<!-- BEGIN mailbox -->
	<div class="container">
		<!-- BEGIN mailbox-sidebar --><br />
		<div class=" card shadow">
			<div class="row p-1">
				<div class="col-md-8">
					<h6 class="display-6">CPSU Regular Students</h6>
				</div>
				<div class="col-md-4">
					<div class="btn-group me-2">
						<a href="javascript:;" class="btn btn-white btn-lg mt-2"><i class="fa fa-fw fa-file"></i>CSV FILE</a>
						</div>
						<div class="btn-group me-2">
							<a href="javascript:;" class="btn btn-white btn-lg mt-2"  v-b-modal.modal-prevent-closing><i class="fa fa-fw fa-archive"></i>ID NUMBER</a>
						</div>
				</div>
			</div>
		</div>	
<b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Create Student"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          label="Student ID"
          label-for="studentid-input"
          invalid-feedback="Student ID is required"
          :state="studentidState"
        >
          <b-form-input
            id="studentid-input"
            v-model="studentid"
            :state="studentidState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Fullname"
          label-for="name-input"
          invalid-feedback="Student ID is required"
          :state="nameState"
        >
          <b-form-input
            id="name-input"
            v-model="name"
            :state="nameState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Course"
          label-for="course-input"
          invalid-feedback="Student ID is required"
          :state="courseState"
        >
          <b-form-input
            id="course-input"
            v-model="course"
            :state="courseState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="School Year"
          label-for="year-input"
          invalid-feedback="Student ID is required"
          :state="yearState"
        >
          <b-form-input
            id="year-input"
            v-model="year"
            :state="yearState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Section"
          label-for="section-input"
          invalid-feedback="Student ID is required"
          :state="sectionState"
        >
          <b-form-input
            id="section-input"
            v-model="section"
            :state="sectionState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Semester"
          label-for="sem-input"
          invalid-feedback="Student ID is required"
          :state="semState"
        >
          <b-form-input
            id="sem-input"
            v-model="sem"
            :state="semState"
            required
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>

    	<br />
				
		<!-- END mailbox-content -->
		<div class=" card shadow">
        <vue-good-table
          :search-options="{
                enabled: true
            }"
        class="mt-5"
        :columns="columns"
        :rows="rows"
        :pagination-options="{
    enabled: true,
    mode: 'records'
  }"
        >
      <!--    <span v-if="props.column.field == 'qr'">
            <span style="font-weight: bold; color: blue;">{{props.row.age}}</span> 
            </span>
            <span v-else>
            {{props.formattedRow[props.column.field]}}
            </span> -->
        <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'qr'">
              <a @click="getQR([props.row.id_number,props.row.password])" class="btn btn-primary btn-xs d-block">QR Code</a>
            </span>
        </template>
        </vue-good-table>
	</div><br />
	</div>
	<!-- END mailbox -->
</template>

<script>
import AppOptions from '../assets/config/AppOptions.vue'
import axios from 'axios'
export default {
  mounted(){

		const campus = localStorage.getItem("campus");
		const campusid = localStorage.getItem("campusid");
    axios.post('/get_evaluators',{
      status:'Regular',
      campusid:campusid,
      	campus:campus

    })
    .then(res=>{
      this.campus =campus
      this.campusid =campusid
      this.rows = res.data.status
    })
  },
  methods:{
    getQR (e){
      this.$swal({
      imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + e,
      imageAlt: 'QR CODE'
    })
    },
    checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        

        if(valid){
          axios.post('/add_student',{
            campus:this.campus,
            campusid:this.campusid,
            name:this.name,
            studentid:this.studentid,
            course:this.course,
            year:this.year,
            section:this.section,
            sem:this.sem,
            status:'Regular'
            })
          .then(res=>{
            this.rows = res.data.status
            this.$nextTick(() => {
                  this.$bvModal.hide('modal-prevent-closing')
              })
            })
          .catch(err=>{

            })
            
        }else{
          this.nameState = valid
          this.studentidState = valid
          this.courseState = valid
          this.yearState = valid
          this.sectionState = valid
          this.semState = valid
        }
        return valid
      },
      resetModal() {
        this.name = ''
        this.nameState = null
        this.studentid = ''
        this.studentidState = null
        this.course = ''
        this.courseState = null
        this.year = ''
        this.yearState = null
        this.section = ''
        this.sectionState = null
        this.sem = ''
        this.semState = null
      },
      handleOk(bvModalEvent) {
        // Prevent modal from closing
        bvModalEvent.preventDefault()
        // Trigger submit handler
        this.handleSubmit()
      },
      handleSubmit() {
        // Exit when the form isn't valid
        if (!this.checkFormValidity()) {
          return
        }
        
      }

  },
	data() {
		AppOptions.appContentFullHeight = true;
		AppOptions.appContentClass = 'p-0';

		return { 
      name: '',
      nameState: null,
      studentid: '',
      studentidState: null,
      course: '',
      courseState: null,
      year: '',
      yearState: null,
      section: '',
      sectionState: null,
      sem: '',
      semState: null,
			campus:'',
			campusid:'',
            columns: [
        {
          label: 'Student ID',
          field: 'id_number',
        },
        {
          label: 'Course',
          field: 'course',
        },
        {
          label: 'Year',
          field: 'school_year',
        },
        {
          label: 'Section',
          field: 'section',
        },
        {
          label: 'Status',
          field: 'class_status',
        },
        {
          label: 'QR code',
          field: 'qr',
        },
      ],
      rows: [],
        }
	},
	beforeRouteLeave (to, from, next) {
		AppOptions.appContentFullHeight = false;
		AppOptions.appContentClass = '';
		next();
	}
}
</script>
<style>
div.mailbox-content-header{
    position:fixed !important;
    z-index:1;
    width:95% !important;
}
</style>