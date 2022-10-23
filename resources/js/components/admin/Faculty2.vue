<template>
  <!-- BEGIN mailbox -->
  <div class="container">
    <!-- BEGIN mailbox-sidebar --><br />
    <div class=" card shadow">
      <div class="row p-1">
        <div class="col-md-8">
          <h6 class="display-6">CPSU Staff</h6>
        </div>
        <div class="col-md-4">
          <div class="btn-group me-2">
            <a href="javascript:;" class="btn btn-white btn-lg mt-2"><i class="fa fa-fw fa-file"></i>CSV FILE</a>
            </div>
            <div class="btn-group me-2">
              <a href="javascript:;" v-b-modal.modal-prevent-closing class="btn btn-white btn-lg mt-2"><i class="fa fa-fw fa-archive"></i>ID NUMBER</a>
            </div>
        </div>
      </div>
    </div>   

<b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Create CPSU Staff"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          label="ID Number"
          label-for="idNumber-input"
          invalid-feedback="ID Number is required"
          :state="idNumberState"
        >
          <b-form-input
            id="idNumber-input"
            v-model="idNumber"
            :state="idNumberState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Fullname"
          label-for="name-input"
          invalid-feedback="name is required"
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
          label="Campus Department"
          label-for="department-input"
          invalid-feedback="department is required"
          :state="departmentState"
        >
          <b-form-input
            id="department-input"
            v-model="department"
            :state="departmentState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Academic Rank"
          label-for="rank-input"
          invalid-feedback="rank is required"
          :state="rankState"
        >
          <b-form-input
            id="rank-input"
            v-model="rank"
            :state="rankState"
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
    axios.post('/get_faculty',{
      status:'Staff',
      campusid:campusid,
      campus:campus
    })
    .then(res=>{
      this.campus = campus
       this.campusid = campusid
      this.rows = res.data.status
    })
  },
  methods:{
    actionFaculty (e){
      console.log(e)
      this.$swal({
      imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + e,
      imageAlt: 'QR CODE'
    })
    },

     checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        
        if(valid){
            axios.post('/add_faculty',{
              idNumber:this.idNumber,
              campusid:this.campusid,
              campus:this.campus,
              name:this.name,
              department:this.department,
              rank:this.rank,
              status:'Staff'
              })
            .then(res=>{
              this.rows = res.data.status
               this.$swal({
                icon: 'success',
                title: 'Saved!',
                showConfirmButton: false,
                timer: 1000
              })
               this.$nextTick(() => {
                  this.$bvModal.hide('modal-prevent-closing')
                })
              })
            .catch(err=>{
               this.$swal({
                  icon: 'error',
                  title: 'Error!',
                  showConfirmButton: false,
                  text: 'ID Number is exist!',
                  timer: 1500
                })
              })
          }else{
           this.idNumberState = valid 
           this.nameState = valid 
           this.departmentState = valid 
           this.rankState = valid 
          }
        return valid
      },
      resetModal() {
        this.name = ''
        this.nameState = null
        this.rank = ''
        this.rankState = null
        this.idNumber = ''
        this.idNumberState = null
        this.department = ''
        this.departmentState = null
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

        // Hide the modal manually
        
      }
    

  },
  data() {
    AppOptions.appContentFullHeight = true;
    AppOptions.appContentClass = 'p-0';

    return { 
      name: '',
      nameState: null,
      rank:'',
      rankState:null,
      idNumber:'',
      idNumberState:null,
      department:'',
      departmentState:null,
      campus:'',
      campusid:'',
            columns: [
        {
          label: 'Faculty ID',
          field: 'id_number',
        },
     //   {
       //   label: 'Photo',
         // field: 'photos',
        //},
        {
          label: 'Fullname',
          field: 'name',
        },
        {
          label: 'Department',
          field: 'department',
        },
        {
          label: 'Academic Rank',
          field: 'academic_rank',
        },
        {
          label: 'Type of Employee',
          field: 'status',
        },
        {
          label: 'Subject loaded',
          field: 'status',
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