;var cModule = (function($) {

    var _moduleList = [];
    var BASEURL = {};
    var SUCCESSCODE = '00';

    return {
        
        register: function(_module) {
            _moduleList.push(_module);
        },
        
        init: function() {
            $(document).ready(function() {
                cModule.documentReady();
            });
        },
        
        documentReady: function() {
            
            BASEURL = $('input#baseurl').val();
            
            if(BASEURL == '') window.console.log('[Warning] BASEURL no set!');
            
            window.console.log('excecute method ready in cModule!');

            for (var _i in _moduleList)
                if (typeof(_moduleList[_i].documentReady) === 'undefined')
                    window.console.log(_moduleList[_i].name() + ' module must put \'documentReady()\' method.');
                else
                    _moduleList[_i].documentReady();
        },
        
        isFunc: function(_object) {
            return ($.type(_object) === 'function');
        },
        
        clickEvent: function(_elm, _callback) {
            
            _elm.each(function() {
                $(this).unbind('click').click(function(_evt) {
                    _evt.preventDefault();
                    if(cModule.isFunc(_callback)) _callback(this, _evt);
                    return false;
                });            
            });
        },
        
        alert: function(_text, _type) {
            $.growl(_text, {type: _type, position: {from: 'top', align: 'center'}, delay: 100000});
        },
        
        toJSON: function(_data) {
            try {
                _data = $.parseJSON(_data);
            } catch (_exc) {
                _data = {code: '01', description: 'Parse JSON data error.'};
            }
            return _data;
        },        
        
        callAjax: function(_url, _params, _callback, _errorcallback) {
            
            if ($.type(_params) === 'string') {
                _params += '&_ajax=1';
            } else {
                _params._ajax = 1;
            }            
            
            setTimeout(function() {
                $.ajax({
                    url: (BASEURL + _url),
                    type: 'POST',
                    data: _params,
                    contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
                    cache: false,
                    success: function(_data) {
                        if(cModule.isFunc(_callback)) _callback(cModule.toJSON(_data));
                    },
                    error: function() {
                        if(_errorcallback) _errorcallback();
                    }
                });
            }, 500);        
        }
    };
})(jQuery);

cModule.init();
