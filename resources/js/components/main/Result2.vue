<template>
	<div>
		<h1 class="display-6">CPSU Evaluation Results</h1>
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
          :search-options="{
                enabled: true
            }"
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
        <div class="btn-group" v-if="props.column.field == 'action'">
          <a href="#" class="btn btn-default">Action</a>
          <b-dropdown variant="default" right>
            <template slot="button-content">
              <i class="fa fa-caret-down"></i>
            </template>
            <a href="javascript:;" class="dropdown-item">Profile</a>
            <a href="javascript:;" class="dropdown-item">Who Evaluates?</a>
            <a @click="overAll(props.row.evaluatee_id)" class="dropdown-item">Overall Results</a>

          </b-dropdown>
        </div>
        </template>
        </vue-good-table>
 		</div>

	</div>
</template>


<script>
import axios from 'axios'
export default {
  mounted(){
  	  axios.post('/get_all_results',{
  	  status:'all',
  	  campusid:window.location.search.substring(1),
      campus:window.location.pathname.split('/')[4].replace(/ /g,'_')
    })
    .then(res=>{
    	this.campus = window.location.pathname.split('/')[4].replace(/ /g,'_')
      this.rows = res.data.status
    })
  },
  data(){
    return {
    	campus:'',
       columns: [
        {
          label: 'Name of Faculty',
          field: 'evaluatee_id',
          width: '20%'
        },
        {
          label: 'Commitment',
          field: 'a',
          width: '10%'
        },
        {
          label: 'Knowledge of Subject',
          field: 'b',
          width: '10%'
        },
        {
          label: 'Teaching for Independent Learning',
          field: 'c',
          width: '10%'
        },
        {
          label: 'Management of Learning',
          field: 'd',
          width: '10%'
        },
        {
          label: 'Total',
          field: 'e',
          width: '10%'
        },
        {
          label: 'School Year',
          field: 'year',
          width: '10%'
        },
        {
          label: 'Semester',
          field: 'semester',
          width: '10%'
        },
        
        {
          label: '',
          field: 'action',
          width: '5%'
        },
      ],
      rows: [],
    };
  },
  methods:{
    overAll(id){
      axios.post('/goto_overall',{
        id:id
        })
      .then(res=>{
      this.$router.push({path:'/adminstrator/main/results/'+this.campus+'/overall'})
        })
    },
  	backTo(){
  		this.$router.push({ path:'/adminstrator/main/results' })
  		.catch(err=>{})
  	}
  }
};
</script>