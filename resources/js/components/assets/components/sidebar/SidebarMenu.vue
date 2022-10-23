<script>

let sidebarMenu;
const academic = localStorage.getItem("academic_rank") === null?'null':localStorage.getItem("academic_rank");
switch (academic) {
  case 'null':
    sidebarMenu = [ ];
    break;
  case 'Main Administrator Campus':
    sidebarMenu = [
            { path: '/adminstrator/main/dashboard', icon: 'fa fa-sitemap',color:'green', title: 'Main Dashboard'},
             { path: '/adminstrator/main/accounts', icon: 'fa fa-school',color:'green', title: 'Account Campuses'},
            { 
             path: '/adminstrator/main/students', icon: 'fa fa-user-graduate',color:'green', title: 'Students',
                children: [
                { path: '/adminstrator/main/students/regular_students', title: 'Regular Students' },
                { path: '/adminstrator/main/students/irregular_students', title: 'Irregular Students' },
              ]
            },
            { path: '/adminstrator/main/faculty-staff', icon: 'fa fa-users-gear',color:'green', title: 'Faculty | Staff',
              children: [
                { path: '/adminstrator/main/faculty-staff/faculty', title: 'CPSU Faculty' },
                { path: '/adminstrator/main/faculty-staff/staff', title: 'CPSU Staff' },
              ]
            },
            { 
             path: '/adminstrator/main/results', icon: 'fa fa-chart-pie',color:'green', title: 'Results',
            },
           //  { path: '/adminstrator/main/schedule', icon: 'fa fa-calendar',color:'green', title: 'Schedule'},
            { path: '/adminstrator/main/questionaire', icon: 'fa fa-pen',color:'green', title: 'Questionaire'},
            
          ];
    break;
    default:
    sidebarMenu =  [
            { path: '/adminstrator/dashboard', icon: 'fa fa-sitemap',color:'green', title: 'Dashboard'},
             { path: '/adminstrator/students', icon: 'fa fa-user-graduate',color:'green', title: 'Students',
              children: [
                { path: '/adminstrator/students/regular_students', title: 'Regular Students' },
                { path: '/adminstrator/students/irregular_students', title: 'Irregular Students' }
              ]
            },
            { path: '/adminstrator/faculty', icon: 'fa fa-users-cog',color:'green', title: 'Faculty | Staff',
              children: [
                { path: '/adminstrator/faculty/faculty', title: 'CPSU Faculty' },
                { path: '/adminstrator/faculty/staff', title: 'CPSU Staff' },
              ]
            },{ 
             path: '/adminstrator/results/allresults', icon: 'fa fa-chart-pie',color:'green', title: 'Results',
              // children: [
              //   { path: '/adminstrator/results/allresults', title: 'All Results' },
              //   { path: '/adminstrator/results/regular', title: 'Regular Employee Results' },
              //   { path: '/adminstrator/results/casual', title: 'Casual Employee Results' }
              // ]
            },
             { path: '/adminstrator/schedule', icon: 'fa fa-calendar',color:'green', title: 'Schedule'},
           // { path: '/adminstrator/questionaire', icon: 'fa fa-pen',color:'green', title: 'Questionaire'},
            
          ];
}

export default sidebarMenu;
</script>
