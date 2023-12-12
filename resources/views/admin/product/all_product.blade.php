@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê sản phẩm
            </div>
            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_product as $key => $pro)
                        <tr>
                            <td>{{ $pro->name_product }}</td>
                            <td>{{ $pro->price }}</td>
                            <td><img src="/images/product/{{ $pro->image }}" height="100" width="100">
                            </td>
                            <td>{{ $pro->name }}</td>
                            <td><span class="text-ellipsis">
                                    <?php
                                    if($pro->status==1){
                                        ?>
                                        <a><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                        <?php
                                        }
                                        ?>
                                </span></td>

                            <td>
                                <a href="{{ URL::to('/sua-san-pham/' . $pro->product_id) }}" class="active styling-edit"
                                    ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')"
                                    href="{{ URL::to('/delete_product/' . $pro->product_id) }}"
                                    class="active styling-edit" ui-toggle-class="">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            {{$all_product->links()}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
