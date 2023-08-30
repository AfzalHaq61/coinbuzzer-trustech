
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='dmca-site-verification' content='TjRGNHlYdFRrUDB5ellDNkgxRkppQT090' />
    <meta name="coinbuzzer" content="16e7965f0dd715324bbf2463fbff50bf" />
    <title>Today's Best Crypto Votings - CoinBuzzer.me</title>
      <meta property="og:title" content="CoinBuzzer.me | One of the largest cryptocurrency listing & voting platform" />
    <meta property="og:description" content="CoinBuzzer.me is one of the world's best and most prominent community voting platform for listing and voting on new cryptocurrencies daily." />
    <meta property="og:image" content="{{ url('assets/img/favicon.png') }}" />
    <meta name="Description" CONTENT="CoinBuzzer.me is one of the world's best and most prominent community voting platform for listing and voting on new cryptocurrencies daily.">
    <meta name="coinzilla" content="c50c65fea7cf4984427bcb4de502784b" />


    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('assets/css/bulma-tooltip.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">


    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

<link rel="icon" type="image/png" sizes="32x32" href="{{ url('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/favicon.png') }}">


<body>

<section class="menu">
    <div class="container">
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="overlay is-hidden-tablet is-hidden"></div>
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ route('/') }}">
                    <img src="{{ url('assets/img/logo.png') }}">
                </a>

                <a href="#" class="navbar-item mobile-search is-hidden-tablet">
                    <i class="fas fa-search"></i>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                   data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu mobile-search-menu is-hidden-tablet">
                <div class="field has-search has-addons">
                    <div class="control has-icons-left">
                        <input class="input" type="text" placeholder="Search coins...">
                        <span class="icon is-small is-left"><i class="fas fa-search"></i></span>
                    </div>
                    <div class="results is-hidden">
                    </div>
                </div>
            </div>

            <div class="navbar-menu main-menu">
                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ route('/') }}" class="navbar-link is-hidden-mobile">
                            Coins
                        </a>
                        <div class="navbar-dropdown">

                            <a href="{{ route('watchlist') }}" class="navbar-item is-hidden-tablet ">
                                <strong><i class="fas fa-star"></i> Watchlist</strong>
                            </a>
                            <hr class="navbar-divider is-hidden-tablet">
                            <a href="{{ route('/') }}" class="navbar-item is-full is-active">
                                <strong><i class="far fa-clock"></i> Today's Best</strong>
                            </a>
                            <a href="{{ route('alltime') }}" class="navbar-item ">
                                <strong><i class="fas fa-fire"></i> All Time Best</strong>
                            </a>
                            <a href="{{ route('new') }}" class="navbar-item ">
                                <strong><i class="fas fa-plus"></i> New Listings</strong>
                            </a>
                            <a href="{{ route('marketcap') }}" class="navbar-item ">
                                <strong><i class="fas fa-coins"></i> By Marketcap</strong>
                            </a>
                            <a href="{{ route('presales') }}" class="navbar-item ">
                                <strong><i class="fas fa-stopwatch"></i> Presales</strong>
                            </a>
                            <hr class="navbar-divider is-hidden-tablet">

                            <a href="{{ route('submit') }}" class="navbar-item is-hidden-tablet ">
                                <strong><i class="fas fa-upload"></i> Submit Coin</strong>
                            </a>
                            <a href="{{ route('contact-us') }}" class="navbar-item is-hidden-tablet ">
                                <strong><i class="fa fa-envelope"></i> Contact Us</strong>
                            </a>
                            <a href="{{\App\Setting::where(['id' => 1])->pluck('address')->first()}}" target="_blank"
                               class="button is-primary twitter is-hidden-tablet">
                                Follow us on twitter! <i class="fab fa-twitter"></i>
                            </a>
                            <a href="{{\App\Setting::where(['id' => 1])->pluck('office')->first()}}" target="_blank"
                               class="button is-primary telegram is-hidden-tablet">
                                Join our Telegram group! <i class="fab fa-telegram"></i>
                            </a>
                        </div>
                    </div>

                    <div class="field has-search is-hidden-mobile">
                        <div class="control has-icons-left">
                            <input class="input" type="text" placeholder="Search coins...">
                            <span class="icon is-small is-left"><i class="fas fa-search"></i></span>
                        </div>
                        <div class="results is-hidden">
                        </div>
                    </div>
                </div>

                <div class="navbar-end is-hidden-mobile">

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ route('/') }}" class="navbar-link is-hidden-mobile">
                            Account
                        </a>
                        <div class="navbar-dropdown">

                            <a class="navbar-item" href="{{ route('watchlist') }}">
                                <strong><i class="fas fa-star"></i> Watchlist</strong>
                            </a>
                            @if (Route::has('login'))

                                @auth


                                     <a class="navbar-item"  href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <strong><i class="fas fa-sign-out-alt"></i> Logout</strong>
                                        </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a class="navbar-item" href="{{ route('login') }}">
                                        <strong><i class="fas fa-sign-in-alt"></i> Login</strong>
                                    </a>
                                    <a class="navbar-item" href="{{ route('register') }}">
                                        <strong><i class="fas fa-user-plus"></i> Register</strong>
                                    </a>


                                @endauth

                            @endif

                        </div>
                    </div>

                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="{{\App\Setting::where(['id' => 1])->pluck('office')->first()}}" target="_blank"
                               class="button is-primary telegram is-hidden-mobile">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a href="{{\App\Setting::where(['id' => 1])->pluck('address')->first()}}" target="_blank"
                               class="button is-primary twitter is-hidden-mobile">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a class="button is-success" href="{{ route('submit') }}">
                                <strong><i class="fas fa-upload"></i> Submit Coin</strong>
                            </a>

                            <a class="button is-primary is-hidden-tablet" href="{{ route('contact-us') }}">
                                <strong><i class="fa fa-envelope"></i> Contact Us</strong>
                            </a>

                            <a href="{{\App\Setting::where(['id' => 1])->pluck('address')->first()}}" target="_blank"
                               class="button is-primary twitter is-hidden-tablet">
                                Follow us on twitter! <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>

