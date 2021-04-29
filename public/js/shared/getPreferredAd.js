$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "http://localhost:8888/get-preferred-ad",
        success: function(response){
            const data = response.data
            let randIndex = 0
            let src = ''
            $("iframe").each(function() {
                randIndex = Math.floor(Math.random() * data.length)
                src = data[randIndex]
                $(this).attr('src', src)
            })
        }
    })
})
