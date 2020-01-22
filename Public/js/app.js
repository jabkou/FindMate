function likeUser(id) {
    if(id == 0){
        alert('there is noone else');
        return;
    }
    const apiUrl = "http://localhost:8001";
    $.ajax({
        url : apiUrl + '/?page=user_like_user', method : "POST",
        data : {
            id : id },
        dataType : 'text',
        success: function(tex) {
            if (tex == 'like')
                alert("Nice! You' ve got new match ^^");
            $("#rel").load(" #rel");
            $("#rel2").load(" #rel2");
        } })
}

function crossUser(id) {
    if(id == 0){
        alert('there is noone else');
        return;
    }
    const apiUrl = "http://localhost:8001";
    $.ajax({
        url : apiUrl + '/?page=user_cross_user', method : "POST",
        data : {
            id : id },
        success: function() {
            $("#rel").load(" #rel");
            $("#rel2").load(" #rel2");
        } });

}