@yield('content')


<footer class="footer">
    <div class="container">
        <div class="has-text-centered">
            <img src="{{ url('assets/img/logo.png') }}" alt="">

            <p>
                <a target="_blank" href="{{\App\Setting::where(['id' => 1])->pluck('address')->first()}}"><i class="fab fa-twitter"></i> Follow us on Twitter</a> -
                <a target="_blank" href="{{\App\Setting::where(['id' => 1])->pluck('office')->first()}}"><i class="fab fa-telegram"></i> Join our Telegram Group</a>
            </p>

            <p>
                <a href="https://www.txbitcoin.me/tutorial__trashed/token-listing-guide/">Token Listing Guide</a> -

                <a href="{{ route('alltime') }}">All Time Rankings</a> -
                <a href="{{ route('new') }}">Daily Ranking</a> -
                <a href="{{ route('new') }}">New Listings</a> -
                <a href="{{ route('submit') }}">Submit Coin</a>
            </p>
            <p>
                <a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a> -
                <a href="{{ route('privacy-policy') }}">Privacy Policy</a> -
                <a href="{{ route('contact-us') }}">Contact Us</a> -
                <a href="{{ route('contact-us') }}">Advertise</a>
            </p>
            <p>&copy 2022 coinbuzzer.me</p>

            <br>
            <a href="//www.dmca.com/Protection/Status.aspx?ID=026945a5-c169-4cc4-9656-07a75eeb87c7" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w200-5x1-10.png?ID=026945a5-c169-4cc4-9656-07a75eeb87c7"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
        </div>
    </div>
</footer>

<div class="grwwe is-hidden" data-xx="n80ZLKyb9VZCJ4OJcvsaX2iroLNAaPCyCUbC2LZ7"></div>
<div class="usercheck is-hidden" data-loggedin="0"></div>

<script src="{{ url('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('assets/js/app.js?time=1632997342') }}"></script>
<script src="https://www.cryptohopper.com/widgets/js/script"></script>



</body>
</html>
@yield('scripts')
