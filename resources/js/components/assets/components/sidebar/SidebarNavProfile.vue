<template>
	<div class="menu">
		<div class="menu-profile">
			<a href="javascript:;" class="menu-profile-link" v-on:click="expand()">
				<div class="menu-profile-cover"></div>
				<div class="menu-profile-image">
					<img src="images/background.jpeg" alt="" />
				</div>
				<div class="menu-profile-info">
					<div class="d-flex align-items-center">
						<div class="flex-grow-1">
							<b>CPSU</b>
						</div>
						<div class="menu-caret ms-auto"></div>
					</div>
					<small>Administrator</small>
				</div>
			</a>
		</div>
		
	</div>
</template>

<script>
import AppOptions from '../../config/AppOptions.vue'
import axios from 'axios'
export default {
	name: 'SidebarNavProfile',
	data() {
		return {
			stat: '',
			appOptions: AppOptions,
			id:'',
			academic_rank:'',
			password:''
		}
	},
	mounted(){
			const a = localStorage.getItem("academic_rank");
            const b = localStorage.getItem("campus");
            const c = localStorage.getItem("campusid");
			axios.post('/get_admin',{
				academic_rank:a,
				campus:b,
				campusid:c
			})
			.then(res=>{
				this.id=res.data.status.id
				this.academic_rank=res.data.status.academic_rank
				this.password=res.data.status.password
			})
		},
	methods: {
		expand: function() {

			this.stat = (this.stat == 'expand') ? 'collapse' : 'expand'
			 this.$swal({
			      imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + [this.id,this.academic_rank,this.password],
			      imageAlt: 'QR CODE',
			      showConfirmButton: false,
			    })
		}
  }
}
</script>

<style>

</style>
