<template>
	<!-- BEGIN mailbox -->
	<div class="container">
		<!-- BEGIN mailbox-sidebar -->
		<div class="mailbox-content card">
			<div class="mailbox-content-header pt-2 pb-1 bg-white">
				<div class="btn-toolbar"> &nbsp;
                    <h3>Student Records</h3>&nbsp;&nbsp;
					<div class="btn-group me-2">
						<a href="javascript:;" class="btn btn-white btn-sm"><i class="fa fa-fw fa-file"></i>CSV FILE</a>
					</div>
					<div class="btn-group me-2">
						<a href="javascript:;" class="btn btn-white btn-sm"><i class="fa fa-fw fa-archive"></i>ID NUMBER</a>
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
        <template slot="table-row" slot-scope="props">
            <span v-if="props.column.field == 'age'">
            <span style="font-weight: bold; color: blue;">{{props.row.age}}</span> 
            </span>
            <span v-else>
            {{props.formattedRow[props.column.field]}}
            </span>
        </template>
        </vue-good-table>
	</div>
	<!-- END mailbox -->
</template>

<script>
import AppOptions from '../assets/config/AppOptions.vue'

export default {
	data() {
		AppOptions.appContentFullHeight = true;
		AppOptions.appContentClass = 'p-0';

		return { 
            columns: [
        {
          label: 'Name',
          field: 'name',
        },
        {
          label: 'Age',
          field: 'age',
          type: 'number',
        },
        {
          label: 'Created On',
          field: 'createdAt',
          type: 'date',
          dateInputFormat: 'yyyy-MM-dd',
          dateOutputFormat: 'MMM do yy',
        },
        {
          label: 'Percent',
          field: 'score',
          type: 'percentage',
        },
      ],
      rows: [
        { id:1, name:"John", age: 20, createdAt: '',score: 0.03343 },
        { id:2, name:"Jane", age: 24, createdAt: '2011-10-31', score: 0.03343 },
        { id:3, name:"Susan", age: 16, createdAt: '2011-10-30', score: 0.03343 },
        { id:4, name:"Chris", age: 55, createdAt: '2011-10-11', score: 0.03343 },
        { id:5, name:"Dan", age: 40, createdAt: '2011-10-21', score: 0.03343 },
        { id:6, name:"John", age: 20, createdAt: '2011-10-31', score: 0.03343 },
          { id:1, name:"John", age: 20, createdAt: '',score: 0.03343 },
        { id:2, name:"Jane", age: 24, createdAt: '2011-10-31', score: 0.03343 },
        { id:3, name:"Susan", age: 16, createdAt: '2011-10-30', score: 0.03343 },
        { id:4, name:"Chris", age: 55, createdAt: '2011-10-11', score: 0.03343 },
        { id:5, name:"Dan", age: 40, createdAt: '2011-10-21', score: 0.03343 },
        { id:6, name:"John", age: 20, createdAt: '2011-10-31', score: 0.03343 },
          { id:1, name:"John", age: 20, createdAt: '',score: 0.03343 },
        { id:2, name:"Jane", age: 24, createdAt: '2011-10-31', score: 0.03343 },
        { id:3, name:"Susan", age: 16, createdAt: '2011-10-30', score: 0.03343 },
        { id:4, name:"Chris", age: 55, createdAt: '2011-10-11', score: 0.03343 },
        { id:5, name:"Dan", age: 40, createdAt: '2011-10-21', score: 0.03343 },
        { id:6, name:"John", age: 20, createdAt: '2011-10-31', score: 0.03343 },
      ],
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