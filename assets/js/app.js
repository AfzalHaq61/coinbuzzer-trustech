$(document).ready(function () {

    $('.modal-background, .modal-card-foot .close-modal, .modal-card-head button').click(function () {
        $('.modal').removeClass('is-active')
    })

    function fallbackCopyTextToClipboard(text) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // Avoid scrolling to bottom
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Fallback: Copying text command was ' + msg);
        } catch (err) {
            console.error('Fallback: Oops, unable to copy', err);
        }

        document.body.removeChild(textArea);
    }

    function copyTextToClipboard(text) {
        if (!navigator.clipboard) {
            fallbackCopyTextToClipboard(text);
            return;
        }
        navigator.clipboard.writeText(text).then(function () {
            console.log('Async: Copying to clipboard was successful!');
        }, function (err) {
            console.error('Async: Could not copy text: ', err);
        });
    }

    $('.can-copy').click(function () {
        copyTextToClipboard($(this).data('copy'))
        $('.copied').removeClass('is-hidden')
        setTimeout(function () {
            $('.copied').addClass('is-hidden')
        }, 1000)
    })

    $('.home .listings tbody tr:not(.ignore) td:not(.ignore)').click(function () {
        window.location.href = $(this).parent().find('a.button').attr('href')
    })

    $('.navbar-burger').click(function () {
        $('.navbar-menu.mobile-search-menu').removeClass('is-open')
        $('.navbar-menu.main-menu').toggleClass('is-open')
        if ($('.navbar-menu').is(':visible')) {
            $('.overlay').removeClass('is-hidden')
        } else {
            $('.overlay').addClass('is-hidden')
        }
    })

    $('.mobile-search').click(function (e) {
        e.preventDefault()
        $('.navbar-menu.main-menu').removeClass('is-open')
        $('.navbar-menu.mobile-search-menu').toggleClass('is-open')
        if ($('.navbar-menu').is(':visible')) {
            $('.overlay').removeClass('is-hidden')
            $('.mobile-search-menu input').focus()
            setTimeout(function () {
                $('.mobile-search-menu .results').removeClass('is-hidden')
            }, 100)
        } else {
            $('.overlay').addClass('is-hidden')
        }
    })

    let polling = false;
    let timeout = false;
    $('.has-search input').keyup(function () {
        let resultsElem = $(this).parent().parent().find('.results')
        let inputElem = this
        if (timeout !== false) {
            clearTimeout(timeout)
            timeout = false
        }
        timeout = setTimeout(function () {
            console.log('Done polling')
            doSearch(inputElem, resultsElem)
        }, 500)
    })

    function doSearch(inputElem, resultsElem) {
        let q = $(inputElem).val()
        if (q.length === 0) {
            $(resultsElem).addClass('is-hidden')
            return false;
        }

        $(resultsElem).html('')

        $.get('/search?q=' + q, function (response) {
            if (response.length > 0) {
                response.forEach(function (listing) {
                    let elem = `<a href="/coin/${listing.id}" class="result">\n` +
                        `    <img src="${listing.image}" alt="">\n` +
                        `    <span class="titles">\n` +
                        `        <h1>${listing.name}</h1>\n` +
                        `        <h2>\$${listing.symbol}</h2>\n` +
                        `    </span>\n` +
                        `</a>`
                    $(resultsElem).append($(elem))
                })
            } else {
                let elem = '<div class="noresults result">No results...</div>';
                $(resultsElem).append($(elem))
            }
            $(resultsElem).removeClass('is-hidden')
        })
    }

    $('body').click(function (e) {
        if ($(e.target).parents('.has-search').length == 0) {
            $('.has-search .results').addClass('is-hidden')
        } else {
            if (!$('.has-search .results').is(':visible') && $('.has-search:visible input').val().length > 0) {
                $('.has-search:visible .results').removeClass('is-hidden')
            }
            console.log('show again')
        }
    })

    $('.overlay').click(function () {
        $('.navbar-menu').removeClass('is-open')
        $('.overlay').addClass('is-hidden')
    })

    $('form.logout a').click(function (e) {
        e.preventDefault()
        $('form.logout').submit()
    })

    $('.accordion h2').click(function () {
        $(this).parent().toggleClass('is-open')
    })

    $('.has-wishlist').on('click', function (e) {
        e.preventDefault()
        e.stopPropagation()

        if($('.usercheck').data('loggedin') == 0) {
            window.location.href = '/login?redir=/watchlist'
        }

        let elem = $(this).find('.wishlist-button')
        let listing_id = $(this).parents('tr').data('listingid')

        if($(this).find('.wishlist-add').length > 0) {
            console.log('Add', listing_id)

            $.post('/watchlist/add/' + listing_id, {
                '_token': $('div.grwwe').data('xx')
            }, function (response) {
                if(response.success == true) {
                    $(elem).html('<div class="wishlist-remove"><i class="fas fa-star"></i><i class="fas fa-times"></i></div>')
                }
            })
        } else {
            console.log('Remove', listing_id)

            $.post('/watchlist/remove/' + listing_id, {
                '_token': $('div.grwwe').data('xx')
            }, function (response) {
                if(response.success == true) {
                    if($('section.watchlist').length > 0) {
                        $(elem).parents('tr').remove()
                        $('section.watchlist tbody tr').each(function(i,e) {
                            $(e).find('td:first-of-type span').html(parseInt(i + 1))
                        })
                    } else {
                        $(elem).html('<div class="wishlist-add"><i class="far fa-star"></i></div>')
                    }
                }
            })
        }
    })

})
