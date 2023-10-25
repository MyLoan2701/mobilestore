

function userItem() {
    document.getElementById('user-item').style.display='block';
    // ui.style.display='block';
    // var item = document.getElementById("mg-user");
    // window.onclick = function(event) {
    //     if (event.target == item || event.target == ui) {
    //         document.getElementById('user-item').style.display = "none";
    //     }
    //   }
}
var loacation = "http://localhost:8080/mobilestore/admin/";

function add_category() {
    location.assign(loacation + "showAddCategory");
}
function add_admin() {
    location.assign(loacation + "showAddAdmin");
}
function add_phone() {
    location.assign(loacation + "showAddphone");
}