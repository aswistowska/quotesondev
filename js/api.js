// ajax-based front-end post submissions -> submit form -> new function :P

/*event on submit of the form -> 'wp/v2/posts'
beforeSend?! -> get the code to add a nonce from the documentation

clear the form field and hide the form  -> use js to hide the form -> nice and smooth :P

show success message or failure :P using the var from functions.php
*/

const BASIC_URL = api_vars.home_url;
const FETCH_QUOTE_URL = BASIC_URL + '/wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1';
const POST_QUOTE_URL = BASIC_URL + '/wp-json/wp/v2/posts';

window.addEventListener('popstate', function () {
    location.reload();
});

document.addEventListener('DOMContentLoaded', function () {

    const newQuoteButton = document.getElementById('new-quote-button');
    const contentElement = document.querySelector('.entry-content');
    const authorElement = document.querySelector('.entry-title');
    const sourceElement = document.querySelector('.source');

    const submitQuoteButton = document.getElementById('submit-quote-button');

    const formElement = document.getElementById('quote-submission-form');

    function showQuote(quote) {
        const content = quote.content.rendered;
        contentElement.innerHTML = content;
        const author = quote.title.rendered;
        authorElement.innerHTML = author;
        const source     = quote._qod_quote_source;
        const source_url = quote._qod_quote_source_url;
        if(source && source_url) {
            sourceElement.innerHTML = `, <a href="${source_url}">${source}</a>`;
        } else if (source) {
            sourceElement.innerHTML = `, ${source}`;
        } else {
            sourceElement.innerHTML = '';
        }

        const postUrl = `${BASIC_URL}/${quote.slug}/`;
        history.pushState(null, null, postUrl);
    }

    if(newQuoteButton) {

        newQuoteButton.addEventListener('click', function (event) {
            event.preventDefault();
            fetch(FETCH_QUOTE_URL)
                .then(response => response.json())
                .then(jsonArray => jsonArray[0])
                .then(showQuote);
        });
    }

    if(submitQuoteButton) {
        submitQuoteButton.addEventListener('click', function (event) {
            event.preventDefault();
            submitDataFromForm();
        });
    }
    
    function submitDataFromForm() {
        const formData = new FormData(formElement);
        const author = formData.get('quote_author');
        const quote = formData.get('quote_content');
        const quoteSource = formData.get('quote_source');
        const quoteSourceUrl = formData.get('quote_source_url');

        const data = {
            title: author,
            content: quote,
            _qod_quote_source: quoteSource,
            _qod_quote_source_url: quoteSourceUrl,
            post_status: 'pending'
        };

        function showResultResponse(response) {
            if(response.status == 201) {
                formElement.innerHTML = api_vars.success;
            } else {
                formElement.innerHTML = api_vars.failure;
            }
        }

        fetch(POST_QUOTE_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=utf-8',
                'X-WP-Nonce': api_vars.nonce,
            },
            body: JSON.stringify(data),
        }).then(showResultResponse);
    }
});
