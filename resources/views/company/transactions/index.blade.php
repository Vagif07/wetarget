@extends('layouts.app')

@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Transaction History</h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total {{$transactions->total()}} orders.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <a href="{{route('transactions.balance')}}" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                    </li>
                                </ul>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card card-bordered card-stretch">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h5 class="title">All Operations</h5>
                                        </div>
                                        <div class="card-tools mr-n1">
                                            <ul class="btn-toolbar">
                                                <li>
                                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                                </li><!-- li -->
                                                <li class="btn-toolbar-sep"></li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <em class="icon ni ni-setting"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li
                                                                    @if(Request::get('paginate') === null|| Request::get('paginate') === "5")
                                                                        class="active"
                                                                    @endif
                                                                >
                                                                    <a href="{{route('transactions', ["paginate" => '5', "q" => Request::get('q'), "orderBy" => Request::get('orderBy')])}}">5</a></li>
                                                                <li
                                                                    @if(Request::get('paginate') === "10")
                                                                        class="active"
                                                                    @endif
                                                                >
                                                                    <a href="{{route('transactions', ["paginate" => '10', "q" => Request::get('q'), "orderBy" => Request::get('orderBy')])}}">10</a></li>
                                                                <li
                                                                    @if(Request::get('paginate') === "20")
                                                                        class="active"
                                                                    @endif
                                                                >
                                                                    <a href="{{route('transactions', ["paginate" => '20', "q" => Request::get('q'), "orderBy" => Request::get('orderBy')])}}">20</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Order</span></li>
                                                                <li
                                                                    @if(Request::get('orderBy') === null|| Request::get('orderBy') === "DESC")
                                                                        class="active"
                                                                    @endif
                                                                >
                                                                    <a href="{{route('transactions', ["orderBy" => 'DESC', "q" => Request::get('q'), "paginate" => Request::get('paginate')])}}">DESC</a></li>
                                                                <li
                                                                    @if(Request::get('orderBy') === "ASC")
                                                                        class="active"
                                                                    @endif
                                                                ><a href="{{route('transactions', ["orderBy" => 'ASC', "q" => Request::get('q'), "paginate" => Request::get('paginate')])}}">ASC</a></li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- card-tools -->
                                        <div class="card-search search-wrap" data-search="search">
                                            <div class="search-content">
                                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                                <form action="{{route('transactions', ["paginate" => Request::get('paginate'), "orderBy" => Request::get('orderBy')])}}" method="GET">
                                                    <input type="text" name="q" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by order id" value="{{Request::get('q')}}">
                                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                                </form>
                                            </div>
                                        </div><!-- card-search -->
                                    </div><!-- .card-title-group -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                    <table class="table table-tranx">
                                        <thead>
                                            <tr class="tb-tnx-head">
                                                <th class="tb-tnx-id"><span class="">Order No.</span></th>
                                                <th class="tb-tnx-info">
                                                    <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                        <span>Note</span>
                                                    </span>
                                                    <span class="tb-tnx-date d-md-inline-block d-none">
                                                    <span class="d-md-none">Date</span>
                                                    <span class="d-none d-md-block">
                                                        <span>Create At</span>
                                                        <span>Done At</span>
                                                    </span>
                                                    </span>
                                                </th>
                                                <th class="tb-tnx-amount is-alt">
                                                    <span class="tb-tnx-total">Total</span>
                                                    <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                                </th>
                                            </tr><!-- tb-tnx-item -->
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $transaction)
                                                <tr class="tb-tnx-item">
                                                    <td class="tb-tnx-id">
                                                        <a href="#"><span>#{{$transaction->id}}</span></a>
                                                    </td>
                                                    <td class="tb-tnx-info">
                                                        <div class="tb-tnx-desc">
                                                            <span class="title">{{$transaction->note}}</span>
                                                        </div>
                                                        <div class="tb-tnx-date">
                                                            <span class="date">{{$transaction->created_at->format('d-m-Y')}}</span>
                                                            <span class="date">{{$transaction->done_at->format('d-m-Y')}}</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-tnx-amount is-alt">
                                                        <div class="tb-tnx-total">
                                                            <span class="amount">{{$transaction->amount . " " . $transaction->symbol}}</span>
                                                        </div>
                                                        <div class="tb-tnx-status">
                                                            <span class="badge badge-dot
                                                            @if($transaction->type === "IN") badge-success
                                                            @else badge-danger
                                                            @endif">
                                                                {{$transaction->type}}
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr><!-- tb-tnx-item -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- .card-inner -->
                                <div class="card-inner">
                                    {{$transactions->appends(Request::except('page'))->render()}}
                                </div><!-- .card-inner -->
                            </div><!-- .card-inner-group -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
