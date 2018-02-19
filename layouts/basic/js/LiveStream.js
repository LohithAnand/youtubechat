function LiveStream() {
    this.registerPostMessageEvent = function() {
        var thisInstance = this;
        jQuery('#post-message').on('click', function() {
            var text = jQuery('#chat-message-input').val() || '';
            if(text.length) {
                console.log("text message - ", text);
                jQuery('#chat-message-input').val('');
                jQuery.ajax({
                    type: "POST",
                    url: "index.php",
                    data: {
                        "action" : "SendMessage",
                        "liveChatId" : jQuery('#live-chat-id').val(),
                        "liveChatMessage" : text
                    },
                    success: function(data) {
                        console.log("data - ", data);
                        if(data["success"]) {
                            //update chat
                            thisInstance.updateChat();
                        }
                    },
                    dataType: "json"
                });
            }
        });
    }
    
    this.updateChat = function(done) {
        var liveChatId = jQuery('#live-chat-id').val();
        var nextPageToken = jQuery('#chat-next-page-token').val();
        var pollingInterval = jQuery('#chat-polling-interval-millis').val();
        if(liveChatId && nextPageToken && pollingInterval) {
            setTimeout(function() {
                console.log("after - " + parseInt(pollingInterval) + "milli seconds");
                jQuery.ajax({
                    type: "POST",
                    url: "index.php",
                    data: {
                        "action": "GetNewMessages",
                        "liveChatId": liveChatId,
                        "nextPageToken": nextPageToken
                    },
                    success: function (data) {
                        console.log("data - ", data);
                        data = data["result"];
                        if(data["success"]) {
                            jQuery('#chat-next-page-token').val(data["response"]["nextPageToken"]);
                            jQuery('#chat-polling-interval-millis').val(data["response"]["pollingIntervalMillis"]);
                            var items = data["response"]["items"];
                            for(var key in items) { 
                                var chat = items[key];
                                var html = '<div class="row">'+
                                                '<div class="col chat-message-content">'+
                                                    '<span>'+
                                                        '<img src="'+ chat["profileImageUrl"] +'" height="24" width="24"> '+
                                                    '</span>'+
                                                    '<span class="authorDetails"> '+
                                                        chat["displayName"]+ ': ' +
                                                    '</span>'+
                                                    '<span class="message">'+
                                                        chat["displayMessage"] + 
                                                    '</span>'+
                                                '</div>'+
                                            '</div>';
                                    jQuery('.chats-container').append(html);
                            }
                        }
                        if(typeof done === "function") {
                            done.call();
                        }
                    },
                    dataType: "json"
                });
            }, parseInt(pollingInterval));
        }
    }
    
    this.registerUpdateChatEvent = function() {
        var thisInstance = this;
        jQuery("#update-chat").on("click", function() {
            jQuery("#update-chat").off("click");
            thisInstance.updateChat(function() {
                thisInstance.registerUpdateChatEvent();
            });
        });
    }
    
    this.registerDBSearchEvent = function() {
        var thisInstance = this;
        var liveChatId = jQuery('#live-chat-id').val();
        jQuery('#search-messages-from-db').on('click', function() {
            var searchKey = jQuery('#search-user-name-key').val();
            if(searchKey) {
                jQuery.ajax({
                    type: "POST",
                    url: "index.php",
                    data: {
                        "action" : "SearchMessages",
                        "username" : searchKey,
                        "liveChatId" : liveChatId
                    },
                    success: function(data) {
                        jQuery('#search-results').html("");
                        console.log("data - ", data);
                        if(data.success && data.result.success) {
                            var searchResults = data.result.searchResult;
                            for(var key in searchResults) {
                                var searchResult = searchResults[key];
                                var html = '<div class="row">'+
                                                '<div class="col chat-message-results-content">'+
                                                    '<span class="authorDetails">'+
                                                        searchResult['username'] + ': ' +
                                                    '</span>' +
                                                    '<span class="message">' +
                                                        searchResult['message'] + 
                                                    '</span>'+
                                                '</div>'+
                                            '</div>';
                                jQuery('#search-results').append(html);
                            }
                        }
                    },
                    dataType: "json"
                });
            }
        });
    }
    
    this.setupHypeGauge = function() {
        var chartSpeed = Highcharts.chart('container-chat-hype', Highcharts.merge({
            chart: {
                type: 'solidgauge'
            },
            title: null,
            pane: {
                center: ['50%', '85%'],
                size: '140%',
                startAngle: -90,
                endAngle: 90,
            },
            tooltip: {
                enabled: false
            },
            // the value axis
            yAxis: {
                stops: [
                    [0.1, '#55BF3B'], // green
                    [0.5, '#DDDF0D'], // yellow
                    [0.9, '#DF5353'] // red
                ],
                lineWidth: 0,
                minorTickInterval: null,
                tickAmount: 2,
                title: {
                    y: -70
                },
                labels: {
                    y: 16
                }
            },
            plotOptions: {
                solidgauge: {
                    dataLabels: {
                        y: 5,
                        borderWidth: 0,
                        useHTML: true
                    }
                }
            }
        }, {
            yAxis: {
                min: 0,
                max: 400,
                title: {
                    text: 'Messages Hype'
                }
            },

            credits: {
                enabled: false
            },

            series: [{
                    name: 'Messages Hype',
                    data: [80],
                    dataLabels: {
                        format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                                '<span style="font-size:12px;color:silver">Messages/Second</span></div>'
                    },
                    tooltip: {
                        valueSuffix: ' Messages/Second'
                    }
                }]

        }));

        setInterval(function () {
            // Speed
            var point,
                    newVal,
                    inc;
            if (chartSpeed) {
                point = chartSpeed.series[0].points[0];
                inc = Math.round((Math.random() - 0.5) * 100);
                newVal = point.y + inc;

                if (newVal < 0 || newVal > 400) {
                    newVal = point.y - inc;
                }
                point.update(newVal);
            }
        }, 1000);
    }
}

jQuery(document).ready(function() {
    var ls = new LiveStream();
    ls.registerPostMessageEvent();
    ls.registerUpdateChatEvent();
    ls.registerDBSearchEvent();
    ls.setupHypeGauge();
});