axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var lishWish = new Vue({
    el: '#listWishlist',
    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        wishlishstatus: 0,
        offset: 4,
        newItem: {
            'user_id': '',
            'name': '',
            'time': '',
            'ration': '',
            'image': '',
            'rate_point': '', 
            'description': '',
            'wishlist_status': '',
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
            console.log(this.items);
        },
        methods: {
            showInfor: function(page) {
                id = $('#iduser').val();
                var $param = {page: page};
                axios.get('/site/wislish/' + id, {params: $param }).then(response => {
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                })
            },
            initData: function(status)
            {
                this.wishlishstatus = status;
            },
            wishlist: function(id)
            {
                axios.put('/site/wislish/' + id).then((response) => {
                    if (response.data.status == 'error') {
                        this.wishlishstatus = response.data.wishlishstatus;
                        toastr.warning(response.data.message, response.data.action, {timeOut: 5000});
                    } else {
                        this.wishlishstatus = response.data.wishlishstatus;
                        toastr.success(response.data.message, '', {timeOut: 5000});
                    }
                    this.showInfor(this.pagination.current_page);
                });
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.showInfor(page);
            }
        }
    });
