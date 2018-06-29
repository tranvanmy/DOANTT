axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

new Vue({
    el: '#checkout',
    data: {
       
    },
    mounted : function(){
        this.$refs.inputAddress.disabled = true;
        this.$refs.submitCheckout.disabled = true;
    },
    
    methods: {
        handlePhone: function(e)
        {
            console.log(e.target.value.indexOf("0"));
            if(e.target.value.indexOf("0") == 0) {
                this.$refs.inputAddress.disabled = false;
            } else {
                this.$refs.inputAddress.disabled = true;
                toastr.error('Số điện thoại không hợp lê.', 'Thông báo', {timeOut: 5000});
            }
        },

        handleAddress: function(e)
        {
            if(e.target.value != '') {
                this.$refs.submitCheckout.disabled = false;
            } else {
                this.$refs.submitCheckout.disabled = true;
                toastr.error('Địa chỉ là bắt buộc.', 'Thông báo', {timeOut: 5000});
            }
         }
    }
});
