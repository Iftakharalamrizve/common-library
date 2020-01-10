<template>
    <div>
        <li class="list-group-item">
            <div class="checkbox">
                <input v-model="completed" type="checkbox" class="completed"   @change="doneEdit"/>
                <label v-if="!editing" for="checkbox" @dblclick="editItem">
                    {{title}}
                </label>
                <input v-else type="text" class="form-control" v-model="title" @blur="doneEdit" @keyup.enter="doneEdit" @keyup.esc="cancelEdit" v-focus>
            </div>
            <div class="pull-right action-buttons" @click="removeItem(index)">
                <a  class="trash" ><span class="glyphicon glyphicon-trash"></span></a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        name: "ListItem",
        props:{
            item:{
                type: Object,
                required: true,
            },

            index:{
                type: Number,
                required: true
            },
            checkAll:{
                type:Boolean,
                required:true
            }

        },
        data(){
            return{
                id:this.item.id,
                title:this.item.title,
                completed:this.item.completed,
                editing:this.item.editing,
                beforeEdit:''
            }
        },
        directives: {
            focus: {
                inserted: function (el) {
                    el.focus()
                }
            }
        },
        watch: {
            checkAll() {
                this.completed = this.checkAll ? true : this.item.completed
            }
        },
        methods:{
            removeItem(index){
                this.$emit("removeItem",index);
            },
            editItem(){
                this.beforeEdit = this.title;
                this.editing = true;
            },
            doneEdit(){
                if(this.title.trim() == ""){
                    this.title = this.beforeEdit
                }
                this.editing=false;
                this.$emit("finishEdit",{id:this.id,title:this.title,'completed': this.completed,'editing': this.editing,'beforeEdit':''})
            },
            cancelEdit(){
                if(this.title.trim()==""){
                    return;
                }
                this.title=this.beforeEdit;
                this.editing = false;
            },
        }
    }
</script>

<style scoped>

</style>