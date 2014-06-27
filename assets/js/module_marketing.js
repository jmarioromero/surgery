;var marketingModule = (function($, cModule) {
    
    var _section = $('div#marketing-section');
    var _pollform = $('form#pollform');
    var _searchbtn = $('button.search-btn');
    var _savebtn = $('button.savepool-btn');
    
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
            $('div.date-wrapper').datepicker({ autoclose: true, endDate: '1d' });
            
            cModule.clickEvent(_searchbtn, this.search);
            cModule.clickEvent(_savebtn, this.save);
        },
        
        search: function(_this) {
            var _search = $('input#search').val();
            if(_search !== '') {
                window.location = cModule.BASEURL + 'marketing/search/?s=' + encodeURIComponent(_search);
            }
        },
        
        validateForm: function() {
            var _found = 0;
            var _inputlist = _pollform.find('input, select').not('.no-required');
            
            _inputlist.removeClass('required');
            
            _inputlist.each(function() {
                var _this = $(this);
                var _type = _this.attr('type');
                var _value = _this.val();
                
                if(_value === '' ||
                    (_type === 'email' && !cModule.isEmail(_value))) {
                    _found++;
                    _this.addClass('required').focus().select();
                    return false;
                }
            });
            
            return (_found == 0)
        },
        
        save: function(_elm) {

            if(!marketingModule.validateForm()) {
                var _msg = _pollform.find('input#validate-msg').val();
                cModule.alert(_msg, 'warning');
            }
            
            var _fieldList = {};
            
            var _spiner = false;
            _spiner = Ladda.create(_elm);
            _spiner.start();
            
            _pollform.find('input, select').each(function() {
                var _this = $(this);
                _fieldList[_this.attr('name')] = _this.val();
            });
            
            cModule.callAjax('marketing/save',
                {values: JSON.stringify(_fieldList)},
                function(_data) {
                    if (_spiner) _spiner.stop();
                    console.log(_data);
                    if(_data.code === cModule.SUCCESSCODE) {
                        _pollform.fadeOut('normal', function() { 
                                _pollform.remove();
                                $('div#pollform-success').fadeIn(); 
                            });
                    } else {
                        cModule.alert(_data.description, 'warning');
                    }
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