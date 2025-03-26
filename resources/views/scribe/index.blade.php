<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

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
        var tryItOutBaseUrl = "https://rrn24.techchantier.com/malingo/public/api/";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.1.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.1.0.js") }}"></script>

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
                    <ul id="tocify-header-activities" class="tocify-header">
                <li class="tocify-item level-1" data-unique="activities">
                    <a href="#activities">Activities</a>
                </li>
                                    <ul id="tocify-subheader-activities" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="activities-GETapi-activity">
                                <a href="#activities-GETapi-activity">Get all activities</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activities-POSTapi-activity">
                                <a href="#activities-POSTapi-activity">Create a new activity</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activities-GETapi-activity--id-">
                                <a href="#activities-GETapi-activity--id-">Get activity details</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activities-PUTapi-activity--id-">
                                <a href="#activities-PUTapi-activity--id-">Update an activity</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activities-DELETEapi-activity--id-">
                                <a href="#activities-DELETEapi-activity--id-">Delete an activity</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-activity-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="activity-management">
                    <a href="#activity-management">Activity Management</a>
                </li>
                                    <ul id="tocify-subheader-activity-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="activity-management-POSTapi-activities--activity_id--join">
                                <a href="#activity-management-POSTapi-activities--activity_id--join">Join an activity</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activity-management-GETapi-activities-user">
                                <a href="#activity-management-GETapi-activities-user">GET api/activities/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activity-management-GETapi-activities--id--joined-users">
                                <a href="#activity-management-GETapi-activities--id--joined-users">Retrieve a list of users who have joined a particular activity.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-activity-request" class="tocify-header">
                <li class="tocify-item level-1" data-unique="activity-request">
                    <a href="#activity-request">Activity Request</a>
                </li>
                                    <ul id="tocify-subheader-activity-request" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="activity-request-POSTapi-join-request--joinRequest_id--accept">
                                <a href="#activity-request-POSTapi-join-request--joinRequest_id--accept">Accept a join request</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activity-request-POSTapi-join-request--joinRequest_id--decline">
                                <a href="#activity-request-POSTapi-join-request--joinRequest_id--decline">Decline a join request</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activity-request-POSTapi-activity--activity_id--leave">
                                <a href="#activity-request-POSTapi-activity--activity_id--leave">Request leave from an activity</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="activity-request-POSTapi-leave-requests--leaveRequest_id--approve">
                                <a href="#activity-request-POSTapi-leave-requests--leaveRequest_id--approve">Approve a leave request</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-authentication" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-register">
                                <a href="#authentication-POSTapi-register">Register a new user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-login">
                                <a href="#authentication-POSTapi-login">Log in an existing user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="authentication-POSTapi-logout">
                                <a href="#authentication-POSTapi-logout">Log out the current user

Revoke all of the user's tokens to log them out.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-users--id-">
                                <a href="#endpoints-GETapi-users--id-">Get a single user's public profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-general-user-enpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="general-user-enpoints">
                    <a href="#general-user-enpoints">General User Enpoints</a>
                </li>
                                    <ul id="tocify-subheader-general-user-enpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="general-user-enpoints-GETapi-user">
                                <a href="#general-user-enpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-profile-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="profile-management">
                    <a href="#profile-management">Profile Management</a>
                </li>
                                    <ul id="tocify-subheader-profile-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="profile-management-POSTapi-user-edit-profile">
                                <a href="#profile-management-POSTapi-user-edit-profile">Edit User Profile</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="profile-management-GETapi-user-profile">
                                <a href="#profile-management-GETapi-user-profile">Get Current User Profile</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-searching" class="tocify-header">
                <li class="tocify-item level-1" data-unique="searching">
                    <a href="#searching">Searching</a>
                </li>
                                    <ul id="tocify-subheader-searching" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="searching-GETapi-activities-filter">
                                <a href="#searching-GETapi-activities-filter">Filter activities by title, description, date, and location

Retrieve activities based on specified filters.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="searching-GETapi-search--parameter--">
                                <a href="#searching-GETapi-search--parameter--">Search activities by parameter or specific fields

Search for activities using a general parameter or specific field filters.</a>
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
        <li>Last updated: March 26, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This api documentation contains all the endpoints for the malingo project.
a platform where you can effortlessly find companions for your next adventure, be it a travel buddy,
a dining partner, or someone to join you for a stroll or a random conversation. Malingo is a solution
that enables individuals to connect, share experiences, and foster new relationships while splitting
costs or covering expenses as agreed.</p>
<aside>
    <strong>Base URL</strong>: <code>https://rrn24.techchantier.com/malingo/public/api/</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="activities">Activities</h1>

    

                                <h2 id="activities-GETapi-activity">Get all activities</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-activity">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/activity" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity"
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

