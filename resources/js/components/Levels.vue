<template>
    <div >
        <div id="content" style="margin:38px 220px;width:80%" >
            <!--breadcrumbs-->
            <div id="content-header">
                <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Levels</router-link></div>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lg span3 submenu" v-for="(level,key) in temp" :key="key" > <router-link :to="`/Classrooms/${level.id}`"> <i class="icon-user"></i>{{level.name}}</router-link><i ><strong style="font-weight:bolder;font-size:20px;color:white;"></strong></i></li>
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
            temp:{},
            errors:{},
        }
    },
    mounted(){
        axios.post('/teacher/dashboard/getLevels')
            .then((response)=> this.temp = response.data)
            .catch((error)=> this.errors=error.response.data.errors)
    },
    methods:{
        
    }
}
</script>

