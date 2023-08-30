@extends('layouts.app')

@section('content')


    <section class="listing">
        <div class="container">

            <div class="columns">
                <div class="column is-6">
                    <div class="bread">
                        <ul>
                            <li><a href="{{ route('/') }}">Home</a></li>
                            <li><a href="{{ route('new') }}">@if($coin->status == 'new') New Listings @else Top Coins @endif</a></li>
                            <li>{!! isset($coin->name)? $coin->name: ''  !!}</li>
                        </ul>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="pro">
                        <a href="{{\App\Advertisement::where(['id' => 6])->pluck('referral_url')->first()}}" class="pro-image" target="_blank">
                            <img src="{{\App\Advertisement::where(['id' => 6])->pluck('image_url')->first()}}" alt="" class="is-hidden-mobile">
                            <img src="{{\App\Advertisement::where(['id' => 6])->pluck('image_url')->first()}}" alt="" class="is-hidden-tablet">
                        </a>
                        <p class="has-text-right">
                            <a href="{{ route('contact-us') }}">Advertise with us!</a>
                        </p>
                    </div>
                </div>
            </div>
            @if (Route::has('login'))
                @auth
                    @if(\App\Vote::where(['user_id' =>  Auth::user()->id, 'coin_id' => $coin->id, 'date' => date('Y-m-d')])->first() != '') <div class="message">
                        Thanks for your vote!
                    </div> @else  @endif
                @else
                @endauth

            @endif



            @if($coin->presale == 'Yes') <div class="message error">
                This project is in presale phase. Be careful when investing into presales - these projects have no history and no known smart contract.<br>For more information how to spot scams, please read our article <a href="{{ route('anti-scam-guide') }}">How To Spot Scams</a>.
            </div> @else  @endif


            <div class="listing">
                <div class="columns">
                    <div class="column is-8">
                        <div class="listing-header">
                            <img src="{!! isset($coin->image)? $coin->image: ''  !!}" alt="">
                            <div>
                                <h1>
                                    {!! isset($coin->name)? $coin->name: ''  !!}
                                    <br class="is-hidden-tablet">
                                    <span>$ {!! isset($coin->symbol)? $coin->symbol: ''  !!}</span>
                                    @if($coin->coinmarket_link != '')
                                        <a href="{!! isset($coin->coinmarket_link)? $coin->coinmarket_link: ''  !!}" target="_blank" class="cmc has-tooltip-arrow"
                                                                    data-tooltip="View on CoinMarketCap"><img src="{{ url('assets/img/cmc.png') }}"
                                                                                                              alt=""></a>
                                    @else
                                    @endif
                                    @if($coin->coingecko_link != '')
                                        <a href="{!! isset($coin->coingecko_link)? $coin->coingecko_link: ''  !!}" target="_blank" class="cg has-tooltip-arrow"
                                           data-tooltip="View on CoinGecko"><img src="{{ url('assets/img/cg.png') }}" alt=""></a>
                                    @else
                                    @endif

                                    <div class="wishlist-button has-tooltip-arrow" data-tooltip="Add to Watchlist">
                                        @if (Route::has('login'))
                                            @auth
                                                @if($watchlist) <div class="wishlist-remove"><i class="fas fa-star"></i><i class="fas fa-times"></i></div> @else <div class="wishlist-add"><i class="far fa-star"></i></div>  @endif

                                            @else
                                                <div class="wishlist-add"><i class="far fa-star"></i></div>
                                            @endauth

                                        @endif
                                    </div>
                                </h1>
                                <div class="contract can-copy is-hidden-mobile"
                                     data-copy="{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}">
                                    BSC Contract Address:
                                    <span>{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}</span>
                                    <div class="copy">
                                        <img src="{{ url('assets/img/copy.png') }}" alt=""> <span class="copied is-hidden">copied!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contract can-copy is-hidden-tablet"
                             data-copy="{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}">
                            BSC Contract Address:
                            <span>{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}</span>
                            <div class="copy">
                                <img src="/assets/img/copy.png" alt=""> <span class="copied is-hidden">copied!</span>
                            </div>
                        </div>

                        <div class="status is-hidden-mobile">
                            <h2>Status: <span class="@if($coin->status == 'new') new @else listed @endif">{!! isset($coin->status)? $coin->status: ''  !!}</span></h2>
                            <h2>Votes for listing: <span
                                    class="listing-votes @if($coin->status == 'new')  @else green @endif">{!! isset($coin->vote)? $coin->vote: ''  !!}/500</span>
                            </h2>
                            <h2>Votes: <span class="votes">{!! isset($coin->vote)? $coin->vote: ''  !!}</span></h2>
                            <h2>Votes Today: <span class="votes">{{\App\Vote::where(['coin_id' => $coin->id, 'date' => date('Y-m-d')])->count()}}</span></h2>
                            <h2>Network: <span class="votes">{!! isset($coin->network)? $coin->network: ''  !!}</span></h2>
                        </div>
                      
                        <?php 
                              $coin_sym= strtolower($coin->network);
                             if($coin_sym=="bsc"){
                                $coin_sym="bnb";
                              }
                              if($coin_sym=="matic"){
                                $coin_sym="poly";
                              }
                              
                              
                             $coin_name=  $coin_sym;
                              $address=  $coin->contract_address;
                              
                       ?>
                     
                        <iframe width="100%" height="560" frameBorder="0" scrolling="no" src="https://coinbrain.com/embed/{{$coin_name}}-{{$address}}?theme=light&padding=16&chart=1&trades=1"></iframe>

                        <div class="status is-hidden-tablet">
                            <table class="table is-fullwidth">
                                <tr class="is-hidden-tablet">
                                    <th>Watchlists</th>
                                    <td>
                                        <span class="watchlist-counter">{!! isset($watchlist_count)? $watchlist_count: ''  !!}</span> x <i
                                            class="fa fa-star" style="color: gold;"></i>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="new">{!! isset($coin->status)? $coin->status: ''  !!}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Votes for listing</th>
                                    <td><span class="listing-votes green">{!! isset($coin->vote)? $coin->vote: ''  !!}/500</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>All time votes</th>
                                    <td><span class="votes">{!! isset($coin->vote)? $coin->vote: ''  !!}</span></td>
                                </tr>
                                <tr>
                                    <th>Votes today:</th>
                                    <td><span class="votes">{{\App\Vote::where(['coin_id' => $coin->id, 'date' => date('Y-m-d')])->count()}}</span></td>
                                </tr>
                            </table>
                        </div>

                        <div class="description">
                            {!! isset($coin->description)? $coin->description: ''  !!}
                        </div>


                        <div class="listing-vote">
                            <h2>Vote for <span> {!! isset($coin->name)? $coin->name: ''  !!}</span></h2>
                            <p>@if($coin->status == 'new') {!! isset($coin->name)? $coin->name: ''  !!}  needs 500 votes to be officially listed.@else Vote for {!! isset($coin->name)? $coin->name: ''  !!}  to increase its rank! @endif</p>

                            @if (Route::has('login'))
                                @auth

                                    @if(\App\Vote::where(['user_id' =>  Auth::user()->id, 'coin_id' => $coin->id, 'date' => date('Y-m-d')])->first() != '') <button type="submit"
                                                                                                                                                                    class="button is-success" disabled>
                                        THANK YOU FOR VOTING
                                    </button> @else
                                        <form action="{{route('user-vote')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{!! isset($coin->id)? $coin->id: ''  !!}">

                                            <div class="columns">
                                                <div class="column">
                                                    <div class="field">
                                                        <div id="hcaptcha_submit" data-callback="enableBtn"></div>
                                                    </div>
                                                </div>
                                                <div class="column">
                                                    <button type="submit" class="button is-success"
                                                            data-text="VOTE NOW FOR {!! isset($coin->name)? $coin->name: ''  !!}">
                                                        VOTE NOW FOR {!! isset($coin->name)? $coin->name: ''  !!}
                                                    </button>
                                                </div>
                                            </div>

                                        </form>




                                    @endif



                                @else
                                    <a href="{{ route('login') }}" class="button is-primary">
                                        PLEASE LOGIN TO VOTE
                                    </a>
                                @endauth
 @endif
                            <p class="small"><i>You can vote once every 24 hours.</i></p>
                        </div>

                        <div class="note">Information incorrect? Please report it to <a href="#"><span class="__cf_email__" data-cfemail="">{{\App\Setting::where(['id' => 1])->pluck('email')->first()}}</span></a></div>
                    </div>

                    <div class="column is-4">
                        <table class="table">
                            <tr class="is-hidden-mobile">
                                <th colspan="2">Popularity</th>
                            </tr>
                            <tr class="is-hidden-mobile">
                                <td>Watchlists</td>
                                <td>
                                    <i class="fa fa-star" style="color: gold;"></i> On
                                    <span class="watchlist-counter">{!! isset($watchlist_count)? $watchlist_count: ''  !!}</span>
                                    watchlists
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Links</th>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td>
                                    <i class="fa fa-globe"></i>&nbsp;
                                    <a href="{!! isset($coin->website)? $coin->website: ''  !!}" target="_blank">Visit Website</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Telegram</td>
                                <td>
                                    <i class="fab fa-telegram"></i>&nbsp;
                                    <a href="{!! isset($coin->telegram_link)? $coin->telegram_link: ''  !!}" target="_blank">Join Telegram</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Twitter</td>
                                <td>
                                    <i class="fab fa-twitter"></i>&nbsp;
                                    <a href="{!! isset($coin->twitter_link)? $coin->twitter_link: ''  !!}" target="_blank">Follow Twitter</a>
                                </td>

                            </tr>
                            <tr>
                                <td>Discord</td>
                                <td>
                                    <i class="fab fa-discord"></i>&nbsp;
                                    <a href="{!! isset($coin->discord_link)? $coin->discord_link: ''  !!}" target="_blank">Join Discord</a>
                                </td>
                            </tr>

                            @if($coin->presale == 'No')
                            <tr>
                                <th colspan="2">Price</th>
                            </tr>
                            <tr>
                                <td>Marketcap</td>
                                <td class="price">{!! isset($coin->marketcap)? $coin->marketcap: ''  !!} </td>
                            </tr>
                            <tr>
                                <td>Price (USD)</td>
                                <td class="price is-hidden-tablet">{!! isset($coin->price_usd)? $coin->price_usd: ''  !!}</td>
                                <td class="price is-hidden-mobile">{!! isset($coin->price_usd)? $coin->price_usd: ''  !!}</td>
                            </tr>
                            <tr>
                                <td>Price (BNB)</td>
                                <td class="price">{!! isset($coin->price_custom)? $coin->price_custom: ''  !!}</td>
                            </tr>
                            <tr>
                                <th colspan="2">Charts / Swap</th>
                            </tr>
                            @if($coin->coinmarket_link != '')
                                <tr>
                                    <td>CoinMarketCap</td>
                                    <td>
                                        <a href="{!! isset($coin->coinmarket_link)? $coin->coinmarket_link: ''  !!}" target="_blank">
                                            <img src="{{ url('assets/img/cmc.png') }}" alt="">
                                            CoinMarketCap
                                        </a>
                                    </td>
                                </tr>
                            @else
                            @endif
                            @if($coin->coingecko_link != '')
                                <tr>
                                    <td>CoinGecko</td>
                                    <td>
                                        <a href="{!! isset($coin->coingecko_link)? $coin->coingecko_link: ''  !!}" target="_blank">
                                            <img src="{{ url('assets/img/cg.png') }}" alt="">
                                            CoinGecko
                                        </a>
                                    </td>
                                </tr>
                            @else
                            @endif
                            @if($coin->chart_link != '')
                                <tr>
                                    <td>View Chart</td>
                                    <td>
                                        <a href="{!! isset($coin->chart_link)? $coin->chart_link: ''  !!}" target="_blank" class="button is-primary buy-button flooz">
                                            <span class="has-icon "></span>
                                            View Chart
                                        </a>
                                    </td>
                                </tr>
                            @else
                            @endif
                            @if($coin->network == 'BSC')
                            <tr>
                                <td>Poocoin</td>
                                <td>
                                    <i class="fas fa-poo"></i>&nbsp;
                                    <a href="https://poocoin.app/tokens/{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                       target="_blank">
                                        Poocoin.app
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Bogged</td>
                                <td>
                                    <i class="fas fa-eye"></i>&nbsp;
                                    <a href="https://charts.bogged.finance/?token={!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                       target="_blank">
                                        Bogged.Finance
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Now</td>
                                <td>
                                    <a href="https://exchange.pancakeswap.finance/#/swap?outputCurrency={!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                       target="_blank" class="button is-primary buy-button">
                                        <span class="has-icon"><img src="{{ url('assets/img/pancakeswap.png') }}" alt="" class="is-icon"></span>
                                        PancakeSwap
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Now</td>
                                <td>
                                    <a href="https://www.flooz.trade/wallet/{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}/?refId=cB0iCi" target="_blank" class="button is-primary buy-button flooz">
                                        <span class="has-icon flooz"><img src="{{ url('assets/img/flooz.svg') }}" alt="" class="is-icon"></span>
                                        Flooz.Trade
                                    </a>
                                </td>
                            </tr>
                                @elseif($coin->network == 'ETH')


                                <tr>
                                    <td>DexTools</td>
                                    <td>
                                        <i class="fas fa-eye"></i>&nbsp;
                                        <a href="https://www.dextools.io/app/uniswap/pair-explorer/{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                           target="_blank">
                                            DexTools
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Buy Now</td>
                                    <td>
                                        <a href="https://app.uniswap.org/#/swap?outputCurrency={!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                           target="_blank">
                                            Buy On UniSwap
                                        </a>
                                    </td>
                                </tr>
                            @elseif($coin->network == 'TRX')

                                    <tr>
                                    <td></td>
                                    <td>
                                        TRX charts coming soon...
                                    </td>
                                </tr>
                            @elseif($coin->network == 'MATIC')

                                <tr>
                                    <td>PolyChart</td>
                                    <td>
                                        <i class="fas fa-eye"></i>&nbsp;
                                        <a href="https://app.polychart.io/explorer/polygon/{!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                           target="_blank">
                                            PolyChart
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Buy Now</td>
                                    <td>
                                        <a href="https://quickswap.exchange/#/swap?outputCurrency={!! isset($coin->contract_address)? $coin->contract_address: ''  !!}"
                                           target="_blank">
                                            Buy On QuickSwap
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            @if($coin->swap_link != '')
                                <tr>
                                    <td>Buy Now</td>
                                    <td>
                                        <a href="{!! isset($coin->swap_link)? $coin->swap_link: ''  !!}" target="_blank" class="button is-primary buy-button flooz">
                                            <span class="has-icon "></span>
                                         Buy Now
                                        </a>
                                    </td>
                                </tr>
                            @else
                            @endif
                              @elseif($coin->presale == 'Yes')
                                <tr>
                                    <th colspan="2">Presale</th>
                                </tr>
                                <tr>
                                    <td>Presale Link</td>
                                    <td><a href="{!! isset($coin->presale_link)? $coin->presale_link: ''  !!}" target="_blank">Visit Presale Page</a></td>
                                </tr>

                            @endif
                            <tr>
                                <th colspan="2">Information</th>
                            </tr>
                            <tr>
                                <td>Added</td>
                                <td>{{date_format($coin->created_at,"F j, Y")}}</td>
                            </tr>
                            <tr>
                                <td>Launch</td>
                                <td>{{date_format(new DateTime($coin->launch_date),"F j, Y")}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home">
        <div class="container">
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
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.share, .share a').click(function (e) {
                e.preventDefault()
                $('.share').attr('data-tooltip', 'Copied!')
                setTimeout(function () {
                    $('.share').attr('data-tooltip', 'Click to Copy')
                }, 1000)
            })
        })

        let text = $('form button').data('text')



        $(document).ready(function () {

            $('.wishlist-button').on('click', '.wishlist-add', function (e) {
               // alert('hi');
                e.preventDefault()
                e.stopPropagation()
                let elem = $(this).parents('.listing-header').find('.wishlist-button')
                let listing_id = {!! isset($coin->id)? $coin->id: ''  !!}
                console.log('Add', listing_id)

                @auth
                $.post('{{ route('watchlist-add') }}', {
                    '_token':"{{csrf_token()}}",
                    'coin_id':listing_id
                }, function (response) {
                    if (response.success == true) {
                        $(elem).html('<div class="wishlist-remove"><i class="fas fa-star"></i><i class="fas fa-times"></i></div>')
                        let counter = parseInt($('.watchlist-counter').html())
                        counter++
                        $('.watchlist-counter').html(counter)
                    }
                })

                @else
                    window.location.href = '{{ route('login') }}'

                @endauth





            })

            $('.wishlist-button').on('click', '.wishlist-remove', function (e) {
                e.preventDefault()
                e.stopPropagation()
                let elem = $(this).parents('.listing-header').find('.wishlist-button')
                let listing_id = {!! isset($coin->id)? $coin->id: ''  !!}
                console.log('Remove', listing_id)

                $.post('{{ route('watchlist-remove') }}', {
                    '_token':"{{csrf_token()}}",
                    'coin_id':listing_id
                }, function (response) {
                    if (response.success == true) {
                        $(elem).html('<div class="wishlist-add"><i class="far fa-star"></i></div>')
                        let counter = parseInt($('.watchlist-counter').html())
                        counter--
                        $('.watchlist-counter').html(counter)
                    }
                })
            })
        })


    </script>
@endsection

