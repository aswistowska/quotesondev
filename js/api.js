/* Ajax-based random post fetching.
*
* fetch a new quote ->
*
* api_vars.root_url + 'wp/v2/posts?{arguments}'
*
* get the first and only post array ?
*
* update the quote content and name of the quoted person
*
* display quote source if available
*
* update the url using history
* */

// make the back and forward nav work with the history API


// ajax-based front-end post submissions -> submit form -> new function :P

/*event on submit of the form -> 'wp/v2/posts'
beforeSend?! -> get the code to add a nonce from the documentation

clear the form field and hide the form  -> use js to hide the form -> nice and smooth :P

show success message or failure :P using the var from functions.php
*/

const BASIC_URL = api_vars.home_url;
const FETCH_QUOTE_URL = BASIC_URL + '/wp-json/wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1';

window.addEventListener('popstate', function () {
    location.reload();
});

document.addEventListener('DOMContentLoaded', function () {

    const newQuoteButton = document.getElementById('new-quote-button');
    const contentElement = document.querySelector('.entry-content');
    const authorElement = document.querySelector('.entry-title');
    const sourceElement = document.querySelector('.source');

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

    newQuoteButton.addEventListener('click', function (event) {
        event.preventDefault();
        fetch(FETCH_QUOTE_URL)
            .then(response => response.json())
            .then(jsonArray => jsonArray[0])
            .then(showQuote);
    })
});