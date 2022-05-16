var now = new Date();
//
//now.format("m/dd/yy");
//// Returns, e.g., 6/09/07

// Can also be used as a standalone function

var updating = 0;
var posting = 0;
var activity = 0;
var question_id = $('.main-question').attr('data-question-id');

var current = '';
var user_type = $('.row.thread').attr('data-user');

var time = 0;
var p = PUBNUB.init({
    subscribe_key: 'sub-c-f762fb78-2724-11e4-a4df-02ee2ddab7fe',
    publish_key: 'pub-c-156a6d5f-22bd-4a13-848d-b5b4d4b36695',
    uuid: user_type,
    ssl: true
});
$(document).ready(function () {
    
    $('textarea[name=reply]').on('keyup', function () {
        var formData = new FormData();
        formData.append('question_id', question_id);
        if (activity == 0) {
            ajaxCall(siteroot + 'question/update-activity', formData, updateActivity, activityUpdated, updateError);
        }
        
        function updateActivity() {
            activity = 1;
        }
        
        function activityUpdated() {
            activity = 0;
        }
    });

    var otherUserIsOnline = 0;
    
    $('#post-reply').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        if ($('#replytext').val() != '') {

            var replytext = $('#replytext').val();
            var sendMsg = function() {
                formData.append('isonline', otherUserIsOnline);
                ajaxCall(siteroot + user_type + '/post-reply/' + question_id, formData, null, null, null);
                console.log('sent msg');
                p.publish({
                    channel: 'my_channel' + $('.main-question').attr('data-question-id'),
                    message: {
                        text: replytext,
                        user_type: user_type,
                        typing: false,
                        refresh: false,
                        file: false,
                        isonline: otherUserIsOnline
                    }
                    
                });
            };
            //try to check occupancy count 
            
            p.here_now({
                channel: 'my_channel' + $('.main-question').attr('data-question-id'),
                callback: function (presence) {
                    if (presence.occupancy > 1) {
                        console.log('other user is here');
                        otherUserIsOnline = 1;
                        sendMsg();
                    } else {
                        console.log('other user is offline');
                        otherUserIsOnline = 0;
                        sendMsg();
                        var formData = new FormData();
                        formData.append('question_id', question_id);
                            var count = 1;
                            console.log(count);
                            if (count === 1) {
                                ajaxCall(siteroot + user_type + '/email-reply/' + question_id, formData, null, null, null);
                                count++;
                                
                            }
                            
                      
                        
                        console.log('absent');
                    }
                    
                }
            });
            $('#replytext').val('');
        }
        
        if ($('#post-reply input[type=file]').val() != '' && $('#post-reply input[type=file]').val() != undefined) {
            console.log('sdf');
            ajaxCallfile(siteroot + user_type + '/post-reply/' + question_id, formData, null, null, null);
            $('#replytext').val('');
            function postBegin() {
                $('#post-reply .alert').remove();
                $('#post-reply textarea').prop('disabled', true);
                $('#post-reply input').prop('disabled', true);
                $('#post-reply button').prop('disabled', true);
            }
            
            function postSuccess(response) {
                if (response.success) {
                    posting = 1;
                } else {
                    postError(response.message);
                }
            }
            
            function postError(response) {
                var html = '<div class="alert alert-danger" role="alert">' +
                        '<a class="close pull" data-dismiss="alert">&times;</a>' +
                        '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                        ' ' + response + '<br />' +
                        '</div>';
                $('#post-reply .alert').remove();
                $('#post-reply h4').after(html);
                $('#post-reply textarea').prop('disabled', false);
                $('#post-reply input').prop('disabled', false);
                $('#post-reply button').prop('disabled', false);
            }
        }
        $("#file").val('');
    });
    $('#post-reply1').on('submit', function (e) {
        e.preventDefault();
        alert('sdf')
        var formData = new FormData($(this)[0]);
        ajaxCall(siteroot + user_type + '/post-reply/' + question_id, formData, postBegin, postSuccess, postError);
        $('#replytext').val('');
        function postBegin() {
            $('#post-reply .alert').remove();
            $('#post-reply textarea').prop('disabled', true);
            $('#post-reply input').prop('disabled', true);
            $('#post-reply button').prop('disabled', true);
        }
        
        function postSuccess(response) {
            if (response.success) {
                posting = 1;
            } else {
                postError(response.message);
            }
        }
        
        function postError(response) {
            var html = '<div class="alert alert-danger" role="alert">' +
                    '<a class="close pull" data-dismiss="alert">&times;</a>' +
                    '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' +
                    ' ' + response + '<br />' +
                    '</div>';
            $('#post-reply .alert').remove();
            $('#post-reply h4').after(html);
            $('#post-reply textarea').prop('disabled', false);
            $('#post-reply input').prop('disabled', false);
            $('#post-reply button').prop('disabled', false);
        }
    });
    
    // Get List of Occupants and Occupancy Count.
    
    
    p.subscribe({
        channel: 'my_channel' + $('.main-question').attr('data-question-id'),
        presence: function (m) {
            console.log('---question details-----');
            console.log(m);
            if (m.occupancy > 1) {
//            console.log(12);
                console.log('ms-online');
                console.log(user_type);
                if (user_type == 'user') {
                    $(".lawyer .online-status").attr("title", "online");
                } else {
                    $(".user .online-status").attr("title", "online");
                }
            } else {
                console.log('ms-offline');
                console.log(user_type);
                if (user_type == 'user') {
                    $(".lawyer .online-status").attr("title", "offline");
                } else {
                    $(".user .online-status").attr("title", "offline");
                }
            }
            
        },
        callback: function (m) {
            
            console.log('-----details--------');
            console.log(m);
            if (m.user_type != user_type) {
                time = 60;
            }
            if (m.file == true) {
                
                if (m.user_type == 'user' && user_type != 'user') {
                    $('#checknum').append(markup_file_msg(m.text, 'user'));
                    
                } else if (m.user_type == 'lawyer' && user_type != 'lawyer') {
                    $('#checknum').append(markup_file_msg(m.text, 'lawyer'));
                    
                }
                
            } else {
                if (m.text != '') {
                    console.log('append msg');
                    if (m.user_type == 'user') {
                        $('#checknum').append(markup_user_reply(m.text, m.isonline));
                        //   console.log(markup_user_reply(m.text));
                    } else {
                        $('#checknum').append(markup_lawyer_reply(m.text, m.isonline));
                    }
                }
            }
            if (user_type != m.user_type) {
                if (m.typing == true) {
                    
                    $('.typing').show();
                } else {
                    $('.typing').hide();
                }
            }
            
        }
        
    });