<span id="example-responses-GETapi-activity">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;created_activities&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Hiking Adventure&quot;,
            &quot;ActivityPhoto&quot;: null,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T08:19:02.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T08:19:02.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Hiking Adventure&quot;,
            &quot;ActivityPhoto&quot;: null,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T08:25:56.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T08:25:56.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Hiking Adventure&quot;,
            &quot;ActivityPhoto&quot;: null,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T08:36:04.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T08:36:04.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Hiking Adventure&quot;,
            &quot;ActivityPhoto&quot;: &quot;activity_photos/rj6fjePPJweFYZf07s9dCtAjL84pKv12XGzWIW81.jpg&quot;,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T09:07:10.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T09:07:10.000000Z&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
            &quot;ActivityPhoto&quot;: &quot;activity_photos/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg&quot;,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
            &quot;ActivityPhoto&quot;: &quot;activity_photos/OfdYJQsOrGOnYCKFtPDrhhv2Kp7PP5zZ40Q08Exk.jpg&quot;,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 10,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T09:13:20.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T09:13:20.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;user_id&quot;: 1,
            &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
            &quot;ActivityPhoto&quot;: &quot;activity_photos/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg&quot;,
            &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
            &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
            &quot;numberOfMembers&quot;: 40,
            &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
            &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
            &quot;created_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;
        }
    ],
    &quot;pending_activities&quot;: [],
    &quot;accepted_activities&quot;: [],
    &quot;declined_activities&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-activity" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-activity"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-activity"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-activity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-activity">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-activity" data-method="GET"
      data-path="api/activity"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-activity', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-activity"
                    onclick="tryItOut('GETapi-activity');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-activity"
                    onclick="cancelTryOut('GETapi-activity');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-activity"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/activity</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="activities-POSTapi-activity">Create a new activity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-activity">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/activity" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Morning Run\",
    \"ActivityPhoto\": \"consequatur\",
    \"description\": \"A group run in the park.\",
    \"link\": \"https:\\/\\/zoom.com\\/meeting\",
    \"numberOfMembers\": 17,
    \"location\": \"Central Park\",
    \"time\": \"2025-01-01 10:00:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Morning Run",
    "ActivityPhoto": "consequatur",
    "description": "A group run in the park.",
    "link": "https:\/\/zoom.com\/meeting",
    "numberOfMembers": 17,
    "location": "Central Park",
    "time": "2025-01-01 10:00:00"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-activity">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
    &quot;ActivityPhoto&quot;: &quot;activity_photos/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg&quot;,
    &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
    &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
    &quot;numberOfMembers&quot;: &quot;40&quot;,
    &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
    &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
    &quot;user_id&quot;: 1,
    &quot;updated_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;,
    &quot;created_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;,
    &quot;id&quot;: 7
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-activity" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-activity"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-activity"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-activity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-activity">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-activity" data-method="POST"
      data-path="api/activity"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-activity', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-activity"
                    onclick="tryItOut('POSTapi-activity');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-activity"
                    onclick="cancelTryOut('POSTapi-activity');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-activity"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/activity</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-activity"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="POSTapi-activity"
               value="Morning Run"
               data-component="body">
    <br>
<p>required: The title of the activity. Example: <code>Morning Run</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ActivityPhoto</code></b>&nbsp;&nbsp;
<small>file:</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ActivityPhoto"                data-endpoint="POSTapi-activity"
               value="consequatur"
               data-component="body">
    <br>
<p>The photo of the activity. type: [png, jpeg] Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTapi-activity"
               value="A group run in the park."
               data-component="body">
    <br>
<p>required:  The description of the activity. Example: <code>A group run in the park.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>link</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="link"                data-endpoint="POSTapi-activity"
               value="https://zoom.com/meeting"
               data-component="body">
    <br>
<p>required: The link to the activity (if any). Example: <code>https://zoom.com/meeting</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>numberOfMembers</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="numberOfMembers"                data-endpoint="POSTapi-activity"
               value="17"
               data-component="body">
    <br>
<p>the number of member to the activity is required Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="POSTapi-activity"
               value="Central Park"
               data-component="body">
    <br>
<p>required: The location of the activity. Example: <code>Central Park</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>time</code></b>&nbsp;&nbsp;
<small>datetime</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="time"                data-endpoint="POSTapi-activity"
               value="2025-01-01 10:00:00"
               data-component="body">
    <br>
<p>required: The date and time of the activity. Format: Y-m-d H:i:s. Example: <code>2025-01-01 10:00:00</code></p>
        </div>
        </form>

                    <h2 id="activities-GETapi-activity--id-">Get activity details</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-activity--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/activity/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17"
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

