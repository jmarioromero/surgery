;var marketingModule = (function($, cModule) {
    
    var _section = $('div#marketing-section');
    var _gotopollformbtn = $('button#gotopollform-btn');
    var _optionsform = $('div#marketing-options');
    var _pollform = $('div#marketing-pollform');
    var _cancelbtn = $('button.cancelpool-btn');
    var _searchform = $('form.searchform');
    var _cancelsearchbtn = $('button.cancelsearch-btn');
    
    return {
        
        name: function() { return 'marketingModule'; },
        
        register: function() { cModule.register(this); },
        
        documentReady: function() {

            window.console.log('excecute method ready from marketingMod!');

            _section.find('input.onlyletters').numeric({onlyletters: true, allowspace: true});
            _section.find('input.numeric').numeric({decimal: false, negative: false});
            _section.find('select.selectpicker').selectpicker();
            
            this.bindActions();
        },
        
        bindActions: function() {
            
            $('div.date-wrapper').datepicker({ autoclose: true, startDate: '1d' });
            
            cModule.clickEvent(_gotopollformbtn, this.goToPollForm);
            cModule.clickEvent(_cancelbtn, this.cancelPoll);
            cModule.clickEvent(_cancelsearchbtn, this.cancelSearch);
        },
        
        goToPollForm: function(_this) {
            _optionsform.fadeOut('normal', function() {
                _pollform.fadeIn();
            });
        },
        
        cancelPoll: function(_this) {
            
            _pollform.find('input').not('.inputdate').val('');
            _pollform.fadeOut('normal', function() {
                _optionsform.fadeIn();
            });
        },
        
        cancelSearch: function(_this) {
            
            _searchform.find('input').val('');
            
        }        
    };
})(jQuery, cModule||{});

marketingModule.register();