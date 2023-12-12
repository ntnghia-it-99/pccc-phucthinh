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
                            <th>Tên dự án</th>
                            <th>Hình dự án</th>
                            <th>Hiển thị</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_project as $key => $pro)
                        <tr>
                            <td>{{ $pro->name_project }}</td>
                            <td>
                                @php
                                    $images = explode('|', $pro->images);
                                @endphp
                                @foreach ($images as $image)
                                    @if ($image)
                                        <img src="/images/project/{{ $image }}" height="100" width="100">
                                    @endif
                                @endforeach
                            </td>
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
                                <a href="{{ URL::to('/sua-du-an/' . $pro->id) }}" class="active styling-edit"
                                    ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')"
                                    href="{{ URL::to('/delete_project/' . $pro->id) }}"
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
                            {{$all_project->links()}}
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
@endsection