<span id="example-responses-GETapi-activity--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 5,
    &quot;user_id&quot;: 1,
    &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
    &quot;ActivityPhoto&quot;: &quot;activity_photos/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg&quot;,
    &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
    &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
    &quot;numberOfMembers&quot;: 10,
    &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
    &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
    &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-activity--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-activity--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-activity--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-activity--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-activity--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-activity--id-" data-method="GET"
      data-path="api/activity/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-activity--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-activity--id-"
                    onclick="tryItOut('GETapi-activity--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-activity--id-"
                    onclick="cancelTryOut('GETapi-activity--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-activity--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/activity/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-activity--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-activity--id-"
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
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-activity--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity"                data-endpoint="GETapi-activity--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="activities-PUTapi-activity--id-">Update an activity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-activity--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"Morning Run\",
    \"ActivityPhoto\": \"consequatur\",
    \"description\": \"A group run in the park.\",
    \"link\": \"https:\\/\\/zoom.com\\/meeting\",
    \"numberOfMembers\": 17,
    \"location\": \"Central Park\",
    \"time\": \"2025-01-01 10:00:00\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "Morning Run",
    "ActivityPhoto": "consequatur",
    "description": "A group run in the park.",
    "link": "https:\/\/zoom.com\/meeting",
    "numberOfMembers": 17,
    "location": "Central Park",
    "time": "2025-01-01 10:00:00"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-activity--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 5,
    &quot;user_id&quot;: 1,
    &quot;title&quot;: &quot;Hiking go and hike with me&quot;,
    &quot;ActivityPhoto&quot;: &quot;activity_photos/uNughpq7aXWNcUTYFOgFBFEFxqcr3DeY60PuOwNu.jpg&quot;,
    &quot;description&quot;: &quot;this is a good activity&quot;,
    &quot;link&quot;: &quot;https//wa.me/237672474539&quot;,
    &quot;numberOfMembers&quot;: &quot;10&quot;,
    &quot;location&quot;: &quot;buea&quot;,
    &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
    &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-02-04T11:35:10.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-activity--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-activity--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-activity--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-activity--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-activity--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-activity--id-" data-method="PUT"
      data-path="api/activity/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-activity--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-activity--id-"
                    onclick="tryItOut('PUTapi-activity--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-activity--id-"
                    onclick="cancelTryOut('PUTapi-activity--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-activity--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/activity/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/activity/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-activity--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-activity--id-"
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
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-activity--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity"                data-endpoint="PUTapi-activity--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the activity to update. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="PUTapi-activity--id-"
               value="Morning Run"
               data-component="body">
    <br>
<p>: The title of the activity. Example: <code>Morning Run</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ActivityPhoto</code></b>&nbsp;&nbsp;
<small>file:</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="ActivityPhoto"                data-endpoint="PUTapi-activity--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>The photo of the activity. type: [png, jpeg] Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string:</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTapi-activity--id-"
               value="A group run in the park."
               data-component="body">
    <br>
<p>The description of the activity. Example: <code>A group run in the park.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>link</code></b>&nbsp;&nbsp;
<small>string:</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="link"                data-endpoint="PUTapi-activity--id-"
               value="https://zoom.com/meeting"
               data-component="body">
    <br>
<p>The link to the activity (if any). Example: <code>https://zoom.com/meeting</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>numberOfMembers</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="numberOfMembers"                data-endpoint="PUTapi-activity--id-"
               value="17"
               data-component="body">
    <br>
<p>the number of member to the activity is required Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string:</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="PUTapi-activity--id-"
               value="Central Park"
               data-component="body">
    <br>
<p>The location of the activity. Example: <code>Central Park</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>time</code></b>&nbsp;&nbsp;
<small>datetime:</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="time"                data-endpoint="PUTapi-activity--id-"
               value="2025-01-01 10:00:00"
               data-component="body">
    <br>
<p>The date and time of the activity. Format: Y-m-d H:i:s. Example: <code>2025-01-01 10:00:00</code></p>
        </div>
        </form>

                    <h2 id="activities-DELETEapi-activity--id-">Delete an activity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-activity--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17"
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

