@extends('layouts.app')

@section('content')


    <section class="page guide">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <aside class="menu">
                        <p class="menu-label">
                            Anti-Scam Guide
                        </p>
                        <ul class="menu-list">
                            <li class="active"><a href="#intro">Introduction</a></li>
                            <li><a href="#1">1. Smart Contract Scan</a></li>
                            <li><a href="#2">2. Rug pulls - Analyzing Locked Liquidity</a></li>
                            <li><a href="#3">3. Investigate Website, Social Channels</a></li>
                            <li><a href="#4">4. CoinGecko, CoinMarketCap, Exchange listings</a></li>
                            <li><a href="#5">5. Security Audits</a></li>
                            <li><a href="#6">6. Doxxed Devs</a></li>
                            <li><a href="#7">7. Use Your Common Sense</a></li>
                     
                    </aside>
                </div>
                <div class="column is-8">
                    <div id="intro">
                        <h1>
                            Anti Scam & Rug pull Guide
                        </h1>
                        <p>
                            The crypto world is full of opportunity. Especially among new tokens with smaller marketcaps, the upside potential is often much larger than that of BTC or ETH. Everyone hopes to find the next Dogecoin that will x100 within a month.
                        </p>
                        <p>
                            However, there is also a lot of risk to consider when investing in smaller projects. Many projects seem very promising at first, but turn out to be a scam just days later. The smart investor always applies DYOR - Do Your Own Research before investing.
                        </p>
                        <p>
                            But what do you need to look out for when DYOR? How can you avoid common scams and rug pulls when investing?
                        </p>
                        <p>
                            This document will show you a few tips & tricks that you can apply to avoid many scams that happen every day. Even when applying these tips, investing is not risk free - but after reading this, you will spot and avoid scams much faster.
                        </p>
                    </div>
                    <hr>
                    <div id="1">
                        <h2>
                            1. Smart Contract Scan
                        </h2>
                        <p>
                            Tokens (BEP-20, ERC-20 etc) are essentially smart contracts that you interact with. These smart contracts contain the logic of the token such as the transaction tax system, swap protocol and total supply.
                        </p>

                        <p>
                            Scam contracts can be detected with tools like <a href="http://www.bscheck.eu/" target="_blank">http://www.bscheck.eu</a>. They look for common scams and issues like:
                        </p>
                        <ul>
                            <li><u>Honeypot code</u> - you can buy but you can’t sell</li>
                            <li><u>Contract owner</u> - is the ownership renounced? If not, the owner can modify the smart contract later on, introducing new potential scam code.</li>
                            <li><u>Dev wallets info</u> - do the devs hold a lot of coins? They could dump on the market and clear all liquidity.</li>
                            <li><u>LP (liquidity) info</u> - is liquidity burned? Does the dev still own the LP tokens? If so, that’s bad because they can pull the liquidity any time.</li>
                            <li><u>Top token holders</u> - are there big whales with a high % of tokens? They could instantly dump the entire token value.</li>
                        </ul>
                        <p>
                            If any of these issues arise, please proceed with caution, or avoid the project altogether. Another good source to check is
                            <a href="https://tokensniffer.com" target="_blank">https://tokensniffer.com</a> which will also do a small automated contract audit.
                        </p>
                        <div class="has-img">
                            <img src="/assets/img/guide/bscscan.png" alt="">
                            <p><i>Example scam result from bscscan.eu</i></p>
                        </div>

                    </div>

                    <hr>
                    <div id="2">
                        <h2>
                            2. Rugpulls - Analyzing Locked Liquidity
                        </h2>
                        <p>
                            From what I’ve seen, rug pulls are the most common scam. A Rug pull is when the liquidity of a token traded on a DEX like Uniswap or PancakeSwap is “pulled” away. This results in investors being unable to buy or sell the token, making the token worthless.
                        </p>
                        <p>
                            Token devs have two options of eliminating the chance of pulling away liquidity: by burning or locking. But first it’s good to understand, in short, how liquidity works.
                        </p>
                        <p>
                            Liquidity can be provided by anyone but is often done by the token developers. For example: for the token pair BNB/SAFEMOON, the SafeMoon developers can send a bunch of BNB + SAFEMOON to PancakeSwap to provide liquidity. When users trade on PancakeSwap, they either add some BNB and get SAFEMOON in return (they buy SAFEMOON with BNB), or they add some SAFEMOON and get some BNB in return (they sell SAFEMOON with BNB).
                        </p>
                        <p>
                            So this liquidity is required for anyone to trade on a DEX like PancakeSwap and Uniswap. When liquidity is provided, the provider gets LP tokens in return. These tokens are the “proof” that they own a portion of the liquidity pool, and they can exchange these LP tokens for their stake in the liquidity pool, so in our example they could get BNB + SAFEMOON in return.
                        </p>
                        <p>
                            Now just think about what would happen if the liquidity provider would no longer have access to the LP tokens, then the liquidity cannot be removed, and investors can keep trading.
                        </p>
                        <p>
                            <b>
                                Burning LP tokens
                            </b>
                            <br>
                            The most secure and trustworthy way for token developers is when they burn their LP tokens to a burn address. A burn address for example that is often used is 0x000...00dEad. You can ask the developers for the transaction of LP tokens to this (or similar) address as proof. This way they cannot redeem their LP tokens and take away liquidity.
                        </p>
                        <p>
                            <b>
                                Locking LP tokens
                            </b><br>
                            Another option for the token developers would be to temporarily lock their LP tokens into a smart contract, so for example they cannot access it for 6 months. For example, you can see
                            <a href="https://deeplock.io/safe">https://deeplock.io/safe</a> to see tokens that use the DeepLock liquidity locker, what % of the token supply is locked and for how long. Ask the token devs of the token you are researching about their locked liquidity, they should be able to provide proof.
                        </p>
                        <div class="has-img">
                            <img src="/assets/img/guide/deeplock.png" alt="">
                            <p><i>The DeepLock LP token locker</i></p>
                        </div>
                    </div>
                    <hr>
                    <div id="3">
                        <h2>
                            3. Investigate Website, Social Channels
                        </h2>
                        <p>
                            On <a target="_blank" href="https://coinbuzzer.me">https://coinbuzzer.me</a>, you can see all the social channels of a project. Have a look at the project’s website, see if all the information like smart contract matches with their other channels. Scams often put less effort into a good looking website with a lot of information than real projects. If the website is just one page with the smart contract and a telegram link, be careful.
                        </p>
                        <p>
                            Next, check the Telegram group, Twitter account, potentially Discord server and Reddit activity. Is there a lot of interaction? Does the Telegram group have a decent amount of users online compared to total users in the group? Low users online could indicate that a lot of bots fill up the Telegram group to “appear” active. Same goes for Twitter, if they have a lot of followers but hardly any interaction on their tweets, also be careful.
                        </p>
                    </div>
                    <hr>
                    <div id="4">
                        <h2>
                            4. CoinGecko / CoinMarketCap / Exchanges Listings
                        </h2>
                        <p>
                            When CG, when CMC? This is often asked in Telegram groups of tokens. CoinGecko and CoinMarketCap have their own listing process and requirements. Often they take a few days or weeks to list tokens. Even though some scams are listed, CoinGecko and CoinMarketCap listings can be a decent indicator of legitimacy of a project. You can easily see if a project is listed on CoinGecko or CoinMarketCap on coinbuzzer.me: just look for the icons of the two websites.
                        </p>
                        <p>
                            Exchanges have even stricter listing requirements than statistics websites. If a project is listed on gate.io for example, the chances of it being a scam decrease further. The more listings, the more legitimacy a project has.
                        </p>

                        <div class="has-img">
                            <img src="/assets/img/guide/listings.png" alt="">
                            <p><i>Look for the CoinGecko and CoinMarketCap icons on CoinBuzzer.</i></p>
                        </div>
                    </div>
                    <hr>
                    <div id="5">
                        <h2>
                            5. Security Audits
                        </h2>
                        <p>
                            As you can see, there is a lot that you need to check. Smart contracts can be really hard to read, and scams can be well hidden. Luckily, there are companies like
                            <a target="_blank" href="https://techrate.org/">https://techrate.org/</a> that provide a paid service of checking smart contracts. Here you can find all the smart contract audits that they did:
                            <a target="_blank" href="https://github.com/TechRate/Smart-Contract-Audits">https://github.com/TechRate/Smart-Contract-Audits</a>.
                        </p>
                        <p>
                            Look for security audits of companies like these and verify they are real. This adds a lot of legitimacy to the project, and takes away a lot of scam opportunities via the smart contract.
                        </p>
                        <div class="has-img">
                            <img src="/assets/img/guide/techrate.png" alt="">
                            <p><i>Audits by companies like TechRate add a lot of legitimacy to a project.</i></p>
                        </div>
                    </div>
                    <div id="6">
                        <h2>
                            6. Doxxed devs
                        </h2>
                        <p>
                            “Doxxed” means that someone’s identity has been exposed. Although often used in a negative way, in cryptocurrency doxxed developers is a good thing. This means that the token developers exposed their real identities and their faces, and can be a sign of trust. Be careful however, they could be using fake identities.
                        </p>
                    </div>

                    <hr>
                    <div id="7">
                        <h2>
                            7. Use Your Common Sense
                        </h2>
                        <p>
                            In the end, a project can check all the boxes, but can still end up being a scam. Please be careful when investing and use your common sense. If something seems too good to be true, like a project promising 100% BNB returns within a week, if often is too good to be true.
                        </p>
                    </div>

                    <hr>
                    <div id="checklist">
                        <p>
                            This can all be hard to remember. That’s why we have created the ultimate anti-scam, anti-rug pull checklist to help you invest safely. But please note, this is not a 100% guarantee against scams.
                        </p>
                        <p>
                            Thanks for reading, be careful when investing, and have a great day!
                        </p>
                        <p>
                            <i>
                                Matt<br>
                                Owner, CoinBuzzer.me
                            </i>
                        </p>

                        <br><br>

                       

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $(document).scroll(function(){
            let scroll = $(document).scrollTop()
            let id = false
            $('.column.is-8 > div').each(function(i,elem) {
                let top = $(elem).position().top
                if(scroll - 50 > top) {
                    $('.active').removeClass('active')
                    id = $(elem).attr('id')
                }
            })

            $('.menu-list li a').each(function(i,e){
                if($(e).attr('href').indexOf(id) >= 0) {
                    $(e).parent().addClass('active')
                }
            })
        })
    })
</script>
@endsection
