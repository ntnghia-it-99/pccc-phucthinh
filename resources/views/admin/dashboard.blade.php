@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="panel-body">
        <div class="col-md-12 w3ls-graph">
            <!--agileinfo-grap-->
            <div class="agileinfo-grap">
                <div class="agileits-box">
                    <header class="agileits-box-header clearfix">
                        <h3>Visitor Statistics</h3>
                        <div class="toolbar">


                        </div>
                    </header>
                    <div class="agileits-box-body clearfix">
                        <div id="hero-area"></div>
                    </div>
                </div>
            </div>
            <!--//agileinfo-grap-->

        </div>
    </div>
</div>
<div class="agil-info-calendar">
    <!-- calendar -->
    <div class="col-md-6 agile-calendar">
        <div class="calendar-widget">
            <div class="panel-heading ui-sortable-handle">
                <span class="panel-icon">
                    <i class="fa fa-calendar-o"></i>
                </span>
                <span class="panel-title"> Calendar Widget</span>
            </div>
            <!-- grids -->
            <div class="agile-calendar-grid">
                <div class="page">

                    <div class="w3l-calendar-left">
                        <div class="calendar-heading">

                        </div>
                        <div class="monthly" id="mycalendar"></div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
@endsection