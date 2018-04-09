axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var cart1 = new Vue({
    el: '#main-cart',
    data: {
        cookings: '',
        cart: '',
    },

    computed: {
        total: function() {
            var total = 0;
            if (this.cookings) {
                for (var i = this.cookings.length - 1; i >= 0; i--) {
                    total += this.cookings[i].price * this.cart[this.cookings[i].id];
                }
            }

            return total;
        }
    },

    mounted: function () {
        this.getCart();
    },

    methods: {
        getCart: function() {
            axios.get('/show/cart').then((response) => {
                this.cookings = response.data.cookings;
                this.cart = response.data.cart;
                console.log(response)
            });
        },

        updateCart: function(cooking_id) {
            var cooking = {'cooking': cooking_id, 'quantity': this.cart[cooking_id]}
            console.log(this.cart[cooking_id]);
            axios.post('/cart', cooking).then((response) => {

                // this.cookings = response.data.cookings;
                // this.cart = response.data.cart;
                console.log(response)
                // console.log(this.cart['76'])
            });
        },

        deleteCart: function(cooking_id) {
            axios.delete('/cart/' + cooking_id).then((response) => {
                this.cookings = response.data.cookings;
                this.cart = response.data.cart;
                console.log(response)
                window.cart.getCart();
                // console.log(this.cart['76'])
            });
        }
    }
});
