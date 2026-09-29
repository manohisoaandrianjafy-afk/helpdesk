### configuration vue
    -npm install vue
    -npm install -D @vitejs/plugin-vue
    -importer :import vue from '@vitejs/plugin-vue'; dans vite.connfig.js

### ref
    surveille le changement d'une variable
        ref()
            -.value permet de modifier la valeur d'un ref
    exemple
```vue
        <script setup>
            import { ref } from 'vue';
            const message = ref('Coucou');
            function changerMessage() {
            message.value = 'Bienvenue sur mon HelpDesk !';
        }
        </script>

        <template>
            <h1>{{ message }}</h1>
            <button @click="changerMessage">Changer le message</button>
            <input type="email">
            <input type="password">
        </template>
```

### localStorage
    permet de conserver une donnée dans le navigateur 