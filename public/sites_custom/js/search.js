var app1 = new Vue({
    el: '#cooking',
    data: {
        name: '',
        cookings: '',
        ingredients: '',
        ingredientArr: [],
        ingredientName: '',
        selectIngredients: [],
    },
    mounted : function() {
        //
    },
    methods: {
        searchName: function() {
            axios.get('search/name?name=' + this.name).then((response) => {
                this.cookings = response.data;
            })
        },

        searchIngredient:function(){
            axios.get('search/ingredient?name=' + this.ingredientName).then((response) => {
                this.ingredients = response.data;
            })
        },

        addIngredient: function(ingredient) {
            this.selectIngredients.push(ingredient);
            this.ingredientArr.push(ingredient.id);
            this.ingredients = '';
            this.ingredientName = '';
            console.log(this.ingredientArr)
            this.getCookingByIngredient();
        },

        deleteIngredient: function(ingredient, index) {
            this.selectIngredients.splice(index,1);
            this.ingredientArr.splice(index, 1);
            this.getCookingByIngredient()
        },

        getCookingByIngredient: function() {
            axios.get('search/name',{
                params: {
                    ingredients: this.ingredientArr
                }
            }).then((response) => {
                console.log(response.data);
                this.cookings = response.data.data
            })
        }
    }

});
