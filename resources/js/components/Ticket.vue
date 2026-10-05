<script setup>
import { ref, onMounted } from 'vue';

const tickets = ref([]);

// function getTickets() {
//     const token = localStorage.getItem('token');
//     fetch('/api/tickets', {
//         method: 'GET',
//         headers: {
//             'Accept': 'application/json',
//             'Authorization': `Bearer ${token}`
//         }
//     })
//         .then(response => response.json())
//         .then(data => {
//             console.log('Tickets :', data);
//             tickets.value = data;
//         });
// }


onMounted(async () => {
    try {
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
                tickets.value = data;
            });

    } catch (error) {
        console.error(error);
    }
});
async function deleteTicket(id) {
    const token = localStorage.getItem('token');

    const response = await fetch(`/api/deleteTicket/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${token}`
        }
    });

    const data = await response.json();
    console.log(data);
}

</script>

<template>
    <div v-if="tickets.length > 0">
        <h2>Mes tickets</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Priorite</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ticket in tickets" :key="ticket.id">
                    <td>{{ ticket.nom }}</td>
                    <td>{{ ticket.description }}</td>
                    <td>{{ ticket.statut }}</td>
                    <td>{{ ticket.priorite }}</td>
                    <td><button @click="deleteTicket(ticket.id)">Supprimer</button><br>
                        <router-link :to="`/formTicket/${ticket.id}`">Modifier</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p v-else>Aucun ticket trouvé.</p>
</template>

<style scoped>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}
</style>