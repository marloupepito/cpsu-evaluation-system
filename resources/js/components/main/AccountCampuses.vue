<template>
	<div>
		 <div class="row container shadow rounded p-0 m-0">
		 		<div class="col-md-9">
		 				<h2>Create Campus</h2>
		 		</div>
		 		<div class="col-md-3">
		 			ss
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
};
</script>