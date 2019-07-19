<template>
    <div class="widget-box">
        <div class="widget-content nopadding">
            <input style="margin:10px;" type="text" placeholder="search student" v-model="searchStudent">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th style="background-color:#DDD9CD;"><h4>Student name</h4></th>
                        <th style="background-color:#DDD9CD;"><h4>Degree</h4></th>
                        <th style="background-color:#DDD9CD;"><h4>full degree <span>
                            <input style="width:35px;height:15px;" type="number" min=1 @keypress.enter="updateFullDegree($event.target.value)" ></span></h4></th>
                        <th style="background-color:#DDD9CD;"><h4>Status</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX" v-for="(student,key) in filteredStudents" :key="key">
                        <td style="text-align:center;"><h5>{{student.user.name}}</h5></td>
                        <td style="text-align:center;" >
                        <h5><input type="number" min="0" :max="fullDegree(student.results)" style="text-align:center;width:50px;" :value="degree(student.results)" 
                            @keypress.enter="updateDegree($event.target.value,student.id)">
                            <b style="color:#66ea41;"  v-if="saved === student.id">saved</b>
                        </h5>
                        </td>
                        <td style="text-align:center;width:200px;"><h5 >{{fullDegree(student.results)}}</h5></td>
                        <td style="text-align:center;width:200px;" :class="successClass(status(student.results))"><h5>{{status(student.results)}}</h5></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            errors:{},
            students:[],
            saved:false,
            // classroom_id: null,
            // subject_id: null,
            searchStudent:'',
            temp:'',
        }
    },
    computed:{
        filteredStudents:function(){
            return this.students.filter((student)=>{
                return student.user.name.toLowerCase().match(this.searchStudent.toLowerCase());
            })
        } 
    },
    props:{
        subject_id:{
            required:true
        },
        level_id:{
            required:true
        },
        classroom_id:{
            required:true
        }
    },
    async mounted(){
        await this.getStudents(this.classroom_id,this.subject_id);        
    },
    methods:{
        async getStudents(classroom_id,subject_id){
            const response = await axios.get(`/teacher/dashboard/classrooms/${classroom_id}/subjects/${subject_id}`);
            this.students = this.temp = response.data;
            console.log(response.data)
        },
        async updateDegree(degree,student){
            // console.log(student);
            const response = await axios.post(`/teacher/dashboard/Results/${student}`,{
                classroom_id: this.classroom_id,
                subject_id: this.subject_id,
                degree
            });
            this.students = response.data;
            this.saved = student;
            var self = this;
            setTimeout(function(){
                self.saved = false;
            }, 1000);
            // console.log(response.data)
        },
        async updateFullDegree(full_degree){
            const response = await axios.post(`/teacher/dashboard/Results/updateFullDegree`,{
                classroom_id: this.classroom_id,
                subject_id: this.subject_id,
                full_degree
            });
            this.students = response.data;
            // console.log(response.data)
        },
        degree(results) {
           
            return results.length ? results[0].degree : null;
        },
        fullDegree(results){
            return results.length ? results[0].full_degree : null;
        },
        status(results){
           return results.length ? results[0].status : null; 
        },
        successClass(result) {
            return result === 'succeed' ? 'green' : 'red'
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