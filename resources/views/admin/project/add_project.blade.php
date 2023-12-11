@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm dự án
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
                                <form role="form" action="{{URL::to('/them-du-an')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dự án</label>
                                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục" required>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh dự án</label>
                                    <div class="form-control" style="border: none">
                                        <input type="radio" name="quantity" id="one" onclick="chooseOption()" value="1"> Thêm 1 hình ảnh
                                        <input type="radio" name="quantity" id="more" onclick="chooseOption()" value="2"> Thêm nhiều hình ảnh
                                    </div>
                                    <input type="file" name="image" class="form-control" id="image" style="display: none">
                                    <input type="file" name="images[]" multiple class="form-control" id="images" style="display: none">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả dự án</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="description" id="ckeditor" placeholder="Mô tả dự án"></textarea>
                                </div>
                            
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị trang chủ</label>
                                      <select name="status" class="form-control input-sm m-bot15">
                                            <option value="0">Ẩn</option>
                                            <option value="1" selected>Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_project" class="btn btn-info">Thêm dự án</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            <script>
                function chooseOption() {
                    var checkBox = document.getElementById("one")
                    var checkBox1 = document.getElementById("more")
                    var image = document.getElementById("image")
                    var images = document.getElementById("images")
                    if (checkBox.checked == true){
                        image.style.display = "block";
                        images.style.display = "none";
                        image.setAttribute('required', '')
                        images.removeAttribute('required')
                    } else if (checkBox1.checked == true) {
                        images.style.display = "block";
                        image.style.display = "none";
                        images.setAttribute('required', '')
                        image.removeAttribute('required')
                    }
                }
            </script>
@endsection