/////////////////////////////////////////////////////////////////////////
//
//				SUBSCRIBE FOR VIDEO CHAT
//
////////////////////////////////////////////////////////////////////////
    $('#start-later-date').datepicker({
        firstDay: 1,
        minDate: 0
    });
    $('#start-later button').on('click', function() {
        var date = $('#start-later-date').val().trim();
        var time = $('#start-later-time').val().trim();
        if (!date) {
            alert('You must choose date');
            return;
        }
        if (!time) {
            alert('You must choose time');
            return;
        }
        var formData = new FormData();
        formData.append('date', date);
        formData.append('time', time);
        var url = siteroot + user_type + '/email-question/' + question_id;
        ajaxCall(url, formData, function(data) {
            $('#start-later').hide();
            console.log('start');
        }, function(data) {
            console.log('end');
            console.log(data)
            $('#start-later').show();
            $('#start-later').html(data['message']);
        }, null, true);
    });
    p.subscribe({
        channel: 'my_channel_vid' + $('.main-question').attr('data-question-id'),
        presence: function (m) {
            console.log(m);
            if (m.occupancy > 1) {
                console.log('online');
                $('#start').show();
                $('#start-later').hide();
                
            } else {
                console.log('offline');
                
                $('#start').hide();
                $('#start-later').show();
                end();
                //	$('#inCall').hide();
            }
            
        },
        callback: function (m) {
            console.log(m.user_type);
            console.log(user_type);
            if (m.user_type !== user_type) {
                //   time = 60;
                
                
                //     if ($('#inCall').css('display') == 'none') {
                // element is hidden
                $('#myModal').modal('toggle');
                var audio = document.getElementById("ring");
                audio.play();
                
                $('#makecall').show();
                $('#start').hide();
                //   }
                
            } else if (m.user_type == user_type)
            {
                // console.log('m.user_type:');
                // console.log(m.user_type);
                // console.log('user_type:');
                // console.log(user_type);
            }
            
        }
        
    });
