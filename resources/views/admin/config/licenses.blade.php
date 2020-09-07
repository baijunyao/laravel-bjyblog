@extends('layouts.admin')

@section('title', 'SEO')

@section('nav', 'SEO')

@section('content')
    <form class="form-inline" enctype="multipart/form-data" action="{{ url('admin/config/update') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>{{ translate('Allow adaptation') }}：</th>
                <td>
                    {{ translate('Yes') }} <input class="bjy-icheck" type="radio" name="196" value="" @if($config['bjyblog.licenses.allow_adaptation'] === '') checked @endif> &emsp;&emsp;
                    {{ translate('No') }} <input class="bjy-icheck" type="radio" name="196" value="-nd" @if($config['bjyblog.licenses.allow_adaptation'] === '-nd') checked @endif>
                    {{ translate('Yes, as long as others share alike') }} <input class="bjy-icheck" type="radio" name="196" value="-sa" @if($config['bjyblog.licenses.allow_adaptation'] === '-sa') checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ translate('Allow commercial') }}：</th>
                <td>
                    {{ translate('Yes') }} <input class="bjy-icheck" type="radio" name="197" value="" @if($config['bjyblog.licenses.allow_commercial'] === '') checked @endif> &emsp;&emsp;
                    {{ translate('No') }} <input class="bjy-icheck" type="radio" name="197" value="-nc" @if($config['bjyblog.licenses.allow_commercial'] === '-nc') checked @endif>
                </td>
            </tr>

            <tr>
                <th>{{ translate('Language') }}：</th>
                <td>
                    {{ translate('English') }} <input class="bjy-icheck" type="radio" name="198" value="en" @if($config['bjyblog.licenses.language'] === 'en') checked @endif> &emsp;&emsp;
                    {{ translate('French') }} <input class="bjy-icheck" type="radio" name="198" value="fr" @if($config['bjyblog.licenses.language'] === 'fr') checked @endif>
                    {{ translate('Russian') }} <input class="bjy-icheck" type="radio" name="198" value="ru" @if($config['bjyblog.licenses.language'] === 'ru') checked @endif>
                    {{ translate('Chinese(Simplified)') }} <input class="bjy-icheck" type="radio" name="198" value="zh" @if($config['bjyblog.licenses.language'] === 'zh') checked @endif>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="{{ translate('Submit') }}">
                </td>
            </tr>
        </table>
    </form>
@endsection

