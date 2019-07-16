<template>
    <div >
        <div id="content" style="margin:50px;min-height:77vh;min-width:88vh;">
            <!--breadcrumbs-->
            <div id="content-header">
                <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Subjects</router-link></div>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3" v-for="(subject,key) in lists" :key="key"> <router-link :to="`/Classrooms/${classroom_id}/results/${subject.id}`" > <i class="icon-user" ></i>{{ subject.subject_code }}</router-link><i ><strong style="font-weight:bolder;font-size:20px;color:white;"></strong></i></li>
                    </ul>
                </div>
            <!--End-Action boxes-->    
            </div>
        </div>  
    </div>
</template>
<script>
export default {
    data(){
        return{
            lists:[],
            classroom_id:'',
            errors:{},
        }
    },
    mounted(){
         this.getSubjects(this.$route.params.level_id , this.$route.params.classroom_id);
         this.classroom_id=this.$route.params.classroom_id
    //    let lists =  localStorage.getItem('lists');
    //    this.lists = JSON.parse(lists)
    },
    methods:{
        getSubjects(level_id,classroom_id){
            axios.post(`/teacher/dashboard/${level_id}/classrooms/${classroom_id}/getSubjects`)
            .then((response)=> {
                this.lists = response.data
                // console.log(response.data)
                // localStorage.setItem('lists',JSON.stringify(this.lists));
              
            })
            .catch((error)=> this.errors=error.response.data.errors)
        }
    }
}
</script>