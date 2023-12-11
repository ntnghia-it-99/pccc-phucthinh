@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm dịch vụ
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-service')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dịch vụ</label>
                                    <input type="text" data-validation="length" required data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="order">thứ tự dịch vụ</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" name="order" class="form-control" id="exampleInputEmail1" placeholder="thứ tự danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả dịch vụ</label>
                                    <textarea style="resize: none" required  rows="8" class="form-control" name="description" id="service" placeholder="Mô tả dịch vụ"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị trang chủ</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1" selected>Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_service" class="btn btn-info">Thêm dịch vụ</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection