axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#manage-vue',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },
        offset: 4,
        show: {'name': '', 'description': '', 'image': ''},
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {'name':'', 'description': '', 'type': '0', 'image': '', 'status': '1'},
        fillItem: {'name':'', 'description': '', 'type': '', 'image': '', 'status': ''},
        deleteItem: {'name':'','id':''},
        search: 1,
        fillSearch: {'name': ''},
        statusSearch: {'status': ''},

        statusInter: {'status': ''},
        totalOrder: null
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
        this.getItems(this.pagination.current_page);
        $('#paginationSearchName').hide();
        $('#paginationSearchStatus').hide();

        $('#paginationInter').hide();
        this.initFilemanager();
    },

    methods: {
        initFilemanager() {
            this.$nextTick(function() {
            $('#edit-image').filemanager('image');
            $('#new-image').filemanager('image');
            });
        },

        getItems: function(page){
            axios.get('/admin/ingredient?page=' + page).then((response) => {
                this.$set(this, 'items', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            });
        },

        searchName: function (page)
        {
            var authOptions = {
                method: 'get',
                url: '/admin/search/nameIngredient?page=' + page,
                params: this.fillSearch.name,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                json: true
            }
            axios(authOptions).then(response => {
                $('#paginationIndex').hide();
                $('#paginationSearchStatus').hide();
                $('#paginationInter').hide();
                $('#paginationSearchName').show();
                this.totalOrder = response.data.data.total;
                this.$set(this, 'items', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },


        searchChange: function (page)
        {
            if(this.statusSearch.status == 3) {
                this.getItems(page);
            } else {

                var authOptions = {
                    method: 'get',
                    url: '/admin/search/statusIngredient?page=' + page,
                    params: this.statusSearch.status,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    json: true
                }
                axios(authOptions).then(response => {
                    $('#paginationIndex').hide();
                    $('#paginationSearchName').hide();
                    $('#paginationInter').hide();
                    $('#paginationSearchStatus').show();
                    
                    this.totalOrder = response.data.data.total;
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
            })
            }
        },


        searchChangeInter: function (page)
        {
            if(this.statusInter.status == 3) {
                this.getItems(page);
            } else {
                var authOptions = {
                    method: 'get',
                    url: '/admin/search/statusInter?page=' + page,
                    params: this.statusInter.status,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    json: true
                }
                axios(authOptions).then(response => {
                    $('#paginationIndex').hide();
                    $('#paginationSearchName').hide();
                    $('#paginationSearchStatus').hide();
                    $('#paginationInter').show();
                    
                    this.totalOrder = response.data.data.total;
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                })
            }
        },

        showItem: function(item) {
            this.show.name = item.name;
            this.show.description = item.description;
            this.show.image = item.image;

            $('#center_modal').modal('show');
        },

        addItem: function(){
            this.formErrors = '';
            $("#create-item").modal('show');
        },

        createItem: function(){
            var input = this.newItem;
            var image = $('#name-new-image').val();
            axios.post('/admin/ingredient',input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':'', 'description': '', 'type': '0', 'image': '','status': '1'};
                this.formErrors = '';
                CKEDITOR.instances['my-editor'].setData('');
                $('#name-new-image').val('');
                $('#new-image-preview').attr('src', '');
                $("#create-item").modal('hide');
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.changePage(this.pagination.current_page);
                }
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrors = error.response.data;
                }
            });
        },

        comfirmDeleteItem: function(item) {
            var name = item.name.split('-');
            this.deleteItem.name = name[name.length -1];
            this.deleteItem.id = item.id;
            $("#delete-item").modal('show');
        },

        delItem: function(id) {
            $("#delete-item").modal('hide');
            axios.delete('/admin/ingredient/' + id).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.changePage(this.pagination.current_page);
                }
            })

        },

        editItem: function(item){
            var image = $('#name-edit-image').val();
            $('#edit-image-preview').attr('src', item.image);
            $('#name-edit-image').val(item.image);
            this.fillItem = item;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            var image = $('#name-edit-image').val();
            axios.put('/admin/ingredient/' + id, input).then((response) => {
                this.changePage(this.pagination.current_page);
                $("#edit-item").modal('hide');
                $('#name-edit-image').val('');
                $('#edit-image-preview').attr('src', '');
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
            this.getItems(page);
        },

        changePageName: function (page) {
            this.pagination.current_page = page;
            this.searchName(page);
        },

         changePageStatus: function (page) {
            this.pagination.current_page = page;
            this.searchChange(page);
        },
        changePageInter: function (page) {
            this.pagination.current_page = page;
            this.searchChangeInter(page);
        }
    }
});
