axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#manage-vue',

    data: {
        items: [],
        categories: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },
        offset: 4,
        show: {'title': '', 'author': '','content': '' ,'image': ''},
        fillItem: {'id': '','title': '', 'status': ''},
        formErrors: {},
        formErrorsUpdate: {},
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
    },

    methods: {
        getItems: function(page){
            axios.get('/admin/post?page=' + page).then((response) => {
                this.$set(this, 'items', response.data.data.data);
                console.log(this.items);
                this.$set(this, 'pagination', response.data.pagination);
                this.$set(this, 'categories', response.data.data.data);
            });
        },

        showItem: function(item) {
            this.show.title = item.title;
            this.show.author = item.author;
            this.show.image = item.image;
            this.show.content = item.content;

            $('#center_modal').modal('show');
        },

        editItem: function(item){
            this.fillItem = item;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            input = this.fillItem;
            axios.put('/admin/post/' + id, input).then((response) => {
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
            this.getItems(page);
        }
    }
});
