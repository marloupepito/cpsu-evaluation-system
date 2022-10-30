<script>
import ExtraError from '../pages/Extra-error.vue'


import Main from '../../main/Main.vue'
import MainDashboard from '../../main/MainDashboard.vue'
import AccountCampuses from '../../main/AccountCampuses.vue'
import Faculty from '../../main/Faculty.vue'
import Faculty11 from '../../main/Faculty1.vue'
import Faculty22 from '../../main/Faculty2.vue'
import Staff from '../../main/Staff.vue'
import Staff11 from '../../main/Staff1.vue'
import Staff22 from '../../main/Staff2.vue'
import Result from '../../main/Result.vue'
import Result11 from '../../main/Result1.vue'
import Result22 from '../../main/Result2.vue'
import Schedulez from '../../main/Schedule.vue'
import Schedule11 from '../../main/Schedule1.vue'
import Schedule22 from '../../main/Schedule2.vue'
import RegularStudent from '../../main/RegularStudent.vue'
import RegularStudent11 from '../../main/RegularStudent1.vue'
import RegularStudent22 from '../../main/RegularStudent2.vue'
import IrregularStudent from '../../main/IrregularStudent.vue'
import IrregularStudent11 from '../../main/IrregularStudent1.vue'
import IrregularStudent22 from '../../main/IrregularStudent2.vue'



import Account1 from '../../admin/Account1.vue'
import Account2 from '../../admin/Account2.vue'
import Dashboard from '../../admin/Dashboard.vue'
import Faculty1 from '../../admin/Faculty1.vue'
import SubjectLoaded1 from '../../admin/SubjectLoaded1.vue'
import Faculty2 from '../../admin/Faculty2.vue'
import Questionaire from '../../admin/Questionair.vue'
import Resulting from '../../admin/Result.vue'
import Result1 from '../../admin/Result1.vue'
import Result2 from '../../admin/Result2.vue'
import Result3 from '../../admin/Result3.vue'
import Schedule from '../../admin/Schedule.vue'
import Administrator from  '../../admin/Administrator.vue'
import Overall from '../../admin/Overall.vue'
import Login from '../../../auth/Login.vue'

import Regular from '../../admin/RegularStudent.vue'
import Regular2 from '../../admin/RegularStudent2.vue'
import Irregular from '../../admin/IrregularStudent.vue'
import Irregular2 from '../../admin/IrregularStudent2.vue'
import StudentLoaded from '../../admin/StudentLoaded.vue'


import axios from 'axios'
 let routes;
 const academic = localStorage.getItem("academic_rank") === null?'null':localStorage.getItem("academic_rank");

switch (academic) {
  case 'null':
    routes = [
    { path: '*', component: ExtraError},
    { path: '/'},
    ];
    break;
  case 'Main Administrator Campus':
    routes = [
            { path: '*', component: ExtraError},
              { path: '/adminstrator/main', 
                component: Administrator,
                 beforeEnter: (to, from, next) => {
                    axios.get('/authenticated')
                    .then(res=>{
                      next()
                    })
                    .catch(err=>{
                      return next({ path: '/login'})
                    })
                  },
                children: 
                [
                  {
                    path: '/adminstrator/main/dashboard',
                    component: MainDashboard,
                  },
                  {
                    path: '/adminstrator/main/accounts',
                    component: AccountCampuses,
                  },
                  {
                    path: '/adminstrator/main/students/regular_students',
                    component: RegularStudent,
                    children:[
                      {path:'/adminstrator/main/students/regular_students', component:RegularStudent11},
                      {path:'/adminstrator/main/students/regular_students/:id', component:RegularStudent22}
                    ],
                  },
                  {
                    path: '/adminstrator/main/students/irregular_students',
                    component: IrregularStudent,
                    children:[
                      {path:'/adminstrator/main/students/irregular_students', component:IrregularStudent11},
                      {path:'/adminstrator/main/students/irregular_students/:id', component:IrregularStudent22}
                    ],
                  },
                  {
                    path: '/adminstrator/main/faculty-staff/faculty',
                    component: Faculty,
                    children:[
                      {path:'/adminstrator/main/faculty-staff/faculty', component:Faculty11},
                      {path:'/adminstrator/main/faculty-staff/faculty/:id', component:Faculty22}
                    ],
                  },
                  {
                    path: '/adminstrator/main/faculty-staff/staff',
                    component: Staff,
                    children:[
                      {path:'/adminstrator/main/faculty-staff/staff', component:Staff11},
                      {path:'/adminstrator/main/faculty-staff/staff/:id', component:Staff22}
                    ],
                  },
                  {
                    path: '/adminstrator/main/results',
                    component: Result,
                    children:[
                      {path:'/adminstrator/main/results', component:Result11},
                      {path:'/adminstrator/main/results/:id', component:Result22},
                      {path:'/adminstrator/main/results/:id/overall', component: Overall},

                    ],
                  },
                   {
                    path: '/adminstrator/main/schedule',
                    component: Schedulez,
                    children:[
                      {path:'/adminstrator/main/schedule', component:Schedule11},
                      {path:'/adminstrator/main/schedule/:id', component:Schedule22},
                    ],
                  },
                  {
                    path: '/adminstrator/main/results/regular',
                    component: Result2,
                  },
                  {
                    path: '/adminstrator/main/results/casual',
                    component: Result3,
                  },
                  {
                    path: '/adminstrator/main/schedule',
                    component: Schedule,
                  },
                  {
                    path: '/adminstrator/main/questionaire',
                    component: Questionaire,
                  },
                ],
             }, 
          ];
    break;
    default:
    routes =  [
            { path: '*', component: ExtraError},
              { path: '/adminstrator', 
                component: Administrator,
                 beforeEnter: (to, from, next) => {
                    axios.get('/authenticated')
                    .then(res=>{
                      next()
                    })
                    .catch(err=>{
                      return next({ path: '/login'})
                    })
                  },
                children: 
                [
                  {
                    path: '/adminstrator/dashboard',
                    component: Dashboard,
                  },
                  {
                    path: '/adminstrator/students',
                    component: Regular,
                    children:[
                      { path:'/adminstrator/students/loaded', component:StudentLoaded },
                      { path:'/adminstrator/students/regular_students', component:Regular2 },
                      { path:'/adminstrator/students/irregular_students', component:Irregular2 },
                    ]
                  },
                  {
                    path: '/adminstrator/faculty/faculty',
                    component: Faculty1,
                  },
                  {
                    path: '/adminstrator/faculty/loaded1',
                    component: SubjectLoaded1,
                  },
                  {
                    path: '/adminstrator/faculty/staff',
                    component: Faculty2,
                  },
                  
                  {
                    path: '/adminstrator/results/allresults',
                    component: Resulting,
                    children:[
                     {
                        path: '/adminstrator/results/allresults',
                        component: Result1,
                      },
                       {
                        path: '/adminstrator/results/allresults/overall',
                        component: Overall,
                      },
                    ]
                  },
                  {
                    path: '/adminstrator/results/regular',
                    component: Result2,
                  },
                  {
                    path: '/adminstrator/results/casual',
                    component: Result3,
                  },
                  {
                    path: '/adminstrator/schedule',
                    component: Schedule,
                  },
                  {
                    path: '/adminstrator/questionaire',
                    component: Questionaire,
                  },
                ],
             }, 
          ];
}
export default routes;
</script>
