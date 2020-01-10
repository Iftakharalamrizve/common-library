<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row mr-2">
                                <div class="col-md-10">
                                    <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?" v-model="listTitle" @keyup.enter="addList">
                                </div>
                                <div class="col-md-2">
                                    <button @click="addList" class="btn btn-primary font-weight-bold ">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <list-item v-for="(list,index) in filterLists" :key="list.id" :item="list" :index="index" :checkAll="!anyRemaining" ></list-item>
                            </ul>
                        </div>
                        <div class="panel-footer mt-3 me-5">
                            <div class="pull-left">
                                <input type="checkbox" @change="checkedAll" :checked="!anyRemaining"> Check All
                            </div>
                            <div class="pull-right">
                                {{remaining}}Total item
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <button :class="{ active: filter == 'all' }" @click="filter = 'all'">All</button>
                                    <button :class="{ active: filter == 'active' }" @click="filter = 'active'">Active</button>
                                    <button :class="{ active: filter == 'completed' }" @click="filter = 'completed'">Completed</button>
                                </div>
                                <div v-if="showClearButton" class="pull-right" @click="clearCompleted">
                                    <button>Clear completed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ListItem from "./todo/ListItem";
    export default {
        name: "TodoList",
        components: {ListItem},
        data(){
            return{
                name:"Todo List",
                ListId:4,
                listTitle:'',
                filter:"all",
                Lists:[
                    {id:1,title:"THis is first Title",completed:true,editing:false,beforeEdit:''},
                    {id:2,title:"THis is second Title",completed:false,editing:false,beforeEdit:''},
                    {id:3,title:"THis is Third Title",completed:false,editing:false,beforeEdit:''}
                ],
            }
        },
        directives: {
            focus: {
                inserted: function (el) {
                    el.focus()
                }
            }
        },
        created() {
            enventBus.$on("removeItem",(index)=>this.removeItem(index));
            enventBus.$on("finishEdit",(data)=>this.finishEdit(data));
        },
        computed:{
            remaining(){
                return this.Lists.filter(item=> !item.completed ).length;
            },
            anyRemaining(){
                return  this.remaining != 0;
            },
            filterLists(){
                if(this.filter=="all"){
                    return this.Lists;
                }
                if(this.filter=="active"){
                    return this.Lists.filter(item=>!item.completed);
                }
                if(this.filter=="completed"){
                    return this.Lists.filter(item=>item.completed);
                }
            },
            showClearButton(){
                return this.Lists.filter(item=>item.completed).length>0;
            }
        },
        methods:{
            addList(){
                //after enter blank space it's prevent to push object
                if(this.listTitle.trim().length==0){
                    return;
                }
                this.Lists.push({id:this.ListId,title:this.listTitle,completed:false,editing:false,beforeEdit:''});
                this.listTitle="";
                this.ListId++;
            },

            finishEdit(data){
                const index = this.Lists.findIndex((item) => item.id == data.id)
                this.Lists.splice(index, 1, data)
            },
            checkedAll(){
                this.Lists.forEach((todo) => todo.completed = event.target.checked)
            },
            clearCompleted() {
                this.Lists = this.Lists.filter(item => !item.completed)
            },
            removeItem(index){
                this.Lists.splice(index, 1)
            }

        }
    }
</script>

<style scoped>
    .trash { color:rgb(209, 91, 71); }
    .flag { color:rgb(248, 148, 6); }
    .panel-body { padding:0px; }
    .panel-footer .pagination { margin: 0; }
    .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
    .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
    .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
    .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
    .list-group { margin-bottom:0px; }
    .completed{text-decoration: line-through;color: gray}
    .active {
        background: lightgreen;
    }
</style>