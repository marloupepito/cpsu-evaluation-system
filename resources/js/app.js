/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue').default;


import VueX from 'vuex'
import routes from './components/assets/config/AppRoutes'

// plugins
import VueRouter from 'vue-router'
import VueBootstrap from 'bootstrap-vue'
import VueNVD3 from 'vue-nvd3'
import VueInsProgressBar from 'vue-ins-progress-bar'
import VueEventCalendar from 'vue-event-calendar'
import VueSparkline from 'vue-sparklines'
import * as VueGoogleMaps from 'vue2-google-maps'
import Vueditor from '@agametov/vueditor'
// import VueHljs from 'vue-hljs'
// import hljs from "highlight.js";
import VueSweetalert2 from 'vue-sweetalert2'
import VueNotification from 'vue-notification'
import VuePanel from './components/assets/plugins/panel/'
import VueDateTimePicker from 'vue-bootstrap-datetimepicker'
import VueSelect from 'vue-select'
import VueDatepicker from "vuejs-datepicker/dist/vuejs-datepicker.esm.js"
import VueMaskedInput from 'vue-maskedinput'
import VueInputTag from 'vue-input-tag'
import VueSlider from 'vue-slider-component'
import VueGoodTable from 'vue-good-table'
import VueCountdown from '@chenfengyuan/vue-countdown'
import VueColorpicker from 'vue-pop-colorpicker'
import VueCustomScrollbar from 'vue-custom-scrollbar'
import VueApexCharts from 'vue-apexcharts'
import DateRangePicker from 'vue2-daterange-picker'

// plugins css
import '@fortawesome/fontawesome-free/css/all.min.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'nvd3/build/nv.d3.min.css'
import 'vue-event-calendar/dist/style.css'
// import 'vue-hljs/dist/style.css'
import '@agametov/vueditor/dist/style/vueditor.min.css'
import 'pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css'
import 'simple-line-icons/css/simple-line-icons.css'
import 'flag-icon-css/css/flag-icons.min.css'
import 'ionicons/dist/css/ionicons.min.css'
import 'vue-good-table/dist/vue-good-table.css'
import 'vue-select/dist/vue-select.css'
import 'vue-slider-component/theme/antd.css'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'
import 'sweetalert2/dist/sweetalert2.min.css'
import 'vue-custom-scrollbar/dist/vueScrollbar.css'

// color admin css
import './components/assets/scss/vue.scss'
import 'bootstrap-social/bootstrap-social.css'
import Vue from "vue";
import VueQrcodeReader from "vue-qrcode-reader";
Vue.use(VueQrcodeReader)
Vue.use(VueX)
Vue.use(VueRouter);
Vue.use(VueBootstrap)
Vue.use(VueNVD3)
Vue.use(VueEventCalendar, {locale: 'en'})
Vue.use(VueSparkline)
Vue.use(Vueditor)
// Vue.use(VueHljs, { hljs })
Vue.use(VueSweetalert2)
Vue.use(VueNotification)
Vue.use(VuePanel)
Vue.use(VueDateTimePicker)
Vue.use(VueGoodTable)
Vue.use(VueColorpicker)
Vue.use(VueGoogleMaps, {
  load: {
    key: '',
    libraries: 'places'
  }
})
Vue.use(VueInsProgressBar, {
  position: 'fixed',
  show: true,
  height: '3px'
})
Vue.component('v-select', VueSelect);
Vue.component('datepicker', VueDatepicker)
Vue.component('masked-input', VueMaskedInput)
Vue.component('input-tag', VueInputTag)
Vue.component('vue-slider', VueSlider)
Vue.component('vue-custom-scrollbar', VueCustomScrollbar)
Vue.component('apexchart', VueApexCharts)
Vue.component('date-range-picker', DateRangePicker)
Vue.component(VueCountdown.name, VueCountdown);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/assets/components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./components/assets/', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('root-app', require('./components/Index.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 const router = new VueRouter({
	routes,
  mode:'history'
})
const app = new Vue({
    el: '#app',
    router
});
