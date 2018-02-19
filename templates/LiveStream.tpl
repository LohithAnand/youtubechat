<div class="container">
    <div class="row">
        <div class="col">
            <div class="alert alert-success" role="alert" style="margin-top: 1%;">
                {$BROADCAST_RESPONSE['items'][0]['snippet']['title']} event is now live (Broadcast, Live Stream, Bind and video APIs used)
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            {$BROADCAST_RESPONSE['items'][0]['contentDetails']['monitorStream']['embedHtml']}
        </div>
        <div class="col">
            <div class="container">
                <div class="row">
                    <div style="width: 100%;">
                        <nav class="navbar navbar-light bg-light">
                            <span class="navbar-brand mb-0 h1">Chat (insert, list liveChatMessages APIs used)</span>
                            <span class="pull-right" style="cursor: pointer;"><a href="#search-database"><i class="fas fa-search"></i></a></span>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container chats-container">
                <input type="hidden" name="chat-next-page-token" id="chat-next-page-token" value="{$LIVE_CHAT_MESSAGES['nextPageToken']}" />
                <input type="hidden" name="chat-polling-interval-millis" id="chat-polling-interval-millis" value="{$LIVE_CHAT_MESSAGES['pollingIntervalMillis']}" />
                <input type="hidden" name="live-chat-id" id="live-chat-id" value="{$LIVE_CHAT_ID}" />
                {foreach from=$LIVE_CHAT_MESSAGES['items'] item=LIVE_CHAT_MESSAGE}
                    <div class="row">
                        <div class="col chat-message-content">
                            <span>
                                <img src="{$LIVE_CHAT_MESSAGE['authorDetails']['profileImageUrl']}" height="24" width="24">
                            </span>
                            <span class="authorDetails">
                                {$LIVE_CHAT_MESSAGE['authorDetails']['displayName']}: 
                            </span>
                            <span class="message">
                                {$LIVE_CHAT_MESSAGE['snippet']['displayMessage']}
                            </span>
                        </div>
                    </div>
                {/foreach}
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="javascript:void(0)" id="update-chat"><i class="fas fa-sync"></i> - Click to check for new messages and update chat (This is to limit API hits in non-production env) </a>
                        <div class="input-group mb-3" style="margin-top: 10px;">
                            <input type="text" class="form-control" placeholder="Enter your message" id="chat-message-input">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="post-message">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="search-database">
                <h5>Database search (Not a google API search)</h5>
                <div class="input-group mb-3" style="margin-top: 10px;">
                    <input type="text" class="form-control" id="search-user-name-key" placeholder="Type username">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" id="search-messages-from-db" type="button">Search</button>
                    </div>
                </div>
                <div id="search-results">
                    <div class="alert alert-info" role="alert">
                        Search Results will be shown here.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="chat-hype">
                <h5>Bonus: The sample chat hype gauge with mock data (No APIs used). Thanks to highcharts for the library and samples!</h5>
                <div id="container-chat-hype"></div>
            </div>
        </div>
    </div>
</div>