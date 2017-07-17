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
            this.showInfor(this.pagination.current_page);
        },
        methods: {
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
            showInfor: function(page) {
                axios.get('/site/blog?page='+ page).then(response => {
                    this.$set(this, 'items', response.data.data.data);
                    this.$set(this, 'pagination', response.data.pagination);
                })
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
                    this.fillPost.id = response.data.id;
                    this.fillPost.title = response.data.title;
                    this.fillPost.image = response.data.image;
                    this.fillPost.description = response.data.description;
                    var content = CKEDITOR.instances['my-editor'].setData(response.data.content);
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
                        window.location = '/site/blog/' + id;
                        toastr.success(response.data.message, response.data.action, {timeOut: 10000});
                    }
                });
            },
            changePage: function (page) {
                this.pagination.current_page = page;
                this.showInfor(page);
            }
        }
    });
