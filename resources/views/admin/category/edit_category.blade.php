@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sản phẩm
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_category as $item)
                            <form role="form" action="{{ URL::to('/update-category/' . $item->category_id) }}"
                                method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Tên danh mục" value="{{ $item->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="description" id="exampleInputPassword1"
                                        placeholder="Mô tả danh mục" value="{{ $item->description }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        @if ($item->status == 1)
                                            <option selected value="1">Hiển thị</option>
                                        @else
                                            <option value="0">Ẩn</option>
                                        @endif

                                    </select>
                                </div>

                                <button type="submit" name="edit_categopry" class="btn btn-info">Edit danh
                                    mục</button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    @endsection
