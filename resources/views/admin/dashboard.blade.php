@extends('layouts.app2')

@section('content')
    <section role="main" class="content-body">
        <header class="page-header">
            <h2>Dashboard</h2>

            <div class="right-wrapper text-right">
                <ol class="breadcrumbs">
                    <li>
                        <a href="#">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><span>Admin</span></li>
                    <li><span>Dashboard</span></li>
                </ol>

                <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
            </div>
        </header>

        <!-- start: page -->
        <div class="row">

            <div class="col-md-12">
                <div class="row mb-3">
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Users</h4>
                                            <div class="info">
                                                <strong class="amount">{{$users}}</strong>
                                                <span class="text-primary">({{$unverified}} unverified)</span>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">(view all)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-secondary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-secondary">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Total Coins</h4>
                                            <div class="info">
                                                <strong class="amount">{{$coins}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">(View all)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-tertiary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-tertiary">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Update Requests</h4>
                                            <div class="info">
                                                <strong class="amount">{{$updte}}</strong>
                                                <span class="text-primary">({{$penidng}} penidng)</span>

                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="text-muted text-uppercase" href="#">(view all)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-6">
                        <section class="card card-featured-left card-featured-quaternary">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-quaternary">
                                            <i class="fas fa-table"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h4 class="title">Newly Listed Coins</h4>
                                            <div class="info">
                                                <strong class="amount">{{$new}}</strong>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            </div>
            <!-- end: page -->
        </section>

    @endsection
