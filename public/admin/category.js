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
        imageData: "",
        image: "",
        formErrorsUpdate: {},
        newItem: {'name':'', 'parent_id': '', 'status': '1', 'icon': ''},
        fillItem: {'name':'','id':'', 'status': '', 'icon': ''},
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
        this.getItems(this.pagination.current_page);
        this.initFilemanager();
    },

    methods: {

        getItems: function(page){
            axios.get('/admin/category?page='+ page).then((response) => {
                this.$set(this, 'items', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            });
        },

        previewImage: function(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.imageData = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        },

        addItem: function(){
            this.formErrors = '';
            $("#create-item").modal('show');
        },

        createItem: function(){
            var input = this.newItem;
            input.icon = this.imageData;
            
            axios.post('/admin/category',input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':'', 'parent_id': '', 'status': '1'};
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
            console.log(this.deleteItem.name)
            $("#delete-item").modal('show');
        },

        delItem: function(id) {
            $("#delete-item").modal('hide');
            axios.delete('/admin/category/'+id).then((response) => {
                console.log(response)
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                    this.changePage(this.pagination.current_page);
                }
            })

        },

        editItem: function(item){
            var icon = $('#name-edit-image').val();
            var name = item.name.split('-');
            this.fillItem.name = name[name.length -1];
            this.fillItem.id = item.id;
            this.fillItem.status = item.status;
            this.fillItem.icon = icon;
            $('#edit-image-preview').attr('src', item.icon);
            $('#name-edit-image').val(item.icon);
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            var icon = $('#name-edit-image').val();
            input.icon = icon;
            axios.put('/admin/category/'+id,input).then((response) => {
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

        initFilemanager() {
            this.$nextTick(function() {
            $('#edit-image').filemanager('image');
            $('#new-image').filemanager('image');
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getItems(page);
        }
    }
});
