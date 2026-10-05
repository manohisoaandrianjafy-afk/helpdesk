<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
const route = useRoute();
const idTicket = route.params.id;
</script>

<template>
    <div>
        <h1>Modifier mon ticket</h1>
        <form @submit.prevent="modifierTicket">
            <p>Nom: <input type="text" v-model="nom"></p>
            <p>Description : <input type="Description" v-model="description"></p>
            <p>Statut :
                <select v-model="statut">
                    <option>OPEN</option>
                    <option>IN_PROGRESS</option>
                    <option>RESOLVED</option>
                    <option>CLOSED</option>
                </select>
            </p>
            <p>Priorite :
                <select v-model="priorite">
                    <option>LOW</option>
                    <option>MEDIUM</option>
                    <option>HIGH</option>
                    <option>URGENT</option>
                </select>
            </p>
            <button type="submit">Valider</button>
        </form>
    </div>
</template>
