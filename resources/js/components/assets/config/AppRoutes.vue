<script>
import DashboardV1 from '../pages/Dashboard-v1.vue'
import DashboardV2 from '../pages/Dashboard-v2.vue'
import DashboardV3 from '../pages/Dashboard-v3.vue'
import EmailInbox from '../pages/Email-inbox.vue'
import EmailCompose from '../pages/Email-compose.vue'
import EmailDetail from '../pages/Email-detail.vue'
import Widgets from '../pages/Widgets.vue'
import UIGeneral from '../pages/UI-general.vue'
import UITypography from '../pages/UI-typography.vue'
import UITabsAccordion from '../pages/UI-tabs-accordion.vue'
import UIModalNotification from '../pages/UI-modal-notification.vue'
import UIWidgetBoxes from '../pages/UI-widget-boxes.vue'
import UIMediaObject from '../pages/UI-media-object.vue'
import UIButtons from '../pages/UI-buttons.vue'
import UIIcons from '../pages/UI-icons.vue'
import UISimpleLineIcons from '../pages/UI-simple-line-icons.vue'
import UIIonicons from '../pages/UI-ionicons.vue'
import UILanguageBarIcon from '../pages/UI-language-bar-icon.vue'
import UISocialButtons from '../pages/UI-social-buttons.vue'
import Bootstrap5 from '../pages/Bootstrap-5.vue'
import FormElements from '../pages/Form-elements.vue'
import FormPlugins from '../pages/Form-plugins.vue'
import FormWizards from '../pages/Form-wizards.vue'
import PosCounterCheckout from '../pages/Pos-counter-checkout.vue'
import PosCustomerOrder from '../pages/Pos-customer-order.vue'
import PosKitchenOrder from '../pages/Pos-kitchen-order.vue'
import PosMenuStock from '../pages/Pos-menu-stock.vue'
import PosTableBooking from '../pages/Pos-table-booking.vue'
import TableBasic from '../pages/Table-basic.vue'
import TableData from '../pages/Table-data.vue'
import ChartJs from '../pages/Chart-js.vue'
import ChartD3 from '../pages/Chart-d3.vue'
import ChartApex from '../pages/Chart-apex.vue'
import Calendar from '../pages/Calendar.vue'
import Map from '../pages/Map.vue'
import Gallery from '../pages/Gallery.vue'
import PageBlank from '../pages/Page-blank.vue'
import PageWithFooter from '../pages/Page-with-footer.vue'
import PageWithFixedFooter from '../pages/Page-with-fixed-footer.vue'
import PageWithoutSidebar from '../pages/Page-without-sidebar.vue'
import PageWithRightSidebar from '../pages/Page-with-right-sidebar.vue'
import PageWithMinifiedSidebar from '../pages/Page-with-minified-sidebar.vue'
import PageWithTwoSidebar from '../pages/Page-with-two-sidebar.vue'
import PageFullHeight from '../pages/Page-full-height.vue'
import PageWithWideSidebar from '../pages/Page-with-wide-sidebar.vue'
import PageWithLightSidebar from '../pages/Page-with-light-sidebar.vue'
import PageWithMegaMenu from '../pages/Page-with-mega-menu.vue'
import PageWithTopMenu from '../pages/Page-with-top-menu.vue'
import PageWithBoxedLayout from '../pages/Page-with-boxed-layout.vue'
import PageWithMixedMenu from '../pages/Page-with-mixed-menu.vue'
import PageBoxedLayoutWithMixedMenu from '../pages/Page-boxed-layout-with-mixed-menu.vue'
import PageWithTransparentSidebar from '../pages/Page-with-transparent-sidebar.vue'
import PageWithSearchSidebar from '../pages/Page-with-search-sidebar.vue'
import ExtraTimeline from '../pages/Extra-timeline.vue'
import ExtraComingSoon from '../pages/Extra-coming-soon.vue'
import ExtraSearch from '../pages/Extra-search.vue'
import ExtraInvoice from '../pages/Extra-invoice.vue'
import ExtraError from '../pages/Extra-error.vue'
import ExtraProfile from '../pages/Extra-profile.vue'
import ExtraScrumBoard from '../pages/Extra-scrum-board.vue'
import ExtraCookieAcceptanceBanner from '../pages/Extra-cookie-acceptance-banner.vue'
import ExtraOrders from '../pages/Extra-orders.vue'
import ExtraProducts from '../pages/Extra-products.vue'
import UserLoginV1 from '../pages/User-login-v1.vue'
import UserLoginV2 from '../pages/User-login-v2.vue'
import UserLoginV3 from '../pages/User-login-v3.vue'
import UserRegisterV3 from '../pages/User-register-v3.vue'
import HelperCss from '../pages/Helper-css'

import Account1 from '../../admin/Account1.vue'
import Account2 from '../../admin/Account2.vue'
import Dashboard from '../../admin/Dashboard.vue'
import Faculty1 from '../../admin/Faculty1.vue'
import Faculty2 from '../../admin/Faculty2.vue'
import Questionaire from '../../admin/Questionair.vue'
import Result1 from '../../admin/Result1.vue'
import Result2 from '../../admin/Result2.vue'
import Result3 from '../../admin/Result3.vue'
import Schedule from '../../admin/Schedule.vue'
import Administrator from  '../../admin/Administrator.vue'
import Overall from '../../admin/Overall.vue'
import Login from '../../../auth/Login.vue'

import axios from 'axios'


const routes = [
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
                    path: '/adminstrator/accounts/students',
                    component: Account1,
                  },
                  {
                    path: '/adminstrator/accounts/faculty',
                    component: Account2,
                  },
                  {
                    path: '/adminstrator/faculty/regular',
                    component: Faculty1,
                  },
                  {
                    path: '/adminstrator/faculty/casual',
                    component: Faculty2,
                  },
                  {
                    path: '/adminstrator/results/allresults',
                    component: Result1,
                  },
                   {
                    path: '/adminstrator/results/overall',
                    component: Overall,
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
          ]
export default routes;
</script>
