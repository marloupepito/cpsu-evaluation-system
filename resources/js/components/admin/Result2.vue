<template>
    <!-- BEGIN mailbox -->
    <div class="container">
        <!-- BEGIN mailbox-sidebar -->
        <div class="mailbox-content card">
            <div class="mailbox-content-header pt-2 pb-1 bg-white">
                <div class="btn-toolbar"> &nbsp;
                    <h3>Student Records</h3>&nbsp;&nbsp;
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
    <!-- END mailbox -->
</template>

<script>
import AppOptions from '../assets/config/AppOptions.vue'
import axios from 'axios'
export default {
  mounted(){
    axios.post('/get_all_results2',{
      status:'all'
    })
    .then(res=>{
      this.rows = res.data.status
    })
  },
  methods:{
    overAll(id){
      console.log(id)
      axios.post('/goto_overall',{
        id:id
        })
      .then(res=>{
      this.$router.push({path:'/adminstrator/results/overall'})
        })
    },
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