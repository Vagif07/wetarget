@extends('layouts.app')

@section('content')
    <!-- content @s -->
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{route('ads.index')}}"><em class="icon ni ni-arrow-left"></em><span>Advertisement List</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ __('Edit Ad ') . $ad->name }} </h2>
                                <div class="nk-block-des">
                                    <p class="lead">Please note, after information is edited advertisement will stop being active and will require additional review process</p>
                                </div>
                            </div>
                        </div>
                        <!-- .nk-block -->
                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-head">
                                        <h5 class="card-title">Ad Info</h5>
                                    </div>
                                    <form method="POST" action="{{ route('ads.update', $ad) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" class="form-control" id="name" value="{{ $ad->name }}" required autocomplete="name" autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="customFileLabel">File Upload</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="adFile" name="image">
                                                            <label class="custom-file-label" for="adFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="daily_budget">{{ __('Daily Budget') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="daily_budget" name="daily_budget" required value="{{ $ad->daily_budget }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="currency">{{ __('Currency') }}</label>
                                                    <div class="form-control-wrap">
                                                        <select name="currency" id="currency" class="form-select form-control form-control-lg" required>
                                                            <option value="AZN" @if($ad->currency == "AZN") selected @endif>AZN</option>
                                                            <option value="USD" @if($ad->currency == "USD") selected @endif>USD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Ad Type</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_type" type="radio" class="custom-control-input" id="image" value="IMAGE" required @if($ad->ad_type == "IMAGE") checked @endif>
                                                                <label class="custom-control-label" for="image">{{ __('Image')}}</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_type" type="radio" class="custom-control-input" id="video" value="VIDEO" required @if($ad->ad_type == "VIDEO") checked @endif>
                                                                <label class="custom-control-label" for="video">{{ __('Video')}}</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_type" type="radio" class="custom-control-input" id="text" value="TEXT" required @if($ad->ad_type == "TEXT") checked @endif>
                                                                <label class="custom-control-label" for="text">{{ __('Text')}}</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="action_link">{{ __('Ad Redirect Link') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="url" class="form-control" id="action_link" name="action_link" required value="{{ $ad->action_link }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="width">{{ __('Preferred Width') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="width" name="width" required value="{{ $ad->width }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="height">{{ __('Preferred Height') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="height" name="height" required value="{{ $ad->height }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="start_time">{{ __('Preferred Ad Start Time')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control time-picker" name="start_time" id="start_time" value="{{ $ad->start_time }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="end_time">{{ __('Preferred Ad End Time')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control time-picker" name="end_time" id="end_time" value="{{ $ad->end_time }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">{{ __('Description') }}</label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="description" class="form-control no-resize" id="description" required>{{ $ad->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label">Choose Preferred Ad Placement</label>
                                                    <ul class="custom-control-group g-3 align-center">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_placement" type="radio" class="custom-control-input" id="bottom" value="BOTTOM" required @if($ad->ad_placement == "BOTTOM") checked @endif>
                                                                <label class="custom-control-label" for="bottom">{{ __('Bottom (40$ - 100$)')}}</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_placement" type="radio" class="custom-control-input" id="left_right" value="LEFT_RIGHT" required @if($ad->ad_placement == "LEFT_RIGHT") checked @endif>
                                                                <label class="custom-control-label" for="left_right">{{ __('Left & Right (200$ - 500$)')}}</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_placement" type="radio" class="custom-control-input" id="top" value="TOP" required @if($ad->ad_placement == "TOP") checked @endif>
                                                                <label class="custom-control-label" for="top">{{ __('Top (80$ - 200$)')}}</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input name="ad_placement" type="radio" class="custom-control-input" id="no_pref" value="NO_PREF" required @if($ad->ad_placement == "NO_PREF") checked @endif>
                                                                <label class="custom-control-label" for="no_pref">{{ __('No Preference (40$ - 500$)')}}</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">{{ __('Tags')}}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="tags" id="tags" value="{{ json_encode($ad->tags) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" required class="custom-control-input" id="terms">
                                                        <label class="custom-control-label" for="terms">I agree with <a href="#">Terms & Conditions</a></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('Create Advertisement')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection

@push('js')
    <script src="{{asset('assets/js/libs/tagify.js')}}"></script>
    <script>
        const input = document.querySelector('input[name=tags]');
        new Tagify(input, {
            originalInputValueFormat: values => values.map(item => item.value).join(',')
        })
    </script>
@endpush
