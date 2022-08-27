<script>
const sidebarMenu = [
  { path: '/adminstrator/dashboard', icon: 'fa fa-sitemap bg-pink', title: 'Dashboard'},
   { path: '/adminstrator/accounts', icon: 'fa fa-user-cog bg-green', title: 'Account Evaluators',
    children: [
      { path: '/adminstrator/accounts/students', title: 'Account Students' },
      { path: '/adminstrator/accounts/faculty', title: 'Account Faculty' }
    ]
  },
  { path: '/adminstrator/faculty', icon: 'fa fa-users bg-yellow', title: 'Faculty Evaluatees',
    children: [
      { path: '/adminstrator/faculty/regular', title: 'Regular Employee' },
      { path: '/adminstrator/faculty/casual', title: 'Casual Employee' },
    ]
  },{ path: '/adminstrator/results', icon: 'fa fa-chart-pie bg-red', title: 'Results',
    children: [
      { path: '/adminstrator/results/allresults', title: 'All Results' },
      { path: '/adminstrator/results/regular', title: 'Regular Employee Results' },
      { path: '/adminstrator/results/casual', title: 'Casual Employee Results' }
    ]
  },
   { path: '/adminstrator/schedule', icon: 'fa fa-calendar bg-indigo', title: 'Schedule'},
  { path: '/adminstrator/questionaire', icon: 'fa fa-pen bg-blue', title: 'Questionaire'},
  
]

export default sidebarMenu;
</script>
