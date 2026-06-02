<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>SERKO API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8080";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-tokens">
                                <a href="#endpoints-POSTapi-tokens">POST api/tokens</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-events">
                                <a href="#endpoints-GETapi-events">GET api/events</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-events--event_id-">
                                <a href="#endpoints-GETapi-events--event_id-">GET api/events/{event_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-stadiums">
                                <a href="#endpoints-GETapi-stadiums">GET api/stadiums</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-stadiums--stadium_id-">
                                <a href="#endpoints-GETapi-stadiums--stadium_id-">GET api/stadiums/{stadium_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams">
                                <a href="#endpoints-GETapi-teams">GET api/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-teams--team_id-">
                                <a href="#endpoints-GETapi-teams--team_id-">GET api/teams/{team_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions">
                                <a href="#endpoints-GETapi-competitions">GET api/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-competitions--competition_id-">
                                <a href="#endpoints-GETapi-competitions--competition_id-">GET api/competitions/{competition_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sectors">
                                <a href="#endpoints-GETapi-sectors">GET api/sectors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-sectors--sector_id-">
                                <a href="#endpoints-GETapi-sectors--sector_id-">GET api/sectors/{sector_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-tokens-current">
                                <a href="#endpoints-DELETEapi-tokens-current">DELETE api/tokens/current</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-events">
                                <a href="#endpoints-POSTapi-events">POST api/events</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-events--id-">
                                <a href="#endpoints-PUTapi-events--id-">PUT api/events/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-events--id-">
                                <a href="#endpoints-DELETEapi-events--id-">DELETE api/events/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-stadiums">
                                <a href="#endpoints-POSTapi-stadiums">POST api/stadiums</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-stadiums--id-">
                                <a href="#endpoints-PUTapi-stadiums--id-">PUT api/stadiums/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-stadiums--id-">
                                <a href="#endpoints-DELETEapi-stadiums--id-">DELETE api/stadiums/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-teams">
                                <a href="#endpoints-POSTapi-teams">POST api/teams</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-teams--id-">
                                <a href="#endpoints-PUTapi-teams--id-">PUT api/teams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-teams--id-">
                                <a href="#endpoints-DELETEapi-teams--id-">DELETE api/teams/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-competitions">
                                <a href="#endpoints-POSTapi-competitions">POST api/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-competitions--id-">
                                <a href="#endpoints-PUTapi-competitions--id-">PUT api/competitions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-competitions--id-">
                                <a href="#endpoints-DELETEapi-competitions--id-">DELETE api/competitions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-sectors">
                                <a href="#endpoints-POSTapi-sectors">POST api/sectors</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-sectors--id-">
                                <a href="#endpoints-PUTapi-sectors--id-">PUT api/sectors/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-sectors--id-">
                                <a href="#endpoints-DELETEapi-sectors--id-">DELETE api/sectors/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders">
                                <a href="#endpoints-GETapi-orders">GET api/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders--id-">
                                <a href="#endpoints-GETapi-orders--id-">GET api/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-payments">
                                <a href="#endpoints-GETapi-payments">GET api/payments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-payments--id-">
                                <a href="#endpoints-GETapi-payments--id-">GET api/payments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-payments--id-">
                                <a href="#endpoints-PUTapi-payments--id-">PUT api/payments/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-tickets">
                                <a href="#endpoints-GETapi-tickets">GET api/tickets</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-tickets--id-">
                                <a href="#endpoints-GETapi-tickets--id-">GET api/tickets/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 2, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8080</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-tokens">POST api/tokens</h2>

<p>
</p>



<span id="example-requests-POSTapi-tokens">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/tokens" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\",
    \"device_name\": \"v\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/tokens"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-",
    "device_name": "v"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-tokens">
</span>
<span id="execution-results-POSTapi-tokens" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-tokens"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tokens"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-tokens" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tokens">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-tokens" data-method="POST"
      data-path="api/tokens"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-tokens', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-tokens"
                    onclick="tryItOut('POSTapi-tokens');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-tokens"
                    onclick="cancelTryOut('POSTapi-tokens');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-tokens"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/tokens</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-tokens"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-tokens"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-tokens"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-tokens"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>device_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="device_name"                data-endpoint="POSTapi-tokens"
               value="v"
               data-component="body">
    <br>
<p>Must not be greater than 120 characters. Example: <code>v</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-events">GET api/events</h2>

<p>
</p>



<span id="example-requests-GETapi-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-events">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8080/api/events?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8080/api/events?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: null,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/events?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8080/api/events&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: null,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-events" data-method="GET"
      data-path="api/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-events"
                    onclick="tryItOut('GETapi-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-events"
                    onclick="cancelTryOut('GETapi-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-events--event_id-">GET api/events/{event_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-events--event_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-events--event_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;date&quot;: &quot;2026-05-03T14:08:37+02:00&quot;,
        &quot;description&quot;: &quot;Partido destacado de la jornada.&quot;,
        &quot;competition&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Copa del Rey&quot;
        },
        &quot;stadium&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Estadio town&quot;,
            &quot;city&quot;: &quot;Satterfieldburgh&quot;,
            &quot;capacity&quot;: 68074,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;
        },
        &quot;home_team&quot;: {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Atletico de Madrid&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Atletico+de+Madrid&quot;
        },
        &quot;away_team&quot;: {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Sevilla FC&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Sevilla+FC&quot;
        },
        &quot;seats&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;41.32&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;155.16&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 3,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;166.28&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 4,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;192.52&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 5,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;113.24&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 6,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;114.53&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 7,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;154.39&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 8,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;35.01&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 9,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;39.80&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 10,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;177.24&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 11,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;92.00&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 12,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;173.27&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 13,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;92.66&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 14,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;168.62&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 15,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;195.69&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 16,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;69.02&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 17,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;129.98&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 18,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;161.75&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 19,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;141.88&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 20,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;87.79&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 21,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;198.14&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 22,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;138.30&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 23,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;173.01&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 24,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;93.23&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 25,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;165.37&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 26,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;199.55&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 27,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;159.12&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 28,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;201.93&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 29,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;35.29&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 30,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;206.64&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 31,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;103.57&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 32,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;196.81&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 33,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;147.77&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 34,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;46.88&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 35,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;208.69&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 36,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Sector h3&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;126.48&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 37,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;118.27&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 38,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;196.92&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 39,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;173.45&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 40,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;126.38&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 41,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;178.33&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 42,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;36.38&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 43,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;96.52&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 44,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;67.38&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 45,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;111.47&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 46,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;154.87&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 47,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;184.34&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 48,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;115.46&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 49,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;68.95&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 50,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;44.90&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 51,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;132.11&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 52,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;208.52&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 53,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;43.43&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 54,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;42.64&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 55,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;190.21&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 56,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;175.33&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 57,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;195.38&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 58,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;93.33&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 59,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;183.45&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 60,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;97.47&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 61,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;116.81&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 62,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;117.31&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 63,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;174.02&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 64,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;206.90&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 65,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;214.49&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 66,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;98.33&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 67,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;88.47&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 68,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;167.73&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 69,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;80.04&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 70,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;146.31&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 71,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;103.70&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 72,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Sector v9&quot;,
                    &quot;type&quot;: &quot;family&quot;
                },
                &quot;event_price&quot;: &quot;169.55&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 73,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;188.44&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 74,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;75.25&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 75,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;181.56&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 76,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;41.62&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 77,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;117.95&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 78,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;216.15&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 79,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;194.32&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 80,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;131.84&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 81,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;88.73&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 82,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;133.79&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 83,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;215.10&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 84,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;212.85&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 85,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;167.09&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 86,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;97.02&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 87,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;182.18&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 88,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;172.47&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 89,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;124.21&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 90,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;103.07&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 91,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;58.59&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 92,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;66.97&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 93,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;30.85&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 94,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;93.87&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 95,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;33.39&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 96,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;186.97&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 97,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 1,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;59.66&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 98,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 2,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;107.27&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 99,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 3,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;179.70&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 100,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 4,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;144.10&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 101,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 5,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;33.44&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 102,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 6,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;173.11&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 103,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 7,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;182.25&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 104,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 8,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;66.95&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 105,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 9,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;108.66&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 106,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 10,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;210.03&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 107,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 11,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;214.82&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            },
            {
                &quot;id&quot;: 108,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 12,
                &quot;sector&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sector b3&quot;,
                    &quot;type&quot;: &quot;vip&quot;
                },
                &quot;event_price&quot;: &quot;186.74&quot;,
                &quot;event_status&quot;: &quot;available&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-events--event_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-events--event_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-events--event_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-events--event_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-events--event_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-events--event_id-" data-method="GET"
      data-path="api/events/{event_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-events--event_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-events--event_id-"
                    onclick="tryItOut('GETapi-events--event_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-events--event_id-"
                    onclick="cancelTryOut('GETapi-events--event_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-events--event_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/events/{event_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-events--event_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-events--event_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>event_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="event_id"                data-endpoint="GETapi-events--event_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-stadiums">GET api/stadiums</h2>

<p>
</p>



<span id="example-requests-GETapi-stadiums">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/stadiums" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/stadiums"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-stadiums">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Estadio town&quot;,
            &quot;city&quot;: &quot;Satterfieldburgh&quot;,
            &quot;capacity&quot;: 68074,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 1,
            &quot;sectors_count&quot;: 3
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Estadio borough&quot;,
            &quot;city&quot;: &quot;Tiffanyton&quot;,
            &quot;capacity&quot;: 69145,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 1,
            &quot;sectors_count&quot;: 3
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Estadio ville&quot;,
            &quot;city&quot;: &quot;Hoseaburgh&quot;,
            &quot;capacity&quot;: 28806,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 1,
            &quot;sectors_count&quot;: 3
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Santiago Bernabeu&quot;,
            &quot;city&quot;: &quot;Madrid&quot;,
            &quot;capacity&quot;: 81044,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 1,
            &quot;sectors_count&quot;: 3
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Camp Nou&quot;,
            &quot;city&quot;: &quot;Barcelona&quot;,
            &quot;capacity&quot;: 99354,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 1,
            &quot;sectors_count&quot;: 3
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Metropolitano&quot;,
            &quot;city&quot;: &quot;Madrid&quot;,
            &quot;capacity&quot;: 70460,
            &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
            &quot;events_count&quot;: 0,
            &quot;sectors_count&quot;: 3
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8080/api/stadiums?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8080/api/stadiums?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/stadiums?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8080/api/stadiums&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 6,
        &quot;total&quot;: 6
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-stadiums" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-stadiums"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-stadiums"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-stadiums" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-stadiums">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-stadiums" data-method="GET"
      data-path="api/stadiums"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-stadiums', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-stadiums"
                    onclick="tryItOut('GETapi-stadiums');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-stadiums"
                    onclick="cancelTryOut('GETapi-stadiums');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-stadiums"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/stadiums</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-stadiums"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-stadiums"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-stadiums--stadium_id-">GET api/stadiums/{stadium_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-stadiums--stadium_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/stadiums/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/stadiums/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-stadiums--stadium_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Estadio town&quot;,
        &quot;city&quot;: &quot;Satterfieldburgh&quot;,
        &quot;capacity&quot;: 68074,
        &quot;image_url&quot;: &quot;http://localhost:8080/storage/stadiums/football-stadium-4k-2v-1280x720.jpg&quot;,
        &quot;sectors&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Sector h3&quot;,
                &quot;type&quot;: &quot;family&quot;,
                &quot;seats&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 6,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 9,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 10,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 11,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 12,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 13,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 14,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 15,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 16,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 17,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 18,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 19,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 20,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 21,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 22,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 23,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 24,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 25,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 26,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 27,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 28,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 29,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 30,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 31,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 32,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 33,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 34,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 35,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 36,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    }
                ]
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Sector v9&quot;,
                &quot;type&quot;: &quot;family&quot;,
                &quot;seats&quot;: [
                    {
                        &quot;id&quot;: 37,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 38,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 39,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 40,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 41,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 42,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 43,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 44,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 45,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 46,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 47,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 48,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 49,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 50,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 51,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 52,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 53,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 54,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 55,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 56,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 57,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 58,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 59,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 60,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 61,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 62,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 63,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 64,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 65,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 66,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 67,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 68,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 69,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 70,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 71,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 72,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Sector b3&quot;,
                &quot;type&quot;: &quot;vip&quot;,
                &quot;seats&quot;: [
                    {
                        &quot;id&quot;: 73,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 74,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 75,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 76,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 77,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 78,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 79,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 80,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 81,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 82,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 83,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 84,
                        &quot;row&quot;: &quot;A&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 85,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 86,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 87,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 88,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 89,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 90,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 91,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 92,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 93,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 94,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 95,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 96,
                        &quot;row&quot;: &quot;B&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 97,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 1,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 98,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 2,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 99,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 3,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 100,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 4,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 101,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 5,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 102,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 6,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 103,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 7,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 104,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 8,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 105,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 9,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 106,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 10,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 107,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 11,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    },
                    {
                        &quot;id&quot;: 108,
                        &quot;row&quot;: &quot;C&quot;,
                        &quot;number&quot;: 12,
                        &quot;event_price&quot;: null,
                        &quot;event_status&quot;: null
                    }
                ]
            }
        ],
        &quot;events&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;date&quot;: &quot;2026-05-03T14:08:37+02:00&quot;,
                &quot;description&quot;: &quot;Partido destacado de la jornada.&quot;,
                &quot;home_team&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Atletico de Madrid&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Atletico+de+Madrid&quot;
                },
                &quot;away_team&quot;: {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Sevilla FC&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Sevilla+FC&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-stadiums--stadium_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-stadiums--stadium_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-stadiums--stadium_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-stadiums--stadium_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-stadiums--stadium_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-stadiums--stadium_id-" data-method="GET"
      data-path="api/stadiums/{stadium_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-stadiums--stadium_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-stadiums--stadium_id-"
                    onclick="tryItOut('GETapi-stadiums--stadium_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-stadiums--stadium_id-"
                    onclick="cancelTryOut('GETapi-stadiums--stadium_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-stadiums--stadium_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/stadiums/{stadium_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-stadiums--stadium_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-stadiums--stadium_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>stadium_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="stadium_id"                data-endpoint="GETapi-stadiums--stadium_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the stadium. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-teams">GET api/teams</h2>

<p>
</p>



<span id="example-requests-GETapi-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Real Madrid&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Real+Madrid&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;FC Barcelona&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=FC+Barcelona&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Atletico de Madrid&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Atletico+de+Madrid&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Sevilla FC&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Sevilla+FC&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Valencia CF&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Valencia+CF&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Real Betis&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Real+Betis&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;abrisqueta fc&quot;,
            &quot;logo&quot;: &quot;https://www.youtube.com/@polideportivoatleticosango981&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8080/api/teams?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8080/api/teams?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/teams?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8080/api/teams&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 7,
        &quot;total&quot;: 7
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams" data-method="GET"
      data-path="api/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams"
                    onclick="tryItOut('GETapi-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams"
                    onclick="cancelTryOut('GETapi-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-teams--team_id-">GET api/teams/{team_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-teams--team_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/teams/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/teams/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-teams--team_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Real Madrid&quot;,
        &quot;logo&quot;: &quot;https://placehold.co/400x400?text=Real+Madrid&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-teams--team_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-teams--team_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-teams--team_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-teams--team_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-teams--team_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-teams--team_id-" data-method="GET"
      data-path="api/teams/{team_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-teams--team_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-teams--team_id-"
                    onclick="tryItOut('GETapi-teams--team_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-teams--team_id-"
                    onclick="cancelTryOut('GETapi-teams--team_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-teams--team_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/teams/{team_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-teams--team_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-teams--team_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>team_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="team_id"                data-endpoint="GETapi-teams--team_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-competitions">GET api/competitions</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Champions League&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Copa del Rey&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Europa League&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;LaLiga&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8080/api/competitions?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8080/api/competitions?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/competitions?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8080/api/competitions&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 4,
        &quot;total&quot;: 4
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-competitions" data-method="GET"
      data-path="api/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions"
                    onclick="tryItOut('GETapi-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions"
                    onclick="cancelTryOut('GETapi-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-competitions--competition_id-">GET api/competitions/{competition_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-competitions--competition_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/competitions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/competitions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-competitions--competition_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;LaLiga&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-competitions--competition_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-competitions--competition_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-competitions--competition_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-competitions--competition_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-competitions--competition_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-competitions--competition_id-" data-method="GET"
      data-path="api/competitions/{competition_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-competitions--competition_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-competitions--competition_id-"
                    onclick="tryItOut('GETapi-competitions--competition_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-competitions--competition_id-"
                    onclick="cancelTryOut('GETapi-competitions--competition_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-competitions--competition_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/competitions/{competition_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-competitions--competition_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-competitions--competition_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="competition_id"                data-endpoint="GETapi-competitions--competition_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-sectors">GET api/sectors</h2>

<p>
</p>



<span id="example-requests-GETapi-sectors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/sectors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sectors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sectors">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Sector h3&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Sector v9&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sector b3&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Sector z6&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Sector z9&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Sector e7&quot;,
            &quot;type&quot;: &quot;general&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Sector b9&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Sector z7&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Sector p9&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Fondo Norte&quot;,
            &quot;type&quot;: &quot;general&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Lateral Este&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Tribuna VIP&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Fondo Norte&quot;,
            &quot;type&quot;: &quot;general&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Lateral Este&quot;,
            &quot;type&quot;: &quot;family&quot;,
            &quot;seats_count&quot;: 36
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Tribuna VIP&quot;,
            &quot;type&quot;: &quot;vip&quot;,
            &quot;seats_count&quot;: 36
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8080/api/sectors?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8080/api/sectors?page=2&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost:8080/api/sectors?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 2,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/sectors?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/sectors?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8080/api/sectors?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8080/api/sectors&quot;,
        &quot;per_page&quot;: 15,
        &quot;to&quot;: 15,
        &quot;total&quot;: 18
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sectors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sectors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sectors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sectors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sectors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sectors" data-method="GET"
      data-path="api/sectors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sectors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sectors"
                    onclick="tryItOut('GETapi-sectors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sectors"
                    onclick="cancelTryOut('GETapi-sectors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sectors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sectors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sectors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sectors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-sectors--sector_id-">GET api/sectors/{sector_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-sectors--sector_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/sectors/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sectors/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-sectors--sector_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Sector h3&quot;,
        &quot;type&quot;: &quot;family&quot;,
        &quot;seats_count&quot;: 36,
        &quot;seats&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 1,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 2,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 3,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 4,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 5,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 6,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 6,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 7,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 7,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 8,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 8,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 9,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 9,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 10,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 10,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 11,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 11,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 12,
                &quot;row&quot;: &quot;A&quot;,
                &quot;number&quot;: 12,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 13,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 1,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 14,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 2,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 15,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 3,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 16,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 4,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 17,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 5,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 18,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 6,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 19,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 7,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 20,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 8,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 21,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 9,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 22,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 10,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 23,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 11,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 24,
                &quot;row&quot;: &quot;B&quot;,
                &quot;number&quot;: 12,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 25,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 1,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 26,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 2,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 27,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 3,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 28,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 4,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 29,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 5,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 30,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 6,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 31,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 7,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 32,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 8,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 33,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 9,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 34,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 10,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 35,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 11,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            },
            {
                &quot;id&quot;: 36,
                &quot;row&quot;: &quot;C&quot;,
                &quot;number&quot;: 12,
                &quot;event_price&quot;: null,
                &quot;event_status&quot;: null
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-sectors--sector_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-sectors--sector_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-sectors--sector_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-sectors--sector_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-sectors--sector_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-sectors--sector_id-" data-method="GET"
      data-path="api/sectors/{sector_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-sectors--sector_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-sectors--sector_id-"
                    onclick="tryItOut('GETapi-sectors--sector_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-sectors--sector_id-"
                    onclick="cancelTryOut('GETapi-sectors--sector_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-sectors--sector_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/sectors/{sector_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-sectors--sector_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-sectors--sector_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sector_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sector_id"                data-endpoint="GETapi-sectors--sector_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sector. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-tokens-current">DELETE api/tokens/current</h2>

<p>
</p>



<span id="example-requests-DELETEapi-tokens-current">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/tokens/current" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/tokens/current"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-tokens-current">
</span>
<span id="execution-results-DELETEapi-tokens-current" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-tokens-current"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-tokens-current"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-tokens-current" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-tokens-current">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-tokens-current" data-method="DELETE"
      data-path="api/tokens/current"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-tokens-current', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-tokens-current"
                    onclick="tryItOut('DELETEapi-tokens-current');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-tokens-current"
                    onclick="cancelTryOut('DELETEapi-tokens-current');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-tokens-current"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/tokens/current</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-tokens-current"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-tokens-current"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-events">POST api/events</h2>

<p>
</p>



<span id="example-requests-POSTapi-events">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/events" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"stadium_id\": \"architecto\",
    \"competition_id\": \"architecto\",
    \"home_team_id\": \"architecto\",
    \"away_team_id\": \"architecto\",
    \"date\": \"2052-06-26\",
    \"description\": \"Eius et animi quos velit et.\",
    \"seats\": [
        {
            \"price\": 60,
            \"status\": \"available\"
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "stadium_id": "architecto",
    "competition_id": "architecto",
    "home_team_id": "architecto",
    "away_team_id": "architecto",
    "date": "2052-06-26",
    "description": "Eius et animi quos velit et.",
    "seats": [
        {
            "price": 60,
            "status": "available"
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-events">
</span>
<span id="execution-results-POSTapi-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-events"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-events">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-events" data-method="POST"
      data-path="api/events"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-events"
                    onclick="tryItOut('POSTapi-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-events"
                    onclick="cancelTryOut('POSTapi-events');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-events"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/events</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-events"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stadium_id"                data-endpoint="POSTapi-events"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the stadiums table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="competition_id"                data-endpoint="POSTapi-events"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the competitions table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>home_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="home_team_id"                data-endpoint="POSTapi-events"
               value="architecto"
               data-component="body">
    <br>
<p>The value and <code>away_team_id</code> must be different. The <code>id</code> of an existing record in the teams table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>away_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="away_team_id"                data-endpoint="POSTapi-events"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the teams table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="POSTapi-events"
               value="2052-06-26"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>now</code>. Example: <code>2052-06-26</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-events"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>seats</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>seat_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="seats.0.seat_id"                data-endpoint="POSTapi-events"
               value=""
               data-component="body">
    <br>
<p>This field is required when <code>seats</code> is present. The <code>id</code> of an existing record in the seats table.</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="seats.0.price"                data-endpoint="POSTapi-events"
               value="60"
               data-component="body">
    <br>
<p>This field is required when <code>seats</code> is present. Must be at least 0. Example: <code>60</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="seats.0.status"                data-endpoint="POSTapi-events"
               value="available"
               data-component="body">
    <br>
<p>Example: <code>available</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>available</code></li> <li><code>reserved</code></li> <li><code>sold</code></li></ul>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-events--id-">PUT api/events/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"stadium_id\": \"architecto\",
    \"competition_id\": \"architecto\",
    \"home_team_id\": \"architecto\",
    \"away_team_id\": \"architecto\",
    \"date\": \"2052-06-26\",
    \"description\": \"Eius et animi quos velit et.\",
    \"seats\": [
        {
            \"price\": 60,
            \"status\": \"available\"
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "stadium_id": "architecto",
    "competition_id": "architecto",
    "home_team_id": "architecto",
    "away_team_id": "architecto",
    "date": "2052-06-26",
    "description": "Eius et animi quos velit et.",
    "seats": [
        {
            "price": 60,
            "status": "available"
        }
    ]
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-events--id-">
</span>
<span id="execution-results-PUTapi-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-events--id-" data-method="PUT"
      data-path="api/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-events--id-"
                    onclick="tryItOut('PUTapi-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-events--id-"
                    onclick="cancelTryOut('PUTapi-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/events/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-events--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stadium_id"                data-endpoint="PUTapi-events--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the stadiums table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>competition_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="competition_id"                data-endpoint="PUTapi-events--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the competitions table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>home_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="home_team_id"                data-endpoint="PUTapi-events--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The value and <code>away_team_id</code> must be different. The <code>id</code> of an existing record in the teams table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>away_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="away_team_id"                data-endpoint="PUTapi-events--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the teams table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="PUTapi-events--id-"
               value="2052-06-26"
               data-component="body">
    <br>
<p>Must be a valid date. Must be a date after <code>now</code>. Example: <code>2052-06-26</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-events--id-"
               value="Eius et animi quos velit et."
               data-component="body">
    <br>
<p>Example: <code>Eius et animi quos velit et.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>seats</code></b>&nbsp;&nbsp;
<small>object[]</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
<br>

            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>seat_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="seats.0.seat_id"                data-endpoint="PUTapi-events--id-"
               value=""
               data-component="body">
    <br>
<p>This field is required when <code>seats</code> is present. The <code>id</code> of an existing record in the seats table.</p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="seats.0.price"                data-endpoint="PUTapi-events--id-"
               value="60"
               data-component="body">
    <br>
<p>This field is required when <code>seats</code> is present. Must be at least 0. Example: <code>60</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="seats.0.status"                data-endpoint="PUTapi-events--id-"
               value="available"
               data-component="body">
    <br>
<p>Example: <code>available</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>available</code></li> <li><code>reserved</code></li> <li><code>sold</code></li></ul>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-events--id-">DELETE api/events/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-events--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/events/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/events/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-events--id-">
</span>
<span id="execution-results-DELETEapi-events--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-events--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-events--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-events--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-events--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-events--id-" data-method="DELETE"
      data-path="api/events/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-events--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-events--id-"
                    onclick="tryItOut('DELETEapi-events--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-events--id-"
                    onclick="cancelTryOut('DELETEapi-events--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-events--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/events/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-events--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-events--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the event. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-stadiums">POST api/stadiums</h2>

<p>
</p>



<span id="example-requests-POSTapi-stadiums">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/stadiums" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"city\": \"n\",
    \"capacity\": 67,
    \"image\": \"z\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/stadiums"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "city": "n",
    "capacity": 67,
    "image": "z"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-stadiums">
</span>
<span id="execution-results-POSTapi-stadiums" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-stadiums"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-stadiums"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-stadiums" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-stadiums">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-stadiums" data-method="POST"
      data-path="api/stadiums"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-stadiums', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-stadiums"
                    onclick="tryItOut('POSTapi-stadiums');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-stadiums"
                    onclick="cancelTryOut('POSTapi-stadiums');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-stadiums"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/stadiums</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-stadiums"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-stadiums"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-stadiums"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="POSTapi-stadiums"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>capacity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="capacity"                data-endpoint="POSTapi-stadiums"
               value="67"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>67</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTapi-stadiums"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 2048 characters. Example: <code>z</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-stadiums--id-">PUT api/stadiums/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-stadiums--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/stadiums/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"city\": \"n\",
    \"capacity\": 67,
    \"image\": \"z\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/stadiums/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "city": "n",
    "capacity": 67,
    "image": "z"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-stadiums--id-">
</span>
<span id="execution-results-PUTapi-stadiums--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-stadiums--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-stadiums--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-stadiums--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-stadiums--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-stadiums--id-" data-method="PUT"
      data-path="api/stadiums/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-stadiums--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-stadiums--id-"
                    onclick="tryItOut('PUTapi-stadiums--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-stadiums--id-"
                    onclick="cancelTryOut('PUTapi-stadiums--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-stadiums--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/stadiums/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/stadiums/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-stadiums--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-stadiums--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-stadiums--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the stadium. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-stadiums--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTapi-stadiums--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>capacity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="capacity"                data-endpoint="PUTapi-stadiums--id-"
               value="67"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>67</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="PUTapi-stadiums--id-"
               value="z"
               data-component="body">
    <br>
<p>Must not be greater than 2048 characters. Example: <code>z</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-stadiums--id-">DELETE api/stadiums/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-stadiums--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/stadiums/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/stadiums/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-stadiums--id-">
</span>
<span id="execution-results-DELETEapi-stadiums--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-stadiums--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-stadiums--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-stadiums--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-stadiums--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-stadiums--id-" data-method="DELETE"
      data-path="api/stadiums/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-stadiums--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-stadiums--id-"
                    onclick="tryItOut('DELETEapi-stadiums--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-stadiums--id-"
                    onclick="cancelTryOut('DELETEapi-stadiums--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-stadiums--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/stadiums/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-stadiums--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-stadiums--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-stadiums--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the stadium. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-teams">POST api/teams</h2>

<p>
</p>



<span id="example-requests-POSTapi-teams">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/teams" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"logo\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/teams"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "logo": "n"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-teams">
</span>
<span id="execution-results-POSTapi-teams" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-teams"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-teams"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-teams" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-teams">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-teams" data-method="POST"
      data-path="api/teams"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-teams', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-teams"
                    onclick="tryItOut('POSTapi-teams');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-teams"
                    onclick="cancelTryOut('POSTapi-teams');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-teams"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/teams</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-teams"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-teams"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="POSTapi-teams"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 2048 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-teams--id-">PUT api/teams/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-teams--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/teams/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"logo\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/teams/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "logo": "n"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-teams--id-">
</span>
<span id="execution-results-PUTapi-teams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-teams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-teams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-teams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-teams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-teams--id-" data-method="PUT"
      data-path="api/teams/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-teams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-teams--id-"
                    onclick="tryItOut('PUTapi-teams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-teams--id-"
                    onclick="cancelTryOut('PUTapi-teams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-teams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/teams/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/teams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-teams--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-teams--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="logo"                data-endpoint="PUTapi-teams--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 2048 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-teams--id-">DELETE api/teams/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-teams--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/teams/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/teams/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-teams--id-">
</span>
<span id="execution-results-DELETEapi-teams--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-teams--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-teams--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-teams--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-teams--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-teams--id-" data-method="DELETE"
      data-path="api/teams/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-teams--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-teams--id-"
                    onclick="tryItOut('DELETEapi-teams--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-teams--id-"
                    onclick="cancelTryOut('DELETEapi-teams--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-teams--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/teams/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-teams--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-teams--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the team. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-competitions">POST api/competitions</h2>

<p>
</p>



<span id="example-requests-POSTapi-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-competitions">
</span>
<span id="execution-results-POSTapi-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-competitions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-competitions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-competitions" data-method="POST"
      data-path="api/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-competitions"
                    onclick="tryItOut('POSTapi-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-competitions"
                    onclick="cancelTryOut('POSTapi-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-competitions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-competitions"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-competitions--id-">PUT api/competitions/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-competitions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/competitions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/competitions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-competitions--id-">
</span>
<span id="execution-results-PUTapi-competitions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-competitions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-competitions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-competitions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-competitions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-competitions--id-" data-method="PUT"
      data-path="api/competitions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-competitions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-competitions--id-"
                    onclick="tryItOut('PUTapi-competitions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-competitions--id-"
                    onclick="cancelTryOut('PUTapi-competitions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-competitions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-competitions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-competitions--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-competitions--id-">DELETE api/competitions/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-competitions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/competitions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/competitions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-competitions--id-">
</span>
<span id="execution-results-DELETEapi-competitions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-competitions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-competitions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-competitions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-competitions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-competitions--id-" data-method="DELETE"
      data-path="api/competitions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-competitions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-competitions--id-"
                    onclick="tryItOut('DELETEapi-competitions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-competitions--id-"
                    onclick="cancelTryOut('DELETEapi-competitions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-competitions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/competitions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-competitions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-competitions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the competition. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-sectors">POST api/sectors</h2>

<p>
</p>



<span id="example-requests-POSTapi-sectors">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8080/api/sectors" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"stadium_id\": \"architecto\",
    \"name\": \"n\",
    \"type\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sectors"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "stadium_id": "architecto",
    "name": "n",
    "type": "g"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-sectors">
</span>
<span id="execution-results-POSTapi-sectors" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-sectors"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sectors"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-sectors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sectors">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-sectors" data-method="POST"
      data-path="api/sectors"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-sectors', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-sectors"
                    onclick="tryItOut('POSTapi-sectors');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-sectors"
                    onclick="cancelTryOut('POSTapi-sectors');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-sectors"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/sectors</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-sectors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-sectors"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stadium_id"                data-endpoint="POSTapi-sectors"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the stadiums table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-sectors"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="POSTapi-sectors"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 80 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="endpoints-PUTapi-sectors--id-">PUT api/sectors/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-sectors--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/sectors/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"stadium_id\": \"architecto\",
    \"name\": \"n\",
    \"type\": \"g\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sectors/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "stadium_id": "architecto",
    "name": "n",
    "type": "g"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-sectors--id-">
</span>
<span id="execution-results-PUTapi-sectors--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-sectors--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-sectors--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-sectors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-sectors--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-sectors--id-" data-method="PUT"
      data-path="api/sectors/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-sectors--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-sectors--id-"
                    onclick="tryItOut('PUTapi-sectors--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-sectors--id-"
                    onclick="cancelTryOut('PUTapi-sectors--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-sectors--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/sectors/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/sectors/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-sectors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-sectors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-sectors--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sector. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>stadium_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="stadium_id"                data-endpoint="PUTapi-sectors--id-"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the stadiums table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-sectors--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type"                data-endpoint="PUTapi-sectors--id-"
               value="g"
               data-component="body">
    <br>
<p>Must not be greater than 80 characters. Example: <code>g</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-sectors--id-">DELETE api/sectors/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-sectors--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8080/api/sectors/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/sectors/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-sectors--id-">
</span>
<span id="execution-results-DELETEapi-sectors--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-sectors--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-sectors--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-sectors--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-sectors--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-sectors--id-" data-method="DELETE"
      data-path="api/sectors/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-sectors--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-sectors--id-"
                    onclick="tryItOut('DELETEapi-sectors--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-sectors--id-"
                    onclick="cancelTryOut('DELETEapi-sectors--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-sectors--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/sectors/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-sectors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-sectors--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-sectors--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the sector. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-orders">GET api/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders" data-method="GET"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders"
                    onclick="tryItOut('GETapi-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders"
                    onclick="cancelTryOut('GETapi-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-orders--id-">GET api/orders/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-orders--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders--id-" data-method="GET"
      data-path="api/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders--id-"
                    onclick="tryItOut('GETapi-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders--id-"
                    onclick="cancelTryOut('GETapi-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-payments">GET api/payments</h2>

<p>
</p>



<span id="example-requests-GETapi-payments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/payments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/payments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-payments">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-payments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payments" data-method="GET"
      data-path="api/payments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payments"
                    onclick="tryItOut('GETapi-payments');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payments"
                    onclick="cancelTryOut('GETapi-payments');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payments"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-payments--id-">GET api/payments/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-payments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/payments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/payments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-payments--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-payments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payments--id-" data-method="GET"
      data-path="api/payments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payments--id-"
                    onclick="tryItOut('GETapi-payments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payments--id-"
                    onclick="cancelTryOut('GETapi-payments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-payments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-payments--id-">PUT api/payments/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-payments--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8080/api/payments/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"method\": \"b\",
    \"status\": \"captured\",
    \"transaction_id\": \"n\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/payments/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "method": "b",
    "status": "captured",
    "transaction_id": "n"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-payments--id-">
</span>
<span id="execution-results-PUTapi-payments--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-payments--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-payments--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-payments--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-payments--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-payments--id-" data-method="PUT"
      data-path="api/payments/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-payments--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-payments--id-"
                    onclick="tryItOut('PUTapi-payments--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-payments--id-"
                    onclick="cancelTryOut('PUTapi-payments--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-payments--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/payments/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/payments/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-payments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-payments--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-payments--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the payment. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>method</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="method"                data-endpoint="PUTapi-payments--id-"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 80 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-payments--id-"
               value="captured"
               data-component="body">
    <br>
<p>Example: <code>captured</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>pending</code></li> <li><code>completed</code></li> <li><code>paid</code></li> <li><code>captured</code></li> <li><code>failed</code></li> <li><code>refunded</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>transaction_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="transaction_id"                data-endpoint="PUTapi-payments--id-"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>n</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-tickets">GET api/tickets</h2>

<p>
</p>



<span id="example-requests-GETapi-tickets">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/tickets" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/tickets"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tickets">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tickets" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tickets"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tickets"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tickets" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tickets">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tickets" data-method="GET"
      data-path="api/tickets"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tickets', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tickets"
                    onclick="tryItOut('GETapi-tickets');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tickets"
                    onclick="cancelTryOut('GETapi-tickets');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tickets"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tickets</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tickets"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-tickets--id-">GET api/tickets/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-tickets--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8080/api/tickets/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8080/api/tickets/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-tickets--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-tickets--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-tickets--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tickets--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-tickets--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tickets--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-tickets--id-" data-method="GET"
      data-path="api/tickets/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-tickets--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-tickets--id-"
                    onclick="tryItOut('GETapi-tickets--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-tickets--id-"
                    onclick="cancelTryOut('GETapi-tickets--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-tickets--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/tickets/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-tickets--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-tickets--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the ticket. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
