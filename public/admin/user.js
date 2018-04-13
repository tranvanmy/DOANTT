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
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {'name':'', 'email':'', 'password':'', 'phone':'', 'avatar':'', 'level_id': '1', 'status':'0', 'levels-name': '', 'confirm_pass': ''},
        fillItem: {'id':'', 'name': '', 'email': '', 'password':'', 'phone': '', 'avatar': '', 'level_id': '', 'status': ''},
        deleteItem: {'name':'','id':''}
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
        this.showInfor(this.pagination.current_page);
        this.initFilemanager();
    },

    methods: {
        showInfor: function(page) {
            axios.get('/admin/user?page='+ page).then(response => {
                this.$set(this, 'items', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },

        show: function() {
            $("#show-item").modal('show');
        },

        addItem: function(){
            this.formErrors = '';
            $("#create-item").modal('show');
        },
            
        createItem: function(){
            var input = this.newItem;
            var avatar = $('#name-new-image').val();
            input.avatar = avatar;
            axios.post('/admin/user', input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':'', 'email':'', 'password':'', 'phone':'', 'avatar':'', 'level_id': '', 'status':''},
                this.formErrors = '';
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
            axios.delete('/admin/user/'+id).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.changePage(this.pagination.current_page);
                }
            })

        },

        editItem: function(item){
            var avatar = $('#name-edit-image').val();
            this.fillItem.avatar = avatar;
            $('#edit-image-preview').attr('src', item.avatar);
            $('#name-edit-image').val(item.avatar);
            this.fillItem.name = item.name;
            this.fillItem.email = item.email;
            this.fillItem.phone = item.phone;
            this.fillItem.password = item.password;
            this.fillItem.id = item.id;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            axios.put('/admin/user/'+id, input).then((response) => {
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

        initFilemanager: function() {
            this.$nextTick(function() {
            $('#edit-image').filemanager('image');
            $('#new-image').filemanager('image');
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        }
    }
});
