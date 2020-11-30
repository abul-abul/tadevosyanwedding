$(document).ready(function () {
    count = 0;
    $('.playMusic').click(function () {
        var x = document.getElementById("player");
        count++;
        if(count == 1){
            x.play();
        }else{
            x.pause();
            count = 0;
        }

    })
})