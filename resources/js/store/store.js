import { createStore } from 'vuex'
// import createPersistedState from 'vuex-persistedstate'
import mutations from './mutation_types'
import subject from './subject'
import router from '@/router/router'

const auth = {
    namespaced: true,
    state: {
        info: {},
        isAuthenticated: false
    },
    getters: {
        isAuthenticated(state){
            return state.isAuthenticated
        },
        getName(state) {
            return state.info.name
        },
        getEmail(state) {
            return state.info.email
        },
        getPassword(state) {
            return state.info.password
        }
    },
    mutations,
    actions:{
        login({commit}, payload){
            axios.get('/api/login', {
                params: {
                    email: payload.email,
                    password: payload.password
                }
            }).then(({data})=>{
                if (data.status === 'success') {
                    commit('SET_USERINFO',data.info);
                    commit('SET_ISAUTHENTICATED',true)
                    router.push({name: 'dashboard'})
                } else {
                    alert(data.comment);
                }
            }).catch(({response:{data}})=>{
                console.log(data);
                commit('SET_USERINFO',{})
                commit('SET_ISAUTHENTICATED',false)
            })
        },
        logout({commit}){
            axios.get('/api/logout').then(({data})=>{
                console.log(data);
                if (data.status === 'success') {
                    commit('SET_USERINFO',{})
                    commit('SET_ISAUTHENTICATED',false)
                    router.push({name: 'login'})
                } else {
                    alert(data.comment);
                }
            }).catch(({response:{data}})=>{
                console.log(data);
            })
        }
    }
}

const store = createStore({
    // plugins: [
    //     createPersistedState()
    // ],
    modules: {
        auth: auth,
        subject: subject
    }
})

export default store;