/////////////////////////////////////////////////////////////////////////
//
//				END OF SUBSCRIBE FOR VIDEO CHAT
//
////////////////////////////////////////////////////////////////////////
//  p.publish({
//            channel: 'my_channel',
//            message: {text: 'sadfsadfsf'}
//
//        });
    
//    setInterval(function () {
//        time = time - 1;
//        if (time > 0) {
////            console.log(12);
//            if (user_type == 'user') {
//                $(".lawyer .online-status").attr("title", "online");
//            } else {
//                $(".user .online-status").attr("title", "online");
//            }
//        } else {
//            if (user_type == 'user') {
//                $(".lawyer .online-status").attr("title", "offline");
//            } else {
//                $(".user .online-status").attr("title", "offline");
//            }
//        }
//    }, 2000);
//
//    setInterval(function() {
//        var formData = new FormData();
//        formData.append('question_id', question_id);
//
//        ajaxCall(siteroot +'question/activity-updates', formData, null, activitySuccess, updateError);
//    }, 2000);
    
    function activitySuccess(response) {
        if (response.success) {
            
            if (response.typing == true) {
                $('.typing').slideDown();
            } else {
                $('.typing').slideUp();
            }
            
            $('.picture.online-status').each(function () {
                $(this).attr('title', response.status);
            });
            if (response.status == 'offline') {
                $('.online-text strong').attr('class', 'text-danger').html('Currently offline');
            } else if (response.status == 'away') {
                $('.online-text strong').attr('class', 'text-warning').html('Currently away');
            } else if (response.status == 'online') {
                $('.online-text strong').attr('class', 'text-success').html('Currently online');
            }
        }
    }
    
    function updateBegin() {
        if (posting == 1) {
            posting = 2;
        }
    }
    
    function updateSuccess(response) {
        if (response.success) {
            
            if (response.question_status == 2 && $('.waiting-for-lawyer').length > 0) {
                location.reload();
            }
            
            if (response.question_status == 3) {
                location.reload();
            }
            
            if (posting == 2) {
                posting = 0;
                $('#post-reply textarea').val('').prop('disabled', false);
                $('#post-reply input').val('').prop('disabled', false);
                $('#post-reply button').prop('disabled', false);
            }
            
            $.each(response.replies, function (id, reply) {
		console.log(reply)
                var html = '<div class="item clearfix ' + reply.author + ' reply" data-reply-id="' + id + '" data-posted="' + reply.created_at.date + '">';
                if (reply.author == 'lawyer') {
                    if (current != 'lawyer') {
                        current = 'lawyer';
                        if (reply.picture) {
                            html += '<div class="picture online-status" title="online"><img src="' + siteroot + 'assets/images/lawyers/' + reply.picture + '" width="100%" /></div>';
                        } else {
                            html += '<div class="picture online-status" title="online"><img src="' + siteroot + 'assets/images/lawyer.jpg" width="100%" /></div>';
                        }
                    } else {
                        html += '<div class="picture blank"></div>';
                    }
                } else {
                    if (current != 'user') {
                        current = 'user';
                        html += '<div class="picture online-status" title="online"><span class="glyphicon glyphicon-user"></span></div>';
                    } else {
                        html += '<div class="picture blank"></div>';
                    }
                }
                
                html += '<div class="messages-wrap">' +
                        '<div class="message clearfix">';
                if (reply.type == 1) {

 $('#post-reply input[type=file]').val('');

                    html += '<div class="text file ' + (reply.editable == true ? 'editable' : '') + '">' +
                            'Attachment: <a target="_blank" href="https://askwakeel.pk/download/' + question_id + '/' + reply.message + '" >' + reply.message + '</a>' +
                            '<div class="date">' + reply.created_at_formatted + '</div>';
                            
                    if (reply.editable == true) {
                        html += '<div class="action"><a href="' + siteroot + user_type + '/edit-reply/' + question_id + '/' + id + '"><span class="glyphicon glyphicon-trash"></span></a></div>';
                    }
                    
                    html += '</div>';
                } else {
                    html += '<div class="text ' + (reply.editable == true ? 'editable' : '') + '">' +
                            '<span>' + reply.message + '</span>' +
                            '<div class="date">' + reply.created_at_formatted + '</div>';
                    if (reply.editable == true) {
                        html += '<div class="action"><a href="' + siteroot + user_type + '/edit-reply/' + question_id + '/' + id + '"><span class="glyphicon glyphicon-pencil"></span></a></div>';
                    }
                    
                    html += '</div>';
                }
                
                $('.thread .thread-wrap .item .text').removeClass('editable');
                $('.thread .thread-wrap .item .action').remove();
                $('.thread .thread-wrap').append(html);
                if (windowWidth > 767) {
                    $('.account .sidebar').css('min-height', $(document).height() - 311);
                }
            });
            $.each(response.edited, function (id, message) {
                $('.item[data-reply-id=' + id + ']:not(.edited) .text > span').html(message);
                $('.item[data-reply-id=' + id + ']:not(.edited)').addClass('edited');
            });
            $.each(response.deleted, function (id) {
                $('.item[data-reply-id=' + id + ']').remove();
            });
        } else {
            updateError(response.message);
        }
    }
    
    function updateError(response) {
        if (response) {
//            console.log(response);
        } else {
//            console.log('Woops! Looks like something went wrong. Refresh the page and try again!');
        }
    }
});



