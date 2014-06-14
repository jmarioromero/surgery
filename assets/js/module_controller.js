;var cModule = (function($) {

    var _moduleList = [];

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

            window.console.log('excecute method ready in cModule!');

            for (var _i in _moduleList)
                if (typeof(_moduleList[_i].documentReady) === 'undefined')
                    window.console.log(_moduleList[_i].name() + ' module must put \'documentReady()\' method.');
                else
                    _moduleList[_i].documentReady();
        },
        
        clickEvent: function(_elm, _callback) {
            _elm.unbind('click').click(function(_evt) {
                _evt.preventDefault();
                if(_callback) _callback(this, _evt);
                return false;
            });            
        }           
    };
})(jQuery);

cModule.init();
