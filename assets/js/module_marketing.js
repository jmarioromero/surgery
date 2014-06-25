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
            window.location = cModule.BASE_URL 
                + 'marketing/search/?s=' + encodeURIComponent($('input#search').val());
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
            
            cModule.callAjax('marketing/save',
                {values: JSON.stringify(_fieldList)},
                function(_data) {
                    if (_spiner) _spiner.stop();
                    console.log(_data);
                    if(_data.code === cModule.SUCCESSCODE) {
                        cModule.alert(_data.description, 'success');
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