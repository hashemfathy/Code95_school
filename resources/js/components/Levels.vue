<template>
  <div id="content" style="margin:38px 220px;width:80%" >
    <div style="min-height:500px;"  v-if="levels.length>0">
        <!--breadcrumbs-->
        <div id="content-header" >
            <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Levels</router-link></div>
        </div>
        <!--End-breadcrumbs-->
        <!--Action boxes-->
        <div class="container-fluid" style="margin-left:70px;">
            <div class="quick-actions_homepage">
                <ul class="quick-actions">
                    <li class="bg_lg span3 submenu" v-for="(level,key) in levels" :key="key" > <router-link :to="`/Classrooms/${level.id}`"> <i class="icon-user"></i>{{level.name}}</router-link><i ><strong style="font-weight:bolder;font-size:20px;color:white;"></strong></i></li>
                </ul>
            </div>
        <!--End-Action boxes-->    
        </div>
    </div>
  </div>
</template>
<script>
export default {
    props:{
        levels:{
            type:Array,
            required:true
        }
    },
    data(){
        return{
            lists:[],
            temp:{},
            errors:{},
        }
    },
}
</script>

