axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#manage-order',

    data: {
        orders: [],
        order:'',
        statusOrder: '',
        orderDetails: '',
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },
        offset: 4,

    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    mounted : function(){
        this.getCookings(this.pagination.current_page);
    },

    methods: {
        getCookings: function(page){
            axios.get('/order/sell?page=' + page).then((response) => {
                console.log(response)
                this.$set(this, 'orders', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            });
        },

        showOrder: function(order) {
            axios.get('/order/show/' + order.id).then((response) => {
                console.log(response)
                this.orderDetails = response.data;
                this.order = order;
            });

            $('#show-order').modal('show');
        },

        updateStatus: function(order) {
            console.log(order.status)
            axios.put('/order/show/' + order.id, {'status': order.status}).then((response) => {
                console.log(response)

            });
        },

        close: function() {
            $('#show-order').modal('hide');
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getCookings(page);
        }
    }
});
