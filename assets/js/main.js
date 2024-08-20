$(document).ready(function () {
    $(function () {
        const scrollAmount = 150;
        $("#scroll-left").on('click', function (e) {
            $('#genres-nav').animate({
                scrollLeft: '-=' + scrollAmount
            }, 300);
        })
        $("#scroll-right").on('click', function (e) {
            $('#genres-nav').animate({
                scrollLeft: '+=' + scrollAmount
            }, 300);
        })
    })

    $(function() {
        // $('#play-video-overlay').on('click',function(e){
        //     e.stopPropagation();
        //     $("#btn-play").trigger('click') 
               
        // })
        $("#btn-play").on('click',function(e){
            window.open($(this).data('ads'),'_blank')
            window.focus();
            $("#video-player-overlay").addClass('d-none')
            $("#video-iframe").attr('src',$("#video-iframe").data('videosrc'))
        })
    })
});