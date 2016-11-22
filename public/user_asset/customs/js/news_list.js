var newsList = function() {

    this.init = function() {
        this.addEvent();
    };

    this.addEvent = function() {
        $('img').css({
            width: '100%',
        });
        $('abbr.timeago').timeago();
    };
}

var newsList = new newsList();
newsList.init();
