<template>
    <div class="col-xl-6 col-lg-6 offset-md-3"style="height:100vh !important;" >
		<div :class="hidden" v-if="path == '/'">
		<div id="loading"/>
		<div class="cpsu"/>
		</div>
			<div   class="card border-0 mb-3 bg-white text-dark" >
				<!-- BEGIN card-body -->
				<div  class="card-body text-capitalize">
					<!-- BEGIN title -->
					<div class="mb-3 text-gray-500 ">
						<b>CPSU Faculty Evaluation System</b>
					</div>
				  <b-card v-for="(item, index) in campus" :key="item.id" :title="item.campus"class="shadow d-flex mb-2">
				     <b-button href="#" @click="gotohome(item.campus,item.id)" variant="success" style="background-color:green;float:right;">PLEASE PROCEED</b-button>
				  </b-card>
				</div>
			</div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
	data() {
		return { 
			hidden:'',
			path:window.location.pathname,
			campus:[]
			}
	},
	mounted(){
	 axios.post('/get_all_users2')
	 .then(res=>{
	 	setTimeout(() => {
          this.hidden='d-none'
        }, 2000);
        
	 	this.campus = res.data.status
	 })

	},
	methods:{
		gotohome(campus,id){
			window.location= '/home?'+campus.replace(/ /g,'_')+'#'+id;
		}
	},
}
</script>

<style>
    #loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-color: black;
  background-image: url("/images/loading.gif");
  background-repeat: no-repeat;
  background-position: center;
}
.cpsu{
display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  background-image: url("/images/logo.png");
  background-repeat: no-repeat;
  background-position: center;
}
</style>