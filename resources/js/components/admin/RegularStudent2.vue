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
          label="Department"
          label-for="course-input"
          invalid-feedback="Student ID is required"
          :state="courseState"
        >
          <v-select
            id="course-input"
            v-model="course"
            :state="courseState"
            required
            :options="['College of Computer Study','College of Business Management','College of Teachers Education', 'College of Agriculture and Forestry','College of Criminal Justice Education']"
          ></v-select>

        </b-form-group>

        <b-form-group
          label="Year"
          label-for="year-input"
          invalid-feedback="Student ID is required"
          :state="yearState"
        >
          <v-select
            id="year-input"
            v-model="year"
            :state="yearState"
            required
            :options="['1st Year','2nd Year','3rd Year', '4th Year']"
          ></v-select>
        </b-form-group>

        <b-form-group
          label="Section"
          label-for="section-input"
          invalid-feedback="Student ID is required"
          :state="sectionState"
        >
          <v-select
            id="section-input"
            v-model="section"
            :state="sectionState"
            required
             :options="['Section A','Section B','Section C', 'Section D', 'Section E', 'Section F']"
          ></v-select>
        </b-form-group>

        <b-form-group
          label="Semester"
          label-for="sem-input"
          invalid-feedback="Student ID is required"
          :state="semState"
        >
          <v-select
            id="sem-input"
            v-model="sem"
            :state="semState"
            required
            :options="['1st Semester','2nd Semester']"
          ></v-select>
        </b-form-group>
      </form>
    </b-modal>
<br />


    <div class="row shadow p-2">
    <div class='col-md-4'>
          <v-select
            id="section-input"
            v-model="department2"
            placeholder="Select Department"
            :options="['College of Computer Study','College of Business Management','College of Teachers Education', 'College of Agriculture and Forestry','College of Criminal Justice Education']"
          ></v-select>
      </div>
      <div class='col-md-3'>
          <v-select
            id="section-input"
            v-model="year2"
            placeholder="Select Year"
            :options="['1st Year','2nd Year','3rd Year', '4th Year']"
          ></v-select>
      </div>
       <div class='col-md-3'>
          <v-select
            id="section-input"
            v-model="section2"
            placeholder="Select Section"
            :options="['Section A','Section B','Section C', 'Section D', 'Section E', 'Section F']"
          ></v-select>
      </div>

       <div class='col-md-2'>
          <button @click="searchYS" class="btn btn-md btn-green">Search</button>
      </div>
    </div>
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
              <div class="row">
                <!-- <div class="col-md-6">
                  <button @click="gotoStudentLoaded(props.row.id)" class="btn btn-green btn-xs d-block w-100">Loaded</button>
                </div> -->
                <div class="col-md-12">
                  <a @click="getQR([props.row.id,props.row.id_number,props.row.password])" class="btn btn-primary btn-xs d-block">QR Code</a>
                </div>
              </div>
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
import moment from 'moment';
export default {
  mounted(){

		const campus = localStorage.getItem("campus");
		const campusid = localStorage.getItem("campusid");
    axios.post('/get_evaluators',{
      status:'Regular',
         department:null,
        year:null,
        section:null,
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
    gotoStudentLoaded(id){
      this.$router.push({path:'/adminstrator/students/loaded?'+id})
      },
    searchYS(){
       axios.post('/get_evaluators',{
            status:'Regular',
            department:this.department2,
              year:this.year2,
              section:this.section2,
              campusid:this.campusid,
              campus:this.campus

          })
          .then(res=>{
            this.rows = res.data.status
            console.log(res.data.status)
          })
      },

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
      department2:'',
      section2:'',
      year2:'',
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
          label: 'Action',
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