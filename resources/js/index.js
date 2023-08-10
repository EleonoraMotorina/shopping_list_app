document.addEventListener('DOMContentLoaded', function() {
    const deleteButton = document.querySelectorAll('.delete-button');
    
    deleteButton.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            const itemId = button.getAttribute('data-item-id');
            
            const confirmed = window.confirm("Are you sure you want to delete this item?");
            
            if (confirmed) {

                console.log(`Item with ID ${itemId} will be deleted.`);
            } else {

                console.log(`Deletion of item with ID ${itemId} was canceled.`);
            }
        });
    });
});
