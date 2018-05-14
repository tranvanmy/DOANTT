<footer class="foot" role="contentinfo">
    <div class="wrap clearfix">
        <div class="row">
            <article class="one-half">
                <h5>Chào mừng bạn đến với UTTCOOK</h5>
            </article>
            <article class="one-fourth">
                <h5>{{ trans('sites.needHelp') }}</h5>
                <p>{{ trans('sites.contactUs') }}</p>
                <p><em>T:</em> 0964 395 169<br /><em>E:</em>  <a href="#">{{ trans('sites.mail') }}</a></p>
            </article>
            <div id="subcrice">
                <article class="one-fourth">
                    <h5>{{ trans('sites.follow') }}</h5>
                    <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                        <input type="email" name="email" class="form-control" v-model="newItem.email" />
                        <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'][0] }}</span>
                        <br>
                    </form>
                    <hr/>
                    <ul class="social">
                        <li class="facebook"><a href="#" >{{ trans('sites.facebook') }}</a></li>
                        <li class="youtube"><a href="#" >{{ trans('sites.youtube') }}</a></li>
                    </ul>
                </article>
            </div>
            <div class="bottom">
                <nav class="foot-nav">
                    <ul>
                        <li><a href="" title="{{ trans('sites.home')}}">{{ trans('sites.home')}}</a></li>
                        <li><a href="" title="{{ trans('sites.blog')}}">{{ trans('sites.blog')}}</a></li>
                        <li><a href="" title="{{ trans('sites.contact')}}">{{ trans('sites.contact')}}</a></li>  
                        <li><a href="" title="{{ trans('sites.login')}}">{{ trans('sites.login')}}</a></li>
                        <li><a href="" title="{{ trans('sites.register')}}">{{ trans('sites.register')}}</a></li>                                        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>
<div class="preloader">
    <div class="spinner"></div>
</div>
