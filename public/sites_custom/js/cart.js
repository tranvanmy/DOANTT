axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var cart = new Vue({
    el: '#cart_number',

    mounted: function () {
        this.getCart();
    },

    methods: {
        getCart: function() {
            axios.get('/cart').then((response) => {
                var cart = Object.keys(response.data)
                var count =  cart.length;
                $('#cart_number').text('(' + count + ')')
            });
        }
    }
});
