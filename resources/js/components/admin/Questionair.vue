<template lang="">
    <div>
        <div id="accordion" class="accordion rounded pb-2 overflow-hidden">
        <b-card class="bg-gray-800 border-0 rounded-0" no-body>
            <b-card-header header-tag="header" class="card-header bg-white pointer-cursor px-3 py-10px align-items-center">
           
            <div class="row">
                <div class="col-md-11 col-10"  v-b-toggle.accordion1>
                    <i class="fa fa-circle fa-fw text-blue fs-8px me-2"></i> <b>Commitment</b>
                </div>
                <div class="col-md-1 col-2">
                        <button class="btn btn-primary btn-xs">Save</button>
                </div>
            </div>
            </b-card-header>
            <b-collapse id="accordion1" accordion="my-accordion">
            <b-card-body class="bg-white pb-0">
                <b>Question 1:</b>
                <textarea v-model="q1" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 2:</b>
                <textarea v-model="q2" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 3:</b>
                <textarea v-model="q3" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 4:</b>
                <textarea v-model="q4" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white">
                <b>Question 5:</b>
                <textarea v-model="q5" class="form-control" rows="3"></textarea>
           </b-card-body>
            </b-collapse>
        </b-card>
        </div>



         <div id="accordion" class="accordion rounded pb-2 overflow-hidden">
        <b-card class="bg-gray-800 border-0 rounded-0" no-body>
            <b-card-header header-tag="header" class="card-header bg-white pointer-cursor px-3 py-10px align-items-center">
           
            <div class="row">
                <div class="col-md-11 col-10"  v-b-toggle.accordion2>
                    <i class="fa fa-circle fa-fw text-red fs-8px me-2"></i> <b>Knowledge of Subject</b>
                </div>
                <div class="col-md-1 col-2">
                        <button class="btn btn-primary btn-xs">Save</button>
                </div>
            </div>
            </b-card-header>
            <b-collapse id="accordion2" accordion="my-accordion">
            <b-card-body class="bg-white pb-0">
                <b>Question 1:</b>
                <textarea v-model="q6" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 2:</b>
                <textarea v-model="q7" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 3:</b>
                <textarea v-model="q8" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 4:</b>
                <textarea v-model="q9" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white">
                <b>Question 5:</b>
                <textarea v-model="q10" class="form-control" rows="3"></textarea>
           </b-card-body>
            </b-collapse>
        </b-card>
        </div>


         <div id="accordion" class="accordion rounded pb-2 overflow-hidden">
        <b-card class="bg-gray-800 border-0 rounded-0" no-body>
            <b-card-header header-tag="header" class="card-header bg-white pointer-cursor px-3 py-10px align-items-center">
           
            <div class="row">
                <div class="col-md-11 col-10"  v-b-toggle.accordion3>
                    <i class="fa fa-circle fa-fw text-green fs-8px me-2"></i> <b>Teaching for Independent Learning</b>
                </div>
                <div class="col-md-1 col-2">
                        <button class="btn btn-primary btn-xs">Save</button>
                </div>
            </div>
            </b-card-header>
            <b-collapse id="accordion3" accordion="my-accordion">
            <b-card-body class="bg-white pb-0">
                <b>Question 1:</b>
                <textarea v-model="q11" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 2:</b>
                <textarea v-model="q12" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 3:</b>
                <textarea v-model="q13" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 4:</b>
                <textarea v-model="q14" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white">
                <b>Question 5:</b>
                <textarea v-model="q15" class="form-control" rows="3"></textarea>
           </b-card-body>
            </b-collapse>
        </b-card>
        </div>


         <div id="accordion" class="accordion rounded overflow-hidden">
        <b-card class="bg-gray-800 border-0 rounded-0" no-body>
            <b-card-header header-tag="header" class="card-header bg-white pointer-cursor px-3 py-10px align-items-center">
           
            <div class="row">
                <div class="col-md-11 col-10"  v-b-toggle.accordion4>
                    <i class="fa fa-circle fa-fw text-yellow fs-8px me-2"></i><b> Management of Learning</b>
                </div>
                <div class="col-md-1 col-2">
                        <button class="btn btn-primary btn-xs">Save</button>
                </div>
            </div>
            </b-card-header>
            <b-collapse id="accordion4" accordion="my-accordion">
            <b-card-body class="bg-white pb-0">
                <b>Question 1:</b>
                <textarea v-model="q16" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 2:</b>
                <textarea v-model="q17" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 3:</b>
                <textarea v-model="q18" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white pb-0">
                <b>Question 4:</b>
                <textarea v-model="q19" class="form-control" rows="3"></textarea>
           </b-card-body>
           <b-card-body class="bg-white">
                <b>Question 5:</b>
                <textarea v-model="q20" class="form-control" rows="3"></textarea>
           </b-card-body>
            </b-collapse>
        </b-card>
        </div>
    </div>
</template>
<script>
export default {
    data: () => ({
      q1:null,
      q2:null,
      q3:null,
      q4:null,
      q5:null,
      q6:null,
      q7:null,
      q8:null,
      q9:null,
      q10:null,
      q11:null,
      q12:null,
      q13:null,
      q14:null,
      q15:null,
      q16:null,
      q17:null,
      q18:null,
      q19:null,
      q20:null,
    }),
}
</script>
<style lang="">
    
</style>