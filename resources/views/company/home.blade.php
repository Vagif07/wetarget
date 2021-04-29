@extends('layouts.app')

@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Dashboard</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Welcome to WeTarget Dashboard.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xxl-6">
                                <div class="row g-gs">
                                    <div class="col-lg-6 col-xxl-12">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-2">
                                                    <div class="card-title">
                                                        <h6 class="title">Ad expenses</h6>
                                                        <p>Amount Spent on ads in last 30 days.</p>
                                                    </div>
                                                    <div class="card-tools">
                                                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Amount Spent on ads"></em>
                                                    </div>
                                                </div>
                                                <div class="align-end gy-3 gx-5 flex-wrap flex-md-nowrap flex-lg-wrap flex-xxl-nowrap">
                                                    <div class="nk-sale-data-group flex-md-nowrap g-4">
                                                        <div class="nk-sale-data">
                                                            <span class="amount">1,429.59 <span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>16.93%</span></span>
                                                            <span class="sub-title">This Month</span>
                                                        </div>
                                                        <div class="nk-sale-data">
                                                            <span class="amount">299.59 <span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>4.26%</span></span>
                                                            <span class="sub-title">This Week</span>
                                                        </div>
                                                    </div>
                                                    <div class="nk-sales-ck sales-revenue">
                                                        <canvas class="sales-bar-chart" id="salesRevenue"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-lg-6 col-xxl-12">
                                        <div class="row g-gs">
                                            <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Active Ads</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Total active ads"></em>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount">5</span>
                                                                <span class="sub-title"><span class="change down text-danger"><em class="icon ni ni-arrow-long-down"></em>1.93%</span>since last month</span>
                                                            </div>
                                                            <div class="nk-sales-ck">
                                                                <canvas class="sales-bar-chart" id="activeSubscription"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                            <div class="col-sm-6 col-lg-12 col-xxl-6">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <div class="card-title-group align-start mb-2">
                                                            <div class="card-title">
                                                                <h6 class="title">Avg Clicks per Ad</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="Daily Avg. clicks on an ad"></em>
                                                            </div>
                                                        </div>
                                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                                            <div class="nk-sale-data">
                                                                <span class="amount">146.2</span>
                                                                <span class="sub-title"><span class="change up text-success"><em class="icon ni ni-arrow-long-up"></em>2.45%</span>since last week</span>
                                                            </div>
                                                            <div class="nk-sales-ck">
                                                                <canvas class="sales-bar-chart" id="totalSubscription"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div><!-- .col -->
                                        </div><!-- .row -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .col -->
                            <div class="col-xxl-6">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start gx-3 mb-3">
                                            <div class="card-title">
                                                <h6 class="title">Daily Ad Expenses</h6>
                                                <p>Transaction that happened due to the ad flow in the last 30 days</p>
                                            </div>
                                        </div>
                                        <div class="nk-sale-data-group align-center justify-between gy-3 gx-5">
                                            <div class="nk-sale-data">
                                                <span class="amount">$1,429.59</span>
                                            </div>
                                            <div class="nk-sale-data">
                                                <span class="amount sm">15,937 <small>Total clicks</small></span>
                                            </div>
                                        </div>
                                        <div class="nk-sales-ck large pt-4">
                                            <canvas class="sales-overview-chart" id="salesOverview"></canvas>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-xxl-8">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title"><span class="mr-2">Transaction</span></h6>
                                            </div>
                                            <div class="card-tools">
                                                <ul class="card-tools-nav">
                                                    <li class="active"><a href="{{route('transactions')}}"><span>All</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-inner p-0 border-top">
                                        <div class="nk-tb-list nk-tb-orders">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col"><span>Order No.</span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                                                <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                                <div class="nk-tb-col tb-col-lg"><span>PAID_BY</span></div>
                                                <div class="nk-tb-col"><span>Amount</span></div>
                                                <div class="nk-tb-col"><span>Note</span></div>
                                                <div class="nk-tb-col"><span class="d-none d-sm-inline">Type</span></div>
                                            </div>
                                            @foreach($transactions as $transaction)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                        <span class="tb-lead"><a href="#">#{{$transaction->id}}</a></span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <div class="user-card">
                                                            <div class="user-avatar user-avatar-sm bg-purple">
                                                                <span>{{$transaction->user->company_name[0]}}</span>
                                                            </div>
                                                            <div class="user-name">
                                                                <span class="tb-lead">{{$transaction->user->company_name}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-md">
                                                        <span class="tb-sub">{{$transaction->created_at->format('d/m/Y')}}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-lg">
                                                        <span class="tb-sub text-primary">{{$transaction->paid_by}}</span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="tb-sub tb-amount">{{$transaction->amount}} <span>{{$transaction->currency}}</span></span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="tb-sub">{{$transaction->note}}</span>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="badge badge-dot badge-dot-xs
                                                        @if($transaction->type === "IN") badge-success
                                                        @else badge-danger
                                                        @endif">
                                                            {{$transaction->type}}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-lg-6 col-xxl-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="timeline">
                                            <h6 class="timeline-head">April, 2021</h6>
                                            <ul class="timeline-list">
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary is-outline"></div>
                                                    <div class="timeline-date">20 Apr <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Submited BirBank Ad</h6>
                                                        <div class="timeline-des">
                                                            <p>Submitted KYC Application form.</p>
                                                            <span class="time">09:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-primary"></div>
                                                    <div class="timeline-date">20 Apr <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">BirBank Ad wend under review</h6>
                                                        <div class="timeline-des">
                                                            <p>Moderators are checking your ad.</p>
                                                            <span class="time">10:30am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="timeline-item">
                                                    <div class="timeline-status bg-pink"></div>
                                                    <div class="timeline-date">20 Apr <em class="icon ni ni-alarm-alt"></em></div>
                                                    <div class="timeline-data">
                                                        <h6 class="timeline-title">Rejected BirBank Ad</h6>
                                                        <div class="timeline-des">
                                                            <p>Your ad was rejected due to its content.</p>
                                                            <span class="time">11:00am</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
