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
        statusSearch: {'status': ''},
        totalOrder: null,
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
        $('#paginationSearchStatus').hide();
    },

    methods: {
        getCookings: function(page){
            axios.get('/admin/order?page=' + page).then((response) => {
                console.log(response.data.data.total);
                this.totalOrder = response.data.data.total;
                this.$set(this, 'orders', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            });
        },

        showOrder: function(order) {
            axios.get('/order/show/' + order.id).then((response) => {
                this.orderDetails = response.data;
                this.order = order;
            });

            $('#show-order').modal('show');
        },

        searchChange: function(page)
        {
            if(this.statusSearch.status == 3) {
                this.getCookings();
            } else {
                var authOptions = {
                    method: 'get',
                    url: '/admin/search/statusOder?page=' + page,
                    params: this.statusSearch.status,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    json: true
                }
                axios(authOptions).then(response => {
                    $('#paginationIndex').hide();
                    $('#paginationSearchStatus').show();
                    this.totalOrder = response.data.data.total;
                    this.$set(this, 'orders', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                })
            }
        },

        updateStatus: function(order) {
            axios.put('/order/show/' + order.id, {'status': order.status}).then((response) => {
            });
        },

        close: function() {
            $('#show-order').modal('hide');
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getCookings(page);
        },

        changePageStatus: function (page) {
            this.pagination.current_page = page;
            this.searchChange(page);
        }
    }
});
