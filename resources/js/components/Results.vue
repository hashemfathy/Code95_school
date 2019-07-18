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
                      <result-table></result-table>
                    </div>
                </div>
            </div>
            <!--End-Action boxes-->    
        </div>  
    </div>
</template>
<script>
import ResultTable from './ResultTable'

export default {
    components:{
        ResultTable,
    }
}
</script>


