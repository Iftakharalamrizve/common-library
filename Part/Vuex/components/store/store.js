import Vue from "vue";
import  Vuex from "vuex"

Vue.use(Vuex);

export  const store = new Vuex.Store({
    state:{
        filter:"all",
        Lists:[
            {id:1,title:"THis is first Title",completed:true,editing:false,beforeEdit:''},
            {id:2,title:"THis is second Title",completed:false,editing:false,beforeEdit:''},
            {id:3,title:"THis is Third Title",completed:false,editing:false,beforeEdit:''}
        ],
    },
    getters:{
        remaining(state){
            return state.Lists.filter(item=> !item.completed ).length;
        },
        anyRemaining(state){
            return  state.Lists.filter(item=> !item.completed ).length != 0;
        },
        filterLists(state){
            if(state.filter=="all"){
                return state.Lists;
            }
            if(state.filter=="active"){
                return state.Lists.filter(item=>!item.completed);
            }
            if(state.filter=="completed"){
                return state.Lists.filter(item=>item.completed);
            }
        },
        showClearButton(state){
            return state.Lists.filter(item=>item.completed).length>0;
        }
    },
    mutations:{
        addItem(state,payload){
            state.Lists.push(payload);
        },
        editItem(state,payload){
            const index = state.Lists.findIndex((item) => item.id == payload.id)
            state.Lists.splice(index, 1, payload)
        },
        removeItem(state,payload){
            state.Lists.splice(payload, 1);
        }
    }
});