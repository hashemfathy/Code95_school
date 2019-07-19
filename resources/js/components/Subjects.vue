<template>
    <div >
        <div id="content" style="margin:38px 220px;width:80%" >
            <!--breadcrumbs-->
            <div id="content-header">
                <div id="breadcrumb"> <router-link to="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Subjects</router-link></div>
            </div>
            <!--End-breadcrumbs-->
            <!--Action boxes-->
            <div class="container-fluid">
                <div class="quick-actions_homepage">
                    <ul class="quick-actions">
                        <li class="bg_lo span3" v-for="(subject,key) in subjects" :key="key"> <a :href="`/teacher/dashboard/levels/${level_id}/classrooms/${classroom_id}/subjects/${subject.id}`"><strong ><i class="icon-user" ></i> <i> {{ subject.subject_code }}</i></strong></a></li>
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
        subjects:{
            required:true
        },
        level_id:{
            required:true
        },
        classroom_id:{
            required:true
        }
    },
    
}
</script>