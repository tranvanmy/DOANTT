@extends('sites.master')
@section('style')
	{{ Html::style('sites_custom/css/add.css') }}
@endsection
@section('content')
@include('sites._sections.header')
<main class="main not-home" role="main" id="cooking">
	<!--wrap-->
	<div class="wrap clearfix add-cooking">
	   <section class="site-content site-section clearfix">
			<div class="container">
				<div class="site-block" >
					<form id="checkout-wizard" action="ecom_checkout.html" method="post">
						<!-- First Step -->
						<div class="form-group text-right" id="control">
							<button class="btn-success" v-on:click.prevent="comfirmSubmit">{{ trans('sites.create_cooking') }}</button>
							<button class="btn-warning" v-on:click.prevent="comfirmCancel">{{ trans('sites.cancel') }}</button>
						</div>
						<div id="checkout-first" class="step">
							<!-- Step Info -->
							<ul class="nav nav-pills nav-justified checkout-steps push-bit">
								<li class="active"><a href="javascript:void(0)" data-gotostep="checkout-first" v-on:click.prevent="step1"><strong>1. {{ trans('sites.cooking_infomation') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-second" v-on:click.prevent="step2"><strong>2. {{ trans('sites.cooking_ingredient') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-third" v-on:click.prevent="step3"><strong>3. {{ trans('sites.cooking_step') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-fourth" v-on:click.prevent="step4"><strong>4. {{ trans('sites.cooking_category') }}</strong></a></li>
							</ul>
							<!-- END Step Info -->
							<div class="row">
								<div class="col-sm-6">
									<h4 class="page-header">{{ trans('sites.base_info') }}</h4>
									<div class="form-group">
										<label for="checkout-username">{{ trans('sites.name_cooking') }}</label>
										<input v-model="cooking.name" type="text" id="checkout-username" name="checkout-username" class="form-control">
										<span class="text-danger" v-for="error in cookingError.name">@{{ error }}</span>
									</div>
									<div class="form-group">
										<label for="time">{{ trans('sites.time') }}</label>
										<input v-model="cooking.time" type="number" min="0" id="time" name="time" class="form-control">
										<span class="text-danger" v-for="error in cookingError.time">@{{ error }}</span>
									</div>
									<div class="form-group">
										<label for="ration">{{ trans('sites.ration') }}</label>
										<input v-model="cooking.ration" type="number" min="1" id="ration" name="ration" class="form-control">
										<span class="text-danger" v-for="error in cookingError.ration">@{{ error }}</span>
									</div>
									<div class="form-group">
										<label for="level">{{ trans('sites.level_cooking') }}</label>
										<select class="col-md-12" name="" id="" v-model="cooking.level_id">
											<option value="1">{{ trans('sites.easy') }}</option>
											<option value="2">{{ trans('sites.normal') }}</option>
											<option value="3">{{ trans('sites.hard') }}</option>
										</select>
										<span class="text-danger clearfix" v-for="error in cookingError.level_id">@{{ error }}</span>
									</div>
									<div class="form-group">
										<label for="description">{{ trans('site.description') }}</label>
										<textarea v-model="cooking.description" name="description" id="" cols="30" rows="10"></textarea>
									</div>
								</div>
								<div class="col-sm-6">
									<h4 class="page-header">{{ trans('sites.image') }}</h4>
									<div class="form-group">
										<img v-bind:src="cooking.image" alt="">
										<input type="file" v-on:change="uploadImage" id="image">
									</div>
								</div>
								<div class="col-md-12 text-right">
									<button v-on:click.prevent="step2" class="col-md-2 col-md-offset-10 btn-success">{{ trans('sites.next') }}</button>
								</div>
							</div>
						</div>
						<!-- END First Step -->
						<div id="checkout-second" class="step">
							<!-- Step Info -->
							<ul class="nav nav-pills nav-justified checkout-steps push-bit">
								<li><a href="javascript:void(0)" data-gotostep="checkout-first" v-on:click.prevent="step1"><strong>1. {{ trans('sites.cooking_infomation') }}</strong></a></li>
								<li class="active"><a href="javascript:void(0)" data-gotostep="checkout-second" v-on:click.prevent="step2"><strong>2. {{ trans('sites.cooking_ingredient') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-third" v-on:click.prevent="step3"><strong>3. {{ trans('sites.cooking_step') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-fourth" v-on:click.prevent="step4"><strong>4. {{ trans('sites.cooking_category') }}</strong></a></li>
							</ul>
							<!-- END Step Info -->
							<div class="row">
								<div class="col-sm-4">
									 <h4 class="page-header"><i class="fa fa-credit-card"></i> {{ trans('sites.input_ingredient') }}</h4>
									<div class="form-group">
										<span for="">{{ trans('sites.ingredient_name') }}</span>
										<input v-model="cookingIngredient.ingredientName" type="text" v-on:keyup="search">
										<span class="text-danger" v-for="error in cookingIngredientError.ingredientName">@{{ error }}</span><br>
										<ul v-if="ingredients" class="list-group position-absolute" id="result" v-on:click="hideResult">
											<li v-for="ingredient in ingredients" v-on:click="cookingIngredient.ingredientName = ingredient.name;
											cookingIngredient.ingredient_id = ingredient.id">@{{ ingredient.name }}</li>
										</ul>
										<ul v-if="statusResult">
											<li>{{ trans('site.not_available') }}</li>
										</ul>
										<span for="">{{ trans('sites.quantity') }}</span>
										<input class="" type="number" min="0" v-model="cookingIngredient.quantity">
										<span class="text-danger" v-for="error in cookingIngredientError.quantity">@{{ error }}</span><br>
										<span for="">{{ trans('sites.unit') }}</span><br>
										<select class="col-md-12" name="" id="" v-model="cookingIngredient.unit_id">
											<option v-for="unit in units" v-bind:value="unit.id">@{{ unit.name }}</option>
										</select>
										<span class="text-danger" v-for="error in cookingIngredientError.unit_id">@{{ error }}</span><br>
										<span class="clearfix" for="">{{ trans('sites.note') }}</span>

										<input type="text" v-model="cookingIngredient.description">
										<button class="btn-warning" v-if="ingredientIndex != null" v-on:click.prevent="sendIngredient">{{ trans('sites.edit_ingredient') }}</button>
										<button class="btn-primary" v-if="ingredientIndex != null" v-on:click.prevent="cancelIngresient">{{ trans('sites.cancel') }}</button>
										<i class="fa fa-plus-square-o fa-2x" aria-hidden="true" v-on:click.prevent="sendIngredient" v-else="ingredientIndex != null"></i>
									</div>
								</div>
								<div class="col-sm-8">
									<h4 class="page-header"><i class="fa fa-credit-card"></i>{{ trans('sites.ingredient_list') }}</h4>
									<div class="form-group">
									   <ol>
										   <li class="col-sm-6" v-for="(ingredient, index) in cooking.cooking_ingredients">
												<button class="btn-warning" v-if="ingredient.id == cookingIngredient.id" v-on:click.prevent="cancelIngresient">{{ trans('sites.editing') }}</button>
												<span v-else="ingredient.id == cookingIngredient.id">
													<button class="btn-primary" v-on:click.prevent="editIngredient(ingredient, index)">{{ trans('sites.edit') }}</button>
													<button class="btn-danger" v-on:click.prevent="deleteIngredient(ingredient, index)">{{ trans('sites.delete') }}</button>
												</span>
												@{{ ingredient.quantity + ' ' + ingredient.unit.name + ' ' + ingredient.ingredient.name }} <span class="text-success" v-if="ingredient.description">@{{ingredient.description }}</span>
											</li>
									   </ol>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<button class="col-md-2 col-md-offset-7 btn-warning" v-on:click.prevent="step1" >{{ trans('sites.back_step') }}</button>
									<div class="col-md-1"></div>
									<button class="col-md-2 btn-success"  v-on:click.prevent="step3" >{{ trans('sites.next_step') }}</button>
								</div>
							</div>
						</div>
						<!-- Second Step -->

						<!-- END Second Step -->

						<!-- Third Step -->
						<div id="checkout-third" class="step">
							<!-- Step Info -->
							<ul class="nav nav-pills nav-justified checkout-steps push-bit">
								<li><a href="javascript:void(0)" data-gotostep="checkout-first" v-on:click.prevent="step1"><strong>1. {{ trans('sites.cooking_infomation') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-second" v-on:click.prevent="step2"><strong>2. {{ trans('sites.cooking_ingredient') }}</strong></a></li>
								<li class="active"><a href="javascript:void(0)" data-gotostep="checkout-third" v-on:click.prevent="step3"><strong>3. {{ trans('sites.cooking_step') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-fourth" v-on:click.prevent="step4"><strong>4. {{ trans('sites.cooking_category') }}</strong></a></li>
							</ul>
							<!-- END Step Info -->
							<div class="row">
								<div class="col-sm-5">
									<h4 class="page-header"><i class="fa fa-credit-card"></i>{{ trans('sites.input_step') }}</h4>
									<div class="form-group">
										<textarea v-model="cookingStep.content" name="" id="" cols="30" rows="10"></textarea>
										<span class="text-danger" v-for="error in cookingStepError.content">@{{ error }}</span><br>
										<input type="file" id="imageStep">
										<button class="btn-warning" v-if="stepIndex != null" v-on:click.prevent="sendStep">{{ trans('sites.edit_step') }}</button>
										<button class="btn-primary" v-if="stepIndex != null" v-on:click.prevent="cancelStep">{{ trans('sites.cancel') }}</button>
										<button v-else="stepIndex != null" class="btn-success" v-on:click.prevent="sendStep">{{ trans('sites.add_step') }}</button>
									</div>
								</div>
								<div class="col-sm-7">
									<h4 class="page-header">{{ trans('sites.cooking_step_list') }}</h4>
									<div class="form-group">
										<ol>
											<div v-for="(step, index) in cooking.steps" >
												<button class="btn-warning" v-on:click.prevent="cancelStep" v-if="step.id == cookingStep.id">{{ trans('sites.editing') }}</button>
												<span v-else="step.id == cookingStep.id">
													<button v-on:click.prevent="editStep(step, index)" class="btn-primary">{{ trans('sites.edit') }}</button>
												<button v-on:click.prevent="deleteStep(step, index)" class="btn-danger">{{ trans('sites.delete') }}</button>
												</span>
												<li class="col-md-12">
													<p>@{{ step.content }}</p>
													<img class="col-md-12" v-bind:src="step.image" alt="">
												</li>
											</div>
										</ol>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<button class="col-md-2 col-md-offset-7 btn-warning" v-on:click.prevent="step2" >{{ trans('sites.back_step') }}</button>
									<div class="col-md-1"></div>
									<button class="col-md-2 btn-success"  v-on:click.prevent="step4" >{{ trans('sites.next_step') }}</button>
								</div>
							</div>
						</div>
						<!-- END Third Step -->

						<!-- Fourth Step -->
						<div id="checkout-fourth" class="step">
							<!-- Step Info -->
							<ul class="nav nav-pills nav-justified checkout-steps push-bit">
								<li><a href="javascript:void(0)" data-gotostep="checkout-first" v-on:click.prevent="step1"><strong>1. {{ trans('sites.cooking_infomation') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-second" v-on:click.prevent="step2"><strong>2. {{ trans('sites.cooking_ingredient') }}</strong></a></li>
								<li><a href="javascript:void(0)" data-gotostep="checkout-third" v-on:click.prevent="step3"><strong>3. {{ trans('sites.cooking_step') }}</strong></a></li>
								<li class="active"><a href="javascript:void(0)" data-gotostep="checkout-fourth" v-on:click.prevent="step4"><strong>4. {{ trans('sites.cooking_category') }}</strong></a></li>
							</ul>
							<!-- END Step Info -->
							<div class="col-md-12">
								<div class="col-md-6" v-for="category in categories">
									<h4 class="page-header"><strong>@{{ category.name }}</strong></h4>
									<ul>
										<li class="col-md-4" v-if="category.sub_categories.length" v-for="subCategory in category.sub_categories">
											<input class="checkbox-inline" type="checkbox" v-bind:name="subCategory.name" v-bind:value=" subCategory.id" v-model="selectCategory">
											<label for="jack"> @{{ subCategory.name }}</label>

										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-12 text-center row">
									<button class="col-md-2 col-md-offset-10 btn-warning" v-on:click.prevent="step3" >{{ trans('sites.back_step') }}</button>
							</div>
						</div>
						<!-- END Fourth Step -->

						<!-- Form Buttons -->
						<!-- END Form Buttons -->
					</form>
					<!-- END Checkout Wizard Content -->
					<div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
			                        </button>
			                        <h4 class="modal-title custom_align" id="Heading">{{ trans('sites.create_cooking') }}</h4>
			                    </div>
			                    <div class="modal-body clearfix">
			                        <div class="text-success">
			                            <h5 class="text-success">{{ trans('sites.message_submit_cooking') }}</h5>
			                            <h5 class="text-danger">{{ trans('sites.message_price_cooking') }}</h5>
			                        </div>
			                    </div>
			                    <div class="modal-footer ">
			                        <a href="javascript:void(0)" v-on:click="submit" class="btn btn-success">
			                            <span class="glyphicon glyphicon-ok-sign"></span>{{ trans('sites.create') }}
			                        </a>
			                        <button type="button" class="btn btn-warning" data-dismiss="modal">
			                            <span class="glyphicon glyphicon-remove"></span>{{ trans('sites.cancel') }}
			                        </button>
			                    </div>
			                </div>
			            </div>
        			</div>
        			<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
			            <div class="modal-dialog">
			                <div class="modal-content">
			                    <div class="modal-header">
			                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
			                        </button>
			                        <h4 class="modal-title custom_align" id="Heading">{{ trans('sites.reset_cooking') }}</h4>
			                    </div>
			                    <div class="modal-body clearfix">
			                    	<h5>{{ trans('sites.message_reset_cooking') }}</h5>
			                    </div>
			                    <div class="modal-footer ">
			                        <a href="javascript:void(0)" v-on:click="cancelCooking" class="btn btn-success">
			                            <span class="glyphicon glyphicon-ok-sign"></span>{{ trans('sites.reset') }}
			                        </a>
			                        <button type="button" class="btn btn-warning" data-dismiss="modal">
			                            <span class="glyphicon glyphicon-remove"></span>{{ trans('sites.cancel') }}
			                        </button>
			                    </div>
			                </div>
			            </div>
        			</div>
				</div>
			</div>
		</section>
	</div>
	<!--//wrap-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
	{{ Html::script('sites_custom/js/add.js') }}
@endsection
