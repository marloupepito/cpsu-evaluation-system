<template>
	<!-- BEGIN mailbox -->
	<div class="container">
		<!-- BEGIN mailbox-sidebar -->
		<div class="mailbox-content card">
			<div class="mailbox-content-header pt-2 pb-1 bg-white">
				<div class="btn-toolbar"> &nbsp;
                    <h3>Evaluatee Records</h3>&nbsp;&nbsp;
					<div class="btn-group me-2">
						<a href="javascript:;" class="btn btn-white btn-xs mt-2"><i class="fa fa-fw fa-file"></i>CSV FILE</a>
					</div>
					<div class="btn-group me-2">
						<a href="javascript:;" class="btn btn-white btn-xs mt-2"><i class="fa fa-fw fa-archive"></i>ID NUMBER</a>
					</div>&nbsp;
				</div>
			</div>
		</div>		
		<!-- END mailbox-content -->
        <vue-good-table
          :search-options="{
                enabled: true
            }"
        class="mt-5"
        :columns="columns"
        :rows="rows"
        >
      <!--    <span v-if="props.column.field == 'qr'">
            <span style="font-weight: bold; color: blue;">{{props.row.age}}</span> 
            </span>
            <span v-else>
            {{props.formattedRow[props.column.field]}}
            </span> -->
        <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'action'">
              <a @click="actionFaculty([props.row.id_number,props.row.password])" class="btn btn-primary btn-xs d-block">QR CODE</a>
            </span>
        </template>
        </vue-good-table>
	</div>
	<!-- END mailbox -->
</template>

<script>
import AppOptions from '../assets/config/AppOptions.vue'
import axios from 'axios'
export default {
  mounted(){
    axios.post('/get_faculty',{
      status:'Regular'
    })
    .then(res=>{
      this.rows = res.data.status
      console.log(res.data.status)
    })
  },
  methods:{
    actionFaculty (e){
      console.log(e)
      this.$swal({
      imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + e,
      imageAlt: 'QR CODE'
    })
    }
  },
	data() {
		AppOptions.appContentFullHeight = true;
		AppOptions.appContentClass = 'p-0';

		return { 
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