$('#replytext').on('keyup', function () {
    if ($('#replytext').val() != '') {
        p.publish({
            channel: 'my_channel' + $('.main-question').attr('data-question-id'),
            message: {
                text: '',
                user_type: user_type,
                typing: true,
                refresh: false,
                file: false
            }
            
        });
    } else {
        p.publish({
            channel: 'my_channel' + $('.main-question').attr('data-question-id'),
            message: {
                text: '',
                user_type: user_type,
                typing: false,
                refresh: false,
                file: false
            }
            
        });
    }
});

/*ajax call*/
function ajaxCall(form_url, formData, fn_beforesend, fn_onsuccess, fn_onerror, doSuccessCheck) {
    
    var type = (typeof formData === "undefined" || formData === null) ? "GET" : "POST";
    var timeout = (type === 'GET') ? 60 : 0;
    if (typeof fn_beforesend == 'string')
        fn_beforesend = window[fn_beforesend];
    if (typeof fn_onsuccess == 'string')
        fn_onsuccess = window[fn_onsuccess];
    if (typeof fn_onerror == 'string')
        fn_onerror = window[fn_onerror];
    var url = "", form = null;
    if (typeof form_url === 'string') {
        url = form_url;
    } else {
        form = form_url;
        url = form.attr('action') || "";
    }
    
    formData.append('_token', token);
    var xhr = $.ajax({
        url: url,
        type: type,
        data: formData,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function (xhr, settings) {
            if (typeof fn_beforesend === 'function') {
                if (!fn_beforesend(form))
                    return xhr;
            }
            
        },
        success: function (response, xhr) {
            
            if (typeof fn_onsuccess === 'function' && doSuccessCheck) {
                fn_onsuccess(response);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            if (xhr.status === 0)
                return xhr;
            if (typeof fn_onerror === 'function') {
                fn_onerror(errorThrown);
            }
        }
    });
    return xhr;
}

function ajaxCallfile(form_url, formData, fn_beforesend, fn_onsuccess, fn_onerror) {
    
    var type = (typeof formData === "undefined" || formData === null) ? "GET" : "POST";
    var timeout = (type === 'GET') ? 60 : 0;
    if (typeof fn_beforesend == 'string')
        fn_beforesend = window[fn_beforesend];
    if (typeof fn_onsuccess == 'string')
        fn_onsuccess = window[fn_onsuccess];
    if (typeof fn_onerror == 'string')
        fn_onerror = window[fn_onerror];
    var url = "", form = null;
    if (typeof form_url === 'string') {
        url = form_url;
    } else {
        form = form_url;
        url = form.attr('action') || "";
    }
    
    formData.append('_token', token);
    var xhr = $.ajax({
        url: url,
        type: type,
        data: formData,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function (xhr, settings) {
            if (typeof fn_beforesend === 'function') {
                if (!fn_beforesend(form))
                    return xhr;
            }
            
        },
        success: function (response, xhr) {
            if (user_type == 'user') {
                $('#checknum').append(markup_file_msg(response.reply.path, 'user'));
                
            } else {
                $('#checknum').append(markup_file_msg(response.reply.path, 'lawyer'));
                
            }
            
            
            p.publish({
                channel: 'my_channel' + $('.main-question').attr('data-question-id'),
                message: {
                    text: response.reply.path,
                    user_type: user_type,
                    typing: false,
                    refresh: false,
                    file: true
                }
                
            });
            console.log('sdf');
            if (typeof fn_onsuccess === 'function') {
                //   fn_onsuccess(response);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            if (xhr.status === 0)
                return xhr;
            if (typeof fn_onerror === 'function') {
                fn_onerror(errorThrown);
            }
        }
    });
    return xhr;
}

function markup_user_reply(msg, isonline) {
    var html = '<div class="item clearfix user reply " data-reply-id="7" data-posted="2016-06-11 13:37:11">' +
            '<div class="picture" title="online"><span class="glyphicon glyphicon-user"></span></div>' +
            '<div class="messages-wrap">' +
            '<div class="message clearfix">' +
            '<div class="text editable">' +
            '<span>' + msg + '</span>' +
            '<div class="date">' + dateFormat(now, "h:MM:ss TT - dS mmmm  yyyy") + (isonline ? '<span class="read">(read)</span>' : '') + '</div>' +
            '<div class="action">' +
            '' +
            '</div>' +
            ' </div>' +
            ' </div>' +
            '</div>' +
            '</div>';
    return html;
}

function markup_lawyer_reply(msg, isonline) {
    var html = '<div class="item clearfix lawyer reply " data-reply-id="7" data-posted="2016-06-11 13:37:11">' +
            '<div class = "picture online-status" title = "online" >' +
            '<img src = "' + $('.imglwyer').attr('src') + '" width = "100%" class = "imglwyer" >' +
            '</div>' +
            '<div class="messages-wrap">' +
            '<div class="message clearfix">' +
            '<div class="text editable">' +
            '<span>' + msg + '</span>' +
            '<div class="date">' + dateFormat(now, "h:MM:ss TT - dS mmmm  yyyy") + (isonline ? '<span class="read">(read)</span>' : '') + '</div>' +
            '<div class="action">' +
            '' +
            '</div>' +
            ' </div>' +
            ' </div>' +
            '</div>' +
            '</div>';
    return html;
}
function markup_file_msg(file, type) {
$('#post-reply input[type=file]').val('');
    var html = '<div data-posted="2016-06-11 17:23:04" data-reply-id="29" class="item clearfix ' + type + ' reply ">' +
            '<div class="picture blank"></div>' +
            '<div class="messages-wrap">' +
            '<div class="message clearfix">' +
            '<div class="text file editable">' +
            'Attachment: <a href="https://askwakeel.pk/download/' + question_id + '/' + file + '" target="_blank">' + file + '</a>' +
            '<div class="date">' + dateFormat(now, "h:MM:ss TT - dS mmmm  yyyy") + '</div>' +
            '<div class="action">' +
            '' +
            '</div>' +
            ' </div>' +
            '</div>' +
            '</div>' +
            '</div>';
    return html;
}
var dateFormat = function () {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
            timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
            timezoneClip = /[^-+\dA-Z]/g,
            pad = function (val, len) {
                val = String(val);
                len = len || 2;
                while (val.length < len)
                    val = "0" + val;
                return val;
            };
    
    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;
        
        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }
        
        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date))
            throw SyntaxError("invalid date");
        
        mask = String(dF.masks[mask] || mask || dF.masks["default"]);
        
        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }
        
        var _ = utc ? "getUTC" : "get",
                d = date[_ + "Date"](),
                D = date[_ + "Day"](),
                m = date[_ + "Month"](),
                y = date[_ + "FullYear"](),
                H = date[_ + "Hours"](),
                M = date[_ + "Minutes"](),
                s = date[_ + "Seconds"](),
                L = date[_ + "Milliseconds"](),
                o = utc ? 0 : date.getTimezoneOffset(),
                flags = {
                    d: d,
                    dd: pad(d),
                    ddd: dF.i18n.dayNames[D],
                    dddd: dF.i18n.dayNames[D + 7],
                    m: m + 1,
                    mm: pad(m + 1),
                    mmm: dF.i18n.monthNames[m],
                    mmmm: dF.i18n.monthNames[m + 12],
                    yy: String(y).slice(2),
                    yyyy: y,
                    h: H % 12 || 12,
                    hh: pad(H % 12 || 12),
                    H: H,
                    HH: pad(H),
                    M: M,
                    MM: pad(M),
                    s: s,
                    ss: pad(s),
                    l: pad(L, 3),
                    L: pad(L > 99 ? Math.round(L / 10) : L),
                    t: H < 12 ? "a" : "p",
                    tt: H < 12 ? "am" : "pm",
                    T: H < 12 ? "A" : "P",
                    TT: H < 12 ? "AM" : "PM",
                    Z: utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                    o: (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                    S: ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
                };
        
        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();

// Some common format strings
dateFormat.masks = {
    "default": "ddd mmm dd yyyy HH:MM:ss",
    shortDate: "m/d/yy",
    mediumDate: "mmm d, yyyy",
    longDate: "mmmm d, yyyy",
    fullDate: "dddd, mmmm d, yyyy",
    shortTime: "h:MM TT",
    mediumTime: "h:MM:ss TT",
    longTime: "h:MM:ss TT Z",
    isoDate: "yyyy-mm-dd",
    isoTime: "HH:MM:ss",
    isoDateTime: "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};
////////////////////////////////////////////////////////////////////////////////
//                  Pubnub Video Chat                                        //
//////////////////////////////////////////////////////////////////////////////
var video_out = document.getElementById("vid-box");
var vid_thumb = document.getElementById("vid-thumb");
var i = 1;
var ctrl
var cal_check = 1;
$('#myModal').on('hidden.bs.modal', function () {
    // do something…
    var audio = document.getElementById("ring");
    audio.pause();
})

$('#makecall').hide();
function login() {
    console.log('login');
    var phone = window.phone = PHONE({
        //  number: "<?php echo $this->session->userdata('user_name') ?>", 
        //  publish_key: 'pub-c-df78c3aa-0c39-4655-9290-5a6af760c8a6',
        //   subscribe_key: 'sub-c-fc614b1a-9290-11e5-bcd8-0619f8945a4f',
        subscribe_key: 'sub-c-f762fb78-2724-11e4-a4df-02ee2ddab7fe',
        publish_key: 'pub-c-156a6d5f-22bd-4a13-848d-b5b4d4b36695',
        number: user_type + question_id, // listen on usertype
        ssl: true
    });
    ctrl = window.ctrl = CONTROLLER(phone);
    console.log(ctrl);
    ctrl.ready(function ()
    {
        console.log('adding local stream');
        ctrl.addLocalStream(vid_thumb); // Place local stream in div
        p.publish({
            channel: 'my_channel_vid' + $('.main-question').attr('data-question-id'),
            message: {
                text: 'start_video', user_type: user_type
            }
        });
        $('#start').hide();
        $('#inCall').show();
        $('#loading').show();
    }); // Called when ready to receive call
    ctrl.receive(function (session)
    {
        session.connected(function (session) {
            console.log('connected');
            $('#loading').hide();
            video_out.appendChild(session.video);
        }); // New Call
        session.ended(function (session) {
            console.log('login-ended');
            end();
            ctrl.getVideoElement(session.number).remove();
        }); // Call Ended
    }); // Called on incoming call/call ended
    //...	
    ctrl.videoToggled(function (session, isEnabled) {
        ctrl.getVideoElement(session.number).toggle(isEnabled); // Hide video is stream paused
    });
    ctrl.audioToggled(function (session, isEnabled) {
        ctrl.getVideoElement(session.number).css("opacity", isEnabled ? 1 : 0.75); // 0.75 opacity is audio muted
    });
//	return false; //prevents form from submitting
    if (i == 1 && cal_check == 1)
    {
        i++;
        cal_check++;
        // p.publish({
        // channel: 'my_channel_vid' + $('.main-question').attr('data-question-id'),
        // message: {
        // text: 'start_video', user_type: user_type
        // }
        // });
        //	console.log(i);
    }
}

$('#inCall').hide();

function startcall(testname)
{
    $('#myModal').modal('hide');
    var audio = document.getElementById("ring");
    audio.pause();
    i = 2;
    console.log('login');
    var phone = window.phone = PHONE({
        //  number: "<?php echo $this->session->userdata('user_name') ?>", 
        //  publish_key: 'pub-c-df78c3aa-0c39-4655-9290-5a6af760c8a6',
        //   subscribe_key: 'sub-c-fc614b1a-9290-11e5-bcd8-0619f8945a4f',
        subscribe_key: 'sub-c-f762fb78-2724-11e4-a4df-02ee2ddab7fe',
        publish_key: 'pub-c-156a6d5f-22bd-4a13-848d-b5b4d4b36695',
        number: user_type + question_id, // listen on usertype
        ssl: true
    });
    ctrl = window.ctrl = CONTROLLER(phone);
    ctrl.ready(function ()
    {
        console.log('adding local stream');
        ctrl.addLocalStream(vid_thumb); // Place local stream in div	
        $('#start').hide();
        $('#inCall').show();
        $('#loading').show();
        phone.dial(testname + question_id);
    }); // Called when ready to receive call
    ctrl.receive(function (session)
    {
        
        session.connected(function (session) {
            console.log('connected');
            $('#loading').hide();
            video_out.appendChild(session.video);
        }); // New Call
        session.ended(function (session) {
            console.log('login-ended');
            end();
            ctrl.getVideoElement(session.number).remove();
        }); // Call Ended
    }); // Called on incoming call/call ended
    //...	
    ctrl.videoToggled(function (session, isEnabled) {
        ctrl.getVideoElement(session.number).toggle(isEnabled); // Hide video is stream paused
    });
    ctrl.audioToggled(function (session, isEnabled) {
        ctrl.getVideoElement(session.number).css("opacity", isEnabled ? 1 : 0.75); // 0.75 opacity is audio muted
    });
//	return false; //prevents form from submitting
    
    
    if (!window.phone)
        alert("Some Error Occured Please Try Again later!");
    else
    {
        $('#makecall').hide();
        setTimeout(function () {
            console.log('calling to ...' + testname)
            //    phone.dial(testname);
        }, 5000);
        
    }
}
function end() {
    console.log('END');
    //   var vid_thumb = document.getElementById("vid-thumb");
    $('#loading').hide();
    i = 1;
    cal_check = 1;
    
    
    $('#inCall').hide();
    $("#vid-thumb video").hide().remove();
    $("#vid-box video").hide().remove();
    //   vid_thumb.remove();
    if (ctrl) {
        $('#start').show();
        ctrl.hangup();
        ctrl.leaveStream($('.row.thread').attr('data-user'));
        location.reload(true);
    }
    //  phone.mystream.getVideoTracks()[0].stop();
    if (typeof phone != 'undefined')
    {
        if (typeof phone.mystream != 'undefined') {
            if (phone.mystream.stop) {
                // deprecated, may be removed in future
                phone.mystream.stop();
            } else if (phone.mystream.getVideoTracks) {
                // get video track to call stop on it
                var tracks = phone.mystream.getVideoTracks();
                if (tracks && tracks[0] && tracks[0].stop)
                    tracks[0].stop();
            }
            
            phone.mystream = null;
        }
    }
    
    window.close();
}

function mute() {
    var audio = ctrl.toggleAudio();
    if (!audio)
        $("#mute").html("Unmute");
    else
        $("#mute").html("Mute");
}

function pause() {
    var video = ctrl.toggleVideo();
    if (!video)
        $('#pause').html('Show Your Video');
    else
        $('#pause').html('Hide Your Video');
}

