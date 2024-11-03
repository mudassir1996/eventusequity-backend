@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://widgets.sportmonks.com/css/app.css">
    <style>
        .form-control {
            -webkit-appearance: auto;
        }
    </style>
@endsection
@section('content')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <div class="page_title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="page_title-content">
                        <p class="mb-0">
                            <a href="{{ route('trade-statement') }}">Dashboard </a>
                            <span>/</span>
                            <span>Football Markets</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <select id="widget_type" class="form-control">
                                <option value="schedule">Schedule</option>
                                <option value="live-score">Live Score</option>
                                <option value="standings">Standings</option>
                            </select>
                        </div>
                        <div class="card-body pt-0">
                            {{-- Schedule --}}
                            <div class="schedule" id="sportmonks-widget" data-widget="league-schedule"
                                data-info="zn5jjWUeCVTv67aA0Hd4eIMsfwcvFTvXfsnHeFtAJUL8N4MHHwoKeAr1LPNFurlQehIkVLgApXLd8FczpnyGjyXLKQH17BL1BGe1hu5n5XhE+BtBclNeAaya4rh9cxyyGf560zr3LwTbVV168Cai/RVRPcg9bZOZmAmNbDrOLpG6+luKF/w9g1mRAZb5gGVME/fGs8LunbFezm6dSTCWNUojKoP4MU+xb7o6B4L5M+BfaIkg4vIyaTo47TYvmn0V9QXtgSNTPDxrwwE1QmG32krT/DyTXNRyGAXRNpm5UEUAxg303XfQS0DBaJ0WZYj8bBKvL0V9vwUgRxhnRn759hjtZwsWzhL28e7cGYmQJGErqb08V6FWAs3YLNfHh7vbQPshJHTCHFhMsQuMXe01exfKVVusQBXwFrxCJLV5FWdWEcLNA02S8lATsiLeiIqEG/xco5oBvHaVBDygwVtXHdRLbYf32cJpcsfrFMnndbsbcVkV/VlwQRlthS2XBxi/xKuHZLd/Ikshr+H5sLylWcIg//9dluVQ6SDUguvtt1JfstjTU6BmmlX6KTb8+Yw69oGPMLpbNDOK9FxzDRNX38pr71G9btCkyBeepDVjZQBAmskFb2KQdud2epfecbAGcTobmF5NK2UMpkZ6mTSD80VOtxsFUUunzmXWo0VjsO8="
                                data-colors="#010028,#1893C1,#D0D0D9,#343353"
                                data-brand="https://eventusequity.com/templates/email-logo.png" data-font="Open Sans"
                                data-league="8" data-rounds="true" data-matchcenter="true"></div>


                            {{-- Live Score --}}
                            <div class="live-score" id="sportmonks-widget" data-widget="livescore"
                                data-info="t4TN1dt1x+SblXJdClc1zHo0UxE2Fg87v/gdpMbfDwa+jq6wr70BGBioHnXALU8FnaxjM/mAcw/9S0Ci+wBS/6OnJSpeM0FtSosJ6+TYRd5qsqNqgN0meaNUS8ymoX10nKS077zATqT/+bj225bt6vMUbLTKhCugpnq++uO9RDiSgIpIYlK8ZeoA6SXNjTTpqk9sPiJzvcbOga8aXfLxK6kI5JCc/To0VyUx1wBDuN1Wi2Mv2OSoE//f1aOsNqrb/aO3PT5yYVRXow8aNrfIAsgCZ4lDHmHtjWYBHAQXjGbqqk6z1XcPLcDw5NnQ7Z66d/uADJKdTKK6bWIEDGCNW6yDT1i81fQFLkiArIWQWauNYzh80qcaL9uDLyJakDX0O86blmaqSLTcDthhF6di8bOb2sjrIu7JiRGiUocp3tnm1vY4d7SQK8XPGxhPGB/fKlkffPZF5MJdOqsZf39yBYGeb6Gln3PvI7ug1NhLg9EmXWJ1mXgGHYbh1Ipkq/XRI8NsGunCZhEHWVCqfctIwOfWdVpkgXWF8d41sIlqx1SmZI84kVqKpyyZI7iwatMaOYnwK3NHsmtO/E86A/6byLXBTBBkNgR7n84FHavlYIV03FA8vfrjzXykaCiSjJnjsoAhG8HRMKhO554T/HS1beU8gPMeOEqG1RmfSYDHTMg="
                                data-colors="#010028,#1893C1,#D0D0D9,#343353"
                                data-brand="https://eventusequity.com/templates/email-logo.png"
                                data-matchcenter="true"></div>

                            {{-- Standings --}}
                            <div class="standings" id="sportmonks-widget" data-widget="league-standings"
                                data-info="WtJBxgjVNHpciOHKujPxd3FqJxpxlACid3iIM7Q4zeCDyaWZ15oskQFLmiU5YuqNNLGJjH/UPFqiNtPpCk6JZpxEHsAQ+YHEB/UZfRHFj4PjwxygmjoDOpJppYyu/rl/ceDW3MNGCuFrqkMlxHIMa0JHFNunTd+GLs1wVXqHWbwuRzqUH+mci9z0/2gdsM9qWtj65Ft0ocbTO0YHQNl2f6ubvpKr7gSg+oLkhy+5gV9VVvfL4TVygPcCXP9bxYOFQqk/abmXaT5+yfzGO9ZH/Bjpv2n8mFdEaDF9jWL/2X8agQA7fFoakQ5Q1NGqP8Gtl/UZ9vfhJ9esroXyYrKAxE8mPqa11cUCSELejKKTq1fE6Sw0bFHPorpn7tboFljBYRizmd27mG9mPIxAj9iy88yqR0NwouYMsrNB31I4Srkip+8f5BxXmlozBAQCDUfOchZlttON+OWd5jZqKdPRNMnRUsk4/1gQzl26XO5NrwYUiOMiIZCSZZtqOUzmFvcbrahsfbUDu9s2sOpaH18pYhxi62xWeb1SG39R8g/TEUWASsjfqWjQTpQOcA8G7EiLJ+xZ++T9xKSCn3Rea20orbf4wVt9DwDOgReRj/UNYJWfnjZumQTEvN/gAUFijPzpjM7FkZOpjY0B/aQGlQsZVc//r5dsnkwxOHcKMnZkFHc="
                                data-brand="https://eventusequity.com/templates/email-logo.png" data-league="8" data-form="true"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="https://widgets.sportmonks.com/js/league/schedule.js"></script>
    <script type="text/javascript" src="https://widgets.sportmonks.com/js/livescore/livescore.js"></script>
    <script type="text/javascript" src="https://widgets.sportmonks.com/js/league/standings.js"></script>
    <script>
        const schedule = $(".schedule");
        const live_score = $(".live-score");
        const standings = $(".standings");

        $(document).ready(() => {
            //user icon dropdown called explicitly becuase default behavior conflicting with widget JS
            $('.user').dropdown();

            schedule.show();
            live_score.hide();
            standings.hide();

        });

        $('#widget_type').change(function() {
            const widget_type = $('#widget_type').val();
            console.log(widget_type);

            if (widget_type == 'schedule') {
                schedule.show();
                live_score.hide();
                standings.hide();
            } else if (widget_type == 'live-score') {
                schedule.hide();
                live_score.show();
                standings.hide();
            } else if (widget_type == 'standings') {
                schedule.hide();
                live_score.hide();
                standings.show();
            }
        });
    </script>
@endsection
