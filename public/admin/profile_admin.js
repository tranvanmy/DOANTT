axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

var followView = new Vue({
    el: '#myprofile',

    data: {
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
        },
        imageData: "",
        image: "",
        offset: 4,
        formErrorsUpdate: {},
        fillItem: {'id':'', 'name': '', 'email': '', 'password':'', 'phone': '', 'avatar': '', 'confirm_pass': '', 'newpassword': ''},
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
        showInfor: function(id)
        {  
           axios.put('/admin/profile/' + id).then((response) => {
                this.fillItem.id = response.data.id;
                this.fillItem.name = response.data.name;
                this.fillItem.email = response.data.email; 
                this.fillItem.phone = response.data.phone;
                this.fillItem.avatar = response.data.avatar;
                $('#profileUser').modal('show');
           }); 
        },
        update_admin: function(id)
        {
            $('#Updateprofile').modal('show');
        },
        updateAdmin: function(id)
        {
            var input = this.fillItem;
            input.avatar = this.imageData;
            axios.put('/admin/update/profile/' + id, input).then((response) => {
                if (response.data.status == 'error') {
                    toastr.error(response.data.message, response.data.action, {timeOut: 5000});
                } else {
                    $('#Updateprofile').modal('hide');
                    toastr.success('', response.data.action, {timeOut: 5000});
                }
            }).catch((e) => {
                this.formErrorsUpdate = e.response.data;
            });
        },
        changePage: function (page) {
            this.pagination.current_page = page;
            this.showInfor(page);
        }
    }
});
