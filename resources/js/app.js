require('./bootstrap')
import Vue from 'vue'

import { App, plugin } from '@inertiajs/inertia-vue'

Vue.use(plugin)

const app = document.getElementById('app')

const pages = {
    'Auth/Login': require('./Pages/Auth/Login.vue').default,
    'MainPage': require('./Pages/MainPage.vue').default,

}

new Vue({
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => pages[name],
        },
    }),
}).$mount(app)
