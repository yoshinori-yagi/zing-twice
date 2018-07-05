$(function () {
    $('.seat1').click(function(){
        $('.offence').fadeIn();
        $('.seat1').css('background-color', 'blue');
        $('.cover').css('background-color', 'rgba(0, 0, 0, 0.3)');
    });
    
    $('.game_choice').click(function(){
        $('.game_index').fadeIn();
    })
    
})