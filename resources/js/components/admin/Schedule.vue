<template>
	<div>
		<!-- BEGIN breadcrumb -->
		<ol class="breadcrumb float-xl-end">
			<li class="breadcrumb-item"><a class="btn btn-xs btn-danger text-white" @click="resetDate">RESET</a></li>
			<li class="breadcrumb-item active">Evaluation Schedule</li>
		</ol>
		<!-- END breadcrumb -->
		<!-- BEGIN page-header -->
		<h1 class="page-header">Evaluation Schedule <small><select v-model="semester" @change="changeSem" class="form-select">
			<option selected disabled>Please Select Semester</option>
			<option value="1st Semester">1st Semester</option>
			<option value="2nd Semester">2nd Semester</option>
		</select></small></h1>
		<!-- END page-header -->
		<hr />
	
		<!-- BEGIN calendar -->
		<FullCalendar :options="calendarOptions"></FullCalendar>
		<!-- END calendar -->
	</div>
</template>

<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import listPlugin from '@fullcalendar/list'
import bootstrapPlugin from '@fullcalendar/bootstrap'
import axios from 'axios'

export default {
	components: {
    FullCalendar // make the <FullCalendar> tag available
  },
	data() {
		var date = new Date();
		var currentYear = date.getFullYear();
		var currentMonth = date.getMonth() + 1;
				currentMonth = (currentMonth < 10) ? '0' + currentMonth : currentMonth;
		
		return {
            semester:'',
			calendarOptions: {
			contentHeight: 410,
        plugins: [ dayGridPlugin, timeGridPlugin, interactionPlugin, listPlugin, bootstrapPlugin ],
        headerToolbar: {
					left: 'dayGridMonth,timeGridWeek,timeGridDay',
					center: 'title',
					right: 'prev,next today'
				},
				buttonText: {
					today:    'Today',
					month:    'Month',
					week:     'Week',
					day:      'Day'
				},
				
				initialView: 'dayGridMonth',
				editable: true,
				droppable: true,
				themeSystem: 'bootstrap',
				views: {
					timeGrid: {
						eventLimit: 6 // adjust to 6 only for timeGridWeek/timeGridDay
					}
				},
				events: [{
					title: 'Evaluation Schedule',
					start: '',
					end: '',
					color: '#8753de',
				}],
                    eventDrop:this.recordEvent,
                    eventResize:this.recordEvent,
    	  },
		}
	},
	mounted(){
		axios.post('/get_schedule')
		.then(res=>{
			this.calendarOptions.events[0].start = res.data.status[0].start
			this.calendarOptions.events[0].end = res.data.status[0].end
			this.semester = res.data.status[0].semester
		})
	},
    methods: {
    changeSem(e){
   		 axios.put('/change_sem',{
   		 	semester:e.target.value
   		 	})
		.then(res=>{
			this.semester = res.data.status[0].semester
		})
    },
        events (arg){
            console.log(arg)
        },
        resetDate(arg){
		var date = new Date();
        const a = date.getMonth() + 1
		const b = date.getDate();
        const year = date.getFullYear();
		const month = (a < 10) ? '0' + a : a;
		const day = (b < 10) ? '0' + b : b;
        const start = year+'-'+month+'-'+day
        const end = year+'-'+month+'-'+(day+2)
			axios.put('/update_schedule',{
        		start:start,
        		end:end
        		})
			.then(res=>{
				this.calendarOptions.events[0].start = res.data.status[0].start
				this.calendarOptions.events[0].end = res.data.status[0].end
			})
			.catch(err=>{

			})
        },
        recordEvent (arg){
        var date = new Date(arg.event._instance.range.start);
        const a = date.getMonth() + 1
		const b = date.getDate();
        const year = date.getFullYear();
		const month = (a < 10) ? '0' + a : a;
		const day = (b < 10) ? '0' + b : b;
        const start = year+'-'+month+'-'+day

        var date2 = new Date(arg.event._instance.range.end);
        const aa = date2.getMonth() + 1
		const bb = date2.getDate();
        const year2 = date2.getFullYear();
		const month2 = (aa < 10) ? '0' + aa : aa;
		const day2 = (bb < 10) ? '0' + bb : bb;
        const end = year2+'-'+month2+'-'+day2
        	axios.put('/update_schedule',{
        		start:start,
        		end:end
        		})
			.then(res=>{
				this.calendarOptions.events[0].start = res.data.status[0].start
				this.calendarOptions.events[0].end = res.data.status[0].end
			})
			.catch(err=>{

			})

        },

   
    }
}
</script>

<style>
button.fc-dayGridMonth-button.btn.btn-primary.active,button.fc-timeGridWeek-button.btn.btn-primary,button.fc-timeGridDay-button.btn.btn-primary{
display:none !important;
}
</style>