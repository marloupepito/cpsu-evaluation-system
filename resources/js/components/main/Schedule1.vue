<template>
	<div>
		<h1 class="display-6">CPSU Evaluation Schedule</h1>
		 <div class="row container shadow rounded p-0 m-0">
		 		<div class="col-md-12">
		 				<b-breadcrumb>
						    <b-breadcrumb-item href="#">
						      List Of Campuses
						    </b-breadcrumb-item>
						   <!--  <b-breadcrumb-item href="#foo">Foo</b-breadcrumb-item> -->
						
						  </b-breadcrumb>
		 		</div>
		 </div>
<br/>
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
		      <a href="#" @click="goTo(props.row.id,props.row.campus)" class="text-capitalize"><u>{{props.row.campus}}</u></a> 
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
  	axios.post('/get_all_users')
  	.then(res=>{
  		this.rows = res.data.status
  		})
  },
  data(){
    return {
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
          label: 'Eveluation Start',
          field: 'score',
        },
        {
          label: 'Eveluation End',
          field: 'score',
        },

        {
          label: 'Created On',
          field: 'created_at',
        },
      ],
      rows: [],
    };
  },
  methods:{
  	goTo(id,campus){
  		this.$router.push({ path:'/adminstrator/main/schedule/'+campus.replace(/ /g,'_')+'?'+id })
  		.catch(err=>{})
  	}
  }
};
</script>