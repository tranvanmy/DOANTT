<div id="site_comments">
    @if(Auth::check())
        <!--respond-->
        <div class="comment-respond wow fadeInUp" id="respond" style="visibility: hidden; animation-name: none;">
                <h2>{{ trans('sites.write_comment') }}</h2>
                <div class="container two-third comment-content">
                    <form method="POST">
                        <div class="f-row">
                            <textarea id="submit_content" v-model="newComment.content"></textarea>
                        </div>
                        <div class="f-row">
                            <div class="third bwrap">
                                <input type="submit" value="{{ trans('sites.submit_comment') }}" @click.prevent="submitComment">
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        <!--//respond-->
    @endif

    <!--comments-->
    <div class="comments wow fadeInUp animated" id="comments" style="visibility: visible; animation-name: fadeInUp;">
        <h2>{{ trans('sites.comments') }}</h2>
        <ol class="comment-list" v-for="comment in comments" v-if="comment.parent_id == null">
            <!--comment-->
            <li class="comment depth-1">
                <div class="avatar"><a href=""><img :src="comment.user.avatar" alt=""></a></div>
                <div class="comment-box">
                    <div class="comment-author meta">
                        <strong>@{{ comment.user.name }}</strong>@{{ comment.user.created_at }} &nbsp;&nbsp;
                            @if(Auth::check())
                                <a href="#" class="comment-reply-link reply" @click.prevent="clickReply(comment.id)">{{ trans('sites.reply') }}</a>
                            @endif
                            <a href="#" class="icon text-right" v-if="current_user_id === comment.user_id" @click.prevent="editComment(comment.id)" ><i class="fa fa-pencil" aria-hidden="true">&nbsp;&nbsp;</i></a>
                            <a href="#" class="icon text-right" v-if="current_user_id === comment.user_id" @click.prevent="confirmDeleteComment(comment.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                    <div class="comment-text">
                        <p>@{{ comment.content }}</p>
                    </div>
                </div> 
            </li>
            <!--//comment-->

            <div class="container two-third reply-content" :id="comment.id" hidden>
                <form method="POST">
                    <div class="comment-box">
                        <input type="text" />
                    </div>
                    <input name="submit" type="submit" class="submit" value="{{ trans('sites.reply') }}" @click.prevent="submitReply(comment.id)">
                    <input name="reset" type="reset" class="cancel" value="{{ trans('sites.cancel') }}"@click.prevent="closeReply(comment.id)">
                </form>
            </div>

            <div class="container two-third reply-content" hidden :editId="comment.id">
                <form method="POST">
                    <div class="comment-box">
                        <input type="text" id="update_content" :value="comment.content"/>
                    </div>
                    <input name="submit" type="submit" class="submit" value="{{ trans('sites.update') }}" @click.prevent="updateComment(comment.id, comment.parent_id)">
                    <input name="reset" type="reset" class="cancel" value="{{ trans('sites.cancel') }}"@click.prevent="closeReply(comment.id, comment.parent_id)">
                </form>
            </div>

            <!--comment-->
            <ol class="comment-list" v-for="reply in comment.sub">
                <li class="comment depth-2">
                    <div class="avatar"><a href=""><img :src="reply.user.avatar" alt=""></a></div>
                    <div class="comment-box">
                        <div class="comment-author meta"> 
                            <strong>@{{ reply.user.name }}</strong>@{{ comment.user.created_at }} &nbsp;&nbsp;
                                <a href="#" class="icon text-right" v-if="current_user_id === reply.user_id" @click.prevent="editComment(reply.id)" ><i class="fa fa-pencil" aria-hidden="true">&nbsp;&nbsp;</i></a>
                                <a href="#" class="icon text-right" v-if="current_user_id === reply.user_id" @click.prevent="confirmDeleteComment(reply.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                        <div class="comment-text">
                            <p>@{{ reply.content }}</p>
                        </div>
                    </div> 
                </li>
            
                <div class="container two-third reply-content" hidden :editId="reply.id">
                    <form method="POST">
                        <div class="comment-box">
                            <input type="text" id="update_content" :value="reply.content"/>
                        </div>
                        <input name="submit" type="submit" class="submit" value="{{ trans('sites.update') }}" @click.prevent="updateComment(reply.id, reply.parent_id)">
                        <input name="reset" type="reset" class="cancel" value="{{ trans('sites.cancel') }}"@click.prevent="closeReply(reply.id, reply.parent_id)">
                    </form>
                </div>
            </ol>
           <!--//comment-->
        </ol>
        
        <nav class="dataTables_paginate paging_simple_numbers pager">
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#"
                       @click.prevent="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#"
                       @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--//comments-->

    <!-- Pagination -->
</div>