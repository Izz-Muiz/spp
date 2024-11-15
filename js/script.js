// var search = document.getElementById('search');
// var find = document.getElementById('find');
// var container = document.getElementById('container');

// search.addEventListener('keyup', function() {

//     var xhr = new XMLHttpRequest();

//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status === 200) {
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     xhr.open('GET', 'ajax/students.php?search=' + search.value, true);
//     xhr.send();

// })

//use jquery
$(document).ready(function () {
  $("#find").hide();
  $("#search").on("keyup", function () {
    $("#container").load("ajax/students.php?search=" + $("#search").val());
  });
});
