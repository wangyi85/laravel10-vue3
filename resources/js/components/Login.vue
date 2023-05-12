<template>
    <div class="form">
        <h1>Log In</h1>
        <div class="field">
            <label for="email">Email:</label>
            <div class="inputDiv">
                <input
                    type="text"
                    id="email"
                    v-model="email"
                    required
                />
            </div>
        </div>
        <div class="field">
            <label for="password">Password:</label>
            <div class="inputDiv">
                <input
                    type="password"
                    id="password"
                    v-model="password"
                    required
                />
            </div>
        </div>
        <button @click="onLogin()">Submit</button>
    </div>
</template>
<script>
import axios from 'axios';
import { mapActions } from 'vuex';
import store from '@/store/store'

export default {
    name: 'login',
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        ...mapActions('auth', ['login']),
        onLogin() {
            store.dispatch('auth/login',
                {
                    email: this.email,
                    password: this.password
                }
            );
        }
    }
}
</script>
<style scoped>
.form {
    min-width: 50%;
    max-width: 1280px;
    align-self: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.field {
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    margin-top: 50px;
}

h1 {
    font-size: 50px;
    font-weight: bold;
    color: white;
}

label {
    font-size: 30px;
}

.inputDiv {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    padding: 10px 20px;
    border: 1px solid grey;
    border-radius: 10px;
}

input {
    width: 100%;
    background-color: transparent;
    border: none;
    color: white;
    font-size: 30px;
    display: inline-flex;
    justify-content: center;
}

input:focus {outline:none!important;}

button {
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: green;
    color: white;
    margin-top: 60px;
    padding-top: 15px;
    padding-bottom: 15px;
    font-size: 40px;
    border-radius: 10px;
    border: none;
}

button:hover {
    box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.3), 0 8px 24px 0 rgba(0, 0, 0, 0.24);
}

button:active {
    background-color: rgba(0, 255, 0, 0.6);
}

</style>