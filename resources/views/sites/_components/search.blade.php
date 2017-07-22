@extends('sites.master')
@section('content')
@include('sites._sections.header')

<main class="main not-home" role="main" id="cooking">
    <!--wrap-->
    <div class="wrap clearfix">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">Home</a></li>
                <li>Search for Recipes</li>
            </ul>
        </nav>
        <!--//breadcrumbs-->

        <!--row-->
        <div class="row">
            <!--content-->
            <section class="content full-width">
                <!--recipefinder-->
                <div class="container recipefinder">
                    <div class="left ingredients">
                        <h3>{{ trans('sites.search_by_name') }}</h3>
                        <div class="row">
                            <div class="search" id="search">
                                <form action="" v-on:submit.prevent="searchName">
                                    <input type="search" placeholder="Find recipe by name" v-model="name">
                                    <input type="submit" value="Search">
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="ingredients">
                            <h3>{{ trans('sites.search_by_ingredient') }}</h3>
                            <a v-for="(selectIngredient, index) in selectIngredients" v-on:click.prevent="deleteIngredient(selectIngredient, index)" href="#" class="button gold">@{{ selectIngredient.name }} <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                        <div class="f-row">
                            <input v-on:keyup="searchIngredient" type="text" placeholder="Add ingredients (one at a time)" v-model="ingredientName">
                            <ul v-if="ingredients" class="list-group position-absolute search-list" id="result" v-on:click="">
                                <li v-for="ingredient in ingredients" v-on:click="addIngredient(ingredient)">@{{ ingredient.name }}</li>
                            </ul>
                        </div>


                    </div>
                </div>
                <!--//recipefinder-->

                <!--results-->
                <div class="entries row">
                    <!--item-->
                    <div class="entry one-fourth" v-for="cooking in cookings">
                        <figure>
                            <img :src="cooking.image" alt="">
                            <figcaption><a :href="'/site/cooking/' + cooking.id"><i class="icon icon-themeenergy_eye2"></i> <span>View recipe</span></a></figcaption>
                        </figure>
                        <div class="container">
                            <h2><a href="recipe.html">@{{ cooking.name }}</a></h2>
                            <div class="actions">
                                <div>
                                    <div class="difficulty"><i class="ico i-medium"></i><a href="#">medium</a></div>
                                    <div class="likes"><i class="fa fa-heart" aria-hidden="true"></i><a href="#">10</a></div>
                                    <div class="comments"><i class="fa fa-comment" aria-hidden="true"></i><a href="recipe.html#comments">27</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--item-->
                    <div class="quicklinks">
                        <a href="#" class="button">More recipes</a>
                        <a href="javascript:void(0)" class="button scroll-to-top">Back to top</a>
                    </div>
                </div>
                <!--//results-->
            </section>
            <!--//content-->
        </div>
        <!--//row-->
    </div>
    <!--//wrap-->
</main>

@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('sites_custom/js/search.js') }}
@endsection
