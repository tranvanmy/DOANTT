<script>

window.data = {
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
    formatVND: '',
    id: {!! $id !!}
};
</script>