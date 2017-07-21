axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#postlist',
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
        newItem: {'id': '', 'user_id': '', 'title': '', 'image': '', 'description': '', 'content': '', 'status': '', 'created_at': ''},
        fillItem: {'id': '', 'user_id': '', 'title': '', 'image': '', 'description': '', 'content': '', 'status': '', 'created_at': ''},
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
                axios.get('?page='+ page).then(response => {
                    console.log(response);
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                    console.log(this.items);
                })
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.showInfor(page);
            }
        }
    });
