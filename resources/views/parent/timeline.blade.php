

@extends('parent.app')
@section('css')
<style>
    /* body {
    background-color: #eee
}

.card {
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    border-width: 0;
    transition: all .2s
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(26, 54, 126, 0.125);
    border-radius: .25rem
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem
}

.vertical-timeline {
    width: 100%;
    position: relative;
    padding: 1.5rem 0 1rem
}

.vertical-timeline::before {
    content: '';
    position: absolute;
    top: 0;
    left: 67px;
    height: 100%;
    width: 4px;
    background: #e9ecef;
    border-radius: .25rem
}

.vertical-timeline-element {
    position: relative;
    margin: 0 0 1rem
}

.vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
    visibility: visible;
    animation: cd-bounce-1 .8s
}

.vertical-timeline-element-icon {
    position: absolute;
    top: 0;
    left: 60px
}

.vertical-timeline-element-icon .badge-dot-xl {
    box-shadow: 0 0 0 5px #fff
}

.badge-dot-xl {
    width: 18px;
    height: 18px;
    position: relative
}

.badge:empty {
    display: none
}

.badge-dot-xl::before {
    content: '';
    width: 10px;
    height: 10px;
    border-radius: .25rem;
    position: absolute;
    left: 50%;
    top: 50%;
    margin: -5px 0 0 -5px;
    background: #fff
}

.vertical-timeline-element-content {
    position: relative;
    margin-left: 90px;
    font-size: .8rem
}

.vertical-timeline-element-content .timeline-title {
    font-size: .8rem;
    text-transform: uppercase;
    margin: 0 0 .5rem;
    padding: 2px 0 0;
    font-weight: bold
}

.vertical-timeline-element-content .vertical-timeline-element-date {
    display: block;
    position: absolute;
    left: -90px;
    top: 0;
    padding-right: 10px;
    text-align: right;
    color: #adb5bd;
    font-size: .7619rem;
    white-space: nowrap
}

.vertical-timeline-element-content:after {
    content: "";
    display: table;
    clear: both
} */

body{
    margin-top:20px;
    background:#eee;
}

.timeline {
    list-style-type: none;
    margin: 0;
    padding: 0;
    position: relative
}

.timeline:before {
    content: '';
    position: absolute;
    top: 5px;
    bottom: 5px;
    width: 5px;
    background: #2d353c;
    left: 20%;
    margin-left: -2.5px
}

.timeline>li {
    position: relative;
    min-height: 50px;
    padding: 20px 0
}

.timeline .timeline-time {
    position: absolute;
    left: 0;
    width: 18%;
    text-align: right;
    top: 30px
}

.timeline .timeline-time .date,
.timeline .timeline-time .time {
    display: block;
    font-weight: 600
}

.timeline .timeline-time .date {
    line-height: 16px;
    font-size: 12px
}

.timeline .timeline-time .time {
    line-height: 24px;
    font-size: 20px;
    color: #242a30
}

.timeline .timeline-icon {
    left: 15%;
    position: absolute;
    width: 10%;
    text-align: center;
    top: 40px
}

.timeline .timeline-icon a {
    text-decoration: none;
    width: 20px;
    height: 20px;
    display: inline-block;
    border-radius: 20px;
    background: #d9e0e7;
    line-height: 10px;
    color: #fff;
    font-size: 14px;
    border: 5px solid #2d353c;
    transition: border-color .2s linear
}

.timeline .timeline-body {
    margin-left: 23%;
    margin-right: 17%;
    background: #fff;
    position: relative;
    padding: 20px 25px;
    border-radius: 6px
}

.timeline .timeline-body:before {
    content: '';
    display: block;
    position: absolute;
    border: 10px solid transparent;
    border-right-color: #fff;
    left: -20px;
    top: 20px
}

.timeline .timeline-body>div+div {
    margin-top: 15px
}

.timeline .timeline-body>div+div:last-child {
    margin-bottom: -20px;
    padding-bottom: 20px;
    border-radius: 0 0 6px 6px
}

.timeline-header {
    padding-bottom: 10px;
    border-bottom: 1px solid #e2e7eb;
    line-height: 30px
}

.timeline-header .userimage {
    float: left;
    width: 34px;
    height: 34px;
    border-radius: 40px;
    overflow: hidden;
    margin: -2px 10px -2px 0
}

.timeline-header .username {
    font-size: 16px;
    font-weight: 600
}

.timeline-header .username,
.timeline-header .username a {
    color: #2d353c
}

.timeline img {
    max-width: 100%;
    display: block
}

.timeline-content {
    letter-spacing: .25px;
    line-height: 18px;
    font-size: 13px
}

.timeline-content:after,
.timeline-content:before {
    content: '';
    display: table;
    clear: both
}

.timeline-title {
    margin-top: 0
}

.timeline-footer {
    background: #fff;
    border-top: 1px solid #e2e7ec;
    padding-top: 15px
}

.timeline-footer a:not(.btn) {
    color: #575d63
}

.timeline-footer a:not(.btn):focus,
.timeline-footer a:not(.btn):hover {
    color: #2d353c
}

.timeline-likes {
    color: #6d767f;
    font-weight: 600;
    font-size: 12px
}

.timeline-likes .stats-right {
    float: right
}

.timeline-likes .stats-total {
    display: inline-block;
    line-height: 20px
}

.timeline-likes .stats-icon {
    float: left;
    margin-right: 5px;
    font-size: 9px
}

.timeline-likes .stats-icon+.stats-icon {
    margin-left: -2px
}

