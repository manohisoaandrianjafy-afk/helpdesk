import { createApp } from 'vue';
import App from './components/App.vue';
import Ticket from './components/Ticket.vue';
import FormTicket from './components/FormTicket.vue';

createApp(App).mount('#app');
createApp(Ticket).mount('#ticket');
createApp(FormTicket).mount('#formTicket');
