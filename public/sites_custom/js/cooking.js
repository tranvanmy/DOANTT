axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Vue.component('star-rating', VueRateIt.StarRating);
// var StarRating = require('vue-star-rating');
Vue.component('star-rating', VueStarRating.default);


var wishlish = new Vue({
    el: '#cooking-detail',
    data: {
        //cooking
        cooking: [],

        //comment
        page: '',
        current_user_id: '',
        comments: {
            'id': '',
            'user_id': '',
            'content': '',
            'comment_table_id': '',
            'comment_table_type': 'cookings',
            'created_at': '',
            'updated_at': '',
            'parent_id': ''
        },
        newComment: {
            'id': '',
            'user_id': '',
            'content': '',
            'comment_table_id': '',
            'comment_table_type': 'cookings',
            'created_at': '',
            'updated_at': '',
            'parent_id': ''
        },
        //update pricr 
        rating: {
            'point': 0,
            'content': ''
        },

        resultRating: {'count': '', 'ratesCooking': ''},
        newItem: {
            'price': ''
        },
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },

        //rate
        point: 0,
        rates: {
            'id': '',
            'user_id': '',
            'rate_point': '',
            'rate_table_id': '',
            'rate_table_type': 'cookings',
            'created_at': '',
            'updated_at': '',
        },

        //wishlist
        wishlishstatus: 0,
        newItem: {
            'id': '',
            'user_id': '',
            'cooking_id': '',
            'status': ''
        },
        inCart: '',
        showvideo: false,
    },

    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
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

    mounted: function() {
        this.showCooking();
        this.showComments(this.pagination.current_page);
        this.showRate();
        this.newComment.comment_table_id = $('#cooking_id').val();
        this.getCart();
    },

    methods: {
        //cooking method
        showCooking: function() {
            var id = $('#cooking_id').val();
            axios.get('/site/cooking/' + id).then((response) => {
                this.cooking = response.data;
                console.log(this.cooking)
            })
        },

        print: function() {
            window.print();
        },

        openRate: function (id)
        {
            $('#modalRate').modal('show');

            axios.get('/site/show/rate/' + id).then((response) => {
                // console.log(response.data.ratesCooking)
                this.resultRating.count = response.data.CountratesCooking;
                this.resultRating.ratesCooking = response.data.ratesCooking;
                console.log(this.resultRating.count);
                console.log(this.resultRating.ratesCooking);
            })
        },

        setRating: function ()
        {
            console.log(this.cooking.id);
            if (!confirm('Bạn muốn rate cho công thức này không?!')) return;
            if(this.rating.content == '' || this.rating.point == 0) {
                toastr.warning('Mời bạn nhập đầy đủ thông tin!', {
                    timeOut: 5000
                });
                return false;
            }
            var authOptions = {
                    method: 'post',
                    url: '/site/rate/' + id,
                    params: this.rating,
                    json: true
            }
            axios(authOptions).then(response => {
                toastr.success('Bạn đã đánh gía thành công!', { timeOut: 5000 });
                this.rating = {'point': 0, 'content': '' };
                this.resultRating.count = response.data.CountratesCooking;
                this.resultRating.ratesCooking = response.data.ratesCooking;
                this.showCooking();
            }).catch(function (error) {
            });
        },
        //update price 
        updateItem: function(id) {
            var input = this.newItem;

            axios.post('/site/update/price/' + id, input).then((response) => {
                if (response.data) {
                    window.location = '/site/cooking/' + id;
                    toastr.success(response.data.message, response.data.action, {
                        timeOut: 10000
                    });
                }
            })
            // console.log(input);
        },

        noOrder: function() {
            toastr.warning('Món ăn này không order được mời bạn chọn món khác', {
                timeOut: 5000
            });
        },

        reviewYoutube: function() {
            $('#modalYotube').modal('show');
            if (!this.showvideo) {
                var $log = $("#viewvideo");
                html = $.parseHTML(this.cooking.video_link);
                $log.append(html);
                this.showvideo = true;
            }
        },

        //comment method
        showComments: function(page) {
            id = $('#cooking_id').val();
            axios.get('/site/comment/' + id + '?page=' + page).then((response) => {
                this.$set(this, 'comments', response.data.comments.data);
                this.current_user_id = response.data.user_id;
                this.newComment.comment_table_id = response.data.comments.data[0].comment_table_id;
                this.pagination = response.data.pagination;
            })
        },

        submitComment: function(page) {
            var input = this.newComment;
            input.user_id = this.current_user_id;
            axios.post('/site/comment' + '?page=' + page, input).then((response) => {
                this.comments = response.data.data;
                this.newComment.content = '';
                $('#submit_content').val('');
            })
        },

        clickReply: function(id) {
            $('#' + id).show();
        },

        closeReply: function(id) {
            $('#' + id).hide();
        },

        submitReply: function(parent_id) {
            this.newComment.content = $('#' + parent_id + ' form div input').val();
            this.newComment.parent_id = parent_id;
            this.newComment.user_id = this.current_user_id;
            axios.post('/site/comment' + '?page=' + this.pagination.current_page, this.newComment).then((response) => {
                this.comments = response.data.data;
                this.newComment.content = '';
                $('#' + parent_id + ' form div input').val('');
                $('#' + parent_id).hide();
            })
        },

        editComment: function(id) {
            $('div[editId$=' + id + ']').show();
        },

        updateComment: function(id, parent_id) {
            this.newComment.content = $('div[editId$=' + id + ']' + ' form div input').val();
            this.newComment.id = id;
            this.newComment.parent_id = parent_id;
            this.newComment.user_id = this.current_user_id;
            axios.put('/site/comment', this.newComment).then((response) => {
                this.comments = response.data.data;
                this.showComments(this.pagination.current_page);
                this.newComment.content = '';
                $('div[editId$=' + id + ']' + ' form div input').val('');
                $('div[editId$=' + id + ']').hide();
            })
        },

        confirmDeleteComment: function(id) {
            if (confirm('Bạn có muốn xóa không?')) {
                this.deleteComment(id);
            }
        },

        deleteComment: function(id) {
            axios.delete('/site/comment/' + id).then((response) => {
                // this.comments = response.data.data;
                this.showComments(this.pagination.current_page);
            })
        },

        changePage: function(page) {
            this.pagination.current_page = page;
            this.showComments(page);
        },

        //rate method
        showRate: function() {
            id = $('#cooking_id').val();
            axios.get('/site/rate/' + id).then((response) => {
                this.point = response.data.rate_point;
            })
        },

        //wishlist method
        initData: function(status) {
            this.wishlishstatus = status;
        },
        wishlist: function(id) {
            axios.put('/site/wislish/' + id).then((response) => {
                if (response.data.status == 'error') {
                    this.wishlishstatus = response.data.wishlishstatus;
                    toastr.warning(response.data.message, response.data.action, {
                        timeOut: 5000
                    });
                } else {
                    this.wishlishstatus = response.data.wishlishstatus;
                    toastr.success(response.data.message, '', {
                        timeOut: 5000
                    });
                }
            });
        },

        addToCart: function(id) {
            var cooking = {
                'cooking': id
            };
            axios.post('/cart', cooking).then((response) => {
                var cart = Object.keys(response.data)
                if (cart.indexOf(id.toString()) == -1) {
                    this.inCart = 0;
                } else {
                    this.inCart = 1;
                }
                var count = cart.length;
                $('#cart_number').text('(' + count + ')')
                toastr.success('Thêm giỏ hàng thành công!', {
                    timeOut: 5000
                });
            });
        },
        removeToCart: function(id) {
            axios.delete('/cart/' + id).then((response) => {
                var cart = Object.keys(response.data['cart'])
                if (cart.indexOf(id.toString()) == -1) {
                    this.inCart = 0;
                } else {
                    this.inCart = 1;
                }
                var count = cart.length;
                $('#cart_number').text('(' + count + ')')
                toastr.warning('Bạn đã xóa món ăn khỏi giỏ hàng!', 'Chú Ý', {
                    timeOut: 5000
                });
            });
        },

        getCart: function() {
            axios.get('/cart').then((response) => {
                var cart = Object.keys(response.data)
                if (cart.indexOf(id.toString()) == -1) {
                    this.inCart = 0;
                } else {
                    this.inCart = 1;
                }
                var count = cart.length;
                $('#cart_number').text('(' + count + ')')
            });
        }
    }
});