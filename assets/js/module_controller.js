;var cModule = (function($) {

    var _moduleList = [];
    var BASEURL = '';
    var SUCCESSCODE = '';

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
            //CONSTANTS
            cModule.BASEURL = $('input#baseurl').val();
            cModule.SUCCESSCODE = '00';
            
            if(cModule.BASEURL === '') console.log('[Warning] BASEURL no set!');
            
            console.log('excecute method ready in cModule!');

            for (var _i in _moduleList)
                if (typeof(_moduleList[_i].documentReady) === 'undefined')
                    console.log(_moduleList[_i].name() + ' module must put \'documentReady()\' method.');
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
            if($('div.bootstrap-growl').length == 0)
                $.growl(_text, {type: _type, position: {from: 'top', align: 'center'}, delay: 6000});
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
            if ($.type(_params) === 'string')
                _params += '&_ajax=1';
            else
                _params._ajax = 1;
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
        },
        
        isEmail: function(_email){
        	var _regex = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        	return _regex.test(_email);
        },
        
        postRedirect: function(_action, _inputs) {
            var _container = $('<div />').hide();
            var _form = $('<form />').attr({
                action: _action,
                id: 'formtemp',
                method: 'post'
            });
            if (_inputs) {
                $.map(_inputs, function(_value, _key) {
                    $('<input />').attr({
                        name: _key,
                        type: 'hidden',
                        value: _value
                    }).appendTo(_form);
                });
            }
            _form.appendTo(_container);
            _container.appendTo($('body'));
            _form.submit();
        },
        
        exist: function(_elm) {
            return (_elm && _elm.length > 0);
        }
    };
})(jQuery);

cModule.init();
