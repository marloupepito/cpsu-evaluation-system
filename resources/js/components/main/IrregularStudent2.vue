<template>
	<div>
		<h1 class="display-6">CPSU Irregular Students</h1>
	 <div class="row container shadow rounded p-0 m-0">
		 		<div class="col-md-12">
		 				<b-breadcrumb>
						    <b-breadcrumb-item @click="backTo" href="#">
						      List Of Campuses
						    </b-breadcrumb-item>
						    <b-breadcrumb-item href="#" class="text-capitalize">{{campus}}</b-breadcrumb-item>
						
						  </b-breadcrumb>
		 		</div>
		 </div><br />
		 <div class=" shadow card rounded">
			<vue-good-table
			  :columns="columns"
			  :rows="rows"
			  :search-options="{
			    enabled: true,
			    skipDiacritics: true,
			  }">


			 <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'qr'">
              <a @click="getQR([props.row.id_number,props.row.password])" class="btn btn-primary btn-xs d-block">QR Code</a>
            </span>
        </template>
			</vue-good-table>
 		</div>

	</div>
</template>


<script>
import axios from 'axios'
export default {
  mounted(){
  	  axios.post('/get_evaluators',{
  	  status:'Irregular',
  	  campusid:window.location.search.substring(1),
      campus:window.location.pathname.split('/')[5].replace(/ /g,'_')
    })
    .then(res=>{
    	this.campus = window.location.pathname.split('/')[5].replace(/ /g,'_')
      this.rows = res.data.status
    })
  },
  data(){
    return {
    	campus:'',
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
          field: 'status',
        },
        {
          label: 'QR code',
          field: 'qr',
        },
      ],
      rows: [],
    };
  },
  methods:{
      getQR (e){
      this.$swal({
      imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + e,
      imageAlt: 'QR CODE'
      })
    },
  	backTo(){
  		this.$router.push({ path:'/adminstrator/main/faculty-staff/faculty' })
  		.catch(err=>{})
  	}
  }
};
</script>