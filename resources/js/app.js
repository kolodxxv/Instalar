import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import FollowButtonComponent from './components/FollowButton.vue';
import NavbarComponent from './components/Navbar.vue';
import ModalComponent from './components/Modal.vue';

app.component('follow-button', FollowButtonComponent);
app.component('sidenav', NavbarComponent);
app.component('modal-notify', ModalComponent)


app.mount('#app');
