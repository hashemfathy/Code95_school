<template>
    <div >
        <div id="content" style="margin:50px;min-height:77vh;min-width:88vh;">
            <!--breadcrumbs-->
            <div id="content-header">
                <h1>Results</h1>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <!-- <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3" v-for="(student,key) in lists" :key="key"> <router-link :to="`/Classrooms/${classroom.level_id}/Subjects/${classroom.id}`" > <i class="icon-user" ></i>{{ classroom.name }}</router-link><i ><strong style="font-weight:bolder;font-size:20px;color:white;"></strong></i></li>
                    </ul>
                </div> -->
                 <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
                            </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                <th style="background-color:#DDD9CD;"><h4>Student name</h4></th>
                                <th style="background-color:#DDD9CD;"><h4>Degree</h4></th>
                                <th style="background-color:#DDD9CD;"><h4>full degree <span><input style="width:35px;height:15px;" type="number" @keypress.enter="updateFullDegree($event.target.value)" ></span></h4></th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX" v-for="(result,key) in results" :key="key">
                                    <td style="text-align:center;"><h5>{{result.student.user.name}}</h5></td>
                                    <td style="text-align:center;"><h5><input style="text-align:center;width:50px;" type="number" :value="result.degree" @keypress.enter="updateDegree($event.target.value,result.id)"></h5></td>
                                    <td style="text-align:center;width:200px;"><h5>{{result.full_degree}}</h5></td>
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
            classroom_id: null,
            subject_id: null,
        }
    },
    async mounted(){
        this.classroom_id = this.$route.params.classroom_id;
        this.subject_id = this.$route.params.subject_id;
        await this.getResults(this.classroom_id,this.subject_id);        
    },
    methods:{
        async getResults(classroom_id,subject_id){
            const response = await axios.get(`/teacher/dashboard/${classroom_id}/getResults/${subject_id}`);
            this.results = response.data.data;
            // console.log(response.data)
        },
        async updateDegree(degree, result_id){
            // console.log(e)
            const response = await axios.post(`/teacher/dashboard/Results/${result_id}`,{
                classroom_id: this.classroom_id,
                subject_id: this.subject_id,
                degree
            });
            this.results = response.data.data;
            console.log(response.data)
              
        },
        async updateFullDegree(full_degree){
            const response = await axios.post(`/teacher/dashboard/Results/updateFullDegree`,{
                classroom_id: this.classroom_id,
                subject_id: this.subject_id,
                full_degree
            });
            this.results = response.data.data;
            console.log(response.data)
        },
    }
}
</script>