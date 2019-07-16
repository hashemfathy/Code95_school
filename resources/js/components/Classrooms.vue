<template>
    <div >
        <div id="content" style="margin:50px;min-height:77vh;min-width:88vh;">
            <!--breadcrumbs-->
            <div id="content-header">
                <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Classrooms</router-link></div>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3" v-for="(classroom,key) in lists.classrooms" :key="key"> <router-link :to="`/Classrooms/${classroom.level_id}/Subjects/${classroom.id}`" > <i class="icon-user" ></i>{{ classroom.name }}</router-link><i ><strong style="font-weight:bolder;font-size:20px;color:white;"></strong></i></li>
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
            lists:"",
            errors:{},
        }
    },
    mounted(){
        this.getClassrooms(this.$route.params.id);
    //    let lists =  localStorage.getItem('lists');
    //    this.lists = JSON.parse(lists)
    },
    methods:{
        getClassrooms(id){
            axios.post(`/teacher/dashboard/${id}/getClassrooms`)
            .then((response)=> {
                this.lists = response.data
                console.log(response.data)
                // localStorage.setItem('lists',JSON.stringify(this.lists));
              
            })
            .catch((error)=> this.errors=error.response.data.errors)
        }
    }
}
</script>