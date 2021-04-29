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
                                <div class="nk-block-head-sub"><a class="back-to" href="{{route('dashboard')}}"><em class="icon ni ni-arrow-left"></em><span>Dashboard</span></a></div>
                                <h2 class="nk-block-title fw-normal">{{ __('Top-up The Balance') }} </h2>
                                <div class="nk-block-des">
                                    <p class="lead">Top up your balance in order to gain ability to activate your ads and show them to users</p>
                                </div>
                            </div>
                        </div>
                        <!-- .nk-block -->
                        <div class="nk-block nk-block-lg">
                            <div class="row g-gs">
                                <div class="col-lg-6 mx-auto">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <div class="card-head">
                                                <h5 class="card-title">Transaction Info</h5>
                                            </div>
                                            <form method="POST" action="{{ route('topUp') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-label" for="amount">{{ __('Amount') }}</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="amount" name="amount">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="currency">{{ __('Currency') }}</label>
                                                    <div class="form-control-wrap">
                                                        <select name="currency" id="currency" class="form-select form-control form-control-lg">
                                                            <option value="AZN">AZN</option>
                                                            <option value="USD">USD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="paid_by">{{ __('Pay By') }}</label>
                                                    <div class="form-control-wrap">
                                                        <select name="paid_by" id="paid_by" class="form-select form-control form-control-lg">
                                                            <option value="BONUS">BONUS</option>
                                                            <option value="GIFT_CARD">GIFT_CARD</option>
                                                            <option value="CASH">CASH</option>
                                                            <option value="CREDIT_CARD">CREDIT_CARD</option>
                                                            <option value="OTHER">OTHER</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="note">{{ __('Note') }}</label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="note" class="form-control no-resize" id="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">{{ __('Top Up') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
