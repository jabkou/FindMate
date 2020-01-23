function likeUser(id) {
    if(id == 0){
        alert('there is no-one else');
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
        alert('there is no-one else');
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

function getUsers() {
    const apiUrl = "http://localhost:8001";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '/?page=users',
        dataType : 'json'
    })
        .done((res) => {
            $list.empty();

            res.forEach(el => {
                $list.append(`<tr>
                        <td>${el.id}</td>
                        <td>${el.email}</td>
                        <td>${el.name}</td>
                        <td>${el.gender}</td>
                        <td>${el.age}</td>
                        <td>${el.role}</td>
                        <td> <button class="del" onclick="deleteUser(${el.id})">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                        </td>
                        </tr>`);
            });
        });
}


function deleteUser(id) {
    if (!confirm('Do you really want to delete this user?')) {
        return; }
    const apiUrl = "http://localhost:8001";
    $.ajax({
        url : apiUrl + '/?page=admin_delete_user', method : "POST",
        data : {
            id : id },
        success: function() {
            alert('User successfully deleted from database!');
            getUsers();
        } });
}
