<template>
	<div>
		<!-- BEGIN breadcrumb -->
		<ol class="breadcrumb float-xl-end">
			<li class="breadcrumb-item"><a class="btn btn-xs btn-danger text-white" @click="resetDate">RESET</a></li>
			<li class="breadcrumb-item active">Evaluation Schedule</li>
		</ol>
		<!-- END breadcrumb -->
		<!-- BEGIN page-header -->
		<h1 class="page-header">Evaluation Schedule <small><select @change="changeSem" class="form-select">
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
					title: 'Trip to London',
					start: currentYear + '-'+ currentMonth +'-01',
					end: currentYear + '-'+ currentMonth +'-05',
					color: '#8753de',
				}],
                    eventDrop:this.recordEvent,
                    eventResize:this.recordEvent,
    	  },
		}
	},
    methods: {
    changeSem(e){
    console.log(e.target.value)
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
        console.log(start)
        console.log(end)
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
        console.log(start)
        console.log(end)

        },

   
    }
}
</script>

<style>
button.fc-dayGridMonth-button.btn.btn-primary.active,button.fc-timeGridWeek-button.btn.btn-primary,button.fc-timeGridDay-button.btn.btn-primary{
display:none !important;
}
</style>