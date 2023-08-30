@extends('layouts.app')

@section('content')


<section class="home">
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h1>New Listings</h1>
                <h2>New listings need 500 votes to be accepted</h2>
            </div>
            <div class="column is-6">
                <div class="pro">
                    <a href="{{\App\Advertisement::where(['id' => 3])->pluck('referral_url')->first()}}" class="pro-image" target="_blank">
                        <img src="{{\App\Advertisement::where(['id' => 3])->pluck('image_url')->first()}}" alt="" class="is-hidden-mobile">
                        <img src="{{\App\Advertisement::where(['id' => 3])->pluck('image_url')->first()}}" alt="" class="is-hidden-tablet">
                    </a>
                    <p class="has-text-right">
                        <a href="{{ route('contact-us') }}">Advertise with us!</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="listings promoted">
            <div class="columns promoted-header">
                <div class="column is-4">
                    <h2>Promoted</h2>
                </div>
                <div class="column has-text-right is-8">
                    <a href="{{ route('contact-us') }}">Your coin here?<span class="is-hidden-mobile"> Contact us!</span></a>
                </div>
            </div>
            <table class="table is-fullwidth is-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Name</th>
                    <th class="is-hidden-mobile">Chain</th>
                    <th class="is-hidden-mobile">Symbol</th>
                    <th class="is-hidden-mobile ">Market Cap</th>
                    <th class="is-hidden-mobile">Price</th>
                    <th class="is-hidden-mobile">Launch</th>
                    <th class="is-hidden-mobile">Votes</th>
                    <th>Vote<span class="is-hidden-tablet">s</span></th>
                </tr>
                </thead>
                <tbody>

                @foreach($promoted as $promote)
                    <a href="{{route('coin-detail',['cm' =>$promote->id])}}" target="_blank">
                        <tr>
                            <td class="has-wishlist ignore">
                <span>
                    1
                </span>

                                <div class="wishlist-button">
                                    <div class="wishlist-add"><i class="far fa-star"></i></div>
                                </div>
                            </td>
                            <td class="ignore">
                                <div class="flex">
                                    <img src="{{$promote->image}}" alt="" height="24">
                                </div>
                            </td>
                            <td class="name">
                                <div class="name">
                                    <b>{{$promote->name}}</b>
                                    <div class="is-hidden-tablet">
                                        ${{$promote->symbol}} <span class="network">{{$promote->network}} </span>
                                    </div>
                                </div>
                            </td>
                            <td class="is-hidden-mobile"><span class="network">{{$promote->network}} </span></td>
                            <td class="is-hidden-mobile">
                                ${{$promote->symbol}}
                            </td>
                            <td class="is-hidden-mobile price">{!! isset($promote->marketcap)? $promote->marketcap: ''  !!}</td>
                            <td class="is-hidden-mobile price">
                                <span class="is-12">{!! isset($promote->price_usd)? $promote->price_usd: ''  !!}</span>
                            </td>
                            <td class="is-hidden-mobile age">{{date_format(new DateTime($promote->launch_date),"F j, Y")}}</td>
                            <td class="is-hidden-mobile">
            <span class="votes">
                                   {{$promote->vote}}
                            </span>
                                <a href="{{route('coin-detail',['cm' =>$promote->id])}}" target="_blank" class="button is-success is-hidden">
                <span class="votes is-hidden-tablet">
                                            {{$promote->vote}}
                                    </span>
                                    <span>Vote</span>
                                </a>
                            </td>
                            <td>
                                <a href="{{route('coin-detail',['cm' =>$promote->id])}}" target="_blank" class="button is-success">
                    <span class="votes is-hidden-tablet">
                                              {{$promote->vote}}
                                            </span>
                                    <span>Vote</span>
                                </a>
                            </td>
                        </tr></a>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="has-tabs">
            <div class="tabs is-boxed is-large is-hidden-mobile">
                <ul>
                    <li class="">
                        <a href="{{ route('/') }}">
                            <span class="icon is-small"><i class="far fa-clock"></i></span>
                            <span>Today</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('alltime') }}">
                            <span class="icon is-small"><i class="fas fa-fire"></i></span>
                            <span>All Time</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="{{ route('new') }}">
                            <span class="icon is-small"><i class="fas fa-plus"></i></span>
                            <span>New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('marketcap') }}">
                            <span class="icon is-small"><i class="fas fa-coins"></i></span>
                            <span>Marketcap</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('presales') }}">
                            <span class="icon is-small"><i class="fas fa-stopwatch"></i></span>
                            <span>Presales</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tabs is-boxed is-hidden-tablet">
                <ul>
                    <li class="">
                        <a href="{{ route('/') }}">
                            <span class="icon is-small"><i class="far fa-clock"></i></span>
                            <span>Today</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('alltime') }}">
                            <span class="icon is-small"><i class="fas fa-fire"></i></span>
                            <span>All Time</span>
                        </a>
                    </li>
                    <li class="is-active">
                        <a href="{{ route('new') }}">
                            <span class="icon is-small"><i class="fas fa-plus"></i></span>
                            <span>New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('marketcap') }}">
                            <span class="icon is-small"><i class="fas fa-coins"></i></span>
                            <span>Marketcap</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('presales') }}">
                            <span class="icon is-small"><i class="fas fa-stopwatch"></i></span>
                            <span>Presales</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="listings">
            <table class="table is-fullwidth is-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Name</th>
                    <th class="is-hidden-mobile">Chain</th>
                    <th class="is-hidden-mobile">Symbol</th>
                    <th class="is-hidden-mobile ">Market Cap</th>
                    <th class="is-hidden-mobile">Price</th>
                    <th class="is-hidden-mobile">Launch</th>
                    <th class="is-hidden-mobile">Votes</th>

                    <th>Vote<span class="is-hidden-tablet">s</span></th>
                </tr>
                </thead>
                <tbody>
     @foreach($new as $nw)
               <a href="{{route('coin-detail',['cm' =>$nw->id])}}" target="_blank">
                   <tr>
                    <td class="has-wishlist ignore">
                <span>
                   {{ $nw->iteration }}
                </span>

                        <div class="wishlist-button">
                            <div class="wishlist-add"><i class="far fa-star"></i></div>
                        </div>
                    </td>
                    <td class="ignore">
                        <div class="flex">
                            <img src="{{$nw->image}}" alt="" height="24">
                        </div>
                    </td>
                    <td class="name">
                        <div class="name">
                            <b>{{$nw->name}}</b>
                            <div class="is-hidden-tablet">
                                ${{$nw->symbol}} <span class="network">{{$nw->network}} </span>
                            </div>
                        </div>
                    </td>
                    <td class="is-hidden-mobile"><span class="network">{{$nw->network}} </span></td>
                    <td class="is-hidden-mobile">
                        ${{$nw->symbol}}
                    </td>
                    <td class="is-hidden-mobile price">{!! isset($nw->marketcap)? $nw->marketcap: ''  !!}</td>
                    <td class="is-hidden-mobile price">
                        <span class="is-12">{!! isset($nw->price_usd)? $nw->price_usd: ''  !!}</span>
                    </td>
                    <td class="is-hidden-mobile age">{{date_format(new DateTime($nw->launch_date),"F j, Y")}}</td>
                    <td class="is-hidden-mobile">
            <span class="votes">
                                   {{$nw->vote}}
                            </span>
                        <a href="{{route('coin-detail',['cm' =>$nw->id])}}" target="_blank" class="button is-success is-hidden">
                <span class="votes is-hidden-tablet">
                                            {{$nw->vote}}
                                    </span>
                            <span>Vote</span>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('coin-detail',['cm' =>$nw->id])}}" target="_blank" class="button is-success">
                    <span class="votes is-hidden-tablet">
                                              {{$nw->vote}}
                                            </span>
                            <span>Vote</span>
                        </a>
                    </td>
                </tr></a>
          @endforeach
                </tbody>
            </table>
            {{ $new->links() }}

        </div>

        <div class="columns">
            <div class="column is-6">
                <div class="notice">
                    <h2>Your Favorite Coin Missing?</h2>
                    <p>Can't find your coin? List your favorite coin now!<br class="is-hidden-mobile"> Get your community to vote for your coin and gain exposure.</p>
                    <a href="{{ route('submit') }}" class="button is-success">Submit Coin</a>
                </div>
            </div>
            <div class="column is-6">
                <div class="notice">
                    <h2>View Top Coins</h2>
                    <p>Click the button below to view the Top Listed coins!<br class="is-hidden-mobile"> These coins had at least 500 community votes.</p>
                    <a href="{{ route('alltime') }}" class="button is-primary">View Top Coins</a>
                </div>
            </div>
        </div>

        <divdiv class="seo">
            <div class="columns">
                <div class="column is-6">
                    <h2>Find the best new cryptocurrency projects</h2>
                    <p>
                        Did ever you wonder where people find the best new cryptocurrency projects, coins and tokens like Doge and Shiba Inu? They use
                        websites like <a href="{{ route('/') }}">coinbuzzer.me</a> Cryptocurrency projects are listed here before CoinMarketCap,
                        CoinGecko and major exchanges. Find the best crypto moonshots on our website.
                    </p>
                    <p>
                        However: before investing always do your
                        own research (DYOR)! Listing on <a href="{{ route('/') }}">coinbuzzer.me</a> does NOT mean we endorse the project, they could be scams.
                        Be careful with your investments.
                    </p>
                </div>
                <div class="column is-6">

                    <h2>How does CoinBuzzer work?</h2>
                    <p>
                        New cryptocurrency projects can be listed <a href="{{ route('submit') }}">Applying Here.</a> Once applied, they instantly become visible
                        on the <a href="{{ route('new') }}">New Listings Page.</a> New listings require 500 votes to be officially listed in our top list.
                        After that, anyone can see and vote for the project.
                    </p>
                    <p>
                        Get your community to vote on your project, because votes matter! Our ranking is simple: the highest votes is #1 on our website.
                        The project will get exposure with all our visitors!
                    </p>
                    <p>
                        <b>Note on voting:</b> Unique votes only count once for the "All Time" page, but can count every 24 hours on the "Today" page.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
