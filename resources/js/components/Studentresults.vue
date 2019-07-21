<template>
    <div >
        <div id="content" style="margin:38px 220px;width:80%" >
            <!--breadcrumbs-->
            <div id="content-header">
                <h1>Results</h1>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                 <div class="row-fluid">
                    <div class="span12">
                          <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#DDD9CD;"><h4>Subject</h4></th>
                                            <th style="background-color:#DDD9CD;"><h4>Degree</h4></th>
                                            <th style="background-color:#DDD9CD;"><h4>full degree</h4></th>
                                            <th style="background-color:#DDD9CD;"><h4>Status</h4></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX" v-for="(result,key) in results" :key="key">
                                            <td style="text-align:center;"><h5>{{result.subject.subject_code}}</h5></td>
                                            <td style="text-align:center;" ><h5>{{result.degree}}</h5></td>
                                            <td style="text-align:center;width:200px;"><h5 >{{result.full_degree}}</h5></td>
                                            <td style="text-align:center;width:200px;" :class="successClass(result.status)"><h5>{{result.status}}</h5></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End-Action boxes-->    
        </div>  
    </div>
</template>
<script>
export default {
    data(){
        return{
            errors:{},
            results:[],
            temp:'',
        }
    },
    async mounted(){
        await this.getResults(this.$route.params.level);        
    },
    methods:{
        async getResults(level){
            const response = await axios.get(`/student/dashboard/${level}/results`);
            this.results = this.temp = response.data;
            console.log(response.data)
        },
        successClass(status) {
            return status === 'succeed' ? 'green' : 'red'
        }  
    }    
}
</script>
<style>
.green {
    background-color: green;
    color:honeydew;
}
.red {
    background-color: red;
    color:honeydew;
}
</style>