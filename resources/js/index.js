// document.addEventListener('DOMContentLoaded', function() {
//     const deleteButton = document.querySelectorAll('.delete-button');
    
//     deleteButton.forEach(button => {
//         button.addEventListener('click', function(event) {
//             event.preventDefault();
            
//             const itemId = button.getAttribute('data-item-id');
            
//             const confirmed = window.confirm("Are you sure you want to delete this item?");
            
//             if (confirmed) {
              
//                 const row = button.closest('tr');
//                 if (row) {
//                     row.remove();
//                 }
//             }
//         });
//     });
// })

document.addEventListener('DOMContentLoaded', function() {
    const message = document.getElementById('message');
    
    message.textContent = 'Привет, это сообщение через JavaScript!';
});
