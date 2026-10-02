<script setup>
import { ref } from 'vue';
const email = ref('');
const password = ref('');
// import { useRouter } from "vue-router";
// const router = useRouter();

function login() {
    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            email: email.value,
            password: password.value
        })
    })
        .then(response => response.json())
        .then(data => {
            console.log('Utilisateur :', data.user);
            console.log('Token reçu :', data.token);
            localStorage.setItem('token', data.token);
            // router.push("/tickets");
            window.location.href = '/tickets';
        });
}

</script>

<template>
    <input type="email" v-model="email">
    <input type="password" v-model="password">
    <p>Email : {{ email }}</p>
    <p>Password : {{ password }}</p>
    <button @click="login">Se connecter</button>
</template>

<style>
input {
    border: 1px solid black;
    padding: 8px;
    margin: 5px;
}
</style>