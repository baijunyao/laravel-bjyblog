@extends('blueberry.layouts.home')

@section('title', $head['title'])

@section('keywords', $head['keywords'])

@section('description', $head['description'])

@section('content')
    <div class="col-xs-12 col-md-12 col-lg-8">
        @if(Str::isTrue(config('bjyblog.breadcrumb')))
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 b-breadcrumb">
                    {{ Breadcrumbs::render() }}
                </div>
            </div>
        @endif
        <div class="row" id="b-content-site">
            @foreach($site as $k => $v)
                <div class="col-xs-12 col-md-4 col-lg-4 b-site">
                    <ul class="b-s-inside">
                        <li class="b-si-name">{{ $v->name }}</li>
                        <li class="b-si-url">{{ $v->url }}</li>
                        <li class="b-si-description">{{ $v->description }}</li>
                    </ul>
                    <a class="b-s-url" href="{{ $v->url }}" target="_blank"></a>
                </div>
            @endforeach
            <div class="col-xs-12 col-md-4 col-lg-4 b-site">
                <div class="b-s-inside">
                    <img class="b-s-plus" src="{{ cdn_url('images/home/plus.png') }}">
                    <a class="b-s-url js-add-site" href="javascript:;" ></a>
                </div>
            </div>
        </div>
    </div>

    <!-- 申请模态框开始 -->
    <div class="modal fade" id="b-modal-site" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title b-ta-center" id="myModalLabel">{{ __('Apply') }} <span class="b-hint">({{ __('Please add a friendly link to this site') }})</span></h4>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 b-submit-site">
                    <form class="form-horizontal" role="form" action="{{ url('site/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">{{ __('Site Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="url" class="col-sm-3 control-label">{{ __('URL') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-3 control-label">{{ __('Description') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="{{ __('Notification Email') }}">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary center-block b-s-submit">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 申请模态框结束 -->
@endsection

@section('js')
    <script>
        storeSite = "{{ url('site/store') }}";
    </script>
    <script src="{{ asset('statics/layer-2.4/layer.js') }}"></script>
@endsection
