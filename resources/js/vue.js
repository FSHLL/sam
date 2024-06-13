import { createApp } from 'vue/dist/vue.esm-bundler.js'
import PrimeVue from 'primevue/config';
import router from './routes/router'
import { i18nVue } from 'laravel-vue-i18n'
import Theme from './components/Theme.vue'
import Aura from './presets/aura'

const app = createApp()

app.use(router)
app.use(i18nVue, {
    resolve: lang => {
        const langs = import.meta.glob('../../lang/*.json', { eager: true });

        return langs[`../../lang/${lang}.json`].default;
    },
})
app.use(PrimeVue, {
    unstyled: true,
    pt: Aura
});

app.component('theme', Theme)

app.mount('#app')
