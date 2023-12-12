@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê dịch vụ
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
                            <th>Tên dịch vụ</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_service as $key => $pro)
                            <tr>
                                <td>{{ $pro->name_service }}</td>
                                <td><span class="text-ellipsis">
                                        <?php
                                        if($pro->status==1){
                                            ?>
                                            <span
                                                    class="fa-thumb-styling fa fa-thumbs-up"></span>
                                            <?php
                                            }else{
                                            ?>
                                        <span
                                             class="fa-thumb-styling fa fa-thumbs-down"></span>
                                        <?php
                                            }
                                            ?>
                                    </span></td>

                                <td>
                                    <a href="{{ URL::to('/sua-dich-vu/'.$pro->service_id) }}" class="active styling-edit"
                                        ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa dịch vụ này ko?')"
                                        href="{{ URL::to('/xoa-dich-vu/' . $pro->service_id) }}"
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
                            {{$all_service->links()}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
