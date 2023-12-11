@extends('main')
@section('content')
    <main id="main" class="">
        <div id="content" class="blog-wrapper blog-single page-wrapper">
            <div class="row align-center">
                <div class="large-10 col">
                        <article id="post-3761"
                            class="post-3761 post type-post status-publish format-standard has-post-thumbnail hentry category-dich-vu category-tin-tuc tag-lap-dat-he-thong-pccc tag-sua-chua-he-thong-pccc tag-thi-cong-he-thong-pccc tag-thiet-ke-he-thong-pccc">
                            <div class="article-inner ">
                                <header class="entry-header">
                                    <div class="entry-header-text entry-header-text-top text-left">

                                        <h1 class="entry-title">Những dự án đã thi công</h1>
                                        <div class="entry-divider is-divider small"></div>

                                        <div class="entry-meta uppercase is-xsmall">
                                            <span class="posted-on">Posted </span><span
                                                class="byline"> by <span class="meta-author vcard"><a
                                                        class="url fn n">admin</a></span></span>
                                        </div>
                                    </div>
                                </header>
                                <div class="entry-content single-page">
                                    @foreach ($project as $item)
                                        <a href="/du-an/{{ $item->project_slug }}"><p>{{ $item->name_project }}</p></a>
                                        @php
                                            $images = explode('|', $item->images);
                                        @endphp
                                        @foreach ($images as $image)
                                            @if ($image)
                                                <img src="{{URL::to('/')}}/images/project/{{$image}}" alt="{{ $item->name_project}}" style="height: 700px; width:700px">
                                                <hr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                   
                                    <p style="display: none">CÔNG TY TNHH Crecimiento Industrial Việt Nam </p>
                                    <p style="display: none">Công Ty TNHH K-Chem Việt Nam</p>
                                    <p style="display: none">Nhà Xưởng Công Ty TNHH ZIONCOM VIỆT NAM</p>
                                    <p style="display: none">Công Ty TNHH Thiết Bị Y Tế A&I Việt Nam</p>
                                    <p style="display: none">Nhà xưởng Công Ty TNHH Takigawa</p>
                                    <p style="display: none">Nhà xưởng Công Ty TNHH Powder Metallurgy Jinding Việt Nam</p>
                                    <p style="display: none">Công Ty TNHH Phú Thịnh</p>
                                    <p style="display: none">Công Ty TNHH Din Sen Việt Nam</p>
                                    <p style="display: none">Công Ty TNHH TM-XNK Gia Công Keng Yuan</p>
                                    <p style="display: none">Công Ty TNHH Thành Hồng</p>
                                    <p style="display: none">Công Ty TNHH Xiang Jiang Group (Việt Nam)</p>
                                    <p style="display: none">Nhà Kho Tự Động Công Ty TNHH Timber Industries </p>
                                    <p style="display: none">Nhà Xưởng Công Ty Tnhh Kiswire Việt Nam</p>
                                    <p style="display: none">Nhà xưởng Công Ty TNHH Unique Safety Equipment (Việt Nam)</p>
                                    <p style="display: none">Công Ty TNHH Aforge Metal Products (Việt Nam)</p>
                                    <p style="display: none">Công Ty TNHH Sản Xuất Găng Tay Y Tế Xanh</p>
                                    <p style="display: none">Trường THCS Hòa Lợi</p>
                                    <p><span style="font-size: 120%; color: #ff0000;"><strong>CÔNG TY TNHH TM & KT PCCC PHÚC THỊNH</strong></span></p>
                                    <p>Địa chỉ: 64 Đường số 4 - Khu dân cư Hiệp Thành III - Thủ dầu một - Bình Dương<br />
                                        Email: phucthinhpccc.vn@gmail.com<br />
                                        Điện thoại : 0903333718<br />
                                        Website: <a href="https://pcccphucthinh.vn/">www.pcccphucthinh.vn</a></p>
                                    <p>Nếu bạn hoặc khách hàng của bạn quan tâm đến việc <strong>thiết kế hệ thống
                                            PCCC</strong> hoặc cần tư vấn về các dự án liên quan, xin vui lòng liên hệ
                                        với chúng tôi qua một trong các phương tiện trên. Chúng tôi sẽ cung cấp dịch vụ
                                        tư vấn và thiết kế chuyên nghiệp trong lĩnh vực PCCC.</p>
                                    <h3><span><strong>Dịch vụ của chúng tôi bao
                                                gồm:</strong></span></h3>
                                    <p>&#8211; Thiết kế chi tiết hệ thống PCCC phù hợp với yêu cầu và tiêu chuẩn kỹ
                                        thuật.</p>
                                    <p>&#8211; Lập kế hoạch triển khai và bảo dưỡng hệ thống PCCC.</p>
                                    <p>&#8211; Hỗ trợ trong việc tuân thủ các quy định và yêu cầu pháp lý liên quan đến
                                        PCCC.</p>
                                    <p>Chúng tôi cam kết đảm bảo an toàn và bảo vệ tài sản của bạn thông qua các giải
                                        pháp PCCC chất lượng cao. Hãy <a rel="noopener">liên hệ với chúng tôi</a> để thảo luận về dự án cụ thể của
                                        bạn và chúng tôi sẽ cố gắng cung cấp giải pháp tốt nhất cho nhu cầu của bạn.</p>
                                </div>
                            </div>
                        </article>
                </div>

            </div>

        </div>


        <script nitro-exclude>
            document.cookie = 'nitroCachedPage=' + (!window.NITROPACK_STATE ? '0' : '1') + '; path=/; SameSite=Lax';
        </script>
        <script nitro-exclude>
            if (!window.NITROPACK_STATE || window.NITROPACK_STATE != 'FRESH') {
                var proxyPurgeOnly = 0;
                if (typeof navigator.sendBeacon !== 'undefined') {
                    var nitroData = new FormData();
                    nitroData.append('nitroBeaconUrl', 'aHR0cHM6Ly9wY2NjcG5uLmNvbS90aGlldC1rZS1oZS10aG9uZy1wY2NjLw==');
                    nitroData.append('nitroBeaconCookies', 'W10=');
                    nitroData.append('nitroBeaconHash',
                        'baea5f79cb3fb5dfea05dd99490d1a8c10640b800065d6892a6522956800a27e2f4140b6ae70b61da738261d6d78cb01d1b06a2394aacc7fde3e998a49dbcc49'
                        );
                    nitroData.append('proxyPurgeOnly', '');
                    nitroData.append('layout', 'post');
                    navigator.sendBeacon(location.href, nitroData);
                } else {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', location.href, true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send(
                        'nitroBeaconUrl=aHR0cHM6Ly9wY2NjcG5uLmNvbS90aGlldC1rZS1oZS10aG9uZy1wY2NjLw==&nitroBeaconCookies=W10=&nitroBeaconHash=baea5f79cb3fb5dfea05dd99490d1a8c10640b800065d6892a6522956800a27e2f4140b6ae70b61da738261d6d78cb01d1b06a2394aacc7fde3e998a49dbcc49&proxyPurgeOnly=&layout=post'
                        );
                }
            }
        </script>
    </main>
@endsection
