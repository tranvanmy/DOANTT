axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#repicesCooking',
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
        newItem: {'id': '',
            'user_id': '',
            'name': '',
            'time': '',
            'ration': '',
            'image': '',
            'level_id': '',
            'rate_point': '',
            'description': '',
            'video_link': '',
            'status': '',
            'created_at': ''
        },
        fillItem: {'id': '',
            'user_id': '',
            'name': '',
            'time': '',
            'ration': '',
            'image': '',
            'level_id': '',
            'rate_point': '',
            'description': '',
            'video_link': '',
            'status': '',
            'created_at': ''
        },
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
                axios.get('/site/cooking?page='+ page).then(response => {
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                })
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.showInfor(page);
            }
        }
    });
