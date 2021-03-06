+
<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin.category_manage')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php echo Html::style('admin/css/category.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<h1><?php echo e(trans('admin.ingredient')); ?></h1>
<ul class="breadcrumb">
   <i class="ti-server panel-title"></i>
   <li class="next">
      <a href="<?php echo e(route('admin.report')); ?>"><?php echo e(trans('admin.dashboard')); ?></a>
   </li>
   <li class="next">
      <a><?php echo e(trans('admin.category')); ?></a>
</ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section id="manage-vue" class="content p-l-r-15">
   <div class="row">
      <div class="col-md-12">
         <div class="panel">
            <div class="panel-heading">
               <button  type="button" class="btn btn-success" data-toggle="modal" v-on:click="addItem">
               <?php echo e(trans('admin.category_create')); ?>

               </button>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                     <div class="row">
                        <div class="col-sm-12">
                           <table id="table" role="grid" class="table table-bordered dataTable no-footer">
                              <thead>
                                 <tr role="row" class="filters">
                                    <th class="col-md-1"><?php echo e(trans('admin.id')); ?></th>
                                    <th class="col-md-1"><?php echo e(trans('admin.icon')); ?></th>
                                    <th class="col-md-1"><?php echo e(trans('admin.name')); ?></th>
                                    <th class="col-md-1"><?php echo e(trans('admin.status')); ?></th>
                                    <th class="col-md-1"><?php echo e(trans('admin.action')); ?></th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr v-for="item in items">
                                    <td>{{ item.id }}</td>
                                    <td><img class="icon-category" v-bind:src="item.icon" alt=""></td>
                                    <td>{{ item.name }}</td>
                                    <td v-if="item.status == null || item.status == 0"><span class=""><i class=" fa fa-eye-slash text-danger" aria-hidden="true" title="<?php echo e(trans('admin.not_show')); ?>"></i></span></td>
                                    <td v-if="item.status == 1"><span class=""><i class="fa fa-eye text-primary" aria-hidden="true" title="<?php echo e(trans('admin.show')); ?>"></i></span></td>
                                    <td v-if="item.status == 2"><span class=""><i class="fa fa-home text-success" aria-hidden="true" title="<?php echo e(trans('admin.in_home_page')); ?>"></i></span></td>
                                    <td>
                                       <span class="btn btn-info" v-on:click="editItem(item)">
                                       <i class="fa fa-edit" aria-hidden="true"></i> Cập Nhật
                                       </span>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div id="paginationName">
                        <nav class="dataTables_paginate paging_simple_numbers">
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
                                 @click.prevent="changePage(page)">{{ page }}</a>
                           </li>
                           <li v-if="pagination.current_page < pagination.last_page">
                              <a href="#"
                                 @click.prevent="changePage(pagination.current_page + 1)">
                              <span aria-hidden="true">»</span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <!-- Create Item Modal -->
                     <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.category_new')); ?></h4>
                              </div>
                              <div class="modal-body">
                                    <div class="form-group">
                                       <label for="name"><?php echo e(trans('admin.category_name')); ?></label>
                                       <input type="text" name="name" class="form-control" v-model="newItem.name" />
                                       <span v-if="formErrors['name']" class="error text-danger">{{ formErrors['name'][0] }}</span>
                                       <br>
                                       <br>
                                       <label for="parent_id"><?php echo e(trans('admin.category_parent')); ?></label>
                                       <select  class="input-sm" name="parent_id" id="" v-model="newItem.parent_id">
                                          <option value=""><?php echo e(trans('admin.none')); ?></option>
                                          <option v-for="item in category" v-bind:value="item.id">{{ item.name }}</option>
                                       </select>
                                       <label for="status"><?php echo e(trans('admin.status')); ?></label>
                                       <select  name="status" class="input-sm" id="" v-model="newItem.status">
                                          <option value="1"><?php echo e(trans('admin.show')); ?></option>
                                          <option value="0"><?php echo e(trans('admin.not_show')); ?></option>
                                          <option value="2"><?php echo e(trans('admin.in_home_page')); ?></option>
                                       </select>
                                       <br>
                                       <label for="status"><?php echo e(trans('admin.icon')); ?></label>
                                       <div class="file-upload-form">
                                          <input type="file" @change="previewImage" accept="image/*" name="avatar">
                                       </div>
                                    </div>
                              </div>
                              <div class="modal-footer ">
                              <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                              <span class="glyphicon glyphicon-remove"></span> <?php echo e(trans('admin.no')); ?>

                              </a>
                              <button type="submit" class="btn btn-success" v-on:click="createItem"><?php echo e(trans('admin.category_create')); ?></button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.category_edit')); ?></h4>
                              </div>
                              <div class="modal-body">
                                    <div class="form-group">
                                       <label for="name"><?php echo e(trans('admin.category_name')); ?></label>
                                       <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                       <span v-if="formErrorsUpdate['name']" class="error text-danger">{{ formErrorsUpdate['name'][0] }}</span><br>
                                       <br>
                                       <br>

                                       <label for="parent_id"><?php echo e(trans('admin.category_parent')); ?></label>
                                       <select  class="input-sm" name="parent_id" id="" v-model="fillItem.parent_id">
                                          <option value=""><?php echo e(trans('admin.none')); ?></option>
                                          <option v-for="item in category" v-bind:value="item.id">{{ item.name }}</option>
                                       </select>
                                       <label for="status"><?php echo e(trans('admin.status')); ?></label>
                                       <select  name="status" class="input-sm" id="" v-model="fillItem.status" class="input-sm">
                                          <option value="1"><?php echo e(trans('admin.show')); ?></option>
                                          <option value="0"><?php echo e(trans('admin.not_show')); ?></option>
                                          <option value="2"><?php echo e(trans('admin.in_home_page')); ?></option>
                                       </select>
                                       <br>
                                       <div class="file-upload-form">
                                          <input type="file" @change="previewImage" accept="image/*" name="avatar">
                                       </div>
                                       <img class="ico-none" v-bind:src="fillItem.icon" alt="">
                                    </div>
                              </div>
                                 <div class="modal-footer ">
                                    <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> <?php echo e(trans('admin.no')); ?>

                                    </a>
                                    <button type="submit" class="btn btn-success" v-on:click="updateItem(fillItem.id)">Cập Nhật</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('admin/category.js')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>