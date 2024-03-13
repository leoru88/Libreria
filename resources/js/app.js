import { createApp } from 'vue';
import Date from './views/Date/Date.vue';
import Act from './views/Act/Act.vue';
import Organize from './views/Organize/Organize.vue';

createApp(Date).mount("#app");
createApp(Act).mount("#act");
createApp(Organize).mount("#org")
