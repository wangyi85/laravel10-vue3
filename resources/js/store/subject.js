import mutations from './mutation_types'

const subject = {
    namespaced: true,
    state: {
        subjects: []
    },
    getters: {
        getSubjects(state) {
            return state.subjects
        }
    },
    mutations,
    actions: {
        fetchSubjects({commit}, payload) {
            axios.get('/api/subject/get', {
                params: {
                    email: payload.email,
                    password: payload.password
                }
            }).then(({data}) => {
                if (data.status === 'success') {
                    commit('SET_SUBJECTS', data.subjects);
                } else {
                    alert(data.comment);
                }
            }).catch(({response: {data}}) => {
                console.log(data);
            });
        }
    }
}

export default subject;