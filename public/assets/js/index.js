document.addEventListener("DOMContentLoaded", function () {
    const deleteButton = document.querySelectorAll(".delete-button");

    deleteButton.forEach((button) => {
        button.addEventListener("click", async function (event) {
            event.preventDefault();

            const itemId = button.getAttribute("data-item-id");

            const confirmed = window.confirm(
                "Are you sure you want to delete this item?"
            );

            if (confirmed) {
                console.log(`Item with ID ${itemId} will be deleted.`);

                try {
                    const response = await fetch(`/shopping-list/${itemId}`, {
                        method: "DELETE",
                        // headers: {
                        //     "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        // },
                    });

                    if (response.ok) {
                        console.log(
                            `Item with ID ${itemId} deleted on the server.`
                        );

                        // Remove the row from the table
                        const itemRow = button.closest("tr");
                        if (itemRow) {
                            itemRow.remove();
                        }
                    } else {
                        console.error(
                            `Failed to delete item with ID ${itemId} on the server.`
                        );
                    }
                } catch (error) {
                    console.error(`An error occurred: ${error}`);
                }
            } else {
                console.log(`Deletion of item with ID ${itemId} was canceled.`);
                const modal = document.getElementById(`modal-${itemId}`);
                if (modal) {
                    modal.style.display = "none";
                }
            }
        });
    });
});
