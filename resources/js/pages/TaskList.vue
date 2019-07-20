<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Component</div>

                    <div class="card-body">
                        <ul class="task-list">
                            <li class='list -addborder' v-for="task in taskList" :key="task.id">
                                <div class="contents">{{task.contents}}</div>
                            </li>
                        </ul>
                        <ul class="task-list">
                            <li class='list'>
                                <div>
                                    <input type="text" v-model="newTask">
                                    <button @click="addTask" class="btn btn-primary">+タスク追加</button>
                                </div>
                            </li>
                        </ul>
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
                taskList : 'aaaa',
                newTask: ''
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
            },
            async addTask(){
                const result = await axios.post('addTask', {
                    contents: this.newTask
                });

                this.newTask = '';
                this.getTaskList()
            }
        }
    }
</script>

<style lang="scss" scoped>
 .container {
    margin-top: 20px;
 }
 .task-list {
    color:red;
    > .list{
        list-style: none;
        margin-bottom: 5px;
        &.-addborder{
            border-bottom: 1px #9e9e9e solid;
            box-shadow: rgba(208, 208, 208, 0.509804) 1px 3px 10px -4px;
        }
    }
    > .list > .contents{
        color:black;
    }
 }
</style>


