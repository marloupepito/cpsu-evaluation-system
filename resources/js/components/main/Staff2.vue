<template>
	<div>
		<h1 class="display-6">CPSU Staff</h1>
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
			    <span v-if="props.column.field == 'campus'">
			      <a href="#" @click="goTo(props.row.campusid,props.row.campus)" class="text-capitalize"><u>{{props.row.campus}}</u></a> 
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
  	  axios.post('/get_faculty',{
  	  status:'Staff',
  	  campusid:window.location.search.substring(1),
      campus:window.location.pathname.split('/')[5].replace(/_/g,' ')
    })
    .then(res=>{
    	this.campus = window.location.pathname.split('/')[5].replace(/_/g,' ')
      this.rows = res.data.status
    })
  },
  data(){
    return {
    	campus:'',
       columns: [
        {
          label: 'Faculty ID',
          field: 'id_number',
        },
        {
          label: 'Photo',
          field: 'photos',
        },
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
          label: 'Subject Loading',
          field: 'status',
        },

      ],
      rows: [],
    };
  },
  methods:{
  	backTo(){
  		this.$router.push({ path:'/adminstrator/main/faculty-staff/faculty' })
  		.catch(err=>{})
  	}
  }
};
</script>