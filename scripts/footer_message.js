export function getFooterMessage(){
    $.get('http://api.quotable.io/random' , function(response){
        $("#footer_message").html(response.content);
    })
}
