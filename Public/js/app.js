function likeUser(id) {
    if (!confirm('Do you want to like this user?')) {
        return; }
    const apiUrl = "http://localhost:8001";
    $.ajax({
        url : apiUrl + '/?page=user_like_user', method : "POST",
        data : {
            id : id },
        success: function() {
            alert('Selected user successfully liked from database!');
        } });
}