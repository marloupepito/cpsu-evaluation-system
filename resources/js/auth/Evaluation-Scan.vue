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
      verify:false
    }
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
        username:a[0],
        password:a[1],
      }

   
     this.verify = false
     axios.post('/scan_qrcode',credentials)
     .then(res=>{
        if(res.data.status === 'success'){
            window.location='/evaluation-form'
             this.unpause()
        }else{
            this.verify = true
            this.unpause()
        }
      })
      .catch(err=>{
            this.verify = true  
            this.unpause()
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