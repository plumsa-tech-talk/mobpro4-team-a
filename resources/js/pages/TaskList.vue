<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Component</div>

                    <div class="card-body">
                        <ul class="task-list">
                            <li class='list -addborder' v-for="(task, index) in taskList" :key="task.id">
                                <div class="contents">
                                    {{task.contents}}
                                    <button @click="showUpdateInput(index)" class="btn btn-primary">変更</button>
                                </div>
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
                <div v-if="isUpdate" class="card">
                    <div class="card-body">
                        <input type="text" v-model="changeTask.contents" />
                        <button @click="updateTask()" class="btn btn-primary">保存</button>
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
                newTask: '',
                isUpdate: false,
                changeTask: ''
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
            },
            showUpdateInput(index) {
                this.isUpdate = true
                this.changeTask = this.taskList[index]
            },
            async updateTask() {
                await axios.put('updateTask', {
                    id: this.changeTask.id,
                    contents: this.changeTask.contents
                })
                .catch(error => console.error())

                this.isUpdate = false
            },
            async deleteTask(task_id){
                const result = await axios.post('deleteTask', {
                    id: task_id
                })

                this.taskList = result.data
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
