@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Chỉnh sửa dịch vụ
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
                                @foreach($edit_service as $key => $service)
                                <form role="form" action="{{URL::to('/save_edit_service/'.$service->service_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dịch vụ</label>
                                    <input type="text" name="name_service" required class="form-control" id="exampleInputEmail1" value="{{$service->name_service}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả dịch vụ</label>
                                    <textarea style="resize: none" required rows="8" class="form-control" name="description" id="service">{{$service->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="order">thứ tự dịch vụ</label>
                                    <input type="text" name="order" class="form-control" id="exampleInputEmail1" value="{{$service->order}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị trang chủ</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_service" class="btn btn-info">Cập nhật dịch vụ</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection