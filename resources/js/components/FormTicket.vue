<script setup>
import { ref, onMounted } from 'vue';

const nom = ref('');
const description = ref('');
const statut = ref('');
const priorite = ref('');
const token = localStorage.getItem('token');
const categories = ref([]);
const selectedCategorie = ref(null);

onMounted(async () => {
    try {
        fetch('/api/categories', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log('Categories :', data);
                categories.value = data;
            });
    } catch (error) {
        console.error(error);
    }
});

const creationTicket = async () => {
    try {
        const response = await fetch(`/api/creationTicket`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                nom: nom.value,
                description: description.value,
                statut: statut.value,
                priorite: priorite.value,
                category_id: selectedCategorie.value,
            })
        });
        const data = await response.json();
        window.location.href = '/tickets';
    } catch (error) {
        console.error(error);
    }

};
</script>

<template>
    <div>
        <h1>Creation Ticket</h1>
        <form @submit.prevent="creationTicket">
            <p>Nom: <input type="text" v-model="nom"></p>
            <p>Description : <input type="Description" v-model="description"></p>
            <p>Statut :
                <select v-model="statut">
                    <option>Tous les status</option>
                    <option>OPEN</option>
                    <option>IN_PROGRESS</option>
                    <option>RESOLVED</option>
                    <option>CLOSED</option>
                </select>
            </p>
            <p>Priorite :
                <select v-model="priorite">
                    <option>Tous les priorites</option>
                    <option>LOW</option>
                    <option>MEDIUM</option>
                    <option>HIGH</option>
                    <option>URGENT</option>
                </select>
            </p>
            <p>Categorie :
                <select v-model="selectedCategorie">
                    <option :value="null">Tous les categories</option>
                    <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id">
                        {{ categorie.nom }}
                    </option>
                </select>
            </p>
            <button type="submit">Valider</button>
        </form>
    </div>
</template>