<span id="example-responses-DELETEapi-activity--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Activity deleted successfully&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-activity--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-activity--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-activity--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-activity--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-activity--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-activity--id-" data-method="DELETE"
      data-path="api/activity/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-activity--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-activity--id-"
                    onclick="tryItOut('DELETEapi-activity--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-activity--id-"
                    onclick="cancelTryOut('DELETEapi-activity--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-activity--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/activity/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-activity--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-activity--id-"
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
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-activity--id-"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity"                data-endpoint="DELETEapi-activity--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the activity to delete. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="activity-management">Activity Management</h1>

    

                                <h2 id="activity-management-POSTapi-activities--activity_id--join">Join an activity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-activities--activity_id--join">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/activities/17/join" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"activity_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activities/17/join"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-activities--activity_id--join">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Join request sent successfully.&quot;,
    &quot;join_request&quot;: {
        &quot;user_id&quot;: 2,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;activity_id&quot;: 5,
        &quot;updated_at&quot;: &quot;2025-02-04T12:16:50.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-02-04T12:16:50.000000Z&quot;,
        &quot;id&quot;: 1
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You have already requested to join this activity.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-activities--activity_id--join" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-activities--activity_id--join"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-activities--activity_id--join"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-activities--activity_id--join" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-activities--activity_id--join">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-activities--activity_id--join" data-method="POST"
      data-path="api/activities/{activity_id}/join"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-activities--activity_id--join', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-activities--activity_id--join"
                    onclick="tryItOut('POSTapi-activities--activity_id--join');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-activities--activity_id--join"
                    onclick="cancelTryOut('POSTapi-activities--activity_id--join');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-activities--activity_id--join"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/activities/{activity_id}/join</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-activities--activity_id--join"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-activities--activity_id--join"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-activities--activity_id--join"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity_id"                data-endpoint="POSTapi-activities--activity_id--join"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity_id"                data-endpoint="POSTapi-activities--activity_id--join"
               value="17"
               data-component="body">
    <br>
<p>The ID of the activity to join. Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="activity-management-GETapi-activities-user">GET api/activities/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-activities-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/activities/user" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activities/user"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-activities-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;created_activities&quot;: [
   {
       &quot;id&quot;: 1,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Hiking Adventure&quot;,
       &quot;ActivityPhoto&quot;: null,
       &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
       &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 10,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T08:19:02.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T08:19:02.000000Z&quot;
*    },
   {
       &quot;id&quot;: 2,
        &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Hiking Adventure&quot;,
        &quot;ActivityPhoto&quot;: null,
        &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
     &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
        &quot;numberOfMembers&quot;: 10,
        &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T08:25:56.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T08:25:56.000000Z&quot;
   },
   {
       &quot;id&quot;: 3,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Hiking Adventure&quot;,
       &quot;ActivityPhoto&quot;: null,
       &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
       &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 10,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T08:36:04.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T08:36:04.000000Z&quot;
   },
   {
       &quot;id&quot;: 4,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Hiking Adventure&quot;,
       &quot;ActivityPhoto&quot;: &quot;activity_photos/rj6fjePPJweFYZf07s9dCtAjL84pKv12XGzWIW81.jpg&quot;,
       &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
       &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 10,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T09:07:10.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T09:07:10.000000Z&quot;
   },
   {
       &quot;id&quot;: 5,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
       &quot;ActivityPhoto&quot;: &quot;activity_photos/2bAlnxzYIELlyfUW02fyNbLIobPMGzrUj8DLtchk.jpg&quot;,
       &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
       &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 10,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;
   },
   {
       &quot;id&quot;: 6,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
        &quot;ActivityPhoto&quot;: &quot;activity_photos/OfdYJQsOrGOnYCKFtPDrhhv2Kp7PP5zZ40Q08Exk.jpg&quot;,
        &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
        &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 10,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T09:13:20.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T09:13:20.000000Z&quot;
   },
   {
       &quot;id&quot;: 7,
       &quot;user_id&quot;: 1,
       &quot;title&quot;: &quot;Join me at Tech Chantier&quot;,
       &quot;ActivityPhoto&quot;: &quot;activity_photos/wvnmS2UuVkm1pfcNbhqcq6ouYonmj3G5Qd2KL69x.jpg&quot;,
       &quot;description&quot;: &quot;A thrilling hike to the mountain peak.&quot;,
       &quot;link&quot;: &quot;https://example.com/hiking-event&quot;,
       &quot;numberOfMembers&quot;: 40,
       &quot;location&quot;: &quot;Mount Fako, Cameroon&quot;,
       &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
       &quot;created_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;,
       &quot;updated_at&quot;: &quot;2025-02-04T09:18:46.000000Z&quot;
   }
   ],
   &quot;pending_activities&quot;: [],
   &quot;accepted_activities&quot;: [],
   &quot;declined_activities&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-activities-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-activities-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-activities-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-activities-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-activities-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-activities-user" data-method="GET"
      data-path="api/activities/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-activities-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-activities-user"
                    onclick="tryItOut('GETapi-activities-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-activities-user"
                    onclick="cancelTryOut('GETapi-activities-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-activities-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/activities/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-activities-user"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-activities-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-activities-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="activity-management-GETapi-activities--id--joined-users">Retrieve a list of users who have joined a particular activity.</h2>

<p>
</p>



<span id="example-requests-GETapi-activities--id--joined-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/activities/17/joined-users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activities/17/joined-users"
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

<span id="example-responses-GETapi-activities--id--joined-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 2,
        &quot;name&quot;: &quot;Nkwi Cyril&quot;,
        &quot;email&quot;: &quot;nkwicyril@gmail.com&quot;,
        &quot;email_verified_at&quot;: null,
        &quot;created_at&quot;: &quot;2025-02-04T09:37:07.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-04T09:37:07.000000Z&quot;,
        &quot;pivot&quot;: {
            &quot;activity_id&quot;: 9,
            &quot;user_id&quot;: 2,
            &quot;status&quot;: &quot;accepted&quot;
        }
    }
]</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Activity not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-activities--id--joined-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-activities--id--joined-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-activities--id--joined-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-activities--id--joined-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-activities--id--joined-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-activities--id--joined-users" data-method="GET"
      data-path="api/activities/{id}/joined-users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-activities--id--joined-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-activities--id--joined-users"
                    onclick="tryItOut('GETapi-activities--id--joined-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-activities--id--joined-users"
                    onclick="cancelTryOut('GETapi-activities--id--joined-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-activities--id--joined-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/activities/{id}/joined-users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-activities--id--joined-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-activities--id--joined-users"
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
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-activities--id--joined-users"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activityId</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activityId"                data-endpoint="GETapi-activities--id--joined-users"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                    </form>

                <h1 id="activity-request">Activity Request</h1>

    

                                <h2 id="activity-request-POSTapi-join-request--joinRequest_id--accept">Accept a join request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-join-request--joinRequest_id--accept">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/join-request/17/accept" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"joinRequest_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/join-request/17/accept"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "joinRequest_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-join-request--joinRequest_id--accept">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Join request accepted&quot;,
    &quot;whatsapp_link&quot;: &quot;https://wa.me/1234567890&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-join-request--joinRequest_id--accept" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-join-request--joinRequest_id--accept"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-join-request--joinRequest_id--accept"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-join-request--joinRequest_id--accept" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-join-request--joinRequest_id--accept">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-join-request--joinRequest_id--accept" data-method="POST"
      data-path="api/join-request/{joinRequest_id}/accept"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-join-request--joinRequest_id--accept', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-join-request--joinRequest_id--accept"
                    onclick="tryItOut('POSTapi-join-request--joinRequest_id--accept');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-join-request--joinRequest_id--accept"
                    onclick="cancelTryOut('POSTapi-join-request--joinRequest_id--accept');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-join-request--joinRequest_id--accept"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/join-request/{joinRequest_id}/accept</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-join-request--joinRequest_id--accept"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-join-request--joinRequest_id--accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-join-request--joinRequest_id--accept"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>joinRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="joinRequest_id"                data-endpoint="POSTapi-join-request--joinRequest_id--accept"
               value="17"
               data-component="url">
    <br>
<p>The ID of the joinRequest. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>joinRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="joinRequest_id"                data-endpoint="POSTapi-join-request--joinRequest_id--accept"
               value="1"
               data-component="body">
    <br>
<p>The ID of the join request to accept. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="activity-request-POSTapi-join-request--joinRequest_id--decline">Decline a join request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-join-request--joinRequest_id--decline">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/join-request/17/decline" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"joinRequest_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/join-request/17/decline"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "joinRequest_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-join-request--joinRequest_id--decline">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Your request to join this activity has been declined&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-join-request--joinRequest_id--decline" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-join-request--joinRequest_id--decline"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-join-request--joinRequest_id--decline"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-join-request--joinRequest_id--decline" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-join-request--joinRequest_id--decline">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-join-request--joinRequest_id--decline" data-method="POST"
      data-path="api/join-request/{joinRequest_id}/decline"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-join-request--joinRequest_id--decline', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-join-request--joinRequest_id--decline"
                    onclick="tryItOut('POSTapi-join-request--joinRequest_id--decline');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-join-request--joinRequest_id--decline"
                    onclick="cancelTryOut('POSTapi-join-request--joinRequest_id--decline');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-join-request--joinRequest_id--decline"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/join-request/{joinRequest_id}/decline</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-join-request--joinRequest_id--decline"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-join-request--joinRequest_id--decline"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-join-request--joinRequest_id--decline"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>joinRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="joinRequest_id"                data-endpoint="POSTapi-join-request--joinRequest_id--decline"
               value="17"
               data-component="url">
    <br>
<p>The ID of the joinRequest. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>joinRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="joinRequest_id"                data-endpoint="POSTapi-join-request--joinRequest_id--decline"
               value="1"
               data-component="body">
    <br>
<p>The ID of the join request to decline. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="activity-request-POSTapi-activity--activity_id--leave">Request leave from an activity</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-activity--activity_id--leave">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17/leave" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"activity_id\": 17
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activity/17/leave"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "activity_id": 17
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-activity--activity_id--leave">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Leave request sent successfully&quot;,
    &quot;leaveRequest&quot;: {
        &quot;user_id&quot;: 2,
        &quot;activity_id&quot;: 9,
        &quot;status&quot;: &quot;pending&quot;,
        &quot;updated_at&quot;: &quot;2025-02-04T13:16:58.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-02-04T13:16:58.000000Z&quot;,
        &quot;id&quot;: 1
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not a participant in this activity&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-activity--activity_id--leave" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-activity--activity_id--leave"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-activity--activity_id--leave"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-activity--activity_id--leave" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-activity--activity_id--leave">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-activity--activity_id--leave" data-method="POST"
      data-path="api/activity/{activity_id}/leave"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-activity--activity_id--leave', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-activity--activity_id--leave"
                    onclick="tryItOut('POSTapi-activity--activity_id--leave');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-activity--activity_id--leave"
                    onclick="cancelTryOut('POSTapi-activity--activity_id--leave');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-activity--activity_id--leave"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/activity/{activity_id}/leave</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-activity--activity_id--leave"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-activity--activity_id--leave"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-activity--activity_id--leave"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>activity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity_id"                data-endpoint="POSTapi-activity--activity_id--leave"
               value="17"
               data-component="url">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>activity_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="activity_id"                data-endpoint="POSTapi-activity--activity_id--leave"
               value="17"
               data-component="body">
    <br>
<p>The ID of the activity. Example: <code>17</code></p>
        </div>
        </form>

                    <h2 id="activity-request-POSTapi-leave-requests--leaveRequest_id--approve">Approve a leave request</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-leave-requests--leaveRequest_id--approve">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/leave-requests/17/approve" \
    --header "Authorization: string required The authentication token. Example: Bearer {token}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"leaveRequest_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/leave-requests/17/approve"
);

const headers = {
    "Authorization": "string required The authentication token. Example: Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "leaveRequest_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-leave-requests--leaveRequest_id--approve">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The leave request has been approved&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;You are not authorized to approve this request&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-leave-requests--leaveRequest_id--approve" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-leave-requests--leaveRequest_id--approve"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-leave-requests--leaveRequest_id--approve"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-leave-requests--leaveRequest_id--approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-leave-requests--leaveRequest_id--approve">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-leave-requests--leaveRequest_id--approve" data-method="POST"
      data-path="api/leave-requests/{leaveRequest_id}/approve"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-leave-requests--leaveRequest_id--approve', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-leave-requests--leaveRequest_id--approve"
                    onclick="tryItOut('POSTapi-leave-requests--leaveRequest_id--approve');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-leave-requests--leaveRequest_id--approve"
                    onclick="cancelTryOut('POSTapi-leave-requests--leaveRequest_id--approve');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-leave-requests--leaveRequest_id--approve"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/leave-requests/{leaveRequest_id}/approve</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-leave-requests--leaveRequest_id--approve"
               value="string required The authentication token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>string required The authentication token. Example: Bearer {token}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-leave-requests--leaveRequest_id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-leave-requests--leaveRequest_id--approve"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>leaveRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="leaveRequest_id"                data-endpoint="POSTapi-leave-requests--leaveRequest_id--approve"
               value="17"
               data-component="url">
    <br>
<p>The ID of the leaveRequest. Example: <code>17</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>leaveRequest_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="leaveRequest_id"                data-endpoint="POSTapi-leave-requests--leaveRequest_id--approve"
               value="1"
               data-component="body">
    <br>
<p>The ID of the leave request to approve. Example: <code>1</code></p>
        </div>
        </form>

                <h1 id="authentication">Authentication</h1>

    <p>Endpoints for user registration, login, and logout.</p>

                                <h2 id="authentication-POSTapi-register">Register a new user</h2>

<p>
</p>

<p>Create a new user account and generate an authentication token.</p>

<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"John Doe\",
    \"email\": \"john@example.com\",
    \"password\": \"secretpassword\",
    \"password_confirmation\": \"secretpassword\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secretpassword",
    "password_confirmation": "secretpassword"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;user&quot;: {
        &quot;name&quot;: &quot;Nkuma Confident&quot;,
        &quot;email&quot;: &quot;nsem@gmail.com&quot;,
        &quot;updated_at&quot;: &quot;2025-02-04T08:18:33.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-02-04T08:18:33.000000Z&quot;,
        &quot;id&quot;: 1
    },
    &quot;token&quot;: &quot;1|zoNArNwtRQijtSUA8qLUAFctGhOI1W1OUnVRm0GZcc1b2217&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The email has already been taken. (and 1 more error)&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email has already been taken.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password field confirmation does not match.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-register"
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
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-register"
               value="John Doe"
               data-component="body">
    <br>
<p>The user's full name. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-register"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-register"
               value="secretpassword"
               data-component="body">
    <br>
<p>The user's password (minimum 6 characters). Example: <code>secretpassword</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password_confirmation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password_confirmation"                data-endpoint="POSTapi-register"
               value="secretpassword"
               data-component="body">
    <br>
<p>The confirmation of the password. Example: <code>secretpassword</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-login">Log in an existing user</h2>

<p>
</p>

<p>Authenticate a user using email and password, and generate an authentication token.</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john@example.com\",
    \"password\": \"secretpassword\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@example.com",
    "password": "secretpassword"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;user&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;John Doe&quot;,
        &quot;email&quot;: &quot;john@example.com&quot;,
        &quot;created_at&quot;: &quot;2025-01-21T10:00:00&quot;,
        &quot;updated_at&quot;: &quot;2025-01-21T10:00:00&quot;
    },
    &quot;token&quot;: &quot;1|laravel_sanctum_token_string_here&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid credentials&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The selected email is invalid.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
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
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="john@example.com"
               data-component="body">
    <br>
<p>The user's email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="secretpassword"
               data-component="body">
    <br>
<p>The user's password. Example: <code>secretpassword</code></p>
        </div>
        </form>

                    <h2 id="authentication-POSTapi-logout">Log out the current user

Revoke all of the user&#039;s tokens to log them out.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Successfully logged out&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-users--id-">Get a single user&#039;s public profile</h2>

<p>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/users/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/users/consequatur"
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

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The route malingo/public/api//api/users/consequatur could not be found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-users--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-users--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>consequatur</code></p>
            </div>
                    </form>

                <h1 id="general-user-enpoints">General User Enpoints</h1>

    

                                <h2 id="general-user-enpoints-GETapi-user">GET api/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/user" \
    --header "reguires: a toke" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/user"
);

const headers = {
    "reguires": "a toke",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 2,
    &quot;name&quot;: &quot;Nkwi Cyril&quot;,
    &quot;email&quot;: &quot;nkwicyril@gmail.com&quot;,
    &quot;email_verified_at&quot;: null,
    &quot;created_at&quot;: &quot;2025-02-04T09:37:07.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-02-04T09:37:07.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>reguires</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="reguires"                data-endpoint="GETapi-user"
               value="a toke"
               data-component="header">
    <br>
<p>Example: <code>a toke</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="profile-management">Profile Management</h1>

    

                                <h2 id="profile-management-POSTapi-user-edit-profile">Edit User Profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-user-edit-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://rrn24.techchantier.com/malingo/public/api/api/user/edit-profile" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "age=17"\
    --form "mobile_number=consequatur"\
    --form "profile_picture=@C:\Users\NSEM CONFIDENT NJOCK\AppData\Local\Temp\php1F07.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/user/edit-profile"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('age', '17');
body.append('mobile_number', 'consequatur');
body.append('profile_picture', document.querySelector('input[name="profile_picture"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-edit-profile">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;John Doe&quot;,
    &quot;email&quot;: &quot;john@example.com&quot;,
    &quot;age&quot;: 30,
    &quot;mobile_number&quot;: &quot;+1234567890&quot;,
    &quot;profile_picture&quot;: &quot;path/to/profile/picture.jpg&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Validation failed&quot;,
    &quot;errors&quot;: {
        &quot;mobile_number&quot;: [
            &quot;The mobile number format is invalid&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user-edit-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-edit-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-edit-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-user-edit-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-edit-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-user-edit-profile" data-method="POST"
      data-path="api/user/edit-profile"
      data-authed="1"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-edit-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-edit-profile"
                    onclick="tryItOut('POSTapi-user-edit-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-edit-profile"
                    onclick="cancelTryOut('POSTapi-user-edit-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-edit-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/edit-profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-user-edit-profile"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-user-edit-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>age</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="age"                data-endpoint="POSTapi-user-edit-profile"
               value="17"
               data-component="body">
    <br>
<p>optional User's age Example: <code>17</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>mobile_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="mobile_number"                data-endpoint="POSTapi-user-edit-profile"
               value="consequatur"
               data-component="body">
    <br>
<p>optional User's mobile number Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>profile_picture</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="profile_picture"                data-endpoint="POSTapi-user-edit-profile"
               value=""
               data-component="body">
    <br>
<p>optional User's profile picture Example: <code>C:\Users\NSEM CONFIDENT NJOCK\AppData\Local\Temp\php1F07.tmp</code></p>
        </div>
        </form>

                    <h2 id="profile-management-GETapi-user-profile">Get Current User Profile</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/user/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/user/profile"
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

<span id="example-responses-GETapi-user-profile">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 1,
    &quot;name&quot;: &quot;John Doe&quot;,
    &quot;email&quot;: &quot;john@example.com&quot;,
    &quot;age&quot;: 30,
    &quot;mobile_number&quot;: &quot;+1234567890&quot;,
    &quot;profile_picture&quot;: &quot;path/to/profile/picture.jpg&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user-profile" data-method="GET"
      data-path="api/user/profile"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-profile"
                    onclick="tryItOut('GETapi-user-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-profile"
                    onclick="cancelTryOut('GETapi-user-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="searching">Searching</h1>

    

                                <h2 id="searching-GETapi-activities-filter">Filter activities by title, description, date, and location

Retrieve activities based on specified filters.</h2>

<p>
</p>



<span id="example-requests-GETapi-activities-filter">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/activities/filter?title=consequatur&amp;description=Dolores+dolorum+amet+iste+laborum+eius+est+dolor.&amp;date=consequatur&amp;location=consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"title\": \"consequatur\",
    \"description\": \"Dolores dolorum amet iste laborum eius est dolor.\",
    \"location\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/activities/filter"
);

const params = {
    "title": "consequatur",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "date": "consequatur",
    "location": "consequatur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "consequatur",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "location": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-activities-filter">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 5,
        &quot;user_id&quot;: 1,
        &quot;title&quot;: &quot;Hiking go and hike with me&quot;,
        &quot;ActivityPhoto&quot;: &quot;activity_photos/QDEBUm8GSGbdAFob56QOh4EidyLtgFR5NckhQFBQ.jpg&quot;,
        &quot;description&quot;: &quot;this is a good activity&quot;,
        &quot;link&quot;: &quot;https//wa.me/237672474539&quot;,
        &quot;numberOfMembers&quot;: 10,
        &quot;location&quot;: &quot;buea&quot;,
        &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
        &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-04T11:43:41.000000Z&quot;
    }
]</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Invalid date format, please use a valid date&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-activities-filter" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-activities-filter"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-activities-filter"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-activities-filter" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-activities-filter">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-activities-filter" data-method="GET"
      data-path="api/activities/filter"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-activities-filter', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-activities-filter"
                    onclick="tryItOut('GETapi-activities-filter');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-activities-filter"
                    onclick="cancelTryOut('GETapi-activities-filter');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-activities-filter"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/activities/filter</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-activities-filter"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-activities-filter"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="GETapi-activities-filter"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by title. Example: <code>consequatur</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="GETapi-activities-filter"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="query">
    <br>
<p>optional Filter by description. Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-activities-filter"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by date (format: y-m-d). Example: <code>consequatur</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="GETapi-activities-filter"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by location. Example: <code>consequatur</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="GETapi-activities-filter"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="GETapi-activities-filter"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="body">
    <br>
<p>Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-activities-filter"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="GETapi-activities-filter"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="searching-GETapi-search--parameter--">Search activities by parameter or specific fields

Search for activities using a general parameter or specific field filters.</h2>

<p>
</p>



<span id="example-requests-GETapi-search--parameter--">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://rrn24.techchantier.com/malingo/public/api/api/search/consequatur?title=consequatur&amp;description=Dolores+dolorum+amet+iste+laborum+eius+est+dolor.&amp;location=consequatur&amp;date=consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://rrn24.techchantier.com/malingo/public/api/api/search/consequatur"
);

const params = {
    "title": "consequatur",
    "description": "Dolores dolorum amet iste laborum eius est dolor.",
    "location": "consequatur",
    "date": "consequatur",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-search--parameter--">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 5,
        &quot;user_id&quot;: 1,
        &quot;title&quot;: &quot;Hiking go and hike with me&quot;,
        &quot;ActivityPhoto&quot;: &quot;activity_photos/QDEBUm8GSGbdAFob56QOh4EidyLtgFR5NckhQFBQ.jpg&quot;,
        &quot;description&quot;: &quot;this is a good activity&quot;,
        &quot;link&quot;: &quot;https//wa.me/237672474539&quot;,
        &quot;numberOfMembers&quot;: 10,
        &quot;location&quot;: &quot;buea&quot;,
        &quot;time&quot;: &quot;2025-02-15 08:00:00&quot;,
        &quot;created_at&quot;: &quot;2025-02-04T09:11:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-02-04T11:43:41.000000Z&quot;
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-search--parameter--" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-search--parameter--"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-search--parameter--"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-search--parameter--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-search--parameter--">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-search--parameter--" data-method="GET"
      data-path="api/search/{parameter?}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-search--parameter--', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-search--parameter--"
                    onclick="tryItOut('GETapi-search--parameter--');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-search--parameter--"
                    onclick="cancelTryOut('GETapi-search--parameter--');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-search--parameter--"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/search/{parameter?}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-search--parameter--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-search--parameter--"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>parameter</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="parameter"                data-endpoint="GETapi-search--parameter--"
               value="consequatur"
               data-component="url">
    <br>
<p>optional General search term to find across title, description, and location. Example: <code>consequatur</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>title</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="title"                data-endpoint="GETapi-search--parameter--"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by title. Example: <code>consequatur</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="GETapi-search--parameter--"
               value="Dolores dolorum amet iste laborum eius est dolor."
               data-component="query">
    <br>
<p>optional Filter by description. Example: <code>Dolores dolorum amet iste laborum eius est dolor.</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="GETapi-search--parameter--"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by location. Example: <code>consequatur</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="date"                data-endpoint="GETapi-search--parameter--"
               value="consequatur"
               data-component="query">
    <br>
<p>optional Filter by date (format: y-m-d). Example: <code>consequatur</code></p>
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
