require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('articles', require('./components/Articles.vue').default);
Vue.component('Navbar', require('./components/Navbar.vue').default);
Vue.component('wiki', require('./components/App.vue').default);


Vue.component(
	'articles', 
	require('./components/Articles.vue').default
);

const app = new Vue({
	el: '#app',
});