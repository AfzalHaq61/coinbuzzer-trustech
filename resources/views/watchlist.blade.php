@extends('layouts.app')

@section('content')


<section class="watchlist">
    <div class="container">
        <div class="columns">
            <div class="column is-6">
                <h1>Watchlist</h1>
                <h2>Follow your favorite coins and tokens!</h2>
            </div>
            <div class="column is-6">
                <div class="pro">
                    <a href="{{\App\Advertisement::where(['id' => 7])->pluck('referral_url')->first()}}" class="pro-image" target="_blank">
                        <img src="{{\App\Advertisement::where(['id' => 7])->pluck('image_url')->first()}}" alt="" class="is-hidden-mobile">
                        <img src="{{\App\Advertisement::where(['id' => 7])->pluck('image_url')->first()}}" alt="" class="is-hidden-tablet">
                    </a>
                    <p class="has-text-right">
                        <a href="{{ route('contact-us') }}">Advertise with us!</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-6">
                <div class="has-share">
                    <div class="share has-tooltip-arrow can-copy" data-tooltip="Click to Copy"
                         data-copy="{{route('watchlist-public',['cm' => Auth::user()->code])}}">
                        <i class="fas fa-external-link-alt"></i>
                        <p>
                            Share your watchlist<span class="is-hidden-tablet">!</span> <span class="is-hidden-mobile">with this public link</span><br>
                            <b>
                                <a href="{{route('watchlist-public',['cm' => Auth::user()->code])}}">
                                    <span class="is-hidden-mobile">{{route('watchlist-public',['cm' => Auth::user()->code])}}
                                </a>
                            </b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="column is-6 has-text-right is-hidden-mobile">
                <p>Add projects to your watchlist by clicking on the golden star <i class="far fa-star" style="color:gold; margin-left:0.25rem;"></i></p>
                <p>Watchlisted projects are directly visible <i class="fas fa-star" style="color:gold; margin-left:0.25rem;"></i></p>
                <p>Remove from your watchlist by clicking on the red X <i class="fas fa-times" style="color:red; margin-left:0.45rem; margin-right:0.1rem; font-size: 1.1rem"></i></p>
            </div>
            <div class="column is-6 is-hidden-tablet">
                <p><i class="far fa-star" style="color:gray; margin-left:0.25rem;"></i> Click to add to watch list</p>
                <p><i class="fas fa-star" style="color:gold; margin-left:0.25rem;"></i> Watchlisted are visible</p>
                <p><i class="fas fa-star" style="color:gold; margin-left:0.25rem;"></i> Click to remove from watchlist</p>
            </div>
        </div>

        <section class="home">
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

                    @foreach($watchlist as $nw)

                            <tr >
                                <td class="has-wishlist ">
                <span>
                    1
                </span>


                                    <div class="wishlist-button" onclick="remove_watchist({{$nw->id}})">
                                        <div class="wishlist-remove">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-times"></i>
                                        </div>
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
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $watchlist->links() }}
            </div>
        </section>
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







        function remove_watchist(x)
        {
            alert('hi');
           $.post('{{ route('watchlist-remove') }}', {
                '_token':"{{csrf_token()}}",
                'coin_id':x
            }, function (response) {
                if (response.success == true) {
                    var url = "{{ route('watchlist')}}";

                    document.location.href = url;
                }
            })



        }
    </script>
@endsection

