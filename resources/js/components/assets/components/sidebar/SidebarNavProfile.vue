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

export default {
	name: 'SidebarNavProfile',
	data() {
		return {
			stat: '',
			appOptions: AppOptions
		}
	},
	methods: {
		expand: function() {
			this.stat = (this.stat == 'expand') ? 'collapse' : 'expand'
		}
  }
}
</script>

<style>

</style>
