import Vue from "vue";
import  Vuex from "vuex"
import axios from 'axios'



Vue.use(Vuex);
axios.defaults.baseURL = 'http://localhost:8000/api/'

export  const store = new Vuex.Store({
    state:{
        token: localStorage.getItem('access_token') || null,
        filter:"all",
        Lists:[
            {id:1,title:"THis is first Title",completed:true,editing:false,beforeEdit:''},
            {id:2,title:"THis is second Title",completed:false,editing:false,beforeEdit:''},
            {id:3,title:"THis is Third Title",completed:false,editing:false,beforeEdit:''}
        ],
    },
    getters:{
        loggedIn(state) {
            return state.token !== null
        },
        retrieveToken(state, token) {
            state.token = token
        },
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
    actions:{
        retriveToken(context,data){
              return new Promise((resolve, reject) => {
                axios.post('/login', {username: data.username,password: data.password,})
                    .then(response => {
                        const token = response.data.access_token;
                        localStorage.setItem('access_token', token);
                        context.commit('retrieveToken', token);
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error)
                    })
            })
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