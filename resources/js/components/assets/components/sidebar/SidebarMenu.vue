<script>
const sidebarMenu = [
  { path: '/dashboard', icon: 'fa fa-sitemap bg-pink', title: 'Dashboard'},
   { path: '/accounts', icon: 'fa fa-user-cog bg-green', title: 'Account Evaluators',
    children: [
      { path: '/accounts/students', title: 'Account Students' },
      { path: '/accounts/faculty', title: 'Account Faculty' }
    ]
  },
  { path: '/faculty', icon: 'fa fa-users bg-yellow', title: 'Faculty Evaluatees',
    children: [
      { path: '/faculty/regular', title: 'Regular Employee' },
      { path: '/faculty/casual', title: 'Casual Employee' },
    ]
  },{ path: '/results', icon: 'fa fa-chart-pie bg-red', title: 'Results',
    children: [
      { path: '/results/allresults', title: 'All Results' },
      { path: '/results/regular', title: 'Regular Employee Results' },
      { path: '/results/casual', title: 'Casual Employee Results' }
    ]
  },
   { path: '/schedule', icon: 'fa fa-calendar bg-indigo', title: 'Schedule'},
  { path: '/questionaire', icon: 'fa fa-pen bg-blue', title: 'Questionaire'},
  
]

export default sidebarMenu;
</script>
