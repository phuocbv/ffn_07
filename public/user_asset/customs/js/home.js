var home = function() {

    this.data = {
        league_id: null,
        league_season_id: null,
        '_token': $('meta[name="_token"]').attr('content'),
    };
    
    this.init = function() {
        this.addEvent();
        this.data.league_id = $('#leagues').val();
        this.loadLeagueSeasons();
        this.data.league_season_id = $('#league_seasons').val();
        this.loadTeam();
    };

    this.addEvent = function() {
        var current = this;
        $('abbr.timeago').timeago();

        $('#leagues').on('change', function() {
            current.data.league_id = $(this).val();
            current.loadLeagueSeasons();
        });

        $('#league_seasons').on('change', function() {
            current.data.league_season_id = $(this).val();   
            current.loadTeam();
        });
    };

    this.loadLeagueSeasons = function() {
        var current = this;
        $.ajax({
            url: '/home/searchLeagueSeason',
            type: 'POST',
            data: this.data,
        })
        .done(function(data) {
            var result = '';
            for (var i = 0; i < data.length; i++) {
                if (i == 0) {
                    result += '<option selected="selected" value="' + data[i].id + '">' + data[i].year + '</option>';
                } else {
                    result += '<option value="' + data[i].id + '">' + data[i].year + '</option>';
                }
            }
            $('#league_seasons').html(result);
            current.data.league_season_id = $('#league_seasons').val();
            current.loadTeam();
        })
        .fail(function() {
            console.log("error");
        });
    };

    this.loadTeam = function() {
        $.ajax({
            url: '/home/searchTeam',
            type: 'POST',
            data: this.data,
        })
        .done(function(data) {
            var result = '';
            for (var i = 0; i < data.length; i++) {
                result += "<tr class='odd gradeX' align='center'>" +
                    "<td>" + (i + 1) + "</td>" +
                    "<td>" + data[i].name + "</td></tr>"
            }
            $('#team-list').html(result);
        })
        .fail(function() {
            console.log("error");
        });
    }
}

var h = new home();
h.init();
