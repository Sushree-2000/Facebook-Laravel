import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import firstVue from './components/pages/firstVue'
const routes = [
    {
        path: '/vue',
        component: 'firstVue'
    }
]



export default new Router({
    mode: 'history',
    routes
})
