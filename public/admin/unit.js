axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#unit_amdin',

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
        newItem: {'id': '', 'name': ''},
        fillItem: {'id': '', 'name': ''},
        update: {'id': '', 'name': '', 'status': ''},
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
    },

    methods: {
        showInfor: function(page) {
            axios.get('/admin/unit?page='+ page).then(response => {
                this.$set(this, 'items', response.data.data.data);
                this.$set(this, 'pagination', response.data.pagination);
            })
        },

        updateUnit: function(item)
        {   
            console.log(1)
          this.update.id = item.id;
          this.update.name = item.name;
          this.update.status = item.status;
            $("#delete-item").modal('show');
        },
        
        createUnit: function ()
        {
            var input = this.newItem;
            axios.post('/admin/unit', input).then((response) => {
                $("#add_unit").modal('hide');
                toastr.success(response.data.message, response.data.action, {timeOut: 5000});
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':''};
                
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrors = error.response.data;
                }
            });

        },

        addUnit: function ()
        {
            console.log(21);
            $("#add_unit").modal('show');
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        }
    }
});