.timeline-likes .stats-text {
    line-height: 20px
}

.timeline-likes .stats-text+.stats-text {
    margin-left: 15px
}

.timeline-comment-box {
    background: #f2f3f4;
    margin-left: -25px;
    margin-right: -25px;
    padding: 20px 25px
}

.timeline-comment-box .user {
    float: left;
    width: 34px;
    height: 34px;
    overflow: hidden;
    border-radius: 30px
}

.timeline-comment-box .user img {
    max-width: 100%;
    max-height: 100%
}

.timeline-comment-box .user+.input {
    margin-left: 44px
}

.lead {
    margin-bottom: 20px;
    font-size: 21px;
    font-weight: 300;
    line-height: 1.4;
}

.text-danger, .text-red {
    color: #ff5b57!important;
}
</style>

{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}

@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between" style="background: #089bab">
                    <div class="iq-header-title">
                        <h4 class="card-title" style="color: whitesmoke"> Timeline </h4>
                    </div>
                    {{-- <div class="iq-header-title" style="float:right">
                        <a href="{{url('Student/Dashboard')}}"> 
                            <i style="color: whitesmoke; font-size: 30px" class="ri-home-smile-fill"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <ul class="timeline">
        <?php $n = 0; ?>
        @foreach ($timelines as $timeline)
            <li>
                <div class="timeline-time">
                    <span class="time">{{$timeline->date}}</span>
                    {{-- <span class="date">04:20</span> --}}
                </div>
                <div class="timeline-icon">
                    <a href="javascript:;">&nbsp;</a>
                </div>
                <div class="timeline-body">
                    <div class="timeline-header">
                    <span class="userimage"><img src="{{url('/').'/'.$timeline->image_user}}" alt=""></span>
                    <span class="username"><a href="javascript:;">{{$timeline->by}}</a> <small></small></span>
                    </div>
                    <div class="timeline-content">
                        <p class="lead">
                            <i class="fa fa-quote-left fa-fw pull-left"></i>
                            {{$timeline->sujet}}
                            <i class="fa fa-quote-right fa-fw pull-right"></i>
                            <br><br>
                                @if (!empty($timeline->image))
                                    <a href="{{url('Parent/download/timeline_file/'.$timeline->id)}}"><b style="color:rgb(221, 45, 54)">Télécharger document</b></a>
                                @else
                                    <b>Télécharger document</b>
                                @endif
                        </p>
                    </div><?php $n++; ?>
                    @if ($n == $counter)
                        <div class="timeline-comment-box">
                        <div class="user"><img src="{{url('/'.Auth::guard('parent')->user()->image)}}"></div>
                        <div class="input">
                            {{-- <form action="{{url('Parent/add_timeline')}}" methode="post" enctype="multipart/form-data"> --}}
                            <form  method="POST" action="{{url('Parent/add_timeline')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="sujet" class="form-control" required placeholder="Écrire un commentaire ... ">
                                </div><br>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choisir une image</label>
                                    </div>
                                    @error('image')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>
                                <div class="input-group justify-content-center">
                                    <button class="btn btn-primary p-t-10" >Commentaire</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    @endif
                </div>
                <!-- end timeline-body -->
            </li>
            
        @endforeach
        {{-- <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <span class="date">24 February 2014</span>
                <span class="time">08:17</span>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;">&nbsp;</a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <div class="timeline-header">
                <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
                <span class="username">Richard Leong</span>
                <span class="pull-right text-muted">1,282 Views</span>
                </div>
                <div class="timeline-content">
                <p class="lead">
                    <i class="fa fa-quote-left fa-fw pull-left"></i>
                    Quisque sed varius nisl. Nulla facilisi. Phasellus consequat sapien sit amet nibh molestie placerat. Donec nulla quam, ullamcorper ut velit vitae, lobortis condimentum magna. Suspendisse mollis in sem vel mollis.
                    <i class="fa fa-quote-right fa-fw pull-right"></i>
                </p>
                </div>
                <div class="timeline-footer">
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a> 
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                </div>
            </div>
            <!-- end timeline-body -->
        </li>
        <li>
            <!-- begin timeline-time -->
            <div class="timeline-time">
                <span class="date">10 January 2014</span>
                <span class="time">20:43</span>
            </div>
            <!-- end timeline-time -->
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;">&nbsp;</a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                <div class="timeline-header">
                <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
                <span class="username">Lelouch Wong</span>
                <span class="pull-right text-muted">1,021,282 Views</span>
                </div>
                <div class="timeline-content">
                <h4 class="template-title">
                    <i class="fa fa-map-marker text-danger fa-fw"></i>
                    795 Folsom Ave, Suite 600 San Francisco, CA 94107
                </h4>
                <p>In hac habitasse platea dictumst. Pellentesque bibendum id sem nec faucibus. Maecenas molestie, augue vel accumsan rutrum, massa mi rutrum odio, id luctus mauris nibh ut leo.</p>
                <p class="m-t-20">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                </p>
                </div>
                <div class="timeline-footer">
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a> 
                <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-share fa-fw fa-lg m-r-3"></i> Share</a>
                </div>
            </div>
            <!-- end timeline-body -->
        </li>
        <li>
            <!-- begin timeline-icon -->
            <div class="timeline-icon">
                <a href="javascript:;">&nbsp;</a>
            </div>
            <!-- end timeline-icon -->
            <!-- begin timeline-body -->
            <div class="timeline-body">
                Loading...
            </div>
            <!-- begin timeline-body -->
        </li> --}}
    </ul>
</div>
@endsection