<template>
    <div >
          <div id="content" style="margin:38px 220px;width:80%" >
            <!--breadcrumbs-->
            <div id="content-header">
                <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Classrooms</router-link></div>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3" style="font-weight:bolder;font-size:74px;color:white;" v-for="(classroom,key) in classrooms.classrooms" :key="key"><a :href="`/teacher/dashboard/levels/${classroom.level_id}/classrooms/${classroom.id}`"><strong ><i class="icon-user" ></i> <i> {{ classroom.name }}</i></strong></a></li>
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
        classrooms:{
            required:true
        }
    },
    
}
</script>