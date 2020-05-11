@extends('admin.layouts.admin')

@section('title', 'SEO')

@section('nav', 'SEO')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ __('Allow adaptation') }}：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="196" value="" @if($config['bjyblog.licenses.allow_adaptation'] === '') checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="196" value="-nd" @if($config['bjyblog.licenses.allow_adaptation'] === '-nd') checked @endif>
                    {{ __('Yes, as long as others share alike') }} <input class="bjy-icheck" type="radio" name="196" value="-sa" @if($config['bjyblog.licenses.allow_adaptation'] === '-sa') checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ __('Allow commercial') }}：</th>
                <td>
                    {{ __('Yes') }} <input class="bjy-icheck" type="radio" name="197" value="" @if($config['bjyblog.licenses.allow_commercial'] === '') checked @endif> &emsp;&emsp;
                    {{ __('No') }} <input class="bjy-icheck" type="radio" name="197" value="-nc" @if($config['bjyblog.licenses.allow_commercial'] === '-nc') checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ __('Language') }}：</th>
                <td>
                    {{ __('English') }} <input class="bjy-icheck" type="radio" name="198" value="en" @if($config['bjyblog.licenses.language'] === 'en') checked @endif> &emsp;&emsp;
                    {{ __('French') }} <input class="bjy-icheck" type="radio" name="198" value="fr" @if($config['bjyblog.licenses.language'] === 'fr') checked @endif>
                    {{ __('Russian') }} <input class="bjy-icheck" type="radio" name="198" value="ru" @if($config['bjyblog.licenses.language'] === 'ru') checked @endif>
                    {{ __('Chinese(Simplified)') }} <input class="bjy-icheck" type="radio" name="198" value="zh" @if($config['bjyblog.licenses.language'] === 'zh') checked @endif>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ __('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection

