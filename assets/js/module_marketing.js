;var marketingModule = (function($, cModule) {
    
    var _section = $('div#marketing-section');
    var _gotopollformbtn = $('button#gotopollform-btn');
    var _optionsform = $('div#marketing-options');
    var _pollform = $('div#marketing-pollform');
    var _cancelbtn = $('button.cancelpool-btn');
    var _searchform = $('form.searchform');
    var _cancelsearchbtn = $('button.cancelsearch-btn');
    var _savebtn = $('button.savepool-btn');
    
    var _ajax = function(_url, _params, _callback, _errorcallback) {
        setTimeout(function() {
            // call controller by ajax.
            $.ajax({
                url: _url,
                type: 'POST',
                data: _params,
                contentType: 'application/x-www-form-urlencoded;charset=UTF-8',
                cache: false,
                success: function(_data) {
                    console.log(_data);
                    if(_callback) _callback(_data);
                },
                error: function() {
                    alert('Error.');
                    if(_errorcallback) _errorcallback();
                }
            });
        }, 500);        
    };
    
    return {
        
        name: function() { return 'marketingModule'; },
        
        register: function() { cModule.register(this); },
        
        documentReady: function() {

            window.console.log('excecute method ready from marketingMod!');

            _section.find('input.onlyletters').numeric({onlyletters: true, allowspace: true});
            _section.find('input.email').numeric({email: true});
            _section.find('input.numeric').numeric({decimal: false, negative: false});
            _section.find('select.selectpicker').selectpicker();
            
            this.bindActions();
        },
        
        bindActions: function() {
            $('div.date-wrapper').datepicker({ autoclose: true, startDate: '1d' });
            
            cModule.clickEvent(_gotopollformbtn, this.goToPollForm);
            cModule.clickEvent(_cancelbtn, this.cancelPoll);
            cModule.clickEvent(_cancelsearchbtn, this.cancelSearch);
            cModule.clickEvent(_savebtn, this.save);
        },
        
        goToPollForm: function(_this) {
            _optionsform.fadeOut('normal', function() {
                _pollform.fadeIn();
            });
        },
        
        cancelPoll: function(_this, _callback) {
            _pollform.find('input').not('.inputdate').val('');
            _pollform.fadeOut('normal', function() {
                _optionsform.fadeIn('normal', function() {
                    if(_callback) _callback();
                });
            });
        },
        
        cancelSearch: function(_this) {
            _searchform.find('input').val('');
        },
        
        save: function(_elm) {
            var _fieldList = {};
            
            var _spiner = false;
            _spiner = Ladda.create(_elm);
            _spiner.start();
            
            _pollform.find('input, select').each(function() {
                var _this = $(this);
                _fieldList[_this.attr('name')] = _this.val();
            });
            
            _ajax('marketing/marketing/save',
                {_ajax: 1, values: JSON.stringify(_fieldList)},
                function(_data) {
                    if (_spiner) _spiner.stop();
                    console.log(_data);
                    this.cancelPoll('', function() { cModule.alert(_data.description, 'success'); });
                },
                function() {
                    if (_spiner) _spiner.stop();
                    console.log(_data);
                }                
            );
        }
    };
})(jQuery, cModule||{});

marketingModule.register();