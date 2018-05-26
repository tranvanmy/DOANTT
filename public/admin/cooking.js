axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#manage-vue',

    data: {
        cookings: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },
        offset: 4,
        search: 1,
        show: [],
        fillSearch: {'name':''},
        statusSearch: {'status': ''},
        fillItem: [], 
        formErrors: {},
        formErrorsUpdate: {},
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
        $('#paginationSearchName').hide();
        $('#paginationSearchStatus').hide();
        this.getCookings(this.pagination.current_page);
    },

    methods: {

        getCookings: function(page){
            axios.get('/admin/cooking?page=' + page).then((response) => {
                this.totalOrder = response.data.data.total;

                this.$set(this, 'cookings', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            });
        },

        showCooking: function(cooking) {
            this.show = cooking;

            $('#center_modal').modal('show');
        },

        editCooking: function(cooking){
            this.fillItem = cooking;
            $("#edit-item").modal('show');
        },

        searchChange: function (page)
        {
            var authOptions = {
                method: 'get',
                url: '/admin/search/statusCooking?page=' + page,
                params: this.statusSearch.status,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                json: true
            }
            axios(authOptions).then(response => {
                $('#paginationIndex').hide();
                $('#paginationSearchName').hide();
                $('#paginationSearchStatus').show();
                this.totalOrder = response.data.data.total;

                this.$set(this, 'cookings', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },

        searchName: function (page)
        {
            var authOptions = {
                method: 'get',
                url: '/admin/search/nameCooking?page=' + page,
                params: this.fillSearch.name,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                json: true
            }
            axios(authOptions).then(response => {
                $('#paginationIndex').hide();
                $('#paginationSearchStatus').hide();
                $('#paginationSearchName').show();
                this.totalOrder = response.data.data.total;
                
                this.$set(this, 'cookings', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })


        },

        updateItem: function(id){
            input = this.fillItem;
            axios.put('/admin/cooking/' + id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                $("#edit-item").modal('hide');
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success('', response.data.action, {timeOut: 5000});
                }
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrorsUpdate = error.response.data
                }
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getCookings(page);
        },

        changePageName: function (page) {
            this.pagination.current_page = page;
            this.searchName(page);
        },

         changePageStatus: function (page) {
            this.pagination.current_page = page;
            this.searchChange(page);
        }
    }
});
