<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Component</div>

                    <div class="card-body">
                        {{taskList}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data(){
            return {
                taskList : 'aaaa'
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getTaskList()
        },
        methods:{
            async getTaskList(){
                 const result= await axios.get('getTaskList')

                 this.taskList = result.data;
            }
        }
    }
</script>
