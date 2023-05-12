<template>
    <div class="panel">
        <div class="message">
            <h1>Welcome <span>{{ getName }}</span>, <a @click="logout">Logout</a> </h1>
        </div>
        <div class="subject">
            <h2>Subjects: </h2>
            <ul>
                <li v-for="item in getSubjects">{{ item }}</li>
            </ul>
        </div>
    </div>
</template>
<script>
import store from '@/store/store'
import { mapActions, mapGetters } from 'vuex';
export default {
    data() {
        return {
            isFetching : true
        }
    },
    mounted() {
        if (!store.getters['auth/isAuthenticated']) {
            router.push('/login');
        } else {
            store.dispatch('subject/fetchSubjects', {
                email: store.getters['auth/getEmail'],
                password: store.getters['auth/getPassword']
            })
        }
    },
    computed: {
        ...mapGetters('auth', ['getName', 'isAuthenticated']),
        ...mapGetters('subject', ['getSubjects'])
    },
    methods: {
        ...mapActions('auth', ['logout']),
        logout() {
            store.dispatch('auth/logout');
        }
    }
}
</script>
<style scoped>
.panel {
    min-width: 80%;
    max-width: 1280px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.message {
    width: 100%;
    padding: 20px 30px;
    border: 1px solid white;
    border-radius: 10px;
}

.message h1 {
    font-size: 40px;
    color: white;
    text-align: center;
}

.message h1 span {
    font-size: 50px;
    font-weight: 800;
}

a {
    text-decoration: underline;
    color: grey;
    margin-right: 100px;
}

.subject {
    margin-top: 40px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: flex-start;
}

.subject h2 {
    font-size: 40px;
    font-style: italic;
}

ul {
    margin-left: 50px;
}

li {
    font-size: 30px;
    color: white;
    font-weight: bold;
}
</style>