<!DOCTYPE html>
<html lang="en">

<body>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../partials/handleupdateitem.php" method="post">
                    <div class="modal-body">
                        <p>Are you sure you want to update this item in the database?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Update item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var myModal = new bootstrap.Modal(document.getElementById('updateModal'));
            myModal.show();
        });
    </script>

</body>

</html>

confirm query =

UPDATE `itemdetails` SET `item_brand` = 'Motor', `item_modalname` = 'neo', `item_color` = 'Caneel Bay blue', `item_width` = '75.99mm', `item_weight` = '6.89 mm', `item_ram` = '12', `item_storage` = '256', `item_inch` = '6.75 inch', `item_display` = 'Full HD+ pOLED Display ', `item_protection` = 'Gorila glass 34', `item_charger` = '68' WHERE `itemdetails`.`itemdetails_id` = 6;