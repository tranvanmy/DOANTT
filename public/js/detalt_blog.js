axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#Detailblog',
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
        formPostErrors: {},
        imageData: "",

        comments: {
            'id': '',
            'user_id': '',
            'content': '',
            'comment_table_id': '',
            'comment_table_type': 'posts',
            'created_at': '',
            'updated_at': '',
            'parent_id': ''
        },

        newComment: {
            'id': '',
            'user_id': '',
            'content': '',
            'comment_table_id': '',
            'comment_table_type': 'posts',
            'created_at': '',
            'updated_at': '',
            'parent_id': ''
        },

        newItem: {'user_id': '',
                    'title': '',
                    'image': '',
                    'description': '',
                    'content': '',
                    'status': '',
                    'user-name': '',
                    'user-id': '',
                    'user-avatar': '',
                    'created_at': ''
                },
        fillItem: {id:'',
            'user_id': '',
            'title': '',
            'image': '',
            'description': '',
            'content': '',
            'status': '',
            'user-name': '',
            'user-id': '',
            'user-avatar': ''
        },
        deleteItem: {'title':'','id':'', 'user_id': ''},
        fillPost: {'id': '', 'user_id': '', 'title': '', 'image': '', 'description': '', 'content': '', 'status': '1'},
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
            this.newComment.comment_table_id = $('#post').val();
            this.newComment.comment_table_type = $('#post_type').val();
            this.showComments(this.pagination.current_page);
        },
        methods: {
            showComments: function (page) {
            id = $('#post').val();
            axios.get('/site/comment/' +  id + '?page=' + page + '&type=posts').then((response) => {
                console.log(response)
                this.$set(this, 'comments', response.data.comments.data);
                this.current_user_id = response.data.user_id;
                this.newComment.comment_table_id = response.data.comments.data[0].comment_table_id;
                this.pagination = response.data.pagination;
                console.log(this.comments)
            })
        },
            previewImage: function(event) {
            // Reference to the DOM input element
                var input = event.target;
                // Ensure that you have a file before attempting to read it
                if (input.files && input.files[0]) {
                    // create a new FileReader to read this image and convert to base64 format
                    var reader = new FileReader();
                    // Define a callback function to run, when FileReader finishes its job
                    reader.onload = (e) => {
                        // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                        // Read image as base64 and set to imageData
                        this.imageData = e.target.result;
                    }
                    // Start the reader job - read file as a data url (base64 format)
                    reader.readAsDataURL(input.files[0]);
                }
            },

            comfirmDeleteItem: function(item) {
                axios.delete('/site/profile/user/' + item).then( (response) => {
                    this.deleteItem.id = response.data.id;
                    this.deleteItem.title = response.data.title;
                    $("#delete-item").modal('show');
                });
            },

            delItem: function(id, user_id){
                axios.put('/site/profile/deletePost/'+ id).then(( response) => {
                    if(response.data) {
                    $("#delete-item").modal('hide');
                    toastr.success(response.data.message, response.data.action, {timeOut: 10000});
                    window.location = '/site/listPost/user/' + user_id;
                    }
                });
                // console.log(id);
            },
            editPost: function(item) {
                axios.get('/site/profile/editpost/' + item).then((response) => {
                    console.log(response.data);
                    this.fillPost.id = response.data.id;
                    this.fillPost.title = response.data.description;
                    this.fillPost.image = response.data.image;
                    this.fillPost.description = response.data.description;
                    var content =response.data.content;
                    this.fillPost.content = content;
                    $("#updatePost").modal('show');
                })
            },

            Updatepost: function(id){
                var input = this.fillPost;
                input.image = this.imageData;
                var content = CKEDITOR.instances['my-editor'].getData();
                input.content = content;
                
                axios.put('/site/profile/updatePost/' + id, input).then((response) => {
                    $("#updatePost").modal('hide');
                    if(response.data) {
                        window.location = '/site/showDetail/' + id;
                        toastr.success(response.data.message, response.data.action, {timeOut: 10000});
                    }
                });
            },

            //comment
              //comment method

        submitComment: function (page) {
            this.newComment.comment_table_id = $('#post').val();
            this.newComment.comment_table_type = $('#post_type').val();
            var input = this.newComment;
            input.user_id = this.current_user_id;
            console.log(input);
            axios.post('/site/comment' + '?page=' + page, input).then((response) => {
                console.log(response)
                this.comments = response.data.data;
                this.newComment.content = '';
                $('#submit_content').val('');
                this.showComments(this.pagination.current_page);
            })
        },

        clickReply: function (id) {
            $('#' + id).show();
        },

        closeReply: function (id) {
            $('#' + id).hide();
        },

        submitReply: function (parent_id) {
            this.newComment.content = $('#' + parent_id + ' form div input').val();
            this.newComment.parent_id = parent_id;
            this.newComment.user_id = this.current_user_id;
            axios.post('/site/comment' + '?page=' + this.pagination.current_page, this.newComment + '&type=posts').then((response) => {
                this.comments = response.data.data;
                this.newComment.content = '';
                $('#' + parent_id + ' form div input').val('');
                $('#' + parent_id).hide();
            })
        },

        editComment: function (id) {
            $('div[editId$=' + id + ']').show();
            console.log($('div[editId$=' + id + ']' + ' form div input').val());
        },

        updateComment: function (id, parent_id) {
            this.newComment.content = $('div[editId$=' + id + ']' + ' form div input').val();
            this.newComment.id = id;
            this.newComment.parent_id = parent_id;
            this.newComment.user_id = this.current_user_id;
            axios.put('/site/comment', this.newComment).then((response) => {
                console.log('ok', response)
                this.comments = response.data.data;
                this.showComments(this.pagination.current_page);
                this.newComment.content = '';
                $('div[editId$=' + id + ']' + ' form div input').val('');
                $('div[editId$=' + id + ']').hide();
            })
        },
        
        confirmDeleteComment: function (id) {
            if (confirm('Bạn có muốn xóa không?')) {
                this.deleteComment(id);
            }
        },
        
        deleteComment: function (id) {
            axios.delete('/site/comment/' + id).then((response) => {
                this.comments = response.data.data;
                this.showComments(this.pagination.current_page);
            })
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
