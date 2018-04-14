var app1 = new Vue({
    el: '#cooking',
    data: {
        cooking: { 'name': '', 'image': '', 'time': '', 'price': 0, 'video_link': '', 'ration': '', 'level_id': '', 'description': '', 'id': '','cooking_ingredients': [], 'steps': []},
        cookingError: '',
        cookingStatus: true,
        units: '',
        searchData: '',
        ingredients: '',
        cookingIngredient: {'id': '', 'ingredient_id': '', 'ingredientName': '', 'cooking_id': '', 'unit_id': '', 'quantity': '', 'description': ''},
        cookingIngredients: '',
        cookingIngredientError: '',
        statusResult: false,
        curentStep: 1,
        cookingStep: {'id': '', 'image': '', 'cooking_id': '', 'step': 1, 'content': '', 'status': '0'},
        cookingStepError: '',
        stepIndex: null,
        ingredientIndex: null,
        status: false,
        categories: null,
        selectCategory: [],
        image: '',
        notification: '',
        price: 0,
        money: '',
        formatVND: ''
    },
    mounted : function(){
        this.getCooking();
        $('.step').hide();
        $('#checkout-first').show();
    },
    methods: {
        submit: function() {
                // $('#submit').modal('hide');
                if (this.cookingError) {
                    toastr.warning(this.notification['cooking_not_empty'],  {timeOut: 5000});
                } else
                if (this.cooking.cooking_ingredients.length) {
                    if (this.cooking.steps.length) {
                        if (this.selectCategory.length) {
                            if (this.price == 0) {
                                this.sendCooking();
                                this.submitCooking();
                            }
                            if (this.price == 1 && this.cooking.price != '') {
                                this.sendCooking();
                                this.submitCooking();
                            } else {
                                toastr.danger('Bạn Cần Nhập Gía Tiền Cho Món Ân!', { timeOut: 5000 });
                            }
                            
                        } else {
                            toastr.warning(this.notification['categories_not_empty'], {timeOut: 5000});
                        }
                    } else {
                        toastr.warning(this.notification['steps_not_empty'], {timeOut: 5000});
                    }
                } else {
                   toastr.warning(this.notification['ingredients_not_empty'], {timeOut: 5000});
                }
        },

        sendCooking: function () {
            axios.post('/cooking', this.cooking).then((response) => {
                if (response.data != 'undefined') {
                    this.cooking.id = this.cookingIngredient.cooking_id = this.cookingStep.cooking_id = response.data;
                }
            })
            .catch((e) => {
                this.cookingError = e.response.data;
                $('.step').hide();
                $('#checkout-first').show();
                this.curentStep = 1;
                toastr.warning(this.notification['cooking_not_empty'],  {timeOut: 5000});

            });
        },

        showModalYT: function()
        {
            $('#modalYotube').modal('show');
        },
        converthtml: function()
        {
            var $log = $("#viewvideo");
            html = $.parseHTML(this.cooking.video_link);
            $log.append( html );
        },

        updatePrice: function()
        {

        },

        sendIngredient: function() {
            axios.post('/ingredient/cooking', this.cookingIngredient).then((response) => {
                if (this.cookingIngredient.id) {
                    this.cooking.cooking_ingredients[this.ingredientIndex] = response.data;
                } else {
                    this.cooking.cooking_ingredients.push(response.data);
                }
                this.cookingIngredient = {'id':'', 'ingredient_id': '', 'ingredientName': '', 'cooking_id': '', 'unit_id': '', 'quantity': ''};
                this.cookingIngredient.cooking_id = this.cooking.id;
                this.statusResult = false;
                this.ingredientIndex = null;
                this.cookingIngredientError = '';
            })
            .catch(e => {
               this.cookingIngredientError = e.response.data;
            });
        },
        priceCooking: function ()
        {
            if(this.price == 0) {
                this.cooking.price = 0;
                this.formatVND = 0;
            }
        },

        formatPrice: function ()
        {
            this.formatVND = new Intl.NumberFormat('nl-NL').format(this.cooking.price);
        },

        sendStep: function() {
            var formData = new FormData();
            formData.append('image', $('#imageStep')[0].files[0]);
            formData.append('id', this.cookingStep.id);
            formData.append('content', this.cookingStep.content);
            formData.append('status', this.cookingStep.status);
            formData.append('cooking_id', this.cookingStep.cooking_id);
            formData.append('step', this.cookingStep.step);
            axios.post('/step/cooking', formData).then((response) => {
                if (this.cookingStep.id) {
                    this.cooking.steps[this.stepIndex] = response.data;
                    this.cookingStep.content = '';
                    this.cookingStep.step = this.cooking.steps[this.cooking.steps.length - 1].step + 1;
                    this.cookingStep.id = '';

                } else {
                    this.cooking.steps.push(response.data);
                    this.cookingStep.content = '';
                    this.cookingStep.step++;
                }
                this.stepIndex = null;
                this.cookingStepError = '';
                $('#imageStep').val('');

            })
            .catch(e => {
                this.cookingStepError = e.response.data;
            });
        },

        submitCooking: function() {
            this.sendData(this.curentStep);
            var data = {'cooking_id': this.cooking.id, 'categories': this.selectCategory};
            console.log(data);
            axios.post('/categories/cooking', data).then((response) => {
                window.location = '/site/cooking/' + this.cooking.id;
            })
            .catch(e => {
                this.cookingError = e.response.data;
                $('.step').hide();
                $('#checkout-first').show();
                this.curentStep = 1;
            });
        },

        deleteStep: function(step, index) {
            axios.delete('/step/cooking/' + step.id).then((response) => {
                if (response.data) {
                    this.cooking.steps.splice(index, 1);
                }

            })
        },

        getCooking: function() {
            axios.get('/cooking').then((response) => {
                if (response.data.cooking) {
                    this.cooking = response.data.cooking;
                    this.cookingStep.cooking_id = this.cooking.id;
                    if (this.cooking.steps.length) {
                        this.cookingStep.step = this.cooking.steps[this.cooking.steps.length - 1].step + 1;
                    } else {
                        this.cookingStep.step = 1;
                    }
                }
                this.notification = response.data.notification;
            })
        },

        editStep: function(step, index) {
            this.cookingStep.step = step.step;
            this.cookingStep.content = step.content;
            this.cookingStep.id = step.id;
            this.stepIndex = index;
        },

        editIngredient: function(ingredient, index) {
            this.cookingIngredient.ingredientName = ingredient.ingredient.name;
            this.cookingIngredient.ingredient_id = ingredient.ingredient_id;
            this.cookingIngredient.quantity = ingredient.quantity;
            this.cookingIngredient.cooking_id = ingredient.cooking_id;
            this.cookingIngredient.unit_id = ingredient.unit_id;
            this.cookingIngredient.description = ingredient.description;
            this.cookingIngredient.id = ingredient.id;
            this.ingredientIndex = index;
            this.cookingIngredientError = '';
        },

        cancelIngresient: function() {
            this.ingredientIndex = null;
            this.cookingIngredient = {'id': '', 'ingredient_id': '', 'ingredientName': '', 'cooking_id': '', 'unit_id': '', 'quantity': '', 'description': ''}
            this.cookingIngredient.cooking_id = this.cooking.id;
        },

        cancelStep: function() {
            this.stepIndex = null;
            this.cookingStep = {'id': '','cooking_id': '', 'step': '', 'content': '', 'status': '0'};
            this.cookingStep.cooking_id = this.cooking.id;
            this.cookingStep.step = this.cooking.steps[this.cooking.steps.length - 1].step + 1;

        },

        deleteIngredient: function(ingredient, index) {
            axios.delete('/ingredient/cooking/' + ingredient.id).then((response) => {
                if (response.data) {
                    this.cooking.cooking_ingredients.splice(index, 1);
                }

            })
        },

        step1: function() {
            this.sendData(this.curentStep);
            $('.step').hide();
            $('#checkout-first').show();
            this.curentStep = 1;

        },

        step2: function() {
            var th = this.sendData(this.curentStep);
            if (!this.units) {
                axios.get('/units/cooking').then((response) => {
                    this.units = response.data;
                })
            }
            $('.step').hide();
            $('#checkout-second').show();
            this.curentStep = 2;
        },

        step3: function() {
            this.sendData(this.curentStep);
            $('.step').hide();
            $('#checkout-third').show();
            this.curentStep = 3;

        },

        step4: function() {
            this.sendData(this.curentStep);
            if (!this.categories) {
                axios.get('/categories/cooking').then((response) => {
                    this.categories = response.data;
                    for (var i = this.cooking.categories.length - 1; i >= 0; i--) {
                        this.selectCategory.push(this.cooking.categories[i].id);
                    }
                })
            }
            $('.step').hide();
            $('#checkout-fourth').show();
            this.curentStep = 4;

        },

        search: function() {
            var data = this.cookingIngredient.ingredientName;
            this.cookingIngredient.ingredient_id = '';
            if (data) {
                axios.get('/search/cooking?data=' + data).then((response) => {
                    if (response.data.length) {
                        this.ingredients = response.data;
                        this.statusResult = false;
                    } else {
                        this.ingredients = null
                        this.statusResult = true;
                        this.cookingIngredient.ingredient_id = ''
                    }

                })
            } else {
                this.ingredients = null;
                this.this.statusResult = false;
            }

        },

        hideResult: function() {
            this.ingredients = null
        },

        hideStatusResult: function() {
            this.statusResult = false
        },

        sendData: function(step) {
            switch(step) {
                case 1:
                    this.cookingError = '';
                    this.sendCooking()
                    break;
            }
        },

        uploadImage: function(){
            var formData = new FormData();
            formData.append('image', $('#image')[0].files[0]);
            formData.append('oldImage', this.cooking.image);
            axios.post('/upload/cooking',formData, {headers: {
                'Content-Type': 'multipart/form-data' }
            }).then((response) => {
               this.cooking.image = response.data;
            }).catch((error) => {
            });
        },

        uploadImageStep: function(){
            var formData = new FormData();
            formData.append('image', $('#image')[0].files[0]);
            formData.append('oldImage', this.cooking.image);
            axios.post('/upload/cooking',formData, {headers: {
                'Content-Type': 'multipart/form-data' }
            }).then((response) => {
               this.cooking.image = response.data;
            }).catch((error) => {
            });
        },

        comfirmSubmit: function() {
            $('#submit').modal('show');
            if (this.curentStep == 1) {
                this.sendCooking();
            }
        },

        comfirmCancel: function() {
            $('#reset').modal('show');
        },

        cancelCooking: function() {
            $('#reset').modal('hide');
            var data = {'id': this.cooking.id };
            if (this.cooking.id) {
                axios.delete('/cancel/cooking/' + this.cooking.id).then((response) => {
                    if (response.data == 1) {
                        toastr.warning(this.notification['refresh_cooking_success'], {timeOut: 5000});
                        window.location = '/cooking'
                    }
                })
                .catch((e) => {
                    toastr.warning(this.notification['refresh_cooking_fail'], {timeOut: 5000});
                })
            } else {
                this.cooking = {'name': '', 'image': '', 'time': '', 'ration': '', 'level_id': '', 'description': '', 'id': '','cooking_ingredients': [], 'steps': []};
                this.cookingError = '';
                toastr.warning("Format Công Thức Thành Công!", {timeOut: 5000});
            }
        }
    },

});
