//---------------------------------------------------
//all import path
//--------------------------------------------------------
import Vue from 'vue';
import Router from 'vue-router';
import TodoList from "./components/TodoList";
import Dashboard from "./components/Dashboard";





Vue.use(Router);

export default new Router({
    routes: [
        {path:'/',component:Dashboard},
        {path:'/todo-list',component:TodoList}
    ],
    mode: `history`,
});
