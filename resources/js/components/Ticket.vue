<script setup>
function getTickets() {
    const token = localStorage.getItem('token');
    fetch('/api/tickets', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    })
        .then(response => response.json())
        .then(data => {
            console.log('Tickets :', data);
        });
}


</script>

<template>
    <button @click="getTickets">Mes tickets</button>
</template>

<style>
input {
    border: 1px solid black;
    padding: 8px;
    margin: 5px;
}
</style>