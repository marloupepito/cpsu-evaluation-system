<template>
	<div>
		 <div class="row container shadow rounded p-0 m-0">
		 		<div class="col-md-9">
		 				<h2 class="m-0">Create Campus</h2>
		 		</div>
		 		<div class="col-md-3 p-0">
		 			 <b-button class="w-100 m-0" style="background-color:#00802b" v-b-modal.modal-prevent-closing>Create Campus</b-button>
		 		</div>
		 </div>
     <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="Create Campus"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="handleSubmit">
        <b-form-group
          label="Campus Name"
          label-for="name-input"
          invalid-feedback="Campus Name is required"
          :state="campusnameState"
        >
          <b-form-input
            id="campusname-input"
            v-model="campusname"
            :state="campusnameState"
            required
          ></b-form-input>
        </b-form-group>
        <b-form-group
          label="Designate Person"
          label-for="name-input"
          invalid-feedback="Designate Person is required"
          :state="campusadminState"
        >
          <b-form-input
            id="campusadmin-input"
            v-model="campusadmin"
            :state="campusadminState"
            required
          ></b-form-input>
        </b-form-group>
        <b-form-group
          label="Academic Rank"
          label-for="name-input"
          invalid-feedback="Campus name is required"
          :state="campusrankState"
        >
          <b-form-select
          :options="options"
          class="form-select"
            id="campusrank-input"
            v-model="campusrank"
            :state="campusrankState"
            required
          ></b-form-select>
        </b-form-group>
        <b-form-group
          label="Username"
          label-for="name-input"
          invalid-feedback="Username is required"
          :state="campususernameState"
        >
          <b-form-input
            id="campususername-input"
            v-model="campususername"
            :state="campususernameState"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          label="Password"
          label-for="name-input"
          invalid-feedback="Password is required"
          :state="campuspasswordState"
        >
          <b-form-input
            id="campuspassword-input"
            v-model="campuspassword"
            :state="campuspasswordState"
            required
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>
<br/>
<div class=" shadow card rounded">
		<vue-good-table

  :columns="columns"
  :rows="rows"
  :search-options="{
    enabled: true,
    skipDiacritics: true,
  }">

</vue-good-table>
 </div>
	</div>
</template>


<script>
import axios from 'axios'
export default {
  mounted(){
  	axios.post('/get_all_users')
  	.then(res=>{
  		this.rows = res.data.status
     console.log(res.data.status)
  		})
  },
  data(){
    return {
      campusname: '',
      campusnameState: null,
      campusadmin: '',
      campusadminState: null,
      campusrank: '',
      campusrankState: null,
      campususername: '',
      campususernameState: null,
      campuspassword: '',
      campuspasswordState: null,
       options: [
          { value: 'Instractor', text: 'Instractor' },
          { value: 'OSSA Personnel', text: 'OSSA Personnel' },
          { value: 'Campus Administrator', text: 'Campus Administrator' },
        ],
      columns: [
      {
          label: 'Campuses',
          field: 'campus',
        },
        {
          label: 'Campus Administrator',
          field: 'name',
        },
        {
          label: 'Academic Rank',
          field: 'academic_rank',
        },
         {
          label: 'Username',
          field: 'username',
        },
        {
          label: 'Evaluation Start On',
          field: 'end',
        },
        {
          label: 'Eveluation End On',
          field: 'start',
        }, {
          label: 'Status',
          field: 'status',
        },

       
      ],
      rows: [],
    };
  },
  methods:{
    checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        if(valid){
          axios.post('/add_campus',{
            campusname:this.campusname,
            campusadmin:this.campusadmin,
            campusrank:this.campusrank,
            campususername:this.campususername,
            campuspassword:this.campuspassword,
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
                  title: 'Name of Campus or Username is exist!',
                  showConfirmButton: false,
                  timer: 1500
                })
            })
        }else{
          this.campusnameState = valid
          this.campusadminState = valid
          this.campusrankState = valid
          this.campususernameState = valid
          this.campuspasswordState = valid
        }
        
        return valid
      },
      resetModal() {
        this.campusname = ''
        this.campusadmin = ''
        this.campusrank = ''
        this.campususername = ''
        this.campuspassword = ''

        this.campusnameState = null
        this.campusadminState = null
        this.campusrankState = null
        this.campususernameState = null
        this.campuspasswordState = null
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
    }

};
</script>