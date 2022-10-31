<template>
 <div>
    <qrcode-stream :camera="camera" @decode="onDecode" @init="onInit" style="height:100vh">
      <div v-if="verify === true" v-show="showScanConfirmation" class="scan-confirmation">
        <center>
        	<div style="padding-top:200px">
        	<img src="/images/x.png" alt="Checkmark" width="100px" height="100px" />
        	<h2 class="text-danger mt-2">Incorrect QR code!</h2>
        </div>
        </center>
      </div>
    </qrcode-stream>
  </div>
</template>


<script>
	import axios from 'axios'
export default {

  data () {
    return {
      camera: 'auto',
      result: null,
      showScanConfirmation: false,
      verify:false,
      type:'',
      campus:'',
      campusid:''
    }
  },
  mounted(){
    const type = window.location.search.substring(1).replace(/_/g,' ').split(',')[0]
     const campus = window.location.search.substring(1).replace(/_/g,' ').split(',')[1]
      const campusid = window.location.hash.substring(1)
      this.campus = campus
      this.campusid =campusid
      this.type =type
  },
  methods: {

    async onInit (promise) {
      try {
        await promise
      } catch (e) {
        console.error(e)
      } finally {
        this.showScanConfirmation = this.camera === "off"
      }
    },

    async onDecode (content) {
    	this.pause()
    	const a = content.split(",");
      const credentials = {
        evaluatorid:a[0],
        username:a[1],
        password:a[2],
        campus:this.campus,
        campusid:this.campusid,
        type:this.type,
      }

   
     this.verify = false
     console.log(credentials)
     axios.post('/scan_qrcode',credentials)
     .then(res=>{
        if(res.data.status === 'success'){
              this.$swal({
                icon: 'success',
                title: 'Success!',
                showConfirmButton: false,
                timer: 1000
              })
              setTimeout(() => {
                   window.location='/evaluation-form?'+this.type+','+this.campus.replace(/ /g,'_')+'#'+this.campusid
                   this.unpause()
              },1500);
        }else{
           // this.verify = true
           if(res.data.status === 'done'){
              this.unpause()
                this.$swal({
                icon: 'warning',
                title: 'Evaluated Done!',
                showConfirmButton: false,
                timer: 1000
              })
            }else{
              console.log(res.data.status)
              this.unpause()
                this.$swal({
                icon: 'error',
                title: 'Incorrect QR code!',
                showConfirmButton: false,
                timer: 1000
              })
            }
            
        }
      })
      .catch(err=>{
            this.unpause()
            this.$swal({
            icon: 'error',
            title: 'Connection Error!',
            showConfirmButton: false,
            timer: 1000
          })
        })


    },

    unpause () {
      this.camera = 'auto'
    },

    pause () {
      this.camera = 'off'
    },

    timeout (ms) {
      return new Promise(resolve => {
        window.setTimeout(resolve, ms)
      })
    }
  }
}
</script>

<style scoped>
.scan-confirmation {
  position: absolute;
  width: 100%;
  height: 100%;

  background-color: rgba(255, 255, 255, .8);

  display: flex;
  flex-flow: row nowrap;
  justify-content: center;
}
</style>