<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
         <div class="small-box bg-green">
            <div class="inner">
              <h3><?php // print_r($users_count);?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="<?php echo base_url()?>admin/clients-list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           <div class="small-box bg-red">
            <div class="inner">
              <h3><?php // print_r($question_count);?></h3>
              <p>Questions </p>
            </div>
            <div class="icon">
           <i class="fa fa-question" aria-hidden="true"></i>
            </div>
            <a href="<?php echo base_url()?>admin/questiontList" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>		
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php //print_r($article_count);?></h3>
              <p>Articles </p>
            </div>
            <div class="icon">
           <i class="fa fa-newspaper-o" aria-hidden="true"></i>
            </div>
            <a href="<?php echo base_url()?>admin/articles-List" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php //print_r($book_count);?></h3>
              <p>Books</p>
            </div>
            <div class="icon">
              <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            <a href="<?php echo base_url()?>admin/book-list" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> 
      </div>
    </section>
  